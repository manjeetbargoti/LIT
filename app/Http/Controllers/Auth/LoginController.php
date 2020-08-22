<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'email.required' => 'The email is required.',
            'email.email' => 'The email needs to have a valid format.',
            'email.exists' => 'The email is not registered in the system.',
       ]);
    }

    // protected function credentials(Request $request)
    // {
    //     return [
    //         'email' => $request->{$this->username()},
    //         'password' => $request->password,
    //         'status' => '1',
    //     ];
    // }

    protected function credentials(Request $request) {
        return array_merge($request->only($this->username(), 'password'), ['status' => 1]);
      }


    protected function redirectTo()
    {
        // User role
        $role = Auth::user()->roles[0]->name;

        // return Session::get('backUrl') ? Session::get('backUrl') :   $this->redirectTo;

        // Check user role
        switch ($role) {
            case 'Super Admin':
                return '/admin/dashboard';
                break;
            case 'NGO':
                return '/admin/profile';
                break;
            case 'Activist':
                return '/admin/profile';
                break;
            case 'Social Enterprise':
                return '/admin/profile';
                break;
            case 'Corporate':
                return '/admin/profile';
                break;
            case 'Government':
                return '/admin/profile';
                break;
            default:
                return '/';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
