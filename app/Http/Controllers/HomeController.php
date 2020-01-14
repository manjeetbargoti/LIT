<?php

namespace App\Http\Controllers;

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

        return view('homepage', compact('instaImages'));
    }

}
