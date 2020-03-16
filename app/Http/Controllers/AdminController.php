<?php

namespace App\Http\Controllers;

use App\User;
use App\City;
use App\State;
use App\Country;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function dashboard($guard = null)
    {
        $usercount = User::count();

        return view('admin.dashboard', compact('usercount'));
    }

    // Check User Email
    public function checkEmail(Request $request)
    {
        if ($request->get('email')) {
            $email = $request->get('email');
            $data = User::where('email', $email)->count();
            if ($data > 0) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }

    // Check Username
    public function checkUsername(Request $request)
    {
        if ($request->get('username')) {
            $username = $request->get('username');
            $data = User::where('username', $username)->count();
            if ($data > 0) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }

    // Getting State List according to Country
    public function getStateList(Request $request)
    {
        $country_id = Country::where('name', $request->country_name)->first();

        // dd($country_id);

        $states = State::where("country_id", $country_id->id)->pluck("name", "name");
        return response()->json($states);
    }

    // Getting City List according to State
    public function getCityList(Request $request)
    {
        $state_id = State::where('name', $request->state_name)->first();

        // dd($state_id);

        $cities = City::where("state_id", $state_id->id)->orderBy('name','asc')->pluck("name", "name");
        // dd($cities);
        return response()->json($cities);
    }

    // Getting City List according to Country
    public function getCountryCityList(Request $request)
    {
        $country_id = Country::where('name', $request->country_name)->first();

        // dd($country_id);

        $cities = City::where("country_id", $country_id->id)->orderBy('name','asc')->pluck("name", "name");
        return response()->json($cities);
    }
}
