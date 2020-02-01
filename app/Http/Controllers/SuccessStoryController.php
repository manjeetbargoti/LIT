<?php

namespace App\Http\Controllers;

use Gate;
use App\SuccessStory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuccessStoryController extends Controller
{

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('success_story_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $successStory = SuccessStory::where('title', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $successStory = SuccessStory::latest()->paginate($perPage);
        }

        return view('admin.success-story.index', compact('successStory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // abort_if(Gate::denies('success_story_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.success-story.create');
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
        // abort_if(Gate::denies('success_story_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $requestData = $request->all();

        dd($requestData);
        
        SuccessStory::create($requestData);

        $notification = array(
            'message' => 'Story added successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/success-stories')->with($notification);
    }

    // List All Stories on website
    public function listStories()
    {
        return view('front.success-story.all_story');
    }
}
