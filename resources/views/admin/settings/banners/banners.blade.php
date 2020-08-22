@extends('layouts.panel.design')
@section('content')

<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Settings
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
                    <div class="card-header">Banners</div>
                    <div class="card-body">
                        <a href="{{ url('admin/banner/add') }}" class="btn btn-success btn-sm" title="Add New Page">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Small Test</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($banners as $bn)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img width="200" src="{{ url('/images/banners/'.$bn->image) }}" alt=""></td>
                                        <td><a href="{{ url('/images/banners/'.$bn->image) }}">{{ $bn->title}}</a></td>
                                        <td>{{ $bn->small_text }}</td>
                                        <td>@if($bn->status == 1)
                                            <a href="/admin/banner/{{ $bn->id }}/disable" title="Disable"
                                                class="badge badge-success badge-sm">Enable</a>
                                            @else
                                            <a href="/admin/banner/{{ $bn->id }}/enable" title="Enable"
                                                class="badge badge-danger badge-sm">Disable</a>
                                            @endif</td>
                                        <td><a href="{{ url('/admin/banner/'.$bn->id.'/edit') }}" title="Edit"
                                                class="badge badge-warning badge-sm"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('/admin/banner/'.$bn->id.'/delete') }}" title="Delete"
                                                class="badge badge-danger badge-sm"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    @endforeach
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