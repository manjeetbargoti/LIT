@extends('layouts.front.design')
@section('content')

<div id="litsliderstory" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> {{ $data->title }} {{ $data->first_name }} {{ $data->last_name }} </h3>
        </div>
    </div>
</div>

<!-- Single Activist -->
<section id="projectdetl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 float-left px-0">
            	@if(!empty($data->avatar))
                <img class="d-block w-50 img-responsive" style="margin: auto; display: block;" src="{{ asset('images/user/large/'.$data->avatar) }}" alt="{{ $data->first_name }} {{ $data->last_name }}">
                @else
                <img class="d-block w-50 img-responsive" style="margin: auto; display: block;" src="{{ asset('images/user/user.png') }}" alt="{{ $data->first_name }} {{ $data->last_name }}">
                @endif
            </div>
            <div class="col-md-12 col-lg-6 pl-4">
                <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                <h2> {{ $data->title }} {{ $data->first_name }} {{ $data->last_name }}</h2>
                <span class="pricebx"> {{ $data->role }} </span>
                <ul class="p-0">
                    <li> <b>Title</b>: @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name)){{ $data->service_name }}@endif </li>
                    <li> <b>Location</b>: {{ $data->city }}, {{ $data->state }}, {{ $data->country }}</li>
                    <li> <b>Beneficiaries</b>: {{ $data->beneficiaries }}
                    <li> <b>Duration</b>: {{ $data->duration }} months</li>
                    <li> <b>SDG</b>: {{ $data->area_impact_sdg }}</li>
                    <li> <b>Description</b>: @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name))@endif</li>
                </ul>
                <div class="btnbx">
                    <a href="{{ url('/users/activists/'.$data->id) }}" class="btn btn-primary text-uppercase"> Express Interest</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection