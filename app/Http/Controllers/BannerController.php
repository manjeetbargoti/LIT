<?php

namespace App\Http\Controllers;

use Image;
use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BannerController extends Controller
{
    // Add Banner
    public function addBanner(Request $request)
    {
        if ($request->isMethod('post')) {

            
            $data = $request->all();
            // Upload Category image/icon
            if ($request->hasFile('banner_image')) {
                $image_tmp = Input::file('banner_image');
                if ($image_tmp->isValid()) {

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'lit_banner_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = 'images/banners/' . $filename;
                    // Resize image
                    Image::make($image_tmp)->resize(1600, 745)->save($large_image_path);
                }
            }

            Banner::create([
                'image'             => $filename,
                'title'             => $data['title'],
                'small_text'       => $data['small_text']
            ]);

            $notification = array(
                'message' => 'Banner Added Successfully!',
                'alert-type' => 'success',
            );

            return redirect('/admin/banner')->with($notification);
        }
        return view('admin.settings.banners.add_banner');
    }

    // Get all banners list
    public function banners()
    {
        $banners = Banner::orderBy('created_at','desc')->get();
        return view('admin.settings.banners.banners', compact('banners'));
    }

    // Enable Banner
    public function enableBanner($id = null)
    {
        if (!empty($id)) {
            Banner::where('id', $id)->update(['status' => '1']);
            return redirect()->back()->with('flash_message_success', 'Banner Enabled Successfully!');
        }
    }

    // Disable Banner
    public function disableBanner($id = null)
    {
        if (!empty($id)) {
            Banner::where('id', $id)->update(['status' => '0']);
            return redirect()->back()->with('flash_message_success', 'Banner Disabled Successfully!');
        }
    }

    // Edit Banner
    public function editBanner(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
          
            
            if ($request->hasFile('banner_image')) {
                $image_tmp = Input::file('banner_image');
                if ($image_tmp->isValid()) {

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = 'lit_banner_' . rand(1, 99999) . '.' . $extension;
                    $large_image_path = 'images/banners/' . $filename;
                    // Resize image
                    Image::make($image_tmp)->resize(1600, 745)->save($large_image_path);
                }
            } else {
                $filename = $data['current_image'];
            }

            $notification = array(
                'message' => 'Banner Added Successfully!',
                'alert-type' => 'success',
            );

            Banner::where('id', $id)->update(['image' => $filename, 'title' => $data['title'], 'small_text' => $data['small_text']]);
            return redirect('/admin/banner')->with($notification);
        }

        $banners = Banner::where('id', $id)->first();
        $banners = json_decode(json_encode($banners));

        // echo "<pre>"; print_r($banners); die;

        return view('admin.settings.banners.edit_banners', compact('banners'));
    }


    // Delete Banner
    public function deleteBanner($id = null)
    {
        if (!empty($id)) {
            Banner::where('id', $id)->delete();
            return redirect()->back()->with('flash_message_success', 'Banner Deleted Successfully!');
        }
    }
}
