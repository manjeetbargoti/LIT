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
                    <div class="card-header">Website Options</div>
                    <div class="card-body">

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="post" class="form-horizontal login_validator"
                            enctype="multipart/form-data" id="form_inline_validator">
                            @csrf
                            <!-- Site Title Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Site Title" class="col-form-label">{{ __('Site Title') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="site_name" name="site_name"
                                        class="form-control @error('site_name') is-invalid @enderror"
                                        value="{{config('app.name')}}">
                                </div>
                            </div>
                            <!-- /.Site Title Input Field -->

                            <!-- Site Url Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Site Url" class="col-form-label">{{ __('Site Url') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="SiteUrl" name="site_url"
                                        class="form-control @error('site_url') is-invalid @enderror"
                                        value="{{ config('app.url') }}">
                                </div>
                            </div>
                            <!-- /.Site Url Input Field -->

                            <!-- Website Logo Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Website Logo" class="col-form-label">{{ __('Website Logo') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="file" name="site_logo" id="site_logo" accept="image/*"
                                        class="form-control" placeholder="Site Logo">
                                    <div class="help-block">
                                        <span><a href="{{ asset('/images/logo/'.config('app.logo')) }}" target="_blank"><img
                                                    src="{{ asset('/images/logo/'.config('app.logo')) }}" width="60"></a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.Website Logo Field -->

                            <!-- Website Favicon Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Website Favicon" class="col-form-label">{{ __('Website Favicon') }}</label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="file" name="site_icon" id="site_icon" accept="image/*"
                                        class="form-control" placeholder="Site icon">
                                    <div class="help-block">
                                        <s pan><a href="{{ asset('/images/logo/'.config('app.favicon')) }}" target="_blank"><img
                                                    src="{{ asset('/images/logo/'.config('app.favicon')) }}" width="60"></a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Website Favicon Field -->

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