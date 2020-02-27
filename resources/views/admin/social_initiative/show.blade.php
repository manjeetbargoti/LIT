@extends('layouts.panel.design')

@section('content')
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
            <div class="col-md-9 m-auto">
                <div class="card">
                    <div class="card-header">Initiative {{ $socialInitiative->id }} [{{ str_limit($socialInitiative->initiative_name, $limit=100) }}]</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/social-impact/initiatives/') }}" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <a href="{{ url('/admin/social-impact/initiatives/' . $socialInitiative->id . '/edit') }}"
                            title="Edit Initiative"><button class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST"
                            action="{{ url('admin/social-impact/initiatives' . '/' . $socialInitiative->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Initiative"
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
                                        <td>{{ $socialInitiative->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> <a class="text-primary"
                                                href="{{ url('/social-initiative/'.$socialInitiative->slug) }}" target="_blank">{{ $socialInitiative->initiative_name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Impact SDG </th>
                                        <td class="text-success"> {{ $socialInitiative->area_impact_sdg }} </td>
                                    </tr>
                                    <!-- <tr>
                                        <th> Beneficiaries </th>
                                        <td> {{ $socialInitiative->beneficiaries }} </td>
                                    </tr>
                                    <tr>
                                        <th> Out Reach </th>
                                        <td> {{ $socialInitiative->outreach }} </td>
                                    </tr>
                                    <tr>
                                        <th> Duration </th>
                                        <td> {{ $socialInitiative->duration }} {{ $socialInitiative->time_period }} </td>
                                    </tr> -->
                                    <tr>
                                        <th> Start Date </th>
                                        <td class="text-success"> {{ date('l, j F Y', strtotime($socialInitiative->start_date)) }} </td>
                                    </tr>
                                    <tr>
                                        <th> End Date </th>
                                        <td class="text-success"> {{ date('l, j F Y', strtotime($socialInitiative->end_date)) }} </td>
                                    </tr>
                                    <tr>
                                        <th> Address </th>
                                        <td> {{ $socialInitiative->street }}, {{ $socialInitiative->region }} </td>
                                    </tr>
                                    <tr>
                                        <th> Location </th>
                                        <td> {{ $socialInitiative->city }}, {{ $socialInitiative->state }}, {{ $socialInitiative->country }} </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td> {!! strip_tags($socialInitiative->initiative_description) !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Add by </th>
                                        <td> {{ $userData->first_name }} {{ $userData->last_name }} <span class="text-success">[@foreach($userRole as $role){{ $role }}@endforeach]</span> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            @foreach($multiBudgetData as $mbd)
                            <div class="col-12 col-sm-4 col-md-4 col-lg-4 mt-2">
                                <h4 class="text-danger">Budget {{ $loop->iteration }}</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th> Beneficiaries </th>
                                                <td> {{ $mbd->beneficiaries }} </td>
                                            </tr>
                                            <tr>
                                                <th> Budget </th>
                                                <td> USD {{ $mbd->budget }} </td>
                                            </tr>
                                            <tr>
                                                <th> Out Reach </th>
                                                <td> {{ $mbd->outreach }} </td>
                                            </tr>
                                            <tr>
                                                <th> Duration </th>
                                                <td> {{ $mbd->duration }} {{ $mbd->time_period }} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection