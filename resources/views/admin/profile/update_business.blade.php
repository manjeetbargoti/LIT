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
                    Business Profile
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
                    <div class="card-header">Update Business Profile</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/profile') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <form class="form-horizontal login_validator" id="form_block_validator"
                            action="{{ url('/admin/profile/business/' . $businessData->id . '/update') }}" method="post" accept-charset="UTF-8"
                            enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-12">
                                    <!-- Business name -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Business Name" class="col-form-label">Business Name *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i
                                                        class="fa fa-building text-primary"></i>
                                                </span>
                                                <input type="text" name="business_name" id="business_name"
                                                    class="form-control" value="{{ $businessData->business_name }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Business name -->

                                    <!-- Business Description -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Business Description" class="col-form-label">Business
                                                Description *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <textarea name="business_description" id="business_description"
                                                class="form-control" value="{{ old('business_description') }}" rows="5"
                                                required>{{ $businessData->business_description }}</textarea>
                                        </div>
                                    </div>
                                    <!-- /. Business Description -->

                                    <!-- Priority SDG's -->
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Priority SDG's" class="col-form-label">Priority SDG's *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i
                                                        class="fa fa-chevron-down text-primary"></i>
                                                </span>
                                                <select name="priority_sdg[]" id="PrioritySDG" multiple class="form-control chzn-select"
                                                    value="{{ old('priority_sdg') }}" required data-placeholder="-- Select SDG --">
                                                    @foreach($sdg as $s)
                                                    <option value="{{ $s->sdg_name }}" @foreach($businessData->priority_sdg as $selectSDG) @if($s->sdg_name ==
                                                        $selectSDG) selected @endif @endforeach>{{ $s->sdg_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Priority SDG's -->

                                    <!-- COntact Person Name -->
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
                                                    class="form-control"
                                                    value="{{ $businessData->contact_person_name }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Contact Person Name -->

                                    <!-- Contact Person Email Address -->
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Email" class="col-form-label">Contact Person Email *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-envelope text-primary"></i></span>
                                                <input type="text" placeholder="Email Address" id="email" name="email"
                                                    class="form-control" value="{{ $businessData->email }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Contact Person Email Address -->

                                    <!-- Contact Person Phone Number -->
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="phone" class="col-form-label">Contact Person Phone
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-phone text-primary"></i></span>
                                                <input type="text" placeholder=" " id="phone" name="phone"
                                                    class="form-control" value="{{ $businessData->phone }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Contact Person Phone Number -->

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

                                    <!-- Trade License Number -->
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Trade License Number" class="col-form-label">Trade License
                                                Number
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-file text-primary"></i></span>
                                                <input type="text" placeholder=" " id="trade_license_number"
                                                    name="trade_license_number" class="form-control"
                                                    value="{{ $businessData->trade_license_number }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. Trade License Number -->

                                    <!-- Trade License Image -->
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Trade License Number" class="col-form-label">Trade License
                                                Image *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <input id="input-21" type="file" accept="image/*" name="trade_license_image"
                                                class="form-control file-loading"
                                                value="{{ old('trade_license_image') }}">
                                                <img src="{{ url('/images/tradeLicense/large/'.$businessData->trade_license_image) }}" class="img-responsive" width="250" alt="{{ $businessData->business_name }}">
                                        </div>
                                    </div>
                                    <!-- /. Trade License Image -->

                                    <!-- License Expiry Date -->
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="License Expiry
                                                Date" class="col-form-label">License Expiry
                                                Date *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-calendar text-primary"></i></span>
                                                <input type="text" class="form-control" placeholder="dd/mm/yyyy"
                                                    data-date-format="dd/mm/yyyy" id="dp2" name="license_expiry_date"
                                                    value="{{ $businessData->license_expiry_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. License Expiry Date -->

                                    <!-- Alternate Person 1 information -->
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Alternate Person 1 Details" class="col-form-label">Alternate
                                                Person 1 Details</label>
                                        </div>
                                        <div class="col-xl-3 col-lg-6">
                                            <input type="text" placeholder="Full name" id="alternate_contact_name_1"
                                                name="alternate_contact_name_1" class="form-control"
                                                value="{{ $businessData->alternate_contact_name_1 }}" required>
                                        </div>

                                        <div class="col-xl-3 col-lg-6">
                                            <input type="text" placeholder="Job Profile" id="alternate_contact_job_1"
                                                name="alternate_contact_job_1" class="form-control"
                                                value="{{ $businessData->alternate_contact_job_1 }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Alternate Person 1 Details" class="col-form-label"></label>
                                        </div>
                                        <div class="col-xl-3 col-lg-6">
                                            <input type="text" placeholder="Email address"
                                                id="alternate_contact_email_1" name="alternate_contact_email_1"
                                                class="form-control"
                                                value="{{ $businessData->alternate_contact_email_1 }}" required>
                                        </div>

                                        <div class="col-xl-3 col-lg-6">
                                            <input type="text" placeholder="Company name"
                                                id="alternate_contact_company_1" name="alternate_contact_company_1"
                                                class="form-control"
                                                value="{{ $businessData->alternate_contact_company_1 }}" required>
                                        </div>
                                    </div>
                                    <!-- /. Alternate Person 1 information -->

                                    <!-- Alternate Person 2 information -->
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Alternate Person 2 Details" class="col-form-label">Alternate
                                                Person 2 Details</label>
                                        </div>
                                        <div class="col-xl-3 col-lg-6">
                                            <input type="text" placeholder="Full name" id="alternate_contact_name_2"
                                                name="alternate_contact_name_2" class="form-control"
                                                value="{{ $businessData->alternate_contact_name_2 }}">
                                        </div>

                                        <div class="col-xl-3 col-lg-6">
                                            <input type="text" placeholder="Job Profile" id="alternate_contact_job_2"
                                                name="alternate_contact_job_2" class="form-control"
                                                value="{{ $businessData->alternate_contact_job_2 }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Alternate Person 2 Details" class="col-form-label"></label>
                                        </div>
                                        <div class="col-xl-3 col-lg-6">
                                            <input type="text" placeholder="Email address"
                                                id="alternate_contact_email_2" name="alternate_contact_email_2"
                                                class="form-control"
                                                value="{{ $businessData->alternate_contact_email_2 }}">
                                        </div>

                                        <div class="col-xl-3 col-lg-6">
                                            <input type="text" placeholder="Company name"
                                                id="alternate_contact_company_2" name="alternate_contact_company_2"
                                                class="form-control"
                                                value="{{ $businessData->alternate_contact_company_2 }}">
                                        </div>
                                    </div>
                                    <!-- /. Alternate Person 2 information -->
                                    <div class="form-group row">
                                        <div class="col-lg-6 m-auto">
                                            <button class="btn btn-warning" type="reset" id="clear">
                                                <i class="fa fa-refresh"></i>
                                                Reset
                                            </button>
                                            <button class="btn btn-primary pull-right" type="submit">
                                                <i class="fa fa-user"></i>
                                                Update
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