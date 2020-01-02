@extends('layouts.panel.design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    System Settings
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 m-auto">
                <div class="card">
                    <div class="card-header">Social Links</div>
                    <div class="card-body">

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="post" class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-4 m-auto">
                                <h5>Please add your social usernames</h5>
                                </div>
                            </div>
                            <!-- Email Address Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Facebook" class="col-form-label">{{ __('Facebook') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="facebook" name="facebook"
                                        class="form-control @error('facebook') is-invalid @enderror"
                                        value="{{ config('app.fb') }}">
                                </div>
                            </div>
                            <!-- /.Email Address Input Field -->

                            <!-- Twitter Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Twitter" class="col-form-label">{{ __('Twitter') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="tel" id="twitter" name="twitter"
                                        class="form-control @error('twitter') is-invalid @enderror"
                                        value="{{ config('app.twitter') }}">
                                </div>
                            </div>
                            <!-- /.Twitter Input Field -->

                            <!-- Instagram Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Instagram" class="col-form-label">{{ __('Instagram') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="tel" id="instagram" name="instagram"
                                        class="form-control @error('instagram') is-invalid @enderror"
                                        value="{{ config('app.insta') }}">
                                </div>
                            </div>
                            <!-- /.Instagram Input Field -->

                            <!-- Google Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Google" class="col-form-label">{{ __('Google') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="tel" id="google" name="google"
                                        class="form-control @error('google') is-invalid @enderror"
                                        value="{{ config('app.google') }}">
                                </div>
                            </div>
                            <!-- /.Google Input Field -->

                            <!-- Linkedin Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Linkedin" class="col-form-label">{{ __('Linkedin') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="tel" id="linkedin" name="linkedin"
                                        class="form-control @error('linkedin') is-invalid @enderror"
                                        value="{{ config('app.linkedin') }}">
                                </div>
                            </div>
                            <!-- /.Linkedin Input Field -->

                            <!-- Pinterest Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Pinterest" class="col-form-label">{{ __('Pinterest') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="tel" id="pinterest" name="pinterest"
                                        class="form-control @error('pinterest') is-invalid @enderror"
                                        value="{{ config('app.pinterest') }}">
                                </div>
                            </div>
                            <!-- /.Pinterest Input Field -->

                            <div class="form-actions form-group row">
                                <div class="col-xl-4 m-auto">
                                    <input type="reset" value="Reset" class="btn btn-warning pull-left">
                                    <input type="submit" value="Update" class="btn btn-primary pull-right">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection