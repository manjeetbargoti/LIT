<?php

namespace App\Http\Controllers;

use App\BusinessInfo;
use App\Country;
use App\State;
use App\City;
use App\Proposal;
use App\User;
use App\ProposalQuery;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;
use Symfony\Component\HttpFoundation\Response;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('proposal_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword = $request->get('search');
        $perPage = 25;

        $userData = Auth::user();

        $userRole = $userData->roles->pluck('name')->toArray();

        // dd($userData->id);

        if ($userRole[0] == "Super Admin") {
            if (!empty($keyword)) {
                $proposal = Proposal::where('project_name', 'LIKE', "%$keyword%")
                    ->orWhere('submission_time', 'LIKE', "%$keyword%")
                    ->orWhere('project_timeline', 'LIKE', "%$keyword%")
                    ->orWhere('budget', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $proposal = Proposal::latest()->paginate($perPage);
            }
        } else {
            if (!empty($keyword)) {
                $proposal = Proposal::where(['user_id'=>$userData->id, 'status'=>1])
                    ->where(function ($query) use ($keyword){
                        $query->where('project_name', 'LIKE', "%$keyword%")
                        ->orWhere('submission_time', 'LIKE', "%$keyword%")
                        ->orWhere('project_timeline', 'LIKE', "%$keyword%")
                        ->orWhere('budget', 'LIKE', "%$keyword%");
                    })
                        ->latest()->paginate($perPage);
                // dd($proposal);
            } else {
                $proposal = Proposal::where(['user_id'=>$userData->id, 'status'=>1])->latest()->paginate($perPage);
            }
        }

        return view('admin.proposals.index', compact('proposal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // abort_if(Gate::denies('proposal_project_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uid = Auth::user()->id;

        $country = Country::orderBy('name', 'asc')->get();
        $company = BusinessInfo::where('user_id', $uid)->get();

        return view('admin.proposals.create', compact('country', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // abort_if(Gate::denies('proposal_project_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'brochure_pdf' => 'mimes:pdf,doc,docx|max:5120',
        ]);

        $requestData = $request->all();

        $user_id = Auth::user()->id;

        // dd($requestData);

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['project_name']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['city']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['country'])));

        // dd($slug);

        // Trade Licence Image
        if ($request->hasFile('brochure_pdf')) {

            $file_array = Input::file('brochure_pdf');
            $file_name = $file_array->getClientOriginalName();
            $file_size = $file_array->getClientSize();
            $extension = $file_array->getClientOriginalExtension();
            $filename = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['project_name']))).'_brochure_' . rand(0, 9999999) . '.' . $extension;
            // $large_file_path = public_path('/images/tradeLicense/large/' . $filename);
            $request->brochure_pdf->move(public_path('/images/brochure/large/'), $filename);
            // Storing image in folder
            // $request->move($large_file_path);

            $requestData['brochure_pdf'] = $filename;
        }

        $requestData['slug'] = $slug;
        $requestData['user_id'] = $user_id;

        // dd($requestData);

        DB::beginTransaction();

        try {

            $proposal = Proposal::create($requestData);

        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {
            // Sending mail to user regarding proposal add
            $email = config('app.email');

            $messageData = ['email' => $email, 'name' => Auth::user()->first_name];
            Mail::send('emails.admin_proposal_added', $messageData, function ($message) use ($email) {
                $message->to($email)->subject('New Proposal Added!');
            });
        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
        }

        DB::commit();

        $notification = array(
            'message' => 'Project added successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/social-impact/proposals')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // abort_if(Gate::denies('proposal_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $proposals = Proposal::findOrFail($id);

        $userData = User::findOrFail($proposals['user_id']);

        $userRole = $userData->roles->pluck('name')->toArray();

        // dd($userData);

        return view('admin.proposals.show', compact('proposals', 'userData', 'userRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // abort_if(Gate::denies('proposal_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uid = Auth::user()->id;

        $proposal = Proposal::findOrFail($id);
        $company = BusinessInfo::where('user_id', $uid)->get();

        // Country Dropdown
        $countryname = Country::get();
        $country_dropdown = "<option selected value=''>Select Country</option>";
        foreach ($countryname as $cont) {
            if ($cont->name == $proposal['country']) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $country_dropdown .= "<option value='" . $cont->name . "' " . $selected . ">" . $cont->name . "</option>";
        }

        // State Dropdown
        $countryname = Country::where('name', $proposal['country'])->first();
        $statename = State::where(['country_id' => $countryname->id])->get();
        $state_dropdown = "<option selected value=''>Select State</option>";
        foreach ($statename as $stn) {
            if ($stn->name == $proposal->state) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $state_dropdown .= "<option value='" . $stn->name . "' " . $selected . ">" . $stn->name . "</option>";
        }

        // City Dropdown
        $statename = State::where('name', $proposal['state'])->first();
        $cityname = City::where(['state_id' => $statename->id])->get();
        $city_dropdown = "<option selected value=''>Select City</option>";
        foreach ($cityname as $city) {
            if ($city->name == $proposal->city) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $city_dropdown .= "<option value='" . $city->name . "' " . $selected . ">" . $city->name . "</option>";
        }

        return view('admin.proposals.edit', compact('proposal','company', 'country_dropdown', 'state_dropdown', 'city_dropdown'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // abort_if(Gate::denies('proposal_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestData = $request->all();

        // dd($requestData);

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['project_name']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['city']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['country'])));

        // dd($slug);

        // Trade Licence Image
        if ($request->hasFile('brochure_pdf')) {

            $file_array = Input::file('brochure_pdf');
            $file_name = $file_array->getClientOriginalName();
            $file_size = $file_array->getClientSize();
            $extension = $file_array->getClientOriginalExtension();
            $filename = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['project_name']))).'_brochure_' . rand(0, 9999999) . '.' . $extension;
            // $large_file_path = public_path('/images/tradeLicense/large/' . $filename);
            $request->brochure_pdf->move(public_path('/images/brochure/large/'), $filename);

            $requestData['brochure_pdf'] = $filename;
        }

        $requestData['slug'] = $slug;

        DB::beginTransaction();

        try {

            $proposal = Proposal::findOrFail($id);
            $proposal->update($requestData);

        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        $notification = array(
            'message' => 'Project updated successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/social-impact/proposals')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // abort_if(Gate::denies('proposal_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Proposal::destroy($id);

        $notification = array(
            'message' => 'Project deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/social-impact/proposals')->with($notification);
    }

    // Enable Proposals
    public function enableProposal($id=null)
    {
        if($id)
        {
            Proposal::where('id', $id)->update(['status' => 1]);

            $notification = array(
                'message' => 'Project enable successfully!',
                'alert-type' => 'success',
            );

            return redirect('admin/social-impact/proposals')->with($notification);
        }
    }

    // Disable Proposal
    public function disableProposal($id=null)
    {
        if($id)
        {
            Proposal::where('id', $id)->update(['status' => 0]);

            $notification = array(
                'message' => 'Project disable successfully!',
                'alert-type' => 'success',
            );

            return redirect('admin/social-impact/proposals')->with($notification);
        }
    }

    
}
