@extends('layouts.panel.design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Social Goals (SDG's)
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">Create New SDG</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/sdgs') }}" title="Back"><button class="btn btn-warning btn-sm"><i
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

                        <form method="POST" action="{{ url('/admin/sdgs') }}" accept-charset="UTF-8"
                            class="form-horizontal" id="form_block_validator" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('sdg_name') ? 'has-error' : ''}}">
                                <label for="SDG Name" class="control-label">{{ 'SDG Name' }}</label>
                                <input class="form-control" name="sdg_name" type="text" id="sdg_name"
                                    value="{{ old('sdg_name') }}" required>
                                {!! $errors->first('sdg_name', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('sdg_category') ? 'has-error' : ''}}">
                                <label for="SDG Category" class="control-label">{{ 'SDG Category' }}</label>
                                <select class="form-control" name="sdg_category" id="sdg_category"
                                    value="{{ old('sdg_category') }}" required>
                                    <option value=""> -- Select Category -- </option>
                                    <option value="Onground"> Onground Activity Goal </option>
                                    <option value="360"> 360ْ Digital Marketing </option>
                                </select>
                                {!! $errors->first('sdg_category', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('sdg_description') ? 'has-error' : ''}}">
                                <label for="Permissions" class="control-label">{{ 'SDG Description' }}</label>
                                <textarea name="sdg_description" id="SDGDescription" rows="5" class="form-control" value="{{ old('sdg_description') }}"></textarea>
                                {!! $errors->first('sdg_description', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group">
                                <input class="btn btn-warning pull-left" type="reset" value="Reset">
                                <input class="btn btn-primary pull-right" type="submit" value="Create SDG">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection