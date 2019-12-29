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
                    <div class="card-header">Create New User</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/user') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/users') }}" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="User Role" class="col-form-label">{{ __('User Role *') }}</label>
                                </div>
                                <div class="col-xl-4 {{ $errors->has('roles') ? 'has-error' : ''}}">
                                    <select class="form-control chzn-select @error('roles') is-invalid @enderror" name="roles[]" size="3" id="Roles"
                                        data-placeholder="Select a Role" value="{{ old('roles') }}">
                                        @foreach($roles as $r)
                                        <option value="{{ $r->name }}">{{ $r->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Username" class="col-form-label">{{ __('Username *') }}</label>
                                </div>
                                <div class="col-xl-4 {{ $errors->has('username') ? 'has-error' : ''}}">
                                    <input class="form-control @error('username') is-invalid @enderror" name="username" type="text" id="UserName"
                                        value="{{ old('username') }}">
                                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Title" class="col-form-label">{{ __('Title *') }}</label>
                                </div>
                                <div class="col-xl-4 {{ $errors->has('title') ? 'has-error' : ''}}">
                                    <select class="form-control @error('title') is-invalid @enderror" name="title" type="text" id="Title"
                                        value="{{ old('title') }}">
                                        <option value="Mr.">Mr.</option>
                                        <option value="Ms.">Ms.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Dr.">Dr.</option>
                                    </select>
                                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="First Name" class="col-form-label">{{ __('First Name *') }}</label>
                                </div>
                                <div class="col-xl-4 {{ $errors->has('first_name') ? 'has-error' : ''}}">
                                    <input class="form-control @error('first_name') is-invalid @enderror" name="first_name" type="text" id="FirstName"
                                        value="{{ old('first_name') }}">
                                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Last Name" class="col-form-label">{{ __('Last Name') }}</label>
                                </div>
                                <div class="col-xl-4 {{ $errors->has('last_name') ? 'has-error' : ''}}">
                                    <input class="form-control @error('last_name') is-invalid @enderror" name="last_name" type="text" id="LastName"
                                        value="{{ old('last_name') }}">
                                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Email Address" class="col-form-label">{{ __('Email Address *') }}</label>
                                </div>
                                <div class="col-xl-4 {{ $errors->has('email') ? 'has-error' : ''}}">
                                    <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" id="Email"
                                        value="{{ old('email') }}">
                                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Phone" class="col-form-label">{{ __('Phone *') }}</label>
                                </div>
                                <div class="col-xl-4 {{ $errors->has('phone') ? 'has-error' : ''}}">
                                    <input class="form-control @error('phone') is-invalid @enderror" name="phone" type="text" id="Phone"
                                        value="{{ old('phone') }}">
                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Password" class="col-form-label">{{ __('Password *') }}</label>
                                </div>
                                <div class="col-xl-4 {{ $errors->has('password') ? 'has-error' : ''}}">
                                    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" id="password"
                                        value="{{ old('password') }}">
                                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xl-4 m-auto">
                                <input class="btn btn-danger pull-left" type="reset" value="Reset">
                                    <input class="btn btn-primary pull-right" type="submit" value="Create">
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