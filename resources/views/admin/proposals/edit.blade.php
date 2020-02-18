@extends('layouts.panel.design')

@section('content')
<style>
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

.fileinput-upload {
    display: none;
}
</style>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Projects for Proposal
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Project</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/social-impact/proposals') }}" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <form method="POST" class="form-horizontal login_validator" id="form_block_validator"
                            action="{{ url('/admin/social-impact/proposals/'.$proposal->id) }}" accept-charset="UTF-8"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-12">
                                    <!-- Select your Company -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Select your Company" class="col-form-label">Select your Company
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i
                                                        class="fa fa-chevron-down text-primary"></i>
                                                </span>
                                                <select name="business_id" id="CompanyName" class="form-control"
                                                    value="{{ old('business_id') }}" required>
                                                    <option value=""> -- Select Company -- </option>
                                                    @foreach($company as $comp)
                                                    <option value="{{ $comp->id }}" @if($comp->id == $proposal->business_id) selected @endif>{{ $comp->business_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Select your Company -->

                                    <!-- Project name -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Project Name" class="col-form-label">Project Name *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i
                                                        class="fa fa-building text-primary"></i>
                                                </span>
                                                <input type="text" name="project_name" id="project_name"
                                                    class="form-control" value="{{ $proposal->project_name }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Project name -->

                                    <!-- Contact Person name -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Contact Person Name" class="col-form-label">Contact Person Name
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <input type="text" name="contact_person_name" id="contact_person_name"
                                                    class="form-control" value="{{ $proposal->contact_person_name }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Contact Person name -->

                                    <!-- Contact Person Email -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Contact Person Email" class="col-form-label">Contact Person
                                                Email *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i
                                                        class="fa fa-envelope text-primary"></i>
                                                </span>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    value="{{ $proposal->email }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Contact Person Email -->

                                    <!-- Contact Person Phone -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Contact Person Phone" class="col-form-label">Contact Person
                                                Phone *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i
                                                        class="fa fa-phone text-primary"></i>
                                                </span>
                                                <input type="tel" name="phone" id="phone" class="form-control"
                                                    value="{{ $proposal->phone }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Contact Person Phone -->

                                    <!-- Fax Number -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Fax Number" class="col-form-label">Fax Number</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i
                                                        class="fa fa-phone text-primary"></i>
                                                </span>
                                                <input type="tel" name="fax_number" id="fax_number" class="form-control"
                                                    value="{{ $proposal->fax_number }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Fax Number -->

                                    <!-- Company Background -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Company Background" class="col-form-label">Company Background
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <textarea name="company_background" id="company_background"
                                                class="form-control" rows="3"
                                                required>{{ $proposal->company_background }}</textarea>
                                        </div>
                                    </div>
                                    <!-- /. Company Background -->

                                    <!-- Project Description -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Project Description" class="col-form-label">Project Description
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <textarea name="project_description" id="project_description"
                                                class="form-control" rows="5"
                                                required>{{ $proposal->project_description }}</textarea>
                                        </div>
                                    </div>
                                    <!-- /. Project Description -->

                                    <!-- Project Goals -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Project Goals" class="col-form-label">Project Goals *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <textarea name="project_goals" id="project_goals" class="form-control" rows="3" required>{{ $proposal->project_goals }}</textarea>
                                        </div>
                                    </div>
                                    <!-- /. Project Goals -->

                                    <!-- Project Elements -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Project Elements" class="col-form-label">Project
                                                Elements</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <textarea name="proposal_elements" id="proposal_elements"
                                                class="form-control" rows="3">{{ $proposal->proposal_elements }}</textarea>
                                        </div>
                                    </div>
                                    <!-- /. Project Elements -->

                                    <!-- Evolution Criteria -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Evolution Criteria" class="col-form-label">Evolution
                                                Criteria</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <textarea name="evolution_criteria" id="evolution_criteria"
                                                class="form-control" rows="2">{{ $proposal->evolution_criteria }}</textarea>
                                        </div>
                                    </div>
                                    <!-- /. Evolution Criteria -->

                                    <!-- Possible Challanges -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Possible Challanges" class="col-form-label">Possible
                                                Challanges</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <textarea name="possible_challanges" id="possible_challanges"
                                                class="form-control" rows="2">{{ $proposal->possible_challanges }}</textarea>
                                        </div>
                                    </div>
                                    <!-- /. Possible Challanges -->

                                    <!-- Project Budget -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Project Budget" class="col-form-label">Project Budget *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon">$</i>
                                                </span>
                                                <input type="text" name="budget" id="budget" class="form-control"
                                                    value="{{ $proposal->budget }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Project Budget -->

                                    <!-- Submission Date -->
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Submission Date" class="col-form-label">Submission Date</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-calendar text-primary"></i></span>
                                                <input type="text" class="form-control" placeholder="yyyy-mm-dd"
                                                    data-date-format="yyyy-mm-dd" id="dp2" name="submission_time"
                                                    value="{{ $proposal->submission_time }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Submission Date -->

                                    <!-- Project Timeline -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Project Timeline" class="col-form-label">Project Timeline
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <select class="time-period" name="time_period">
                                                        <option value="Days" @if($proposal->time_period == 'Days') selected @endif>Days</option>
                                                        <option value="Month" @if($proposal->time_period == 'Month') selected @endif>Months</option>
                                                        <option value="Year" @if($proposal->time_period == 'Year') selected @endif>Year</option>
                                                    </select>
                                                </div>
                                                <input type="text" name="project_timeline" id="project_timeline"
                                                    class="form-control" value="{{ $proposal->project_timeline }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Project Timeline -->

                                    <!-- Social Impact Points -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Social Impact Points" class="col-form-label">Social Impact
                                                Points
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> SIP</i>
                                                </span>
                                                <input type="text" name="social_impact_points" id="social_impact_points"
                                                    class="form-control" value="{{ $proposal->social_impact_points }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Social Impact Points -->

                                    <!-- Country name -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Country" class="col-form-label">Country *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i
                                                        class="fa fa-globe text-primary"></i>
                                                </span>
                                                <select name="country" id="country" class="form-control"
                                                    value="{{ old('country') }}" required>
                                                    <option value=""> -- Select Country -- </option>
                                                    <?php echo $country_dropdown; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Country name -->

                                    <!-- State name -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="State" class="col-form-label">State *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i
                                                        class="fa fa-globe text-primary"></i>
                                                </span>
                                                <select name="state" id="state" class="form-control"
                                                    value="{{ old('state') }}" required>
                                                    <?php echo $state_dropdown; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. State name -->

                                    <!-- City name -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="City" class="col-form-label">City *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i
                                                        class="fa fa-globe text-primary"></i>
                                                </span>
                                                <select name="city" id="city" class="form-control"
                                                    value="{{ old('city') }}" required>
                                                    <?php echo $city_dropdown; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. City name -->

                                    <!-- PDF Brochure -->
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Upload Brochure" class="col-form-label">Upload Brochure *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <input id="input-21-2" type="file" accept="application/pdf" name="brochure_pdf" class="form-control file-loading" value="{{ old('brochure_pdf') }}">

                                            <a href="{{ url('/images/brochure/large/'.$proposal->brochure_pdf) }}" target="_blank" style="margin-top: 1em !important;"><img src="{{ url('/images/pdf.png') }}" width="20"> Brochure</a>
                                        </div>
                                    </div>
                                    <!-- /. PDF Brochure -->

                                    <div class="form-group row">
                                        <div class="col-lg-6 m-auto">
                                            <button class="btn btn-warning" type="reset" id="clear">
                                                <i class="fa fa-refresh"></i>
                                                Reset
                                            </button>
                                            <button class="btn btn-primary pull-right" type="submit">
                                                Update Project
                                            </button>
                                        </div>
                                    </div>
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