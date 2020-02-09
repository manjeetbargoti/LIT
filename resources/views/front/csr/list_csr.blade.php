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
                <h3> CSR Market Place </h3>
            </div>

            <div class="col-md-12 col-lg-12 mb-5">
                <div class="row">
                    @foreach($data as $d)
                    <div class="col-md-12 col-lg-12 mb-4">
                        <div class="box">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4 class="h4">{{ $d->project_name }}</h4>
                                    <h4 class="h6">Company: <strong class="text-primary"> @foreach(\App\BusinessInfo::where('id', $d->business_id)->get() as $b){{ $b->business_name }}@endforeach</strong> | Location: <span class="text-success">{{ $d->city }},
                                        {{ $d->state }}, {{ $d->country }}</span></h4>
                                    <p class="h6">Budget: {{ $d->budget }} AED | Submission Date</b>:
                                        {{ $d->submission_time }} | Duration</b>: {{ $d->project_timeline }}
                                        {{ $d->time_period }} | Social Impact Points: {{ $d->social_impact_points }}</p>
                                </div>
                                <div class="col-sm-2">
                                    <a href="#" class="btn btn-primary text-uppercase">Submit Proposal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@endsection