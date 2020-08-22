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

                        <form method="POST"
                            action="{{ url('/admin/social-impact/initiatives/' . $socialInitiative->id) }}"
                            accept-charset="UTF-8" class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative Name"
                                        class="col-form-label">{{ __('Initiative Name *') }}</label>
                                </div>
                                <div class="col-xl-5 {{ $errors->has('initiative_name') ? 'has-error' : ''}}">
                                    <input class="form-control @error('initiative_name') is-invalid @enderror"
                                        name="initiative_name" type="text" id="initiative_name"
                                        value="{{ $socialInitiative->initiative_name }}" required>
                                    {!! $errors->first('initiative_name', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-xl-4 {{ $errors->has('area_impact_sdg') ? 'has-error' : ''}}">
                                    <select class="form-control @error('area_impact_sdg') is-invalid @enderror chzn-select"
                                        name="area_impact_sdg[]" id="area_impact_sdg" value="{{ old('area_impact_sdg') }}" multiple required data-placeholder="-- Select SDG --">
                                        <option value=""> -- Select SDG -- </option>
                                        @foreach($sdgs->where('sdg_category','Onground') as $s)
                                        <option value="{{ $s->sdg_name }}" @foreach($socialInitiative->area_impact_sdg as $rsdgs) @if($s->sdg_name == $rsdgs) selected @endif @endforeach>{{ $loop->iteration }}. {{ $s->sdg_name }} </option>
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
                                        value="{{ old('initiative_description') }}" rows="5"
                                        required>{{ $socialInitiative->initiative_description }}</textarea>
                                    {!! $errors->first('initiative_description', '<p class="help-block">:message</p>')
                                    !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Project Scalability"
                                        class="col-form-label">{{ __('Describe the scalability of this project *') }}
                                        <!-- <span class="small text-info">(Max 1000 words)</span> -->
                                    </label>
                                </div>
                                <div class="col-xl-9 {{ $errors->has('project_scalability') ? 'has-error' : ''}}">
                                    <textarea class="form-control @error('project_scalability') is-invalid @enderror"
                                        name="project_scalability" id="project_scalability"
                                        value="{{ old('project_scalability') }}" rows='3' required maxlength="1000"
                                        placeholder="Max 1000 words">{{ $socialInitiative->project_scalability }}</textarea>
                                    {!! $errors->first('project_scalability', '<p class="help-block">:message</p>')
                                    !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Project SDG Relevance"
                                        class="col-form-label">{{ __("Describe the project's relevance to the SDG's *") }}
                                        <!-- <span class="small text-info">(Max 1000 words)</span> -->
                                    </label>

                                </div>
                                <div class="col-xl-9 {{ $errors->has('sdg_relevance') ? 'has-error' : ''}}">
                                    <textarea class="form-control @error('sdg_relevance') is-invalid @enderror"
                                        name="sdg_relevance" id="sdg_relevance" value="{{ old('sdg_relevance') }}"
                                        rows="3" required maxlength="1000" placeholder="Max 1000 words">{{ $socialInitiative->sdg_relevance }}</textarea>
                                    {!! $errors->first('sdg_relevance', '<p class="help-block">:message</p>')
                                    !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Relevance to National Agenda"
                                        class="col-form-label">{{ __("Describe the project's relevance to National Agenda *") }}
                                        <!-- <span class="small text-info">(Max 1000 words)</span> -->
                                    </label>

                                </div>
                                <div class="col-xl-9 {{ $errors->has('relevance_national_agenda') ? 'has-error' : ''}}">
                                    <textarea
                                        class="form-control @error('relevance_national_agenda') is-invalid @enderror"
                                        name="relevance_national_agenda" id="relevance_national_agenda"
                                        value="{{ old('relevance_national_agenda') }}" rows="3" required maxlength="1000"
                                        placeholder="Max 1000 words">{{ $socialInitiative->relevance_national_agenda }}</textarea>
                                    {!! $errors->first('relevance_national_agenda', '<p class="help-block">:message</p>
                                    ')
                                    !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Project innovation"
                                        class="col-form-label">{{ __("How innovative is the project? *") }}
                                        <!-- <span class="small text-info">(Max 1000 words)</span> -->
                                    </label>

                                </div>
                                <div class="col-xl-9 {{ $errors->has('project_innovation') ? 'has-error' : ''}}">
                                    <textarea class="form-control @error('project_innovation') is-invalid @enderror"
                                        name="project_innovation" id="project_innovation"
                                        value="{{ old('project_innovation') }}" rows="3" required maxlength="1000"
                                        placeholder="Max 1000 words">{{ $socialInitiative->project_innovation }}</textarea>
                                    {!! $errors->first('project_innovation', '<p class="help-block">:message</p>')
                                    !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Program Benefits"
                                        class="col-form-label">{{ __("List of benefits of the program *") }}
                                        <!-- <span class="small text-info">(Max 1000 words)</span> -->
                                    </label>

                                </div>
                                <div class="col-xl-9 {{ $errors->has('program_benefits') ? 'has-error' : ''}}">
                                    <textarea class="form-control @error('program_benefits') is-invalid @enderror"
                                        name="program_benefits" id="program_benefits"
                                        value="{{ old('program_benefits') }}" rows="5" required maxlength="1000"
                                        placeholder="Max 1000 words">{{ $socialInitiative->program_benefits }}</textarea>
                                    {!! $errors->first('program_benefits', '<p class="help-block">:message</p>')
                                    !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Program Stage" class="col-form-label">{{ __("Program Stage *") }}
                                        <!-- <span class="small text-info">(Max 1000 words)</span> -->
                                    </label>

                                </div>
                                <div class="col-xl-4 {{ $errors->has('program_stage') ? 'has-error' : ''}}">
                                    <select class="form-control @error('program_stage') is-invalid @enderror"
                                        name="program_stage" id="program_stage" value="{{ old('program_stage') }}"
                                        required>
                                        <option value="">Select Stage</option>
                                        <option value="Ideation" @if($socialInitiative->program_stage == 'Ideation') selected @endif>Ideation</option>
                                        <option value="Prototype" @if($socialInitiative->program_stage == 'Prototype') selected @endif>Prototype</option>
                                        <option value="Testing" @if($socialInitiative->program_stage == 'Testing') selected @endif>Testing</option>
                                        <option value="Launch/Already in the Market" @if($socialInitiative->program_stage == 'Launch/Already in the Market') selected @endif>Launch/ Already in the Market</option>
                                    </select>
                                    {!! $errors->first('program_stage', '<p class="help-block">:message</p>')
                                    !!}
                                </div>
                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Image"
                                        class="col-form-label">{{ __('') }}</label>
                                </div>
                                <div class="flex-sb-m w-full p-t-3 p-b-32">
                                    <div class="contact100-form-checkbox">
                                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="in_partnership" @if($socialInitiative->in_partnership == 1) checked @endif value="1">
                                        <label class="label-checkbox100" for="ckb1">
                                            In kind Partnership.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="dynamic_field" id="repeater">
                                <div class="repeater-heading" align="left" id="AddMoreButton">
                                    <button type="button" class="btn btn-primary repeater-add-btn">Add More
                                        Budget</button>
                                </div>
                                
                                <div class="items">
                                @foreach($multibudget as $mb)
                                    <div class="item-content">
                                        <div class="form-group row first_line">
                                            <div class="col-xl-2 text-xl-right">
                                                <label for="Initiative info"
                                                    class="col-form-label">{{ __('Time Duration *') }}</label>
                                            </div>
                                            <div
                                                class="input-group col-xl-3 {{ $errors->has('bid') ? 'has-error' : ''}} d-none">
                                                <span class="input-group-addon">Budget id</span>
                                                <input class="form-control @error('bid') is-invalid @enderror"
                                                    name="bid[]" type="text"
                                                    id="bid" value="{{ $mb->id }}" placeholder="Budget ID"
                                                    required>
                                                {!! $errors->first('bid', '<p class="help-block">:message</p>')
                                                !!}
                                            </div>
                                            <div
                                                class="input-group col-xl-3 {{ $errors->has('start_date') ? 'has-error' : ''}}">
                                                <span class="input-group-addon">Start</span>
                                                <input class="form-control @error('start_date') is-invalid @enderror"
                                                    name="start_date[]" type="date"
                                                    id="dp{{ $loop->iteration+1 }}" value="{{ $mb->start_date }}" placeholder="Start Date"
                                                    required>
                                                {!! $errors->first('start_date', '<p class="help-block">:message</p>')
                                                !!}
                                            </div>

                                            <div
                                                class="input-group col-xl-3 {{ $errors->has('end_date') ? 'has-error' : ''}}">
                                                <span class="input-group-addon">End</span>
                                                <input class="form-control @error('end_date') is-invalid @enderror"
                                                    name="end_date[]" type="date" data-date-format="yyyy-mm-dd"
                                                    id="dp2-1" value="{{ $mb->end_date }}" placeholder="End Date"
                                                    required>
                                                {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
                                            </div>

                                            <div
                                                class="input-group col-xl-3 {{ $errors->has('duration') ? 'has-error' : ''}}">
                                                <!-- <span class="input-group-addon">months</span> -->
                                                <div class="input-group">
                                                    <span class="input-group-addon">Out Reach</span>
                                                    <input class="form-control @error('outreach') is-invalid @enderror"
                                                        name="outreach[]" type="text" id="outreach"
                                                        value="{{ $mb->outreach }}" placeholder="Number of Out Reach"
                                                        required>
                                                </div>
                                                {!! $errors->first('outreach', '<p class="help-block">:message</p>') !!}
                                            </div>

                                            <div class="col-xl-1" id="deleteBtn">
                                                <button type="button" onclick="$(this).parents('.items').remove()"
                                                    name="remove" id="remove" id="remove-btn" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-xl-2 text-xl-right">
                                                <label for="Initiative info"
                                                    class="col-form-label">{{ __('') }}</label>
                                            </div>
                                            <div class="input-group col-xl-3 {{ $errors->has('beneficiaries') ? 'has-error' : ''}}">
                                                <span class="input-group-addon">Beneficieries</span>
                                                <input class="form-control @error('beneficiaries') is-invalid @enderror"
                                                    name="beneficiaries[]" type="number" pattern="[-+]?[0-9]*[.,]?[0-9]+" id="Beneficiaries"
                                                    value="{{ $mb->beneficiaries }}"
                                                    placeholder="number of Beneficieries" required>
                                                {!! $errors->first('beneficiaries', '<p class="help-block">:message</p>
                                                ')
                                                !!}
                                            </div>

                                            <div class="input-group col-xl-3 {{ $errors->has('budget') ? 'has-error' : ''}}"
                                                id="budgetDiv">
                                                <span class="input-group-addon">$</span>
                                                <input class="form-control @error('budget') is-invalid @enderror"
                                                    name="budget[]" type="text" id="Budget" value="{{ $mb->budget }}"
                                                    placeholder="Budget" required>
                                                {!! $errors->first('budget', '<p class="help-block">:message</p>') !!}
                                            </div>

                                            <div
                                                class="input-group col-xl-3 {{ $errors->has('duration') ? 'has-error' : ''}}">
                                                <!-- <span class="input-group-addon">months</span> -->
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <select class="time-period" name="time_period[]">
                                                            <option value="Days" @if($mb->time_period == 'Days') selected @endif>Days</option>
                                                            <option value="Month" @if($mb->time_period == 'Month') selected @endif>Months</option>
                                                            <option value="Year" @if($mb->time_period == 'Year') selected @endif>Year</option>
                                                        </select>
                                                    </div>
                                                    <input class="form-control @error('duration') is-invalid @enderror"
                                                        name="duration[]" type="text" id="Duration"
                                                        value="{{ $mb->duration }}" placeholder="Duration" required>
                                                </div>
                                                {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                @endforeach
                                </div>
                                
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Address" class="col-form-label">{{ __('Address *') }}</label>
                                </div>
                                <div class="col-xl-5 {{ $errors->has('region') ? 'has-error' : ''}}">
                                    <input class="form-control @error('region') is-invalid @enderror" name="region"
                                        type="text" id="Region" value="{{ $socialInitiative->region }}"
                                        placeholder="Locality" required>
                                    {!! $errors->first('region', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-xl-4 {{ $errors->has('street') ? 'has-error' : ''}}">
                                    <input class="form-control @error('street') is-invalid @enderror" name="street"
                                        type="text" id="Street" value="{{ $socialInitiative->street }}"
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
                                    <label for="Youtube Video" class="col-form-label">{{ __('Video URL') }}</label>
                                </div>
                                <div class="col-xl-9 {{ $errors->has('video_link') ? 'has-error' : ''}}">
                                    <input type="text" id="video_link"
                                        class="form-control @error('video_link') is-invalid @enderror"
                                        value="{{ $socialInitiative->video_link }}" name="video_link"
                                        placeholder="Youtube video link" />
                                    <!-- <i class="fas fa-camera"></i> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Image" class="col-form-label">{{ __('') }}</label>
                                </div>
                                <div class="flex-sb-m w-full p-t-3 p-b-32">
                                    <div class="contact100-form-checkbox">
                                        <input class="input-checkbox100" id="ckb2" type="checkbox" @if($socialInitiative->promote == 1) checked @endif name="promote"
                                            value="1">
                                        <label class="label-checkbox100" for="ckb2">
                                            I would like to promote the program to encourage participation and
                                            registration.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row" id="showUrl">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Promotion url" class="col-form-label">{{ __('Promotion URL') }}</label>
                                </div>
                                <div class="col-xl-9 {{ $errors->has('promote_url') ? 'has-error' : ''}}">
                                    <input type="text" id="promote_url"
                                        class="form-control @error('promote_url') is-invalid @enderror"
                                        value="{{ $socialInitiative->promote_url }}" name="promote_url"
                                        placeholder="Add your program page url here" />
                                    <!-- <i class="fas fa-camera"></i> -->
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
                                        <!-- <input type="text" id="CurrentImage" name="current_image[]"
                                            value="{{ $socialInitiative->image }}" class="d-none" /> -->
                                    </div>

                                    <div id="abcd1" class="abcd col-sm-12 m-t-5">
                                        @foreach(\App\SocialInitiativeImages::where('social_initiative_id',
                                        $socialInitiative->id)->get() as $sIimg)
                                        <img class="img-responsive" width="100"
                                            src="{{ asset('/images/initiative/large/'.$sIimg->image_name) }}"
                                            alt="{{ $socialInitiative->initiative_name }}" style="padding: 0 0.1em;">
                                        <a href="{{ url('/admin/initiative/image/' . $sIimg->id . '/delete') }}"><i
                                                id="close" alt="delete" class="fa fa-close"></i></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Program"
                                        class="col-form-label">{{ __('Featured (Suggest this program) *') }}</label>
                                </div>
                                <div class="col-xl-9 {{ $errors->has('featured') ? 'has-error' : ''}}">
                                    <div class="add_image">
                                        <input type="checkbox" id="featured" name="featured" value="1" @if($socialInitiative->featured == 1) checked @endif/>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="col-xl-10 m-auto">
                                    <input class="btn btn-danger pull-left" type="reset" value="Reset Details">
                                    <input class="btn btn-success pull-right" type="submit" value="Update Initiative">
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