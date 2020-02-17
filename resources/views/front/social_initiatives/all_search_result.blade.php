@extends('layouts.front.design')
@section('content')

<div id="litsliderstory" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> Programs </h3>
        </div>
    </div>
</div>


<!-- contactus Box -->
<section id="program">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center mb-5">
                <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                <h3> Programs </h3>
            </div>

            <div class="col-md-12 col-lg-12 mb-5">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6" style="border-right: 1px dashed #000;">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="text-center mb-5">360 Digital Marketing Services</h4>
                            </div>
                            
                            @if($data2_count == 0)
                            <div class="col-md-12 col-lg-12 mb-4">
                                <h5 class="text-center">Sorry! no result found.</h5>
                            </div>
                            @endif
                            @foreach($data2 as $d)
                            <div class="col-md-6 col-lg-6 mb-4">
                                <div class="box">
                                    @if(!empty($d->image))
                                    <img src="{{ asset('images/initiative/large/'.$d->image) }}" class="mb-3 img-fluid"
                                        alt="@if(!empty($d->initiative_name)){{ $d->initiative_name }}@elseif(!empty($d->service_name))@endif">
                                    @else
                                    <img src="{{ asset('images/initiative/large/default.png') }}" class="mb-3 img-fluid"
                                        alt="@if(!empty($d->initiative_name)){{ $d->initiative_name }}@elseif(!empty($d->service_name))@endif">
                                    @endif
                                    <h4 class="h4">
                                        @if(!empty($d->initiative_name)){{ $d->initiative_name }}@elseif(!empty($d->service_name))@endif
                                    </h4>
                                    <h5 class="h5">USD {{ $d->budget }} </h5>
                                    <ul class="p-0">
                                        <li> <b>Beneficiaries</b>: {{ $d->beneficiaries }}</li>
                                        <li> <b>Duration</b>: {{ $d->duration }}</li>
                                    </ul>
                                    @if(!empty($d->initiative_name))
                                    <a href="{{ url('/social-initiative/'.$d->slug) }}"
                                        class="btn btn-primary text-uppercase">
                                        Read More</a>
                                    @elseif(!empty($d->service_name))
                                    <a href="{{ url('/digital-service/'.$d->slug) }}"
                                        class="btn btn-primary text-uppercase">
                                        Read More</a>
                                    @endif
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6" style="border-left: 1px dashed #000;">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="text-center mb-5">Onground Sustainability Initiatives</h4>
                            </div>
                            
                            @if($data_count == 0)
                            <div class="col-md-12 col-lg-12 mb-4">
                                <h5 class="text-center">Sorry! no result found.</h5>
                            </div>
                            @endif
                            @foreach($data as $d)
                            <div class="col-md-6 col-lg-6 mb-4">
                                <div class="box">
                                    @if(!empty($d->image))
                                    <img src="{{ asset('images/initiative/large/'.$d->image) }}" class="mb-3 img-fluid"
                                        alt="@if(!empty($d->initiative_name)){{ $d->initiative_name }}@elseif(!empty($d->service_name))@endif">
                                    @else
                                    <img src="{{ asset('images/initiative/large/default.png') }}" class="mb-3 img-fluid"
                                        alt="@if(!empty($d->initiative_name)){{ $d->initiative_name }}@elseif(!empty($d->service_name))@endif">
                                    @endif
                                    <h4 class="h4">
                                        @if(!empty($d->initiative_name)){{ $d->initiative_name }}@elseif(!empty($d->service_name))@endif
                                    </h4>
                                    <h5 class="h5">USD {{ $d->budget }}</h5>
                                    <ul class="p-0">
                                        <li> <b>Beneficiaries</b>: {{ $d->beneficiaries }}</li>
                                        <li> <b>Duration</b>: {{ $d->duration }}</li>
                                    </ul>
                                    @if(!empty($d->initiative_name))
                                    <a href="{{ url('/social-initiative/'.$d->slug) }}"
                                        class="btn btn-primary text-uppercase">
                                        Read More</a>
                                    @elseif(!empty($d->service_name))
                                    <a href="{{ url('/digital-service/'.$d->slug) }}"
                                        class="btn btn-primary text-uppercase">
                                        Read More</a>
                                    @endif
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection