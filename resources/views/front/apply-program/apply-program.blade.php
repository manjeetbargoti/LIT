@extends('layouts.front.design')
@section('content')

<div id="litsliderstory" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> Apply to Programs </h3>
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
            <div class="col-md-3 col-lg-3 text-center mb-5">
                <div class="range mt-3">
                    <form>
                        <label for="customRange">Budget</label>
                        <input type="range" class="custom-range" id="customRange">
                    </form>
                    <div id="result"> <span> <b></b> USD</span> </div>
                    <div id="end"> <span> <b>10,000</b> USD</span></div>
                </div>
            </div>

            <div class="col-md-9 col-lg-9 mb-5">
                <div class="row">
                    @if($data_count == 0)
                    <div class="col-md-12 col-lg-12 mb-4">
                        <h5 class="text-center">Sorry! no result found.</h5>
                    </div>
                    @endif
                    @foreach($data as $d)
                    <div class="col-md-4 col-lg-4 mb-4">
                        <div class="box">
                            @if(!empty($d->feature_image))
                            <img src="{{ asset('/images/initiative/large/'.$d->feature_image) }}" class="mb-3 img-fluid"
                                alt="@if(!empty($d->initiative_name)){{ $d->initiative_name }}@elseif(!empty($d->service_name))@endif">
                            @else
                            <img src="{{ asset('/images/initiative/large/default.png') }}" class="mb-3 img-fluid"
                                alt="@if(!empty($d->initiative_name)){{ $d->initiative_name }}@elseif(!empty($d->service_name))@endif">
                            @endif
                            <h4 class="h4">@if(!empty($d->initiative_name)){{ $d->initiative_name }}@elseif(!empty($d->service_name))@endif</h4>
                            <!-- <h5 class="h5">USD {{ $d->budget }}</h5> -->
                            <ul class="p-0">
                                <li> <b>SDG</b>: {{ $d->area_impact_sdg }}</li>
                                <li> <b>Country</b>: {{ $d->country }}</li>
                            </ul>
                            @if(!empty($d->initiative_name))
                            <a href="{{ url('/program/apply-to-program/'.$d->slug) }}" class="btn btn-primary text-uppercase">
                                Read More</a>
                            @elseif(!empty($d->service_name))
                            <a href="{{ url('/program/apply-to-program/'.$d->slug) }}" class="btn btn-primary text-uppercase">
                                Read More</a>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@endsection