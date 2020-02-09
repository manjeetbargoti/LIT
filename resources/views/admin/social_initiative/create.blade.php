@extends('layouts.panel.design')

@section('content')
<style>
.form-group label {
    margin-top: 0px;
}

.product_image_upload .fileinput-upload-button {
    display: none;
}

#filediv {
    display: inline-block !important;
}

#file {
    color: green;
    padding: 5px;
    border: 1px dashed #123456;
    background-color: #f9ffe5
}

#noerror {
    color: green;
    text-align: left
}

#error {
    color: red;
    text-align: left
}

#img {
    width: 17px;
    border: none;
    height: 17px;
    margin-left: 10px;
    cursor: pointer;
}

.abcd img {
    height: 100px;
    width: 100px;
    padding: 5px;
    border-radius: 10px;
    border: 1px solid #e8debd
}

#close {
    vertical-align: top;
    background-color: red;
    color: white;
    border-radius: 5px;
    padding: 4px;
    margin-left: -13px;
    margin-top: 1px;
}
</style>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Social Impact
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
                    <div class="card-header">Create New Initiative</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/social-impact/initiatives') }}" title="Back"><button
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

                        <form method="POST" action="{{ url('/admin/social-impact/initiatives') }}"
                            accept-charset="UTF-8" class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative Name"
                                        class="col-form-label">{{ __('Initiative Name *') }}</label>
                                </div>
                                <div class="col-xl-5 {{ $errors->has('initiative_name') ? 'has-error' : ''}}">
                                    <input class="form-control @error('initiative_name') is-invalid @enderror"
                                        name="initiative_name" type="text" id="initiative_name"
                                        value="{{ old('initiative_name') }}" required>
                                    {!! $errors->first('initiative_name', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-xl-4 {{ $errors->has('area_impact_sdg') ? 'has-error' : ''}}">
                                    <select class="form-control @error('area_impact_sdg') is-invalid @enderror"
                                        name="area_impact_sdg" id="area_impact_sdg" value="{{ old('area_impact_sdg') }}" required>
                                        <option value=""> -- Select SDG -- </option>
                                        @foreach($sdgs->where('sdg_category','Onground') as $s)
                                        <option value="{{ $s->sdg_name }}">{{ $loop->iteration }}. {{ $s->sdg_name }} </option>
                                        @endforeach
                                    <select>
                                    {!! $errors->first('area_impact_sdg', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative Description"
                                        class="col-form-label">{{ __('Initiative Description *') }}</label>
                                </div>
                                <div class="col-xl-9 {{ $errors->has('initiative_description') ? 'has-error' : ''}}">
                                    <textarea class="form-control @error('initiative_description') is-invalid @enderror"
                                        name="initiative_description" id="initiative_description"
                                        value="{{ old('initiative_description') }}" required></textarea>
                                    {!! $errors->first('initiative_description', '<p class="help-block">:message</p>')
                                    !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative info"
                                        class="col-form-label">{{ __('Initiative info *') }}</label>
                                </div>
                                <div class="col-xl-3 {{ $errors->has('beneficiaries') ? 'has-error' : ''}}">
                                    <input class="form-control @error('beneficiaries') is-invalid @enderror"
                                        name="beneficiaries" type="text" id="Beneficiaries"
                                        value="{{ old('beneficiaries') }}" placeholder="no. of Beneficieries" required>
                                    {!! $errors->first('beneficiaries', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="input-group col-xl-3 {{ $errors->has('budget') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">AED</span>
                                    <input class="form-control @error('budget') is-invalid @enderror" name="budget"
                                        type="text" id="Budget" value="{{ old('budget') }}" placeholder="Budget"
                                        required>
                                    {!! $errors->first('budget', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="input-group col-xl-3 {{ $errors->has('duration') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">months</span>
                                    <input class="form-control @error('duration') is-invalid @enderror" name="duration"
                                        type="text" id="Duration" value="{{ old('duration') }}" placeholder="Duration"
                                        required>
                                    {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Address" class="col-form-label">{{ __('Address *') }}</label>
                                </div>
                                <div class="col-xl-5 {{ $errors->has('region') ? 'has-error' : ''}}">
                                    <input class="form-control @error('region') is-invalid @enderror" name="region"
                                        type="text" id="Region" value="{{ old('region') }}" placeholder="Locality"
                                        required>
                                    {!! $errors->first('region', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-xl-4 {{ $errors->has('street') ? 'has-error' : ''}}">
                                    <input class="form-control @error('street') is-invalid @enderror" name="street"
                                        type="text" id="Street" value="{{ old('street') }}" placeholder="Street">
                                    {!! $errors->first('street', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Location" class="col-form-label">{{ __('Location *') }}</label>
                                </div>
                                <div class="col-xl-3 {{ $errors->has('country') ? 'has-error' : ''}}">
                                    <select name="country" id="country"
                                        class="form-control @error('country') is-invalid @enderror chzn-select"
                                        value="{{ old('country') }}" required>
                                        <option value="" selected> -- Select Country -- </option>
                                        @foreach($country as $coun)
                                        <option value="{{ $coun->name }}">{{ $coun->name }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-xl-3 {{ $errors->has('state') ? 'has-error' : ''}}">
                                    <select name="state" id="state"
                                        class="form-control @error('state') is-invalid @enderror"
                                        value="{{ old('state') }}" required>
                                        <option value="" selected> -- Select State -- </option>
                                    </select>
                                    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-xl-3 {{ $errors->has('city') ? 'has-error' : ''}}">
                                    <select name="city" id="city"
                                        class="form-control @error('city') is-invalid @enderror"
                                        value="{{ old('city') }}" required>
                                        <option value="" selected> -- Select City -- </option>
                                    </select>
                                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Image"
                                        class="col-form-label">{{ __('Initiative Images *') }}</label>
                                </div>
                                <div class="col-xl-9 {{ $errors->has('country') ? 'has-error' : ''}}">
                                    <div class="add_image">
                                        <input type="button" id="add_more" class="btn btn-info" value="Select Image" />
                                        <!-- <i class="fas fa-camera"></i> -->
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="col-xl-10 m-auto">
                                    <input class="btn btn-danger pull-left" type="reset" value="Reset Details">
                                    <input class="btn btn-success pull-right" type="submit" value="Create Initiative">
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