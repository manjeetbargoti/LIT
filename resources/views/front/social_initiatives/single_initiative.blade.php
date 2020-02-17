@extends('layouts.front.design')
@section('title', 'Single Title')
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
                <h2> @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name)){{ $data->service_name }}@endif </h2>
                <span class="pricebx">USD {{ $data->budget }} </span>
                <ul class="p-0">
                    <li> <b>Title</b>: @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name)){{ $data->service_name }}@endif </li>
                    <li> <b>Location</b>: {{ $data->city }}, {{ $data->state }}, {{ $data->country }}</li>
                    <li> <b>Beneficiaries</b>: {{ $data->beneficiaries }} [USD {{ round($benefit_per_person, 2) }} /person]</li>
                    <li> <b>Duration</b>: {{ $data->duration }} months</li>
                    <li> <b>SDG</b>: {{ $data->area_impact_sdg }}</li>
                    <li> <b>Description</b>: @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name))@endif</li>
                </ul>
                <div class="btnbx">
                @if(!empty($data->initiative_name))
                    <a href="{{ url('/social-initiative/add-to-cart/'.$data->id) }}" class="btn btn-primary text-uppercase"> Add to Impact Box</a>
                @elseif(!empty($data->service_name))
                    <a href="{{ url('/digital-service/add-to-cart/'.$data->id) }}" class="btn btn-primary text-uppercase"> Add to Impact Box</a>
                @endif
                    <a href="#" class="btn btn-primary text-uppercase"> Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection