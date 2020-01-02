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
                    <div class="card-header">Contact Information</div>
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
                            <!-- Email Address Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Email Address" class="col-form-label">{{ __('Email Address') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ config('app.email') }}">
                                </div>
                            </div>
                            <!-- /.Email Address Input Field -->

                            <!-- Phone Number Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Phone Number" class="col-form-label">{{ __('Phone Number') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="tel" id="phone" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ config('app.phone') }}">
                                </div>
                            </div>
                            <!-- /.Phone Number Input Field -->

                            <!-- Address Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Address" class="col-form-label">{{ __('Address') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <textarea name="address" id="address" rows="8"
                                        class="form-control my-editor">{{ config('app.address') }}</textarea>
                                </div>
                            </div>
                            <!-- /.Address Field -->

                            <!-- Copyright Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Copyright" class="col-form-label">{{ __('Copyright') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <textarea name="copyright" id="copyright"
                                        class="form-control">{{ config('app.copyright') }}</textarea>
                                </div>
                            </div>
                            <!-- Copyright Field -->

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