<?php

namespace App\Http\Controllers;

use App\BusinessInfo;
use App\User;
use App\City;
use App\Country;
use App\SDGs;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Image;

class BusinessInfoController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'business_name' => ['required', 'string', 'max:255'],
            'priority_sdg' => ['required', 'string', 'max:255'],
            'contact_person_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
        ]);
    }

    // Add Business Info
    public function addBusinessInfo(Request $request)
    {
        $sdg = SDGs::where('status', 1)->get();

        $country = Country::get();

        if ($request->isMethod('post')) {
            $requestData = $request->all();

            $sdgs = $requestData['priority_sdg'];
            $sdgs = implode(', ',$sdgs);

            $requestData['priority_sdg'] = $sdgs;

            // Trade Licence Image
            if ($request->hasFile('trade_license_image')) {
                $image_array = Input::file('trade_license_image');
                $image_name = $image_array->getClientOriginalName();
                $image_size = $image_array->getClientSize();
                $extension = $image_array->getClientOriginalExtension();
                $filename = 'tradeLicense' . rand(0, 9999999) . '.' . $extension;
                $large_image_path = public_path('/images/tradeLicense/large/' . $filename);
                // Storing image in folder
                Image::make($image_array)->save($large_image_path);

                $requestData['trade_license_image'] = $filename;
            }

            $user_id = Auth::user()->id;

            $requestData['user_id'] = $user_id;

            // dd($requestData);

            BusinessInfo::create($requestData);

            $notification = array(
                'message' => 'Business Profile updated successfully!',
                'alert-type' => 'success',
            );

            return redirect('admin/profile')->with($notification);
        }

        return view('admin.profile.add_business', compact('sdg', 'country'));
    }

    /**
     * Update User business information
     */
    public function updateBusinessInfo(Request $request, $id=null)
    {

        $sdg = SDGs::where('status', 1)->get();

        // $country = Country::get();

        $user_id = Auth::user()->id;

        $businessData = BusinessInfo::where('id', $id)->first();

        $getSdg = $businessData->priority_sdg;

        $businessData->priority_sdg = explode(', ', $getSdg);

        // dd($businessData);

        if ($request->isMethod('post')) {
            $requestData = $request->except('_token');

            $sdgs = $requestData['priority_sdg'];
            $sdgs = implode(', ',$sdgs);

            $requestData['priority_sdg'] = $sdgs;

            // dd($requestData);

            // Trade Licence Image
            if ($request->hasFile('trade_license_image')) {
                $image_array = Input::file('trade_license_image');
                $image_name = $image_array->getClientOriginalName();
                $image_size = $image_array->getClientSize();
                $extension = $image_array->getClientOriginalExtension();
                $filename = 'tradeLicense' . rand(0, 9999999) . '.' . $extension;
                $large_image_path = public_path('/images/tradeLicense/large/' . $filename);
                // Storing image in folder
                Image::make($image_array)->save($large_image_path);

                $requestData['trade_license_image'] = $filename;
            }

            // dd($requestData);

            BusinessInfo::where('id', $id)->update($requestData);

            // Sending mail to user regarding business profile update
            $email = Auth::user()->email;

            $messageData = ['email' => $email, 'name' => Auth::user()->first_name];
            Mail::send('emails.user_business_profile_update', $messageData, function ($message) use ($email) {
                $message->to($email)->subject('Businees Profile Updated!');
            });

            $notification = array(
                'message' => 'Business Profile updated successfully!',
                'alert-type' => 'success',
            );

            return redirect('admin/profile/company')->with($notification);
        }

        // Country Dropdown
        $countryname = Country::get();
        $country_dropdown = "<option selected value=''>Select Country</option>";
        foreach ($countryname as $cont) {
            if ($cont->name == $businessData['country']) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $country_dropdown .= "<option value='" . $cont->name . "' " . $selected . ">" . $cont->name . "</option>";
        }

        // State Dropdown
        $countryname = Country::where('name', $businessData['country'])->first();
        $statename = State::where(['country_id' => $countryname->id])->get();
        $state_dropdown = "<option selected value=''>Select State</option>";
        foreach ($statename as $stn) {
            if ($stn->name == $businessData['state']) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $state_dropdown .= "<option value='" . $stn->name . "' " . $selected . ">" . $stn->name . "</option>";
        }

        // City Dropdown
        $statename = State::where('name', $businessData['state'])->first();
        $cityname = City::where(['state_id' => $statename->id])->get();
        $city_dropdown = "<option selected value=''>Select City</option>";
        foreach ($cityname as $city) {
            if ($city->name == $businessData['city']) {
                $selected = "selected";
            } else {
                $selected = "";
            }
            $city_dropdown .= "<option value='" . $city->name . "' " . $selected . ">" . $city->name . "</option>";
        }

        return view('admin.profile.update_business', compact('sdg', 'businessData', 'country_dropdown', 'state_dropdown', 'city_dropdown'));
    }

    // Company profile information
    public function companyProfile()
    {
        $id = Auth::user()->id;

        $user = User::findOrFail($id);

        $business = BusinessInfo::where('user_id',$id)->first();

        return view('admin.profile.company', compact('user','business'));
    }
}
