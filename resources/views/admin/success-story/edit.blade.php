@extends('layouts.panel.design')

@section('content')

<style>
    .fileinput-upload-button {
        display: none;
    }
</style>

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
                    <div class="card-header">Edit Story [#{{ $successStory->id }}]</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/success-stories') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/success-stories/'.$successStory->id) }}" accept-charset="UTF-8"
                            class="form-horizontal login_validator" id="form_inline_validator"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group row">
                                <div class="col-sm-12 {{ $errors->has('title') ? 'has-error' : ''}}">
                                    <label for="title" class="control-label">{{ 'Story Title' }}</label>
                                    <input class="form-control" name="title" type="text" id="StoryTitle"
                                        value="{{ $successStory->title }}" required>
                                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-sm-12 {{ $errors->has('slug') ? 'has-error' : ''}} d-none">
                                    <label for="slug" class="control-label">{{ 'Slug' }}</label>
                                    <input class="form-control" name="slug" type="text" id="StorySlug"
                                        value="{{ $successStory->slug }}" required>
                                    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 {{ $errors->has('content') ? 'has-error' : ''}}">
                                    <label for="Short Description" class="control-label">{{ 'Short Description' }}</label>
                                    <textarea class="form-control" rows="2" name="short_content" maxlength="150" type="textarea" id="shortContent"
                                        required>{{ $successStory->short_content }}</textarea>
                                    {!! $errors->first('short_content', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 {{ $errors->has('content') ? 'has-error' : ''}}">
                                    <label for="content" class="control-label">{{ 'Description' }}</label>
                                    <textarea class="form-control my-editor" rows="5" name="content" type="textarea" id="content"
                                        required>{{ $successStory->content }}</textarea>
                                    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <div class="col-sm-4 {{ $errors->has('meta_title') ? 'has-error' : ''}}">
                                    <label for="Meta Title" class="control-label">{{ 'Meta Title' }}</label>
                                    <input class="form-control" name="meta_title" type="text" id="MetaTitle"
                                        value="{{ $successStory->meta_title }}">
                                    {!! $errors->first('meta_title', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-sm-4 {{ $errors->has('meta_keywords') ? 'has-error' : ''}}">
                                    <label for="Meta Keywords" class="control-label">{{ 'Meta Keywords' }}</label>
                                    <input class="form-control" name="meta_keywords" type="text" id="MetaKeywords"
                                        value="{{ $successStory->meta_keywords }}">
                                    {!! $errors->first('meta_keywords', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-sm-4 {{ $errors->has('canonical_url') ? 'has-error' : ''}}">
                                    <label for="Canonical Url" class="control-label">{{ 'Canonical Url' }}</label>
                                    <input class="form-control" name="canonical_url" type="text" id="canonical_url"
                                        value="{{ $successStory->canonical_url }}">
                                    {!! $errors->first('canonical_url', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="Meta Description" class="control-label">{{ 'Meta Description' }}</label>
                                    <textarea name="meta_description" class="form-control" id="MetaDescription"
                                        cols="30"
                                        rows="2">{{ $successStory->meta_description }}</textarea>
                                    {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="Feature Image" class="control-label">{{ 'Feature Image' }}</label>
                                    <input id="input-21" type="file" accept="image/*" name="feature_image" class="form-control file-loading" value="{{ $successStory->feature_image }}">
                                    {!! $errors->first('feature_image', '<p class="help-block">:message</p>') !!}
                                </div>

                                <div class="col-sm-6">
                                	<img src="{{ asset('/images/successStory/large/'.$successStory->feature_image) }}" width="300" alt="{{ $successStory->title }}">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input class="btn btn-warning pull-left" type="reset" value="Reset">
                                <input class="btn btn-primary pull-right" type="submit" value="Update Story">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection