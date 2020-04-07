@extends('layouts.front.design')
@section('content')

<!-- slider start -->
<div id="litsliderabt" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> {{ $data->title }} </h3>
        </div>

    </div>


</div>


<!-- Vision Box -->
<section id="vision">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-5  offset-lg-1 float-left px-0">
                <img class="d-block w-100" src="{{ url('images/successStory/large/'.$data->feature_image) }}" alt="Second slide">
            </div>
            <div class="col-md-12 col-lg-5 pl-4">
                <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                <h2> {{ $data->title }} </h2>
                <p> {{ $data->short_content }} </p>
            </div>
        </div>
    </div>
</section>

<!-- mission Box -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-10 offset-lg-1">
                <p> {!! $data->content !!} </p>
                <p class="mt-4"><strong>Author: {{ $uData->first_name }} {{ $uData->last_name }}</strong></p>
            </div>

        </div>
    </div>
</section>

@endsection