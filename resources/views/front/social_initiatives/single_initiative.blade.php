@extends('layouts.front.design')
@section('content')

<!-- slider start -->
<div id="litsliderabt" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> Project Detail </h3>
        </div>
    </div>
</div>


<!-- Project Details Box -->
<section id="projectdetl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 float-left px-0">
                <img class="d-block w-100" src="{{ asset('images/initiative/large/'.$siImage->image_name) }}" alt="Second slide">
            </div>
            <div class="col-md-12 col-lg-6 pl-4">
                <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                <h2> {{ $data->initiative_name }} </h2>
                <span class="pricebx"> AED {{ $data->budget }} </span>
                <ul class="p-0">
                    <li> <b>Title</b>: {{ $data->initiative_name }}</li>
                    <li> <b>Location</b>: {{ $data->city }}, {{ $data->state }}, {{ $data->country }}</li>
                    <li> <b>Beneficiaries</b>: {{ $data->beneficiaries }} [AED {{ round($benefit_per_person, 2) }} /person]</li>
                    <li> <b>Duration</b>: {{ $data->duration }} months</li>
                    <li> <b>SDG</b>: {{ $data->area_impact_sdg }}</li>
                    <li> <b>Description</b>: {{ $data->initiative_description }}</li>
                </ul>
                <div class="btnbx">
                    <a href="{{ url('/social-initiative/add-to-cart/'.$data->id) }}" class="btn btn-primary text-uppercase"> Add to Impact Box</a>
                    <a href="#" class="btn btn-primary text-uppercase"> Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection