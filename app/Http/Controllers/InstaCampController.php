<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\SDGs;
use App\InstaCampaigns;
use App\InstaCampImages;
use App\State;
use App\User;
use DB;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;
use Symfony\Component\HttpFoundation\Response;

class InstaCampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('digital_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword = $request->get('search');
        $perPage = 25;

        $userData = Auth::user();

        $userRole = $userData->roles->pluck('name')->toArray();

        // dd($userData->id);

        if ($userRole[0] == "Super Admin") {
            if (!empty($keyword)) {
                $instaCamp = InstaCampaigns::where('service_name', 'LIKE', "%$keyword%")
                    ->orWhere('service_description', 'LIKE', "%$keyword%")
                    ->orWhere('beneficiaries', 'LIKE', "%$keyword%")
                    ->orWhere('duration', 'LIKE', "%$keyword%")
                    ->orWhere('budget', 'LIKE', "%$keyword%")
                    ->orWhere('region', 'LIKE', "%$keyword%")
                    ->orWhere('country', 'LIKE', "%$keyword%")
                    ->orWhere('state', 'LIKE', "%$keyword%")
                    ->orWhere('city', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $instaCamp = InstaCampaigns::latest()->paginate($perPage);
            }
        } else {
            if (!empty($keyword)) {
                $instaCamp = InstaCampaigns::where(['user_id'=>$userData->id, 'status'=>1])
                    ->where(function ($query) use ($keyword){
                        $query->where('service_name', 'LIKE', "%$keyword%")
                        ->orWhere('service_description', 'LIKE', "%$keyword%")
                        ->orWhere('beneficiaries', 'LIKE', "%$keyword%")
                        ->orWhere('duration', 'LIKE', "%$keyword%")
                        ->orWhere('budget', 'LIKE', "%$keyword%")
                        ->orWhere('region', 'LIKE', "%$keyword%")
                        ->orWhere('country', 'LIKE', "%$keyword%")
                        ->orWhere('state', 'LIKE', "%$keyword%")
                        ->orWhere('city', 'LIKE', "%$keyword%");
                    })
                    ->latest()->paginate($perPage);
                // dd($socialInitiative);
            } else {
                $instaCamp = InstaCampaigns::where(['user_id'=>$userData->id, 'status'=>1])->latest()->paginate($perPage);
            }
        }

        // $socialInitiative = json_decode(json_encode($socialInitiative));
        // echo "<pre>"; print_r($socialInitiative); die;

        foreach ($instaCamp as $key => $val) {
            $instaCampImages = InstaCampImages::where('insta_camp_id', $val->id)->first();
            $instaCamp[$key]->feature_image = $instaCampImages['image_name'];

            // dd($initiativeImages);
        }

        return view('admin.insta_camp.index', compact('instaCamp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // abort_if(Gate::denies('digital_service_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country = Country::orderBy('name', 'asc')->get();
        $sdgs = SDGs::where('status',1)->get();

        return view('admin.insta_camp.create', compact('country','sdgs'));
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
        // abort_if(Gate::denies('social_initiative_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestData = $request->all();

        // dd($requestData);

        $user_id = Auth::user()->id;

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['service_name']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['city']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['country'])));

        // dd($slug);

        $requestData['slug'] = $slug;
        $requestData['user_id'] = $user_id;

        DB::beginTransaction();

        try {

            $instaCamp = InstaCampaigns::create($requestData);

        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {

            if ($request->hasFile('file')) {
                $image_array = Input::file('file');
                // if($image_array->isValid()){
                $array_len = count($image_array);
                // dd($array_len);
                for ($i = 0; $i < $array_len; $i++) {
                    // $image_name = $image_array[$i]->getClientOriginalName();
                    $image_size = $image_array[$i]->getClientSize();
                    $extension = $image_array[$i]->getClientOriginalExtension();
                    $filename = 'digital_service_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = public_path('images/initiative/large/' . $filename);
                    // Resize image
                    Image::make($image_array[$i])->save($large_image_path);

                    // dd($product->id);

                    // Store image in property folder
                    InstaCampImages::create([
                        'image_name' => $filename,
                        'image_size' => $image_size,
                        'insta_camp_id' => $instaCamp->id,
                    ]);
                    // }
                }
            } else {
                $filename = "default.png";
                // $property->image = "default.jpg";
                InstaCampImages::create([
                    'image_name' => $filename,
                    'image_size' => '7.4',
                    'insta_camp_id' => $instaCamp->id,
                ]);
            }

        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        $notification = array(
            'message' => 'Service added successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/social-impact/digital-service')->with($notification);
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
        $instaCamp = InstaCampaigns::findOrFail($id);

        $userData = User::findOrFail($instaCamp['user_id']);

        $userRole = $userData->roles->pluck('name')->toArray();

        // dd($userData);

        return view('admin.insta_camp.show', compact('instaCamp', 'userData', 'userRole'));
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
        // abort_if(Gate::denies('social_initiative_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $instaCamp = InstaCampaigns::findOrFail($id);

        // Country Dropdown
        $countryname = Country::get();
        $country_dropdown = "<option selected value=''>Select Country</option>";
        foreach ($countryname as $cont) {
            if ($cont->name == $instaCamp['country']) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $country_dropdown .= "<option value='" . $cont->name . "' " . $selected . ">" . $cont->name . "</option>";
        }

        // State Dropdown
        $countryname = Country::where('name', $instaCamp['country'])->first();
        $statename = State::where(['country_id' => $countryname->id])->get();
        $state_dropdown = "<option selected value=''>Select State</option>";
        foreach ($statename as $stn) {
            if ($stn->name == $instaCamp->state) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $state_dropdown .= "<option value='" . $stn->name . "' " . $selected . ">" . $stn->name . "</option>";
        }

        // City Dropdown
        $statename = State::where('name', $instaCamp['state'])->first();
        $cityname = City::where(['state_id' => $statename->id])->get();
        $city_dropdown = "<option selected value=''>Select City</option>";
        foreach ($cityname as $city) {
            if ($city->name == $instaCamp->city) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $city_dropdown .= "<option value='" . $city->name . "' " . $selected . ">" . $city->name . "</option>";
        }

        $sdgs = SDGs::where('status',1)->get();

        return view('admin.insta_camp.edit', compact('instaCamp', 'sdgs', 'country_dropdown', 'state_dropdown', 'city_dropdown'));
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
        // abort_if(Gate::denies('social_initiative_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestData = $request->all();

        // dd($requestData);

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['service_name']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['city']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['country'])));

        // dd($slug);

        $requestData['slug'] = $slug;

        DB::beginTransaction();

        try {

            $instaCamp = InstaCampaigns::findOrFail($id);
            $instaCamp->update($requestData);

        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        try {

            if ($request->hasFile('file')) {
                $image_array = Input::file('file');
                // if($image_array->isValid()){
                $array_len = count($image_array);
                // dd($array_len);
                for ($i = 0; $i < $array_len; $i++) {
                    // $image_name = $image_array[$i]->getClientOriginalName();
                    $image_size = $image_array[$i]->getClientSize();
                    $extension = $image_array[$i]->getClientOriginalExtension();
                    $filename = 'digital_service_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = public_path('images/initiative/large/' . $filename);
                    // Resize image
                    Image::make($image_array[$i])->save($large_image_path);

                    // dd($product->id);

                    // Store image in property folder
                    InstaCampImages::create([
                        'image_name' => $filename,
                        'image_size' => $image_size,
                        'insta_camp_id' => $id,
                    ]);
                    // }
                }
            } else {
                $filename = "default.png";
                // $property->image = "default.jpg";
                InstaCampImages::create([
                    'image_name' => $filename,
                    'image_size' => '7.4',
                    'insta_camp_id' => $id,
                ]);
            }

        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        $notification = array(
            'message' => 'Service Updated successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/social-impact/digital-service')->with($notification);
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
        // abort_if(Gate::denies('social_initiative_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        InstaCampaigns::destroy($id);

        $notification = array(
            'message' => 'Service deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/social-impact/digital-service')->with($notification);
    }


    // Delete Service Image
    public function deleteDigitalServiceImage($id = null)
    {
        if ($id) {
            InstaCampImages::where('id', $id)->delete();

            $notification = array(
                'message' => 'Image deleted successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    // Enable Social initiative
    public function enableDigitalService($id = null)
    {
        // abort_if(Gate::denies('social_initiative_enable'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (!empty($id)) {
            InstaCampaigns::where('id', $id)->update(['status' => 1]);

            $notification = array(
                'message' => 'Service enabled successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    // Disable Social initiative
    public function disablDigitalService($id = null)
    {
        // abort_if(Gate::denies('social_initiative_disable'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (!empty($id)) {
            InstaCampaigns::where('id', $id)->update(['status' => 0]);

            $notification = array(
                'message' => 'Service disable successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }
}
