<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\SDGs;
use App\SocialInitiative;
use App\SocialInitiativeImages;
use App\State;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
        function rudr_instagram_api_curl_connect($api_url)
        {
            $connection_c = curl_init(); // initializing
            curl_setopt($connection_c, CURLOPT_URL, $api_url); // API URL to connect
            curl_setopt($connection_c, CURLOPT_RETURNTRANSFER, 1); // return the result, do not print
            curl_setopt($connection_c, CURLOPT_TIMEOUT, 20);
            $json_return = curl_exec($connection_c); // connect and get json data
            curl_close($connection_c); // close connection
            return json_decode($json_return); // decode and return
        }

        $access_token = '1640620387.1677ed0.637cb861b9e7488b8e9fa36785063f06';
        $username = 'ig_m29';
        $count = 6;
        $userid = '1640620387';
        $instaImages = rudr_instagram_api_curl_connect('https://api.instagram.com/v1/users/' . $userid . '/media/recent?access_token=' . $access_token . '&count=' . $count);

        $country = Country::get();
        $sdgs = SDGs::where('status', 1)->get();

        $social_initiatives = SocialInitiative::where('status',1)->latest()->limit(3)->get();

        return view('homepage', compact('instaImages', 'country', 'sdgs','social_initiatives'));
    }

    /**
     * Search function for social intiative
     * and
     * Instagram Campaigns
     */
    public function homeSearch(Request $request)
    {
        $perPage = 24;

        $sdgs = $request['sdgs'];
        $budget = $request['budget'];
        $country = $request['country'];
        $state = $request['state'];
        $city = $request['city'];
        // dd($country);

        if (!empty($budget)) {

            $budget = explode(',', $budget);

            $b1 = (int) $budget[0];
            $b2 = (int) $budget[1];
        } else {
            $b1 = 0;
            $b2 = 10000000000000;
        }

        $data = DB::table('social_initiatives');

        // dd($data);

        if ($sdgs) {
            $data = $data->where('area_impact_sdg', 'LIKE', "%" . $sdgs . "%");
        }
        if ($budget) {
            $data = $data->whereBetween('budget', [$b1, $b2]);
        }
        if ($country) {
            $data = $data->where('country', 'LIKE', "%" . $country . "%");
        }
        if ($state) {
            $data = $data->where('state', 'LIKE', "%" . $state . "%");
        }
        if ($city) {
            $data = $data->where('city', 'LIKE', "%" . $city . "%");
        }

        $data = $data->where('status', 1)->latest()->paginate($perPage);

        // $data = json_decode(json_encode($data));

        foreach ($data as $key => $val) {
            $socialInitiativeImage_count = SocialInitiativeImages::where('social_initiative_id', $val->id)->count();
            if ($socialInitiativeImage_count > 0) {
                $socialInitiativeImage = SocialInitiativeImages::where('social_initiative_id', $val->id)->first();
                $data[$key]->image = $socialInitiativeImage->image_name;
            }
        }

        // dd($data);

        return view('front.social_initiatives.all_initiatives', compact('data'));

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

        $cities = City::where("state_id", $state_id->id)->pluck("name", "name");
        return response()->json($cities);
    }

    // Socail Initiative Deatils Page
    public function detailSocialInitiative(Request $request, $url = null)
    {

        $data = SocialInitiative::where('slug', $url)->first();

        $benefit_per_person = $data->budget / $data->beneficiaries;

        // dd($benefit_per_person);

        $siImage_count = SocialInitiativeImages::where('social_initiative_id', $data->id)->count();

        if ($siImage_count > 0) {
            $siImage = SocialInitiativeImages::where('social_initiative_id', $data->id)->first();
        }

        return view('front.social_initiatives.single_initiative', compact('data', 'siImage', 'benefit_per_person'));
    }

}
