<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    // List All Stories on website
    public function listStories()
    {
        return view('front.success-story.all_story');
    }
}
