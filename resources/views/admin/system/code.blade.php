@extends('layouts.panel.design')

@section('content')
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    System Settings
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 m-auto">
                <div class="card">
                    <div class="card-header">Add/Edit Custom Code</div>
                    <div class="card-body">

                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <form method="post" class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            @csrf
                            <!-- Custom Header Code Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-8 m-auto">
                                    <label>Custom Code: Header</label>
                                    <textarea name="custom_code_header" id="custom_code_header" rows="7"
                                        class="form-control">{!! $header !!}</textarea>
                                </div>
                            </div>
                            <!-- /.Custom Header Code Input Field -->

                            <!-- Custom Footer Code Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-8 m-auto">
                                    <label>Custom Code: Footer</label>
                                    <textarea name="custom_code_footer" id="custom_code_footer" rows="7"
                                        class="form-control">{!! $footer !!}</textarea>
                                </div>
                            </div>
                            <!-- /.Custom Footer Code Input Field -->

                            <div class="form-actions form-group row">
                                <div class="col-xl-4 m-auto">
                                    <input type="reset" value="Reset" class="btn btn-warning pull-left">
                                    <input type="submit" value="Save File" class="btn btn-primary pull-right">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection