<?php

namespace App\Http\Controllers;

use App\User;
use App\SDGs;
use App\Country;
use App\ActivistQuery;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ActivistController extends Controller
{
    // List all activists
    public function index(Request $request)
    {
    	$perPage = 24;

        // $roles = Role::get();
        $countryname = '';
        
        if($request->isMethod('POST') && !empty($request['country']))
        {
            $requestData = $request->all();

            dd($requestData);

            if(!empty($requestData['country'])){
                $countryname = $requestData['country'];
            }else{
                $countryname = '';
            }
            
            $state = $requestData['state'];
            $city = $requestData['city'];
            $sdg = $requestData['sdg'];

            $data = User::where('status', 1)
                        ->where('country', 'LIKE', "%" . $countryname . "%")
                        ->whereHas("roles", function($q){ $q->where("name", "Activist"); });

            // if ($sdg) {
            //     $data = $data->where('country', 'LIKE', "%" . $sdg . "%");
            // }
            if ($countryname) {
                $data = $data->where('country', 'LIKE', "%" . $countryname . "%");
            }
            if ($state) {
                $data = $data->where('state', 'LIKE', "%" . $state . "%");
            }
            if ($city) {
                $data = $data->where('city', 'LIKE', "%" . $city . "%");
            }

            $data = $data->latest()->paginate($perPage);

            // dd($data);
        }else{
            $data = User::where('status', 1)
    					->whereHas("roles", function($q){ $q->where("name", "Activist"); })
    					->latest()->paginate($perPage);
        }

        $sdgs = SDGs::where(['sdg_category'=>'Onground', 'status'=>1])->get();
        $country = Country::orderBy('name', 'asc')->get();

    	return view('front.users.activists', compact('data','country','countryname','sdgs'));
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

    // Activist Filter
    public function activistFilter(Request $request)
    {
        $data = $request->all();

        $country = $data['country'];
        $state = $data['state'];
        $city = $data['city'];

        dd($data);

        if ($country) {
            $data = $data->where('country', 'LIKE', "%" . $country . "%");
        }
        if ($state) {
            $data = $data->where('state', 'LIKE', "%" . $state . "%");
        }
        if ($city) {
            $data = $data->where('city', 'LIKE', "%" . $city . "%");
        }
    }
}
