@extends('layouts.front.design')
@section('content')

<div id="litsliderstory" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> {{ $data->project_name }} </h3>
        </div>
    </div>
</div>

<!-- contactus Box -->
<section id="program">
    <div class="container">
        <!-- Project Details -->
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="row m-auto">
                    <div class="col-md-12 col-lg-12 text-center mb-5">
                        <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                        <h3> Project Detail </h3>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Project Name</th>
                            <td>{{ $data->project_name }}</td>
                        </tr>
                        <tr>
                            <th>Project Description</th>
                            <td>{{ $data->project_description }}</td>
                        </tr>
                        <tr>
                            <th>Submission Date</th>
                            <td>{{ date('l, j F Y', strtotime($data->submission_time)) }}</td>
                        </tr>
                        <tr>
                            <th>Project Timeline</th>
                            <td>{{ $data->project_timeline }} {{ $data->time_period }}</td>
                        </tr>
                        <tr>
                            <th>Project Goals</th>
                            <td>{{ $data->project_goals }}</td>
                        </tr>
                        <tr>
                            <th>Proposal Elements</th>
                            <td>{{ $data->proposal_elements }}</td>
                        </tr>
                        <tr>
                            <th>Evolution Criteria</th>
                            <td>{{ $data->evolution_criteria }}</td>
                        </tr>
                        <tr>
                            <th>Possible Challanges</th>
                            <td>{{ $data->possible_challanges }}</td>
                        </tr>
                        <tr>
                            <th>Project Budget</th>
                            <td>$ {{ $data->budget }}</td>
                        </tr>
                        <tr>
                            <th>Social Impact Points</th>
                            <td>{{ $data->social_impact_points }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $data->city }}, {{ $data->state }}, {{ $data->country }}</td>
                        </tr>
                        <tr>
                            <th>Contact Person Name</th>
                            <td>{{ $data->contact_person_name }}</td>
                        </tr>
                        <tr>
                            <th>Proposal Brochure</th>
                            <td><a href="{{ url('/images/brochure/large/'.$data->brochure_pdf) }}"><img src="{{ asset('/images/pdf.png') }}" width="50"></a></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="m-auto">
                                <p style="text-align: center; margin: auto;"><a href="#" data-toggle="modal"
                                        data-target="#submitProposal-{{ $data->id }}"
                                        class="btn btn-primary text-uppercase">Submit Proposal</a></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Business Details -->
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="row m-auto">
                    <div class="col-md-12 col-lg-12 text-center mb-5">
                        <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                        <h3> Organization Detail </h3>
                    </div>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Organization Name</th>
                            <td>{{ $bData->business_name }}</td>
                        </tr>
                        <tr>
                            <th>Organization Background</th>
                            <td>{{ $data->company_background }}</td>
                        </tr>
                        <tr>
                            <th>Priority SDG</th>
                            <td>{{ $bData->priority_sdg }}</td>
                        </tr>
                        <tr>
                            <th>Trade License Number</th>
                            <td>{{ $bData->trade_license_number }}</td>
                        </tr>
                        <tr>
                            <th>License Expiry Date</th>
                            <td>{{ date('l, j F Y', strtotime($bData->license_expiry_date)) }}</td>
                        </tr>
                        <tr>
                            <th>Contact Person Name</th>
                            <td>{{ $bData->contact_person_name }}</td>
                        </tr>
                        <tr>
                            <th>Location</th>
                            <td>{{ $bData->city }}, {{ $bData->state }}, {{ $bData->country }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Model -->
<div class="modal fade" id="submitProposal-{{ $data->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $data->project_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/csr-market/submit-proposal') }}" method="Post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="position" class="form-control" placeholder="Position" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="organization" class="form-control" placeholder="Organization" required>
                    </div>
                    <div class="form-group d-none">
                        <input type="text" name="proposal_id" class="form-control" value="{{ $data->id }}">
                    </div>
                    <div class="form-group">
                        <label>Attach a file</label>
                        <input type="file" name="proposal_pdf" class="form-control" accept=".pdf,.doc,.docx">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer"> -->
            <!-- <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button> -->
            <!-- <input type="submit" class="btn btn-primary" value="Submit"> -->
            <!-- </div> -->
        </div>
    </div>
</div>



@endsection