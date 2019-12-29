<?php

namespace Illuminate\Foundation\Auth;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $requestData = $request->except('roles');
        $roles = $request->roles;
        // dd($requestData);

        DB::beginTransaction();

        try {

            event(new Registered($user = $this->create($requestData)));
            // event(new Registered($user->assignRole($roles)));

        } catch (ValidationException $e) {
            DB::rollback();
            return Redirect()->back()->withErrors($e->getErrors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        // event(new Registered($user = $this->create($request->all())));

        $email = $requestData['email'];

        $token = base64_encode($email);
        $code = base64_encode($requestData['username']);

        // dd($token);

        $messageData = ['email' => $requestData['email'], 'name' => $requestData['first_name'], 'token' => $token, 'code' => $code];
        Mail::send('emails.registration_email', $messageData, function ($message) use ($email) {
            $message->to($email)->subject('Welcome! You have successfully created your LIT Account');
        });

        DB::commit();

        // $this->guard()->login($user);

        $notification = array(
            'message' => 'Registeration successfully! Please check your email to verify your account.',
            'alert-type' => 'success',
        );

        return redirect('/')->with($notification);

        // $this->guard()->login($user);

        // return $this->registered($request, $user)
        // ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
