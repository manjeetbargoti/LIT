@extends('layouts.front.design')
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="register100-form">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title p-b-20">
                        {{ __('REGISTER') }}
                    </span>

                    <div class="row">
                        <div class="form-group col-sm-6" data-validate="Role is required">
                            <label for="What Are you ?">{{ __('What Are you ? *') }}</label>
                            <select name="roles" id="Roles" class="form-control @error('roles') is-invalid @enderror"
                                value="{{ old('roles') }}" required autocomplete="roles" autofocus>
                                <option value="" selected> -- Select what are you ? -- </option>
                                <option value="NGO">NGO</option>
                                <option value="Social Enterprise">Social Enterprise</option>
                                <option value="Corporate">Corporate</option>
                                <option value="Government">Government</option>
                                <option value="Activists">Activists</option>
                            </select>
                            @error('roles')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6" data-validate="Username is required">
                            <label for="Username">{{ __('Username *') }}</label>
                            <input type="text" name="username" id="UserName"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" required autocomplete="username">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-2" data-validate="Title is required">
                            <label for="Title">{{ __('Title *') }}</label>
                            <select name="title" id="Title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" required autocomplete="title">
                                <option value="Mr.">Mr.</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Dr.">Dr.</option>
                            </select>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-5" data-validate="First name is required">
                            <label for="First Name">{{ __('First Name *') }}</label>
                            <input type="text" name="first_name" id="FirstName"
                                class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name') }}" required autocomplete="first_name">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-5" data-validate="Last name is required">
                            <label for="Last Name">{{ __('Last Name') }}</label>
                            <input type="text" name="last_name" id="LastName"
                                class="form-control @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name') }}" autocomplete="last_name">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6" data-validate="Email is required">
                            <label for="Email Address">{{ __('Email Address *') }}</label>
                            <input type="text" name="email" id="EmailAddress"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6" data-validate="Phone is required">
                            <label for="Phone">{{ __('Phone *') }}</label>
                            <input type="text" name="phone" id="PhoneNumber"
                                class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                required autocomplete="phone">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6" data-validate="Password is required">
                            <label for="Password">{{ __('Password *') }}</label>
                            <input type="password" name="password" id="Password"
                                class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" required autocomplete="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-sm-6" data-validate="Confirm password is required">
                            <label for="Confirm Password">{{ __('Confirm Password *') }}</label>
                            <input type="password" name="password_confirmation" id="ConfPassword"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                value="{{ old('password_confirmation') }}" required
                                autocomplete="password_confirmation">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="terms">
                            <label class="label-checkbox100" for="ckb1">
                                I accept <a href="#">Terms & Conditions</a>.
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="login100-form-btn" type="submit">
                        {{ __('REGISTER') }}
                        </button>
                    </div>

                    <div class="w-full text-center p-t-55">
                        <span class="txt2">
                            Already have an account?
                        </span>

                        <a href="{{ route('login') }}" class="txt2 bo1">
                            Login here
                        </a>
                    </div>
                </form>
            </div>


            <div class="register100-more" style="background-image: url('{{ url('/images/static/bg-01.jpg') }}');">
            </div>
        </div>
    </div>
</div>
@endsection