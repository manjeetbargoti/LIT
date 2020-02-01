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
            <div class="col-md-4 col-lg-4 mb-5">
                <div class="box">
                    <img src="{{ asset('front/dist/img/home/blog1.jpg') }}" class="mb-3  img-fluid" alt="">
                    <h3 class="h3">My Story 2 -Lorem Ipsum </h3>
                    <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic
                        or web designs.</p>
                    <a href="#" class="btn btn-primary text-uppercase"> Read More</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 mb-5">
                <div class="box">
                    <img src="{{ asset('front/dist/img/home/blog1.jpg') }}" class="mb-3  img-fluid" alt="">
                    <h3 class="h3">My Story 2 -Lorem Ipsum </h3>
                    <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic
                        or web designs.</p>
                    <a href="#" class="btn btn-primary text-uppercase"> Read More</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 mb-5">
                <div class="box">
                    <img src="{{ asset('front/dist/img/home/blog1.jpg') }}" class="mb-3  img-fluid" alt="">
                    <h3 class="h3">My Story 2 -Lorem Ipsum </h3>
                    <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic
                        or web designs.</p>
                    <a href="#" class="btn btn-primary text-uppercase"> Read More</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 mb-5">
                <div class="box">
                    <img src="{{ asset('front/dist/img/home/blog1.jpg') }}" class="mb-3  img-fluid" alt="">
                    <h3 class="h3">My Story 2 -Lorem Ipsum </h3>
                    <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic
                        or web designs.</p>
                    <a href="#" class="btn btn-primary text-uppercase"> Read More</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 mb-5">
                <div class="box">
                    <img src="{{ asset('front/dist/img/home/blog1.jpg') }}" class="mb-3  img-fluid" alt="">
                    <h3 class="h3">My Story 2 -Lorem Ipsum </h3>
                    <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic
                        or web designs.</p>
                    <a href="#" class="btn btn-primary text-uppercase"> Read More</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 mb-5">
                <div class="box">
                    <img src="{{ asset('front/dist/img/home/blog1.jpg') }}" class="mb-3  img-fluid" alt="">
                    <h3 class="h3">My Story 2 -Lorem Ipsum </h3>
                    <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic
                        or web designs.</p>
                    <a href="#" class="btn btn-primary text-uppercase"> Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection