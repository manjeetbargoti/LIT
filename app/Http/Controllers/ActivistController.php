<?php

namespace App\Http\Controllers;

use App\User;
use App\Country;
use App\ActivistQuery;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ActivistController extends Controller
{
    // List all activists
    public function index()
    {
    	$perPage = 24;

    	// $roles = Role::get();

    	$data = User::where('status', 1)
    					->whereHas("roles", function($q){ $q->where("name", "Activist"); })
    					->latest()->paginate($perPage);

    	$country = Country::orderBy('name', 'asc')->get();

    	return view('front.users.activists', compact('data','country'));
    }

    // Single Activist
    public function singleActivist(Request $request, $id=null)
    {
        if($request->isMethod('post'))
        {
            $requestData = $request->all();
            // dd($data);

            $activist = ActivistQuery::create($requestData);

            // Sending mail to activist and admin
            $email = $requestData['email'];

            $userData = User::where('id', $requestData['activist_id'])->first();

            $messageData = ['email' => $userData->email, 'name' => $userData->first_name];
            Mail::send('emails.activist_get_request', $messageData, function ($message) use ($email) {
                $message->to($email)->subject('A Request for you | Lightup with LIT');
            });

            $notification = array(
                'message' => 'Request submitted!',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        }

    	$data = User::find($id);
    	$roles = Role::pluck('name','name')->all();
    	$userRole = $data->roles->first();
    	$data['role'] = $userRole->name;

    	// dd($data);

    	return view('front.users.singleActivist', compact('data'));
    }
}
