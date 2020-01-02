@extends('layouts.panel.design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Pages
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
                    <div class="card-header">Pages</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/pages/create') }}" class="btn btn-success btn-sm" title="Add New Page">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/pages') }}" accept-charset="UTF-8"
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
                                        <th>Name</th>
                                        <th>Page Type</th>
                                        <th>Content</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pages as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->featured_image }}</td>
                                        <td><a href="{{ url('/'.$item->slug) }}" target="_blank">{{ $item->name }}</a></td>
                                        <td>@if($item->page_type == 1) <label
                                                class="badge badge-success badge-lg">Standard</label>@elseif($item->page_type
                                            == 2) <label class="badge badge-info badge-lg">Contact</label> @endif</td>
                                        <td>{!! str_limit(strip_tags($item->content), $limit=100) !!}</td>
                                        <td>
                                            <a href="{{ url('/admin/pages/' . $item->id) }}" title="View Page"><button
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                        aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/admin/pages/' . $item->id . '/edit') }}"
                                                title="Edit Page"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button></a>

                                            <form method="POST" action="{{ url('/admin/pages' . '/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Page"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $pages->appends(['search' =>
                                Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection