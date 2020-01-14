@extends('layouts.panel.design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Social Goals (SDG's)
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header">SDG #{{ $sdg->id }} [{{ $sdg->sdg_name }}]</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/sdgs') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/sdgs/' . $sdg->id . '/edit') }}" title="Edit SDG"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST" action="{{ url('admin/sdgs' . '/' . $sdg->id) }}" accept-charset="UTF-8"
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
                                        <td>{{ $sdg->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $sdg->sdg_name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td> {!! $sdg->sdg_description !!} </td>
                                    </tr>
                                    <tr>
                                        <th> Status </th>
                                        <td> @if($sdg->status == 1) <a class="btn btn-sm btn-success text-white" href="{{ url('/admin/sdgs/'.$sdg->id.'/disable') }}">Enable</a> @else <a class="btn btn-sm btn-danger text-white" href="{{ url('/admin/sdgs/'.$sdg->id.'/enable') }}">Disable</a> @endif </td>
                                    </tr>
                                    <tr>
                                        <th> Add By </th>
                                        <td> @foreach(App\User::where('id', $sdg->add_by)->get() as $addBy) {{ $addBy->first_name }} {{ $addBy->last_name }} @endforeach </td>
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