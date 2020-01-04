@extends('layouts.front.design')

@section('content')
<!-- <header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Error 500
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
                    <center>500<br>
                        <small>Internal Server Error!</small></center>
                </h3>
            </div>
        </div>
    </div>
</div> -->
<div class="row m-t-35">
    <img src="{{ url('/images/error/500.jpg') }}" alt="" class="img-responsive m-auto" width="800">
</div>

@endsection