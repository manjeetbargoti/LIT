<?php

namespace App\Http\Controllers;

use Gate;
use Image;
use App\SuccessStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
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

        if ($request->hasFile('feature_image')) {
            $image_array = Input::file('feature_image');
            $image_name = $image_array->getClientOriginalName();
            $image_size = $image_array->getClientSize();
            $extension = $image_array->getClientOriginalExtension();
            $filename = 'successStory' . rand(0, 9999999) . '.' . $extension;
            $large_image_path = public_path('/images/successStory/large/' . $filename);
            // Storing image in folder
            Image::make($image_array)->save($large_image_path);

            $requestData['feature_image'] = $filename;
        }

        $user_id = Auth::user()->id;

        $requestData['add_by'] = $user_id;

        // dd($requestData);
        
        SuccessStory::create($requestData);

        $notification = array(
            'message' => 'Story added successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/success-stories')->with($notification);
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
        $successStory = SuccessStory::findOrFail($id);

        return view('admin.success-story.show', compact('successStory'));
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
        // abort_if(Gate::denies('success_story_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $successStory = SuccessStory::findOrFail($id);

        return view('admin.success-story.edit', compact('successStory'));
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
        // abort_if(Gate::denies('success_story_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        if ($request->hasFile('feature_image')) {
            $image_array = Input::file('feature_image');
            $image_name = $image_array->getClientOriginalName();
            $image_size = $image_array->getClientSize();
            $extension = $image_array->getClientOriginalExtension();
            $filename = 'successStory' . rand(0, 9999999) . '.' . $extension;
            $large_image_path = public_path('/images/successStory/large/' . $filename);
            // Storing image in folder
            Image::make($image_array)->save($large_image_path);

            $requestData['feature_image'] = $filename;
        }

        $requestData = $request->all();

        // dd($requestData);
        
        $page = SuccessStory::findOrFail($id);
        $page->update($requestData);

        $notification = array(
            'message' => 'Story updated successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/success-stories')->with($notification);
    }

    // Enable Success Story
    public function enableStory($id=null)
    {
        if($id)
        {
            SuccessStory::where('id', $id)->update(['status' => 1]);

            $notification = array(
                'message' => 'Story enable successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    // Disable Success Story
    public function disableStory($id=null)
    {
        if($id)
        {
            SuccessStory::where('id', $id)->update(['status' => 0]);

            $notification = array(
                'message' => 'Story disable successfully!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }
    }

    // List All Stories on website
    public function listStories()
    {
        $data = SuccessStory::where('status', 1)->get();

        return view('front.success-story.all_story', compact('data'));
    }
}
