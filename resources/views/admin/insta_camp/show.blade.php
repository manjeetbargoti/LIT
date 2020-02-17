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
                    <div class="card-header">Digital Service {{ $instaCamp->id }} [{{ str_limit($instaCamp->service_name, $limit=100) }}]</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/social-impact/digital-service/') }}" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <a href="{{ url('/admin/social-impact/digital-service/' . $instaCamp->id . '/edit') }}"
                            title="Edit Initiative"><button class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST"
                            action="{{ url('admin/social-impact/digital-service' . '/' . $instaCamp->id) }}"
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
                                        <td>{{ $instaCamp->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> <a class="text-primary"
                                                href="{{ url('/digital-service/'.$instaCamp->slug) }}" target="_blank">{{ $instaCamp->service_name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Impact SDG </th>
                                        <td class="text-success"> {{ $instaCamp->area_impact_sdg }} </td>
                                    </tr>
                                    <tr>
                                        <th> Beneficiaries </th>
                                        <td> {{ $instaCamp->beneficiaries }} </td>
                                    </tr>
                                    <tr>
                                        <th> Duration </th>
                                        <td> {{ $instaCamp->duration }} months </td>
                                    </tr>
                                    <tr>
                                        <th> Budget </th>
                                        <td> USD {{ $instaCamp->budget }} </td>
                                    </tr>
                                    <tr>
                                        <th> Address </th>
                                        <td> {{ $instaCamp->street }}, {{ $instaCamp->region }} </td>
                                    </tr>
                                    <tr>
                                        <th> Location </th>
                                        <td> {{ $instaCamp->city }}, {{ $instaCamp->state }}, {{ $instaCamp->country }} </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td> {!! strip_tags($instaCamp->service_description) !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Add by </th>
                                        <td> {{ $userData->first_name }} {{ $userData->last_name }} <span class="text-success">[@foreach($userRole as $role){{ $role }}@endforeach]</span> </td>
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