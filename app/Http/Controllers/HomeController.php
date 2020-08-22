<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\InstaCampaigns;
use App\InstaCampImages;
use App\MultiBudget;
use App\SDGs;
use App\SocialInitiative;
use App\SocialInitiativeImages;
use App\State;
use App\SuccessStory;
use DB;
use App\Banner;
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

        // dd($instaImages);

        $country = Country::get();
        $sdgs = SDGs::where(['status' => 1])->get();

        $social_initiatives = SocialInitiative::where(['status' => 1, 'featured'=>1])->latest()->limit(5)->get();

        foreach ($social_initiatives as $key => $val) {
            
            $maxBudget = MultiBudget::where('social_init_id', $val->id)->orderBy('budget','asc')->pluck('budget');
            $minBudget = MultiBudget::where('social_init_id', $val->id)->orderBy('budget','desc')->pluck('budget');
            $social_initiatives[$key]->max_budget = $maxBudget[0];
            $social_initiatives[$key]->min_budget = $minBudget[0];

            $multibudget = MultiBudget::where('social_init_id', $val->id)->first();
            $social_initiatives[$key]->budget = $multibudget->budget;
            $social_initiatives[$key]->duration = $multibudget->duration;
            $social_initiatives[$key]->time_period = $multibudget->time_period;
            $social_initiatives[$key]->start_date = $multibudget->start_date;
            $social_initiatives[$key]->end_date = $multibudget->end_date;
            $social_initiatives[$key]->outreach = $multibudget->outreach;
            $social_initiatives[$key]->beneficiaries = $multibudget->beneficiaries;
            // dd($social_initiatives);
        }

        $banners = Banner::where(['status' => 1])->get();

        $success_story = SuccessStory::select('success_stories.title', 'success_stories.short_content', 'success_stories.feature_image', 'users.first_name', 'users.last_name')->where('success_stories.status', 1)
            ->leftJoin('users', 'users.id', '=', 'success_stories.add_by')
            ->latest('success_stories.created_at')->limit(2)->get();

        return view('homepage', compact('instaImages', 'country', 'sdgs', 'social_initiatives', 'success_story','banners'));
    }

    /**
     * Search function for social intiative
     * and
     * Instagram Campaigns
     */
    public function homeSearch(Request $request)
    {
        $perPage = 24;

        $data = $request->all();

        $sdgs = $request['sdgs'];
        $budget = $request['budget'];
        $country = $request['country'];
        $state = $request['state'];
        $city = $request['city'];

        // $sdgs = implode(',', $sdgs);

        // dd($sdgs);

        if (!empty($budget) && $budget != "in-kind") {

            $budget = explode(',', $budget);

            $b1 = (int) $budget[0];
            $b2 = (int) $budget[1];

            $data = DB::table('social_initiatives');

            $mbData = DB::table('multi_budgets')->whereBetween('budget', [$b1, $b2])->pluck('social_init_id');

            $mbData = json_decode($mbData);
            $mbData = array_unique($mbData);

            $mbData = array_filter($mbData);

            // $mbData = implode(',', $mbData);

            // $mbData = (int) $mbData;

            // dd($mbData);
            $newData = DB::table('social_initiatives');

            if ($sdgs) {
                $i = 0;
                foreach ($sdgs as $s) {
                    if (!empty($s)) {
                        $sdg = SocialInitiative::where('area_impact_sdg', 'LIKE', "%" . $s . "%")->pluck('id');
                        $sdgid[$i] = $sdg;
                        $i++;
                    }
                }
                $sdids = implode(',', $sdgid);
                $sdids = preg_replace('/[^a-zA-Z0-9,\{}:]/', '', $sdids);
                $sdids = explode(',', $sdids);
                $sdids = array_unique($sdids);
                $sdids = array_filter($sdids);

                $newData = $newData->WhereIn('id', $sdids);
            }

            // if ($sdgs) {
            //     $data = $data->whereIn('area_impact_sdg', $sdgs);
            // }
            if ($budget) {
                // $data = $data->whereBetween('budget', [$b1, $b2]);
                $newData = $newData->whereIn('id', $mbData)->orWhere('in_partnership', 1);
            }
            if ($country) {
                $newData = $newData->where('country', 'LIKE', "%" . $country . "%");
            }
            if ($state) {
                $newData = $newData->where('state', 'LIKE', "%" . $state . "%");
            }
            if ($city) {
                $newData = $newData->where('city', 'LIKE', "%" . $city . "%");
            }

            $data = $newData->where(['status' => 1])->latest()->paginate($perPage);

            $data_count = $data->count();

        } elseif ($budget == "in-kind") {
            // echo "test";

            // $data = DB::table('social_initiatives');

            $newData = DB::table('social_initiatives');

            if ($sdgs) {
                $i = 0;
                foreach ($sdgs as $s) {
                    if (!empty($s)) {
                        $sdg = SocialInitiative::where('area_impact_sdg', 'LIKE', "%" . $s . "%")->pluck('id');
                        $sdgid[$i] = $sdg;
                        $i++;
                    }
                }
                $sdids = implode(',', $sdgid);
                $sdids = preg_replace('/[^a-zA-Z0-9,\{}:]/', '', $sdids);
                $sdids = explode(',', $sdids);
                $sdids = array_unique($sdids);
                $sdids = array_filter($sdids);
                $k = 0;
                foreach ($sdids as $sd) {
                    if (!empty($sd)) {
                        $sdd = $sd;
                        $sdd = json_decode($sd);
                        $sdl[$k] = $sdd;
                        $k++;
                    }
                }
                // dd($sdl);

                // $newData = DB::table('social_initiatives');

                $newData = $newData->WhereIn('id', $sdids);
            }

            // dd($data);

            // if ($sdgs) {
            //     $data = $data->whereIn('area_impact_sdg', $sdgs);
            // }
            if ($country) {
                $newData = $newData->where('country', 'LIKE', "%" . $country . "%");
            }
            if ($state) {
                $newData = $newData->where('state', 'LIKE', "%" . $state . "%");
            }
            if ($city) {
                $newData = $newData->where('city', 'LIKE', "%" . $city . "%");
            }

            $data = $newData->where(['status' => 1, 'in_partnership' => 1])->latest()->paginate($perPage);

            $data_count = $data->count();
        } else {
            $b1 = 0;
            $b2 = 10000000000000;

            $data = DB::table('social_initiatives');

            // $sdgData = explode(', ', $data);

            $mbData = DB::table('multi_budgets')->whereBetween('budget', [$b1, $b2])->pluck('social_init_id');

            $mbData = json_decode($mbData);
            $mbData = array_unique($mbData);

            $mbData = array_filter($mbData);

            // $mbData = implode(',', $mbData);

            // $sdgs = json_encode($sdgs);
            // dd($mbData);

            $newData = DB::table('social_initiatives');

            if ($sdgs) {
                
                // dd($sdgs);

                $i = 0;
                foreach ($sdgs as $s) {
                    if (!empty($s)) {
                        $sdg = SocialInitiative::where('area_impact_sdg', 'LIKE', "%" . $s . "%")->pluck('id');
                        $sdgid[$i] = $sdg;
                        $i++;
                    }
                    // echo "<pre>";print_r($sdgid);
                }
                // die;

                $sdids = implode(',', $sdgid);
                $sdids = preg_replace('/[^a-zA-Z0-9,\{}:]/', '', $sdids);
                $sdids = explode(',', $sdids);
                $sdids = array_unique($sdids);
                $sdids = array_filter($sdids);
                // dd($sdids);

                $newData = $newData->WhereIn('id', $sdids);
                // dd($newData);
            }
            if ($budget) {
                $newData = $newData->whereIn('id', $mbData)->orWhere('in_partnership', 1);
            }
            if ($country) {
                $newData = $newData->where('country', 'LIKE', "%" . $country . "%");
            }   
            if ($state) {
                $newData = $newData->where('state', 'LIKE', "%" . $state . "%");
            }
            if ($city) {
                $newData = $newData->where('city', 'LIKE', "%" . $city . "%");
            }

            $data = $newData->where(['status' => 1])->latest()->paginate($perPage);

            $data_count = $data->count();
        }

        // dd($data_count);

        // $data = json_decode(json_encode($data));

        foreach ($data as $key => $val) {
            $socialInitiativeImage_count = SocialInitiativeImages::where('social_initiative_id', $val->id)->count();
            if ($socialInitiativeImage_count > 0) {
                $socialInitiativeImage = SocialInitiativeImages::where('social_initiative_id', $val->id)->first();
                $data[$key]->image = $socialInitiativeImage->image_name;
            }

            $maxBudget = MultiBudget::where('social_init_id', $val->id)->orderBy('budget','asc')->pluck('budget');
            $minBudget = MultiBudget::where('social_init_id', $val->id)->orderBy('budget','desc')->pluck('budget');
            $data[$key]->max_budget = $maxBudget[0];
            $data[$key]->min_budget = $minBudget[0];

            $multibudget = MultiBudget::where('social_init_id', $val->id)->first();
            $data[$key]->budget = $multibudget->budget;
            $data[$key]->duration = $multibudget->duration;
            $data[$key]->time_period = $multibudget->time_period;
            $data[$key]->start_date = $multibudget->start_date;
            $data[$key]->end_date = $multibudget->end_date;
            $data[$key]->outreach = $multibudget->outreach;
            $data[$key]->beneficiaries = $multibudget->beneficiaries;
        }

        // dd($data);

        $countryList = Country::get();
        $allSDG = SDGs::where(['status' => 1])->get();

        return view('front.social_initiatives.search_result_initiatives', compact('data', 'data_count', 'allSDG', 'countryList', 'sdgs', 'country', 'budget', 'sdgs'));

    }

    /**
     * Search function for social intiative
     * and
     * Instagram Campaigns
     */
    public function homeDigitalServiceSearch(Request $request)
    {
        $perPage = 24;

        $data = $request->all();

        $sdgs = $request['sdgs'];
        $budget = $request['budget'];
        $country = $request['country'];
        $state = $request['state'];
        $city = $request['city'];
        // dd($data);

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
            $data = $data->whereIn('area_impact_sdg', $sdgs);
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

            $multibudget = MultiBudget::where('insta_camp_id', $val->id)->first();
            $data[$key]->budget = $multibudget->budget;
            $data[$key]->duration = $multibudget->duration;
            $data[$key]->time_period = $multibudget->time_period;
            $data[$key]->start_date = $multibudget->start_date;
            $data[$key]->end_date = $multibudget->end_date;
            $data[$key]->outreach = $multibudget->outreach;
            $data[$key]->beneficiaries = $multibudget->beneficiaries;
        }

        // dd($data);

        return view('front.social_initiatives.search_result_initiatives', compact('data', 'data_count'));

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
            $data = $data->whereIn('area_impact_sdg', $sdgs);
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

            $multibudget = MultiBudget::where('social_init_id', $val->id)->first();
            $data[$key]->budget = $multibudget->budget;
            $data[$key]->duration = $multibudget->duration;
            $data[$key]->time_period = $multibudget->time_period;
            $data[$key]->start_date = $multibudget->start_date;
            $data[$key]->end_date = $multibudget->end_date;
            $data[$key]->outreach = $multibudget->outreach;
            $data[$key]->beneficiaries = $multibudget->beneficiaries;
        }

        // Digital Marketing Services
        $data2 = DB::table('insta_campaigns');

        if ($sdgs2) {
            $data2 = $data2->whereIn('area_impact_sdg', 'LIKE', "%" . $sdgs2 . "%");
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

            $multibudget = MultiBudget::where('insta_camp_id', $val->id)->first();
            $data2[$key]->budget = $multibudget->budget;
            $data2[$key]->duration = $multibudget->duration;
            $data2[$key]->time_period = $multibudget->time_period;
            $data2[$key]->start_date = $multibudget->start_date;
            $data2[$key]->end_date = $multibudget->end_date;
            $data2[$key]->outreach = $multibudget->outreach;
            $data2[$key]->beneficiaries = $multibudget->beneficiaries;
        }

        // dd($data);

        return view('front.social_initiatives.all_search_result', compact('data', 'data_count', 'data2', 'data2_count'));

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

        $data2 = MultiBudget::where('social_init_id', $data->id)->get();

        $getFirstBudget = MultiBudget::where('social_init_id', $data->id)->first();

        // $getBudgets = MultiBudget::where('social_init_id', $data->id)->get();

        // dd($getBudgets);

        $data->budget_id = $getFirstBudget['id'];

        if (!empty($data['beneficiaries'])) {
            $data->beneficiaries = $data['beneficiaries'];
        } else {
            $data->beneficiaries = $getFirstBudget['beneficiaries'];
        }
        if (!empty($data['duration'])) {
            $data->duration = $data['duration'];
        } else {
            $data->duration = $getFirstBudget['duration'];
        }

        if (!empty($data['time_period'])) {
            $data->time_period = $data['time_period'];
        } else {
            $data->time_period = $getFirstBudget['time_period'];
        }
        if (!empty($data['outreach'])) {
            $data->outreach = $data['outreach'];
        } else {
            $data->outreach = $getFirstBudget['outreach'];
        }

        if (!empty($data['budget'])) {
            $data->outreach = $data['budget'];
        }

        // $data->beneficiaries = $getFirstBudget['beneficiaries'];

        // dd($data);

        // $budget_new = preg_replace('/[ ,]+/', '', $data->budget);

        // $benefit_per_person = $budget_new / $data->beneficiaries;

        // dd($benefit_per_person);

        $siImage_count = SocialInitiativeImages::where('social_initiative_id', $data->id)->count();

        if ($siImage_count > 0) {
            $siImage = SocialInitiativeImages::where('social_initiative_id', $data->id)->first();
        }

        return view('front.social_initiatives.single_initiative', compact('data', 'data2', 'siImage', 'getFirstBudget'));
    }

    // Learn More Social Initiative
    public function learnSocialInitiative(Request $request, $url = null)
    {

        $data = SocialInitiative::where('slug', $url)->first();

        $data2 = MultiBudget::where('social_init_id', $data->id)->get();

        $getFirstBudget = MultiBudget::where('social_init_id', $data->id)->first();

        $data->budget_id = $getFirstBudget['id'];

        // dd($data);

        if (!empty($data['beneficiaries'])) {
            $data->beneficiaries = $data['beneficiaries'];
        } else {
            $data->beneficiaries = $getFirstBudget['beneficiaries'];
        }
        if (!empty($data['duration'])) {
            $data->duration = $data['duration'];
        } else {
            $data->duration = $getFirstBudget['duration'];
        }

        if (!empty($data['time_period'])) {
            $data->time_period = $data['time_period'];
        } else {
            $data->time_period = $getFirstBudget['time_period'];
        }
        if (!empty($data['outreach'])) {
            $data->outreach = $data['outreach'];
        } else {
            $data->outreach = $getFirstBudget['outreach'];
        }

        if (!empty($data['budget'])) {
            $data->outreach = $data['budget'];
        }

        $siImage_count = SocialInitiativeImages::where('social_initiative_id', $data->id)->count();

        if ($siImage_count > 0) {
            $siImage = SocialInitiativeImages::where('social_initiative_id', $data->id)->first();
        }

        return view('front.social_initiatives.detail_page', compact('data', 'data2', 'siImage', 'getFirstBudget'));
    }

    // Digital Service Deatils Page
    public function detailDigitalService(Request $request, $url = null)
    {

        $data = InstaCampaigns::where('slug', $url)->first();

        $data2 = MultiBudget::where('insta_camp_id', $data->id)->get();

        $getFirstBudget = MultiBudget::where('insta_camp_id', $data->id)->first();

        $data->budget_id = $getFirstBudget['id'];
        $data->beneficiaries = $getFirstBudget['beneficiaries'];
        $data->duration = $getFirstBudget['duration'];
        $data->time_period = $getFirstBudget['time_period'];
        $data->outreach = $getFirstBudget['outreach'];
        $data->budget = $getFirstBudget['budget'];

        // dd($benefit_per_person);

        $siImage_count = InstaCampImages::where('insta_camp_id', $data->id)->count();

        if ($siImage_count > 0) {
            $siImage = InstaCampImages::where('insta_camp_id', $data->id)->first();
        }

        return view('front.social_initiatives.single_initiative', compact('data', 'siImage', 'getFirstBudget', 'data2'));
    }

    // Learn More Digital Service
    public function learnDigitalService(Request $request, $url = null)
    {

        $data = InstaCampaigns::where('slug', $url)->first();

        $data2 = MultiBudget::where('insta_camp_id', $data->id)->get();

        $getFirstBudget = MultiBudget::where('insta_camp_id', $data->id)->first();

        $data->budget_id = $getFirstBudget['id'];
        $data->beneficiaries = $getFirstBudget['beneficiaries'];
        $data->duration = $getFirstBudget['duration'];
        $data->time_period = $getFirstBudget['time_period'];
        $data->outreach = $getFirstBudget['outreach'];
        $data->budget = $getFirstBudget['budget'];

        // dd($benefit_per_person);

        $siImage_count = InstaCampImages::where('insta_camp_id', $data->id)->count();

        if ($siImage_count > 0) {
            $siImage = InstaCampImages::where('insta_camp_id', $data->id)->first();
        }

        return view('front.social_initiatives.detail_page', compact('data', 'siImage', 'getFirstBudget', 'data2'));
    }

    // Get Budget Data
    public function getBudgetData(Request $request)
    {
        $data = $request->all();

        $budgetData = MultiBudget::where('id', $data['budgetID'])->first();

        return $budgetData;
    }

}
