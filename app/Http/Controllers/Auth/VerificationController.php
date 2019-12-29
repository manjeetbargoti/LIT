<?php

namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('signed')->only('verify');
    //     $this->middleware('throttle:6,1')->only('verify', 'resend');
    // }

    // Verify Email
    public function verifyEmail(Request $request, $token=null, $code=null)
    {

        $email = base64_decode($token);
        $username = base64_decode($code);
        $date = date("Y-m-d h:s:i");

        // dd($date);

        DB::beginTransaction();

        try {

        User::where('email',$email)->where('username',$username)->update([
            'email_verified_at'     => $date,
            'status'                => 1,
        ]);

    } catch (ValidationException $e) {
        DB::rollback();
        return Redirect()->back()->withErrors($e->getErrors())->withInput();
    } catch (\Exception $e) {
        DB::rollback();
        throw $e;
    }

    DB::commit();

    $notification = array(
        'message' => 'Your account is activated! Please login now.',
        'alert-type' => 'success',
    );

        return redirect('/login')->with($notification);
    }
}
