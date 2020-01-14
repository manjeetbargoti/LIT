@extends('layouts.panel.design')

@section('content')
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
            <!-- User Basic Details -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">User #{{ $user->id }} [{{ $user->first_name }} {{ $user->last_name }}]</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/users/' . $user->id . '/edit') }}"
                            title="Edit user"><button class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/users' . '/' . $user->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete user"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $user->title }} {{ $user->first_name }} {{ $user->last_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Email </th>
                                        <td> {{ $user->email }} </td>
                                    </tr>
                                    <tr>
                                        <th> Phone </th>
                                        <td> {{ $user->phone }} </td>
                                    </tr>
                                    <tr>
                                        <th> Role </th>
                                        <td> <button class="btn btn-success btn-sm">{{ implode(', ', $user->getRoleNames()->toArray()) }}</button> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /. User Basic Details -->

            <!-- User Business Profile -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Business @if(!empty($business->id))#{{ $business->id }} [{{ $business->business_name }}] @endif</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <form method="POST" action="{{ url('admin/users' . '/' . $user->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <!-- <button type="submit" class="btn btn-danger btn-sm" title="Delete user"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button> -->
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th> Business Name </th>
                                        <td>@if(!empty($business->business_name)) {{ $business->business_name }} @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Priority SDG's </th>
                                        <td>@if(!empty($business->priority_sdg)) {{ $business->priority_sdg }} @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Name </th>
                                        <td>@if(!empty($business->contact_person_name)) {{ $business->contact_person_name }} @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Email </th>
                                        <td>@if(!empty($business->email)) {{ $business->email }} @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Phone </th>
                                        <td>@if(!empty($business->phone)) {{ $business->phone }} @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Trade License Number </th>
                                        <td>@if(!empty($business->trade_license_number)) {{ $business->trade_license_number }} @endif</td>
                                    </tr>
                                    <tr>
                                        <th> License Expiry Date </th>
                                        <td>@if(!empty($business->license_expiry_date)) {{ $business->license_expiry_date }} @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Trade License Image </th>
                                        <td>@if(!empty($business->trade_license_image)) <img src="{{ url('/images/tradeLicense/large/'.$business->trade_license_image) }}" alt=""> @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Country </th>
                                        <td>@if(!empty($business->country)) {{ $business->country }} @endif</td>
                                    </tr>
                                    <tr>
                                        <th> State </th>
                                        <td>@if(!empty($business->state)) {{ $business->state }} @endif</td>
                                    </tr>
                                    <tr>
                                        <th> City </th>
                                        <td>@if(!empty($business->city)) {{ $business->city }} @endif</td>
                                    </tr>
                                    <tr>
                                        <th> Alternate Contact 1 </th>
                                        <td> 
                                            <ul>
                                                <li><strong>Name:</strong>@if(!empty($business->alternate_contact_name_1)) {{ $business->alternate_contact_name_1 }} @endif</li>
                                                <li><strong>Email:</strong>@if(!empty($business->alternate_contact_email_1)) {{ $business->alternate_contact_email_1 }} @endif</li>
                                                <li><strong>Job:</strong>@if(!empty($business->alternate_contact_job_1)) {{ $business->alternate_contact_job_1 }} @endif</li>
                                                <li><strong>Company:</strong>@if(!empty($business->alternate_contact_company_1)) {{ $business->alternate_contact_company_1 }} @endif</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Alternate Contact 2 </th>
                                        <td> 
                                            <ul>
                                                <li><strong>Name:</strong>@if(!empty($business->alternate_contact_name_2)) {{ $business->alternate_contact_name_2 }} @endif</li>
                                                <li><strong>Email:</strong>@if(!empty($business->alternate_contact_email_2)) {{ $business->alternate_contact_email_2 }} @endif</li>
                                                <li><strong>Job:</strong>@if(!empty($business->alternate_contact_job_2)) {{ $business->alternate_contact_job_2 }} @endif</li>
                                                <li><strong>Company:</strong>@if(!empty($business->alternate_contact_company_2)) {{ $business->alternate_contact_company_2 }} @endif</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <th> City </th>
                                        <td>@if(!empty($business->city)) {{ $business->city }} @endif</td>
                                    </tr> -->
                                    <tr>
                                        <th> Business Description </th>
                                        <td>@if(!empty($business->business_description)) {{ $business->business_description }} @endif</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /. User Business profile -->
        </div>
    </div>
</div>
@endsection