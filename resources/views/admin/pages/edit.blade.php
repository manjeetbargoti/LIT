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
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit Page >> {{ $page->name }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/pages') }}" title="Back"><button class="btn btn-warning btn-sm"><i
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

                        <form method="POST" action="{{ url('/admin/pages/' . $page->id) }}" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <div class="col-sm-6 {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <label for="name" class="control-label">{{ 'Name' }}</label>
                                    <input class="form-control" name="name" type="text" id="name"
                                        value="{{ isset($page->name) ? $page->name : ''}}" required>
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-sm-6 {{ $errors->has('slug') ? 'has-error' : ''}}">
                                    <label for="slug" class="control-label">{{ 'Slug' }}</label>
                                    <input class="form-control" name="slug" type="text" id="slug"
                                        value="{{ isset($page->slug) ? $page->slug : ''}}" required>
                                    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 {{ $errors->has('content') ? 'has-error' : ''}}">
                                    <label for="content" class="control-label">{{ 'Content' }}</label>
                                    <textarea class="form-control my-editor" rows="5" name="content" type="textarea" id="CMSPageContent"
                                        >{{ $page->content }}</textarea>
                                    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 {{ $errors->has('status') ? 'has-error' : ''}}">
                                    <label for="status" class="control-label">{{ 'Status' }}</label>
                                    <select class="form-control" name="status" id="Status" value="{{ old('status') }}"
                                        required>
                                        <option value="1" @if($page->status == 1) selected @endif>Publish</option>
                                        <option value="0" @if($page->status == 0) selected @endif>Draft</option>
                                    </select>
                                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-sm-4 {{ $errors->has('page_type') ? 'has-error' : ''}}">
                                    <label for="Page Type" class="control-label">{{ 'Page Type' }}</label>
                                    <select class="form-control" name="page_type" id="page_type"
                                        value="{{ old('page_type') }}" required>
                                        <option value="1" @if($page->page_type == 1) selected @endif>Standard</option>
                                        <option value="2" @if($page->page_type == 2) selected @endif>Contact</option>
                                    </select>
                                    {!! $errors->first('page_type', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-sm-4 {{ $errors->has('template') ? 'has-error' : ''}}">
                                    <label for="Template" class="control-label">{{ 'Template' }}</label>
                                    <select class="form-control" name="template" id="Template"
                                        value="{{ old('template') }}" required>
                                        <option value="1" @if($page->template == 1) selected @endif>Default(full-width)</option>
                                        <option value="2" @if($page->template == 2) selected @endif>Right Sidebar</option>
                                    </select>
                                    {!! $errors->first('template', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 {{ $errors->has('meta_title') ? 'has-error' : ''}}">
                                    <label for="Meta Title" class="control-label">{{ 'Meta Title' }}</label>
                                    <input class="form-control" name="meta_title" type="text" id="MetaTitle"
                                        value="{{ isset($page->meta_title) ? $page->meta_title : ''}}">
                                    {!! $errors->first('meta_title', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-sm-4 {{ $errors->has('meta_keywords') ? 'has-error' : ''}}">
                                    <label for="Meta Keywords" class="control-label">{{ 'Meta Keywords' }}</label>
                                    <input class="form-control" name="meta_keywords" type="text" id="MetaKeywords"
                                        value="{{ isset($page->meta_keywords) ? $page->meta_keywords : ''}}">
                                    {!! $errors->first('meta_keywords', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-sm-4 {{ $errors->has('canonical_url') ? 'has-error' : ''}}">
                                    <label for="Canonical Url" class="control-label">{{ 'Canonical Url' }}</label>
                                    <input class="form-control" name="canonical_url" type="text" id="canonical_url"
                                        value="{{ isset($page->canonical_url) ? $page->canonical_url : ''}}">
                                    {!! $errors->first('canonical_url', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="Meta Description" class="control-label">{{ 'Meta Description' }}</label>
                                    <textarea name="meta_description" class="form-control" id="MetaDescription"
                                        cols="30"
                                        rows="2">{{ isset($page->meta_description) ? $page->meta_description : ''}}</textarea>
                                    {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="Featured Image" class="control-label">{{ 'Featured Image' }}</label>
                                    <input class="form-control" name="featured_image" type="file" id="FeatureImage"
                                        accept="image/*"
                                        value="{{ isset($page->featured_image) ? $page->featured_image : ''}}">
                                    {!! $errors->first('featured_image', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input class="btn btn-warning pull-left" type="reset" value="Reset">
                                <input class="btn btn-primary pull-right" type="submit" value="Update Page">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection