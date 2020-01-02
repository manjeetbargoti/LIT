@extends('layouts.panel.design')

@section('content')
<!-- <header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Error 404
                </h4>
            </div>
        </div>
    </div>
</header> -->
<!-- <div class="outer">
    <div class="container">
        <div class="row">
            <div class='col-lg-4 m-auto'>
                <h3>
                    <center>404<br>
                        <small>PAGE NOT FOUND!</small></center>
                </h3>
            </div>
        </div>
    </div>
</div> -->
<div class="row m-auto">
    <img src="{{ url('/images/error/404.jpg') }}" alt="" class="img-responsive m-auto" width="800">
</div>

@endsection