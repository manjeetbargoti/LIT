<?php

namespace App\Http\Controllers;

use Gate;
use Image;
use App\Option;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SystemController extends Controller
{
    // Get System Options
    public function getOptions()
    {
        abort_if(Gate::denies('site_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['options'] = Option::get();
        return view('admin.system.options', $data);
    }

    // Update System Options
    public function postOption(Request $request)
    {
        abort_if(Gate::denies('site_option_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $option = Option::where('key', '=', 'app.name')->first();
        $option->value = $request->site_name ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.url')->first();
        $option->value = $request->site_url ?: $option->value;
        $option->save();

        if (isset($request->site_logo)) {
            if ($request->hasFile('site_logo')) {
                $image_array = $request->file('site_logo');
                $extension = $image_array->getClientOriginalExtension();
                $filename = 'logo_' . rand(0, 999) . '.' . $extension;
                $large_image_path = public_path('/images/logo/' . $filename);
                // Resize image
                Image::make($image_array)->save($large_image_path);
            }
            $option = Option::where('key', '=', 'app.logo')->first();
            $option->value = $filename ?: $option->value;
            $option->save();
        }

        if (isset($request->site_icon)) {
            // $request->site_icon->move(public_path(), 'favicon.ico');
            if ($request->hasFile('site_icon')) {
                $image_array = $request->file('site_icon');
                $extension = $image_array->getClientOriginalExtension();
                $filename = 'favicon_' . rand(0, 999) . '.' . $extension;
                $large_image_path = public_path('/images/logo/' . $filename);
                // Resize image
                Image::make($image_array)->save($large_image_path);
            }
            $option = Option::where('key', '=', 'app.favicon')->first();
            $option->value = $filename ?: $option->value;
            $option->save();
        }

        return back()->with(['flash_message_success' => 'Updated']);
    }

    // Get Robots.txt
    public function getRobot()
    {
        abort_if(Gate::denies('robot_txt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['robots'] = file_get_contents(public_path('robots.txt'));
        return view('admin.system.robots', $data);
    }

    // Save Robots.txt
    public function postRobot(Request $request)
    {
        abort_if(Gate::denies('robot_txt_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        file_put_contents(public_path('robots.txt'), $request->robots_txt);
        return back();
    }

    // Get .htaccess
    public function getHtaccess()
    {
        abort_if(Gate::denies('htaccess_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['htaccess'] = file_get_contents(public_path('.htaccess'));
        return view('admin.system.htaccess', $data);
    }

    // Save .htaccess
    public function postHtaccess(Request $request)
    {
        abort_if(Gate::denies('htaccess_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        file_put_contents(public_path('.htaccess'), $request->htaccess);
        return back();
    }

    // Get Custom Codes
    public function getCode()
    {
        abort_if(Gate::denies('customcode_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['header'] = file_get_contents(resource_path('views/admin/system/partials/code_header.blade.php'));
        $data['footer'] = file_get_contents(resource_path('views/admin/system/partials/code_footer.blade.php'));
        return view('admin.system.code', $data);
    }

    // Save Custom Codes
    public function postCodes(Request $request)
    {
        abort_if(Gate::denies('customcode_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        file_put_contents(resource_path('views/admin/system/partials/code_header.blade.php'), $request->custom_code_header);
        file_put_contents(resource_path('views/admin/system/partials/code_footer.blade.php'), $request->custom_code_footer);
        return back();
    }

    // Get Terms & Conditions
    public function getTerms()
    {
        abort_if(Gate::denies('terms_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['terms'] = file_get_contents(resource_path('views/admin/system/partials/terms_condition.blade.php'));
        return view('admin.system.terms_condition', $data);
    }

    // Save Terms & Conditions
    public function postTerms(Request $request)
    {
        abort_if(Gate::denies('terms_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        file_put_contents(resource_path('views/admin/system/partials/terms_condition.blade.php'), $request->custom_code_terms);
        $option = Option::where('key', '=', 'app.terms')->first();
        $option->value = $request->custom_code_terms ?: $option->value;
        $option->save();
        return back();
    }

    // Get Website Contact Details
    public function getContactInfo()
    {
        abort_if(Gate::denies('contact_info_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['options'] = Option::get();
        return view('admin.system.contact_info', $data);
    }

    // Post Contact Details
    public function postContactInfo(Request $request)
    {
        abort_if(Gate::denies('contact_info_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $option = Option::where('key', '=', 'app.phone')->first();
        $option->value = $request->phone ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.email')->first();
        $option->value = $request->email ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.address')->first();
        $option->value = $request->address ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.copyright')->first();
        $option->value = $request->copyright ?: $option->value;
        $option->save();
        return back()->with(['flash_message_success' => 'Terms & Conditions Updated!']);
    }

    // Get Social Links Details
    public function getSocialLinks()
    {
        abort_if(Gate::denies('social_links_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['options'] = Option::get();
        return view('admin.system.social_links', $data);
    }

    // Post Social Links Details
    public function postSocialLinks(Request $request)
    {
        abort_if(Gate::denies('social_link_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $option = Option::where('key', '=', 'app.fb')->first();
        $option->value = $request->facebook ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.twitter')->first();
        $option->value = $request->twitter ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.insta')->first();
        $option->value = $request->instagram ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.google')->first();
        $option->value = $request->google ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.linkedin')->first();
        $option->value = $request->linkedin ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.pinterest')->first();
        $option->value = $request->pinterest ?: $option->value;
        $option->save();

        return back()->with(['flash_message_success' => 'Updated!']);
    }
}
