@extends('layouts.panel.design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    360 Digital Marketing Services
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
                    <div class="card-header">Digital Services</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/social-impact/digital-service/create') }}" class="btn btn-success btn-sm" title="Add New Page">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/social-impact/digital-service') }}" accept-charset="UTF-8"
                            class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..."
                                    value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Service Name</th>
                                        <th>No. of Beneficiary</th>
                                        <th>Duration</th>
                                        <th>Budget</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($instaCamp as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>@if(!empty($item->feature_image))<img src="{{ url('/images/initiative/large/'.$item->feature_image) }}" width="60">@else <img src="{{ url('/images/logo/'.config('app.logo')) }}" width="60"> @endif</td>
                                        <td><a href="{{ url('/digital-service/'.$item->slug) }}" target="_blank">{{ $item->service_name }}</a>
                                        </td>
                                        <td>{{ $item->beneficiaries }}</td>
                                        <td>{{ $item->duration }} months</td>
                                        <td>USD {{ $item->budget }}</td>
                                        <td>{{ $item->city }}, {{ $item->country }}</td>
                                        <td>@if($item->status == 1) <a class="btn btn-sm btn-success text-white" href="{{ url('/admin/digital-service/'.$item->id.'/disable') }}">Enable</a> @else <a class="btn btn-sm btn-danger text-white" href="{{ url('/admin/digital-service/'.$item->id.'/enable') }}">Disable</a> @endif</td>
                                        <td>
                                            <a href="{{ url('/admin/social-impact/digital-service/' . $item->id) }}" title="View Initiative"><button
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                        aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/admin/social-impact/digital-service/' . $item->id . '/edit') }}"
                                                title="Edit Initiative"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button></a>

                                            <form method="POST" action="{{ url('/admin/social-impact/digital-service' . '/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Initiative"
                                                    onclick="return confirm('Confirm delete?')"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $instaCamp->appends(['search' =>
                                Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection