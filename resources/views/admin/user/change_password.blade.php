@extends('layouts.panel.design')

@section('content')
<style>
.form-group label {
    margin-top: 0px;
}
</style>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Users
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/user') }}" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/users' . $user->id) }}" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Password" class="col-form-label">{{ __('New Password *') }}</label>
                                </div>
                                <div class="col-xl-4 {{ $errors->has('password') ? 'has-error' : ''}}">
                                    <input class="form-control @error('password') is-invalid @enderror" name="password"
                                        type="password" id="password" value="{{ old('password') }}">
                                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xl-4 m-auto">
                                    <input class="btn btn-danger pull-left" type="reset" value="Reset">
                                    <input class="btn btn-primary pull-right" type="submit" value="Update Password">
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