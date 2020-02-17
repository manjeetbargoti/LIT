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
                    <div class="card-header">Edit Initiative</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/social-impact/digital-service') }}" title="Back"><button
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

                        <form method="POST"
                            action="{{ url('/admin/social-impact/digital-service/' . $instaCamp->id) }}"
                            accept-charset="UTF-8" class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Service Name"
                                        class="col-form-label">{{ __('Service Name *') }}</label>
                                </div>
                                <div class="col-xl-5 {{ $errors->has('service_name') ? 'has-error' : ''}}">
                                    <input class="form-control @error('service_name') is-invalid @enderror"
                                        name="service_name" type="text" id="service_name"
                                        value="{{ $instaCamp->service_name }}" required>
                                    {!! $errors->first('service_name', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-xl-4 {{ $errors->has('area_impact_sdg') ? 'has-error' : ''}}">
                                    <select class="form-control @error('area_impact_sdg') is-invalid @enderror"
                                        name="area_impact_sdg" id="area_impact_sdg" value="{{ old('area_impact_sdg') }}" required>
                                        <option value=""> -- Select SDG -- </option>
                                        @foreach($sdgs->where('sdg_category','360') as $s)
                                        <option value="{{ $s->sdg_name }}" @if($s->sdg_name == $instaCamp->area_impact_sdg) selected @endif>{{ $loop->iteration }}. {{ $s->sdg_name }} </option>
                                        @endforeach
                                    <select>
                                    {!! $errors->first('area_impact_sdg', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Service Description"
                                        class="col-form-label">{{ __('Service Description *') }}</label>
                                </div>
                                <div class="col-xl-9 {{ $errors->has('service_description') ? 'has-error' : ''}}">
                                    <textarea class="form-control @error('service_description') is-invalid @enderror"
                                        name="service_description" id="service_description"
                                        value="{{ old('service_description') }}" rows="5"
                                        required>{{ $instaCamp->service_description }}</textarea>
                                    {!! $errors->first('service_description', '<p class="help-block">:message</p>')
                                    !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative info"
                                        class="col-form-label">{{ __('Time Duration *') }}</label>
                                </div>
                                <div class="input-group col-xl-3 {{ $errors->has('start_date') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">Start</span>
                                    <input class="form-control @error('start_date') is-invalid @enderror"
                                        name="start_date" type="text" data-date-format="yyyy-mm-dd" id="dp2"
                                        value="{{ $instaCamp->start_date }}" placeholder="Start Date" required>
                                    {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="input-group col-xl-3 {{ $errors->has('end_date') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">End</span>
                                    <input class="form-control @error('end_date') is-invalid @enderror" name="end_date" type="text" data-date-format="yyyy-mm-dd" id="dp2-1" value="{{ $instaCamp->end_date }}" placeholder="End Date"
                                        required>
                                    {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="input-group col-xl-3 {{ $errors->has('duration') ? 'has-error' : ''}}">
                                    <!-- <span class="input-group-addon">months</span> -->
                                    <div class="input-group">
                                        <span class="input-group-addon">Out Reach</span>
                                        <input class="form-control @error('outreach') is-invalid @enderror" name="outreach"
                                        type="text" id="outreach" value="{{ $instaCamp->outreach }}" placeholder="No. of People"
                                        required>
                                    </div>
                                    {!! $errors->first('outreach', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative info"
                                        class="col-form-label">{{ __('Service info *') }}</label>
                                </div>
                                <div class="col-xl-3 {{ $errors->has('beneficiaries') ? 'has-error' : ''}}">
                                    <input class="form-control @error('beneficiaries') is-invalid @enderror"
                                        name="beneficiaries" type="text" id="Beneficiaries"
                                        value="{{ $instaCamp->beneficiaries }}"
                                        placeholder="no. of Beneficieries" required>
                                    {!! $errors->first('beneficiaries', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="input-group col-xl-3 {{ $errors->has('budget') ? 'has-error' : ''}}">
                                    <span class="input-group-addon">$</span>
                                    <input class="form-control @error('budget') is-invalid @enderror" name="budget"
                                        type="text" id="Budget" value="{{ $instaCamp->budget }}"
                                        placeholder="Budget" required>
                                    {!! $errors->first('budget', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="input-group col-xl-3 {{ $errors->has('duration') ? 'has-error' : ''}}">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <select class="time-period" name="time_period">
                                                <option value="Days" @if($instaCamp->time_period == 'Day') selected @endif>Days</option>
                                                <option value="Month" @if($instaCamp->time_period == 'Month') selected @endif>Months</option>
                                                <option value="Year" @if($instaCamp->time_period == 'Year') selected @endif>Year</option>
                                            </select>
                                        </div>
                                        <input class="form-control @error('duration') is-invalid @enderror" name="duration"
                                        type="text" id="Duration" value="{{ $instaCamp->duration }}" placeholder="Duration"
                                        required>
                                    </div>
                                    {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Image"
                                        class="col-form-label">{{ __('') }}</label>
                                </div>
                                <div class="flex-sb-m w-full p-t-3 p-b-32">
                                    <div class="contact100-form-checkbox">
                                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="in_partnership" @if($instaCamp->duration == 1) checked @endif value="1">
                                        <label class="label-checkbox100" for="ckb1">
                                            In kind Partnership.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Address" class="col-form-label">{{ __('Address *') }}</label>
                                </div>
                                <div class="col-xl-5 {{ $errors->has('region') ? 'has-error' : ''}}">
                                    <input class="form-control @error('region') is-invalid @enderror" name="region"
                                        type="text" id="Region" value="{{ $instaCamp->region }}"
                                        placeholder="Locality" required>
                                    {!! $errors->first('region', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-xl-4 {{ $errors->has('street') ? 'has-error' : ''}}">
                                    <input class="form-control @error('street') is-invalid @enderror" name="street"
                                        type="text" id="Street" value="{{ $instaCamp->street }}"
                                        placeholder="Street">
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
                                        <?php echo $country_dropdown; ?>
                                    </select>
                                    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-xl-3 {{ $errors->has('state') ? 'has-error' : ''}}">
                                    <select name="state" id="state"
                                        class="form-control @error('state') is-invalid @enderror"
                                        value="{{ old('state') }}" required>
                                        <?php echo $state_dropdown; ?>
                                    </select>
                                    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-xl-3 {{ $errors->has('city') ? 'has-error' : ''}}">
                                    <select name="city" id="city"
                                        class="form-control @error('city') is-invalid @enderror"
                                        value="{{ old('city') }}" required>
                                        <?php echo $city_dropdown; ?>
                                    </select>
                                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Youtube Video"
                                        class="col-form-label">{{ __('Video URL') }}</label>
                                </div>
                                <div class="col-xl-9 {{ $errors->has('video_link') ? 'has-error' : ''}}">
                                    <input type="text" id="video_link" class="form-control @error('video_link') is-invalid @enderror"
                                        value="{{ $instaCamp->video_link }}" name="video_link" placeholder="Youtube video link" />
                                    <!-- <i class="fas fa-camera"></i> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Image"
                                        class="col-form-label">{{ __('Service Images *') }}</label>
                                </div>
                                <div class="col-xl-9 {{ $errors->has('country') ? 'has-error' : ''}}">
                                    <div class="add_image">
                                        <input type="button" id="add_more" class="btn btn-info" value="Select Image" />
                                        <!-- <i class="fas fa-camera"></i> -->
                                        <!-- <input type="text" id="CurrentImage" name="current_image[]"
                                            value="{{ $instaCamp->image }}" class="d-none" /> -->
                                    </div>

                                    <div id="abcd1" class="abcd col-sm-12 m-t-5">
                                        @foreach(\App\InstaCampImages::where('insta_camp_id',
                                        $instaCamp->id)->get() as $sIimg)
                                        <img class="img-responsive" width="100"
                                            src="{{ asset('/images/initiative/large/'.$sIimg->image_name) }}"
                                            alt="{{ $instaCamp->service_name }}" style="padding: 0 0.1em;">
                                        <a href="{{ url('/admin/digital-service/image/' . $sIimg->id . '/delete') }}"><i
                                                id="close" alt="delete" class="fa fa-close"></i></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="col-xl-10 m-auto">
                                    <input class="btn btn-danger pull-left" type="reset" value="Reset Details">
                                    <input class="btn btn-success pull-right" type="submit" value="Upadate Service">
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