@extends('layouts.front.design')
@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title p-b-20">
                    LOGIN
                </span>

                <div class="form-group validate-input" data-validate="Valid email is required">
                    <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email Address" id="EmailAddress" required autofocus>
                    <!-- <span class="focus-input100"></span> -->
                    <!-- <span class="label-input100">Email</span> -->

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group validate-input" data-validate="Password is required">
                    <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" type="password" name="password" id="Password" required>
                    <!-- <span class="focus-input100"></span> -->
                    <!-- <span class="label-input100">Password</span> -->

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div>
                        <a href="#" class="txt1">
                            Forgot Password?
                        </a>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-46 p-b-20">
                    <span class="txt2">
                        or sign up using
                    </span>
                </div>

                <div class="login100-form-social flex-c-m">
                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="w-full text-center p-t-55">
                    <span class="txt2">
                        Not a member?
                    </span>

                    <a href="{{ route('register') }}" class="txt2 bo1">
                        Register here
                    </a>
                </div>
            </form>

            <div class="login100-more" style="background-image: url('{{ url('/images/static/bg-01.jpg') }}');">
            </div>
        </div>
    </div>
</div>

@endsection