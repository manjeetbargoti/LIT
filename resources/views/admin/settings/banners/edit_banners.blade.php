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
                    <div class="card-header">Update Banner</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/banner') }}" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form role="form" enctype="multipart/form-data" name="add_banner" id="add_banner" method="POST"
                        action="{{ url('/admin/banner/'.$banners->id.'/edit') }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative Name"
                                        class="col-form-label">{{ __('Banner Image *') }}
                                        <p class="small text-info">(Image size: 1600 x 745)</p>
                                    </label> 
                                </div>
                                <div class="col-xl-10 {{ $errors->has('initiative_name') ? 'has-error' : ''}}">
                                <input type="hidden" name="current_image" multiple id="image" value="{{ $banners->image }}" >
                                <input type="file" name="banner_image" id="banner_image" class="form-control" accept="image/x-png,image/gif,image/jpeg" />
                                <p><img width="200" src="{{ url('/images/banners/'.$banners->image) }}" alt=""></p>    
                            </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative Description"
                                        class="col-form-label">{{ __('Title Text *') }}
                                        <p class="small text-info">(Max 50 words)</p>
                                    </label>
                                </div>
                                <div class="col-xl-10 {{ $errors->has('title') ? 'has-error' : ''}}">
                                    <input type="text" name="title" id="bannerTitle" maxlength="50" class="form-control" value="{{ $banners->title }}">
                                    {!! $errors->first('title', '<p class="help-block">:message</p>')
                                    !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative Description"
                                        class="col-form-label">{{ __('Small Text *') }}
                                        <p class="small text-info">(Max 50 words)</p>
                                    </label>
                                </div>
                                <div class="col-xl-10 {{ $errors->has('small_text') ? 'has-error' : ''}}">
                                    <input type="text" name="small_text" id="smallText" maxlength="50" class="form-control" value="{{ $banners->small_text }}">
                                    {!! $errors->first('small_text', '<p class="help-block">:message</p>')
                                    !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xl-10 m-auto">
                                    <input class="btn btn-danger pull-left" type="reset" value="Reset Details">
                                    <input class="btn btn-success pull-right" type="submit" value="Update Banner">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.content-wrapper -->

@endsection