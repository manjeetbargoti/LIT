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
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Success Story {{ $successStory->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/success-stories') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/success-stories/' . $successStory->id . '/edit') }}" title="Edit Story"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST" action="{{ url('admin/success-stories' . '/' . $successStory->id) }}" accept-charset="UTF-8"
                            style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Story"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $successStory->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $successStory->title }} </td>
                                    </tr>
                                    <tr>
                                        <th> Content </th>
                                        <td> {{ $successStory->status }} </td>
                                    </tr>
                                    <tr>
                                        <th> URL </th>
                                        <td> @if($successStory->status == 1) <a class="btn btn-sm btn-success text-white" href="{{ url('/admin/success-story/'.$successStory->id.'/disable') }}">Enable</a> @else <a class="btn btn-sm btn-danger text-white" href="{{ url('/admin/success-story/'.$successStory->id.'/enable') }}">Disable</a> @endif </td>
                                    </tr>
                                    <tr>
                                        <th> Content </th>
                                        <td> {!! strip_tags($successStory->content) !!} </td>
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