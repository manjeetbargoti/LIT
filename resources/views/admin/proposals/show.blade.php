@extends('layouts.panel.design')

@section('content')
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
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Project #{{ $proposals->id }} [{{ $proposals->project_name }}]</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/social-impact/proposals') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/social-impact/proposals/' . $proposals->id . '/edit') }}" title="Edit SDG"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST" action="{{ url('admin/social-impact/proposals' . '/' . $proposals->id) }}" accept-charset="UTF-8"
                            style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete SDG"
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
                                        <td>{{ $proposals->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Project Name </th>
                                        <td> {{ $proposals->project_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Project Description </th>
                                        <td> {!! $proposals->project_description !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Project Status </th>
                                        <td> @if($proposals->status == 1) <a class="btn btn-sm btn-success text-white" href="{{ url('/admin/proposal/'.$proposals->id.'/disable') }}">Enable</a> @else <a class="btn btn-sm btn-danger text-white" href="{{ url('/admin/proposal/'.$proposals->id.'/enable') }}">Disable</a> @endif </td>
                                    </tr>
                                    <tr>
                                        <th> Organization </th>
                                        <td> {!! $proposals->business_id !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Organization Background </th>
                                        <td> {!! $proposals->company_background !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Name </th>
                                        <td> {!! $proposals->contact_person_name !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Email </th>
                                        <td> {!! $proposals->email !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Phone </th>
                                        <td> {!! $proposals->phone !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Fax </th>
                                        <td> {!! $proposals->fax_number !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Project Goals </th>
                                        <td> {!! $proposals->project_goals !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Submission Date </th>
                                        <td> {!! $proposals->submission_time !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Project Timeline </th>
                                        <td> {!! $proposals->project_timeline !!} {!! $proposals->time_period !!}</td>
                                    </tr>
                                    <tr>
                                        <th> Proposal Elements </th>
                                        <td> {!! $proposals->proposal_elements !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Evolution Criteria </th>
                                        <td> {!! $proposals->evolution_criteria !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Possible Challanges </th>
                                        <td> {!! $proposals->possible_challanges !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Budget </th>
                                        <td> {!! $proposals->budget !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Social Impact Points </th>
                                        <td> {!! $proposals->social_impact_points !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Country </th>
                                        <td> {!! $proposals->country !!} </td>
                                    </tr>
                                    <tr>
                                        <th> State </th>
                                        <td> {!! $proposals->state !!} </td>
                                    </tr>
                                    <tr>
                                        <th> City </th>
                                        <td> {!! $proposals->city !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Add By </th>
                                        <td> @foreach(App\User::where('id', $proposals->user_id)->get() as $addBy) {{ $addBy->first_name }} {{ $addBy->last_name }} @endforeach </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection