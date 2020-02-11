<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\InstaCampaigns;
use App\InstaCampImages;
use App\Proposal;
use App\SDGs;
use App\SocialInitiative;
use App\SocialInitiativeImages;
use App\State;
use App\SuccessStory;
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

        $access_token = '8736863878.1677ed0.4fb5060f1eef440e9fab2cdc4b22c6a1';
        $username = 'lightupwithlit';
        $count = 6;
        $userid = '8736863878';
        $instaImages = rudr_instagram_api_curl_connect('https://api.instagram.com/v1/users/' . $userid . '/media/recent?access_token=' . $access_token . '&count=' . $count);

        $country = Country::get();
        $sdgs = SDGs::where(['status' =>  1])->get();

        $social_initiatives = SocialInitiative::where('status',1)->latest()->limit(3)->get();

        $success_story = SuccessStory::select('success_stories.title','success_stories.short_content','success_stories.feature_image','users.first_name','users.last_name')->where('success_stories.status', 1)
                            ->leftJoin('users', 'users.id','=','success_stories.add_by')
                            ->latest('success_stories.created_at')->limit(2)->get();

        return view('homepage', compact('instaImages','country','sdgs','social_initiatives','success_story'));
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

        $data_count = $data->count();

        // dd($data_count);

        // $data = json_decode(json_encode($data));

        foreach ($data as $key => $val) {
            $socialInitiativeImage_count = SocialInitiativeImages::where('social_initiative_id', $val->id)->count();
            if ($socialInitiativeImage_count > 0) {
                $socialInitiativeImage = SocialInitiativeImages::where('social_initiative_id', $val->id)->first();
                $data[$key]->image = $socialInitiativeImage->image_name;
            }
        }

        // dd($data);

        return view('front.social_initiatives.search_result_initiatives', compact('data','data_count'));

    }

    /**
     * Search function for social intiative
     * and
     * Instagram Campaigns
     */
    public function homeDigitalServiceSearch(Request $request)
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

        $data = DB::table('insta_campaigns');

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

        $data_count = $data->count();

        // dd($data_count);

        // $data = json_decode(json_encode($data));

        foreach ($data as $key => $val) {
            $instaCampImage_count = InstaCampImages::where('insta_camp_id', $val->id)->count();
            if ($instaCampImage_count > 0) {
                $instaCampImage = InstaCampImages::where('insta_camp_id', $val->id)->first();
                $data[$key]->image = $instaCampImage->image_name;
            }
        }

        // dd($data);

        return view('front.social_initiatives.search_result_initiatives', compact('data','data_count'));

    }

    /**
     * Search function for social intiative
     * and
     * Instagram Campaigns
     */
    public function allSearchModule(Request $request)
    {
        $perPage = 24;

        // dd($request->all());

        $sdgs = $request['sdgs'];
        $sdgs2 = $request['sdgs2'];
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

        $data_count = $data->count();

        foreach ($data as $key => $val) {
            $socialInitiativeImage_count = SocialInitiativeImages::where('social_initiative_id', $val->id)->count();
            if ($socialInitiativeImage_count > 0) {
                $socialInitiativeImage = SocialInitiativeImages::where('social_initiative_id', $val->id)->first();
                $data[$key]->image = $socialInitiativeImage->image_name;
            }
        }

        // Digital Marketing Services
        $data2 = DB::table('insta_campaigns');

        if ($sdgs2) {
            $data2 = $data2->where('area_impact_sdg', 'LIKE', "%" . $sdgs2 . "%");
        }
        if ($budget) {
            $data2 = $data2->whereBetween('budget', [$b1, $b2]);
        }
        if ($country) {
            $data2 = $data2->where('country', 'LIKE', "%" . $country . "%");
        }
        if ($state) {
            $data2 = $data2->where('state', 'LIKE', "%" . $state . "%");
        }
        if ($city) {
            $data2 = $data2->where('city', 'LIKE', "%" . $city . "%");
        }

        $data2 = $data2->where('status', 1)->latest()->paginate($perPage);

        $data2_count = $data2->count();

        // dd($data_count);

        // $data = json_decode(json_encode($data));

        foreach ($data2 as $key => $val) {
            $instaCampImage_count = InstaCampImages::where('insta_camp_id', $val->id)->count();
            if ($instaCampImage_count > 0) {
                $instaCampImage = InstaCampImages::where('insta_camp_id', $val->id)->first();
                $data2[$key]->image = $instaCampImage->image_name;
            }
        }

        // dd($data);

        return view('front.social_initiatives.all_search_result', compact('data','data_count','data2','data2_count'));

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

    // Digital Service Deatils Page
    public function detailDigitalService(Request $request, $url = null)
    {

        $data = InstaCampaigns::where('slug', $url)->first();

        $benefit_per_person = $data->budget / $data->beneficiaries;

        // dd($benefit_per_person);

        $siImage_count = InstaCampImages::where('insta_camp_id', $data->id)->count();

        if ($siImage_count > 0) {
            $siImage = InstaCampImages::where('insta_camp_id', $data->id)->first();
        }

        return view('front.social_initiatives.single_initiative', compact('data', 'siImage', 'benefit_per_person'));
    }

    // CSR Market Place List
    public function csrList()
    {
        $perpage = 25;

        $data = Proposal::where('status', 1)->latest()->paginate($perpage);
        // dd($data);

        return view('front.csr.list_csr',compact('data'));
    }

}
