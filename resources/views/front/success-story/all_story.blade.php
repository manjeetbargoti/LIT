@extends('layouts.front.design')
@section('content')

<div id="litsliderstory" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> Success Story </h3>
        </div>
    </div>
</div>


<!-- contactus Box -->
<section id="contactus">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center mb-5">
                <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                <h2> Success Story </h2>
            </div>
        </div>
        <div class="row">
            @foreach($data as $d)
            <div class="col-md-4 col-lg-4 mb-5">
                <div class="box">
                    <img src="{{ asset('/images/successStory/large/'.$d->feature_image) }}" class="mb-3  img-fluid" alt="">
                    <h3 class="h3">{{ $d->title }}</h3>
                    <p>{{ $d->short_content }}</p>
                    <a href="{{ url('/success-story/'.$d->slug) }}" class="btn btn-primary text-uppercase"> Read More</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection