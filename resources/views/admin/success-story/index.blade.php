@extends('layouts.panel.design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Success Stories
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
                    <div class="card-header">Success Stories</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/success-stories/create') }}" class="btn btn-success btn-sm" title="Add Story">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/success-stories') }}" accept-charset="UTF-8"
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($successStory as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>@if(!empty($item->feature_image)) <img width="90" class="img-responsive" src="{{ asset('/images/successStory/large/'.$item->feature_image) }}" alt="{{ $item->title }}"> @endif</td>
                                        <td><a href="{{ url('/success-story/'.$item->slug) }}" target="_blank">{{ $item->title }}</a></td>
                                        <td>@if($item->status == 1) <a class="btn btn-sm btn-success text-white" href="{{ url('/admin/success-story/'.$item->id.'/disable') }}">Enable</a> @else <a class="btn btn-sm btn-danger text-white" href="{{ url('/admin/success-story/'.$item->id.'/enable') }}">Disable</a> @endif</td>
                                        <td>
                                            <a href="{{ url('/admin/success-stories/' . $item->id) }}" title="View Page"><button
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                        aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/admin/success-stories/' . $item->id . '/edit') }}"
                                                title="Edit Page"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button></a>

                                            <form method="POST" action="{{ url('/admin/success-stories' . '/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Page"
                                                    onclick="return confirm('Confirm delete')"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $successStory->appends(['search' =>
                                Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection