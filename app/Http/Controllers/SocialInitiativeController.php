<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\SocialInitiative;
use App\SocialInitiativeImages;
use App\State;
use App\User;
use DB;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Image;
use Symfony\Component\HttpFoundation\Response;

class SocialInitiativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('social_initiative_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword = $request->get('search');
        $perPage = 25;

        $userData = Auth::user();

        $userRole = $userData->roles->pluck('name')->toArray();

        // dd($userData->id);

        if ($userRole[0] == "Super Admin") {
            if (!empty($keyword)) {
                $socialInitiative = SocialInitiative::where('initiative_name', 'LIKE', "%$keyword%")
                    ->orWhere('initiative_description', 'LIKE', "%$keyword%")
                    ->orWhere('beneficiaries', 'LIKE', "%$keyword%")
                    ->orWhere('duration', 'LIKE', "%$keyword%")
                    ->orWhere('budget', 'LIKE', "%$keyword%")
                    ->orWhere('region', 'LIKE', "%$keyword%")
                    ->orWhere('country', 'LIKE', "%$keyword%")
                    ->orWhere('state', 'LIKE', "%$keyword%")
                    ->orWhere('city', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $socialInitiative = SocialInitiative::latest()->paginate($perPage);
            }
        } else {
            if (!empty($keyword)) {
                $socialInitiative = SocialInitiative::where('user_id',$userData->id)
                    ->orWhere('initiative_name', 'LIKE', "%$keyword%")
                    ->orWhere('initiative_description', 'LIKE', "%$keyword%")
                    ->orWhere('beneficiaries', 'LIKE', "%$keyword%")
                    ->orWhere('duration', 'LIKE', "%$keyword%")
                    ->orWhere('budget', 'LIKE', "%$keyword%")
                    ->orWhere('region', 'LIKE', "%$keyword%")
                    ->orWhere('country', 'LIKE', "%$keyword%")
                    ->orWhere('state', 'LIKE', "%$keyword%")
                    ->orWhere('city', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
                // dd($socialInitiative);
            } else {
                $socialInitiative = SocialInitiative::where('user_id',$userData->id)->latest()->paginate($perPage);
            }
        }

        // $socialInitiative = json_decode(json_encode($socialInitiative));
        // echo "<pre>"; print_r($socialInitiative); die;

        foreach ($socialInitiative as $key => $val) {
            $initiativeImages = SocialInitiativeImages::where('social_initiative_id', $val->id)->first();
            $socialInitiative[$key]->feature_image = $initiativeImages['image_name'];

            // dd($initiativeImages);
        }

        return view('admin.social_initiative.index', compact('socialInitiative'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('social_initiative_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country = Country::orderBy('name', 'asc')->get();

        return view('admin.social_initiative.create', compact('country'));
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
        abort_if(Gate::denies('social_initiative_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestData = $request->all();

        $user_id = Auth::user()->id;

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['initiative_name']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['city']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['country'])));

        // dd($slug);

        $requestData['slug'] = $slug;
        $requestData['user_id'] = $user_id;

        DB::beginTransaction();

        try {

            $socialInitiative = SocialInitiative::create($requestData);

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
                    $filename = 'lit_initiative_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = public_path('images/initiative/large/' . $filename);
                    // Resize image
                    Image::make($image_array[$i])->save($large_image_path);

                    // dd($product->id);

                    // Store image in property folder
                    SocialInitiativeImages::create([
                        'image_name' => $filename,
                        'image_size' => $image_size,
                        'social_initiative_id' => $socialInitiative->id,
                    ]);
                    // }
                }
            } else {
                $filename = "default.png";
                // $property->image = "default.jpg";
                SocialInitiativeImages::create([
                    'image_name' => $filename,
                    'image_size' => '7.4',
                    'social_initiative_id' => $socialInitiative->id,
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
            'message' => 'Initiative added successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/social-impact/initiatives')->with($notification);
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
        $socialInitiative = SocialInitiative::findOrFail($id);

        $userData = User::findOrFail($socialInitiative['user_id']);

        $userRole = $userData->roles->pluck('name')->toArray();

        // dd($userData);

        return view('admin.social_initiative.show', compact('socialInitiative', 'userData', 'userRole'));
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
        abort_if(Gate::denies('social_initiative_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialInitiative = SocialInitiative::findOrFail($id);

        // Country Dropdown
        $countryname = Country::get();
        $country_dropdown = "<option selected value=''>Select Country</option>";
        foreach ($countryname as $cont) {
            if ($cont->name == $socialInitiative['country']) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $country_dropdown .= "<option value='" . $cont->name . "' " . $selected . ">" . $cont->name . "</option>";
        }

        // State Dropdown
        $countryname = Country::where('name', $socialInitiative['country'])->first();
        $statename = State::where(['country_id' => $countryname->id])->get();
        $state_dropdown = "<option selected value=''>Select State</option>";
        foreach ($statename as $stn) {
            if ($stn->name == $socialInitiative->state) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $state_dropdown .= "<option value='" . $stn->name . "' " . $selected . ">" . $stn->name . "</option>";
        }

        // City Dropdown
        $statename = State::where('name', $socialInitiative['state'])->first();
        $cityname = City::where(['state_id' => $statename->id])->get();
        $city_dropdown = "<option selected value=''>Select City</option>";
        foreach ($cityname as $city) {
            if ($city->name == $socialInitiative->city) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $city_dropdown .= "<option value='" . $city->name . "' " . $selected . ">" . $city->name . "</option>";
        }

        return view('admin.social_initiative.edit', compact('socialInitiative', 'country_dropdown', 'state_dropdown', 'city_dropdown'));
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
        abort_if(Gate::denies('social_initiative_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestData = $request->all();

        // dd($requestData);

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['initiative_name']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['city']))) . '-' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $requestData['country'])));

        // dd($slug);

        $requestData['slug'] = $slug;

        DB::beginTransaction();

        try {

            $socialInitiative = SocialInitiative::findOrFail($id);
            $socialInitiative->update($requestData);

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
                    $filename = 'lit_initiative_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = public_path('images/initiative/large/' . $filename);
                    // Resize image
                    Image::make($image_array[$i])->save($large_image_path);

                    // dd($product->id);

                    // Store image in property folder
                    SocialInitiativeImages::create([
                        'image_name' => $filename,
                        'image_size' => $image_size,
                        'social_initiative_id' => $id,
                    ]);
                    // }
                }
            } else {
                $filename = "default.png";
                // $property->image = "default.jpg";
                SocialInitiativeImages::create([
                    'image_name' => $filename,
                    'image_size' => '7.4',
                    'social_initiative_id' => $id,
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
            'message' => 'Initiative Updated successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/social-impact/initiatives')->with($notification);
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
        abort_if(Gate::denies('social_initiative_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        SocialInitiative::destroy($id);

        $notification = array(
            'message' => 'Initiative deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/social-impact/initiatives')->with($notification);
    }

    // Delete Initiative Image
    public function deleteInitiativeImage($id = null)
    {
        if ($id) {
            SocialInitiativeImages::where('id', $id)->delete();

            $notification = array(
                'message' => 'Image deleted successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    // Enable Social initiative
    public function enableInitiative($id = null)
    {
        abort_if(Gate::denies('social_initiative_enable'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (!empty($id)) {
            SocialInitiative::where('id', $id)->update(['status' => 1]);

            $notification = array(
                'message' => 'Initiative enabled successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    // Disable Social initiative
    public function disableInitiative($id = null)
    {
        abort_if(Gate::denies('social_initiative_disable'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (!empty($id)) {
            SocialInitiative::where('id', $id)->update(['status' => 0]);

            $notification = array(
                'message' => 'Initiative disable successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }
}
