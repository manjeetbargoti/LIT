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
</style>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Profile
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
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/profile') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <form class="form-horizontal login_validator" id="tryitForm"
                            action="{{ url('/admin/profile/'.$user->id.'/edit') }}" method="post" accept-charset="UTF-8"
                            enctype="multipart/form-data">

                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-center text-lg-right">
                                            <label class="col-form-label">Profile Pic</label>
                                        </div>
                                        <div class="col-lg-6 text-center text-lg-left">
                                            <p>@if(!empty($user->avatar))<img
                                                    src="{{ url('/images/user/large/'.$user->avatar) }}"
                                                    alt="{{ $user->first_name }} {{ $user->last_name }}"
                                                    width="100">@endif</p>
                                            <div class="add_image">
                                                <input type="button" id="add_more" class="btn btn-info"
                                                    value="Add image" />
                                                <input type="text" id="CurrentImage" name="current_image"
                                                    value="{{ $user->image }}" class="d-none" />
                                                <!-- <i class="fas fa-camera"></i> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="user title" class="col-form-label">Title *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <select name="title" id="UserTitle" class="form-control">
                                                    <option value="Mr." @if($user->title == 'Mr.') selected @endif>Mr.
                                                    </option>
                                                    <option value="Ms." @if($user->title == 'Ms.') selected @endif>Ms.
                                                    </option>
                                                    <option value="Mrs." @if($user->title == 'Mrs.') selected
                                                        @endif>Mrs.</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="username" class="col-form-label">Username *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <input readonly type="text" name="username" id="username"
                                                    class="form-control" value="{{ $user->username }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="First Name" class="col-form-label">First Name *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <input type="text" name="first_name" id="first_name"
                                                    class="form-control" value="{{ $user->first_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Last Name" class="col-form-label">Last Name *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <input type="text" name="last_name" id="last_name" class="form-control"
                                                    value="{{ $user->last_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Email" class="col-form-label">Email *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-envelope text-primary"></i></span>
                                                <input type="text" placeholder="Email Address" id="email" name="email"
                                                    class="form-control" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="phone" class="col-form-label">Phone
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-phone text-primary"></i></span>
                                                <input type="text" placeholder=" " id="phone" name="phone"
                                                    class="form-control" value="{{ $user->phone }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Bio" class="col-form-label">Bio
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-file-o text-primary"></i></span>
                                                <textarea placeholder=" " rows="2" id="bio" name="bio"
                                                    class="form-control">{{ $user->bio }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    @hasrole('Activist')
                                    <div class="social-activist" id="SocialActivistTab">
                                        <div class="form-group row">
                                            <div class="col-lg-3 text-lg-right">
                                                <label for="Company / Individual with an idea?"
                                                    class="col-form-label">Company / Individual with an idea?
                                                    *</label>
                                            </div>
                                            <div class="col-xl-6 col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-globe text-primary"></i></span>
                                                    <select id="StartupType" name="startup_type" class="form-control"
                                                        value="{{ $user->startup_type }}" required>
                                                        <option value="">Select Type</option>
                                                        <option value="Individual" @if($user->startup_type == 'Individual') selected @endif>Individual</option>
                                                        <option value="Company" @if($user->startup_type == 'Company') selected @endif>Company</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="company_info d-none" id="CompanyInfo">
                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="Are you registered? " class="col-form-label">Are you
                                                        registered?
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-globe text-primary"></i></span>
                                                        <select id="CompanyRegister" name="company_register"
                                                            class="form-control" value="{{ $user->company_register }}"
                                                            >
                                                            <option value="">Select Registration Status</option>
                                                            <option value="Yes" @if($user->company_register == 'Yes') selected @endif>Yes</option>
                                                            <option value="No" @if($user->company_register == 'No') selected @endif>No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="How long have you been in the market? "
                                                        class="col-form-label">How long have you been in the market?
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-globe text-primary"></i></span>
                                                        <select id="InMarketTime" name="in_market" class="form-control"
                                                            value="{{ $user->in_market }}" >
                                                            <option value="">Select time in market</option>
                                                            <option value="0-1" @if($user->in_market == '0-1') selected @endif>0-1 year</option>
                                                            <option value="1-2" @if($user->in_market == '1-2') selected @endif>1-2 year</option>
                                                            <option value="2-5" @if($user->in_market == '2-5') selected @endif>2-5 year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Trade License Image -->
                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="Trade License Number" class="col-form-label">Upload
                                                        Trade License *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <input id="input-21" type="file" accept="image/*"
                                                        name="trade_license_image" class="form-control file-loading"
                                                        value="{{ old('trade_license_image') }}">
                                                        <img src="{{ url('/images/tradeLicense/large/'.$user->trade_license_image) }}" class="img-responsive" width="250" alt="{{ $user->project_title }}">
                                                </div>
                                            </div>
                                            <!-- /. Trade License Image -->
                                        </div>

                                        <!-- Project Description -->
                                        <div class="project_info" id="ProjectInfo">
                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="Social Project Title" class="col-form-label">Social
                                                        Project Title
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-file text-primary"></i></span>
                                                        <input type="text" placeholder=" " id="project_title"
                                                            name="project_title" class="form-control"
                                                            value="{{ $user->project_title }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="Social Project Description"
                                                        class="col-form-label">Social Project Description
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <textarea placeholder="max 200 words" rows="2" id="project_description" name="project_description"
                                                        class="form-control" maxlength="200">{{ $user->project_description }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="Project Stage"
                                                        class="col-form-label">Project Stage
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-globe text-primary"></i></span>
                                                        <select id="ProjectStage" name="project_stage" class="form-control"
                                                            value="{{ $user->project_stage }}" required>
                                                            <option value="">Select project stage</option>
                                                            <option value="Ideation" @if($user->project_stage == 'Ideation') selected @endif>Ideation</option>
                                                            <option value="Prototype" @if($user->project_stage == 'Prototype') selected @endif>Prototype</option>
                                                            <option value="Testing" @if($user->project_stage == 'Testing') selected @endif>Testing</option>
                                                            <option value="Launch" @if($user->project_stage == 'Launch') selected @endif>Launch</option>
                                                            <option value="Already in the Market" @if($user->project_stage == 'Already in the Market') selected @endif>Already in the Market</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="Required Fund" class="col-form-label">Required Fund
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-dollar text-primary"></i></span>
                                                        <input type="text" placeholder=" " id="fund_required"
                                                            name="fund_required" class="form-control"
                                                            value="{{ $user->fund_required }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="Number of Beneficiaries" class="col-form-label">Number of Beneficiaries
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-users text-primary"></i></span>
                                                        <input type="text" placeholder=" " id="Beneficiaries"
                                                            name="beneficiaries" class="form-control"
                                                            value="{{ $user->beneficiaries }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="SDG"
                                                        class="col-form-label">SDG
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-globe text-primary"></i></span>
                                                        <select id="SDGs" name="project_sdg" class="form-control"
                                                            value="{{ $user->project_sdg }}" required>
                                                            <option value="">Select SDG</option>
                                                            @foreach($sdgs as $sdg)
                                                            <option value="{{ $sdg->sdg_name }}" @if($user->project_sdg == $sdg->sdg_name) selected @endif>{{ $sdg->sdg_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- What problem are you solving? -->
                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="What problem are you solving?"
                                                        class="col-form-label">What problem are you solving?
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <textarea placeholder="max 200 words" rows="2" id="problem_solving" name="problem_solving"
                                                        class="form-control" maxlength="200">{{ $user->problem_solving }}</textarea>
                                                </div>
                                            </div>
                                            <!-- /. What problem are you solving? -->

                                            <!-- Describe the Solution -->
                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="Describe the Solution"
                                                        class="col-form-label">Describe the Solution
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <textarea placeholder="max 200 words" rows="2" id="solution" name="solution"
                                                        class="form-control" maxlength="200">{{ $user->solution }}</textarea>
                                                </div>
                                            </div>
                                            <!-- /. Describe the Solution -->

                                            <!-- Describe the scalability of this project -->
                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="Describe the scalability of this project"
                                                        class="col-form-label">Describe the scalability of this project
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <textarea placeholder="max 200 words" rows="2" id="scalability" name="scalability"
                                                        class="form-control" maxlength="200">{{ $user->scalability }}</textarea>
                                                </div>
                                            </div>
                                            <!-- /. Describe the scalability of this project -->

                                            <!-- Describe the project's relevance to the SDG's -->
                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="Describe the project's relevance to the SDG's"
                                                        class="col-form-label">Describe the project's relevance to the SDG's
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <textarea placeholder="max 200 words" rows="2" id="relevance_sdg" name="relevance_sdg"
                                                        class="form-control" maxlength="200">{{ $user->relevance_sdg }}</textarea>
                                                </div>
                                            </div>
                                            <!-- /. Describe the project's relevance to the SDG's -->

                                            <!-- Describe the project's relevance to National Agenda -->
                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="Describe the project's relevance to National Agenda"
                                                        class="col-form-label">Describe the project's relevance to National Agenda
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <textarea placeholder="max 200 words" rows="2" id="relevance_agenda" name="relevance_agenda"
                                                        class="form-control" maxlength="200">{{ $user->relevance_agenda }}</textarea>
                                                </div>
                                            </div>
                                            <!-- /. Describe the project's relevance to National Agenda -->

                                            <!-- How innovative is the project? -->
                                            <div class="form-group row">
                                                <div class="col-lg-3 text-lg-right">
                                                    <label for="How innovative is the project?"
                                                        class="col-form-label">How innovative is the project?
                                                        *</label>
                                                </div>
                                                <div class="col-xl-6 col-lg-8">
                                                    <textarea placeholder="max 200 words" rows="2" id="innovative" name="innovative"
                                                        class="form-control" maxlength="200">{{ $user->innovative }}</textarea>
                                                </div>
                                            </div>
                                            <!-- /. How innovative is the project? -->
                                        </div>
                                        <!-- /. Project Description -->
                                    </div>
                                    @endhasrole

                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Country" class="col-form-label">Country
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-globe text-primary"></i></span>
                                                <select id="country" name="country" class="form-control"
                                                    value="{{ $user->country }}">
                                                    @if(!empty($country_dropdown))
                                                    <?php echo $country_dropdown; ?>
                                                    @else
                                                    <option value="">Select Country</option>
                                                    @foreach($country as $ctry)
                                                    <option value="{{ $ctry->name }}">{{ $ctry->name }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="State" class="col-form-label">State
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-globe text-primary"></i></span>
                                                <select id="state" name="state" class="form-control"
                                                    value="{{ $user->state }}">
                                                    @if(!empty($state_dropdown))
                                                    <?php echo $state_dropdown; ?>
                                                    @else
                                                    <option value="">Select State</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="City" class="col-form-label">City
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-globe text-primary"></i></span>
                                                <select id="city" name="city" class="form-control"
                                                    value="{{ $user->city }}">
                                                    @if(!empty($city_dropdown))
                                                    <?php echo $city_dropdown; ?>
                                                    @else
                                                    <option value="">Select City</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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