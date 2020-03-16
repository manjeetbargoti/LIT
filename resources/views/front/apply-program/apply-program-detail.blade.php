@extends('layouts.front.design')
@section('title', 'Single Title')
@section('content')

<!-- slider start -->
<div id="litsliderabt" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> @if(!empty($data->initiative_name)) {{ $data->initiative_name }} @elseif(!empty($data->service_name))
                {{ $data->service_name }} @endif </h3>
        </div>
    </div>
</div>


<!-- Project Details Box -->
<section id="projectdetl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 float-left px-0">
                <img class="d-block img-responsive m-auto" width="300"
                    src="{{ asset('images/initiative/large/'.$siImage->image_name) }}" alt="Second slide">
            </div>
            <div class="col-md-12 col-lg-6 pl-4">
                <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                <h2> @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name)){{ $data->service_name }}@endif
                </h2>
                <!-- <span class="col-12 col-lg-3">
                    <select name="budget" id="budgetList" class="form-control col-sm-3">
                        @if(empty($data->budget))
                            @foreach($data2 as $d2)
                            <option value="{{ $d2->id }}">USD {{ $d2->budget }}</option>
                            @endforeach
                        @else
                            <option>USD {{ $data->budget }}</option>
                        @endif
                    </select>
                </span> -->
                <ul class="p-0">
                    <!-- <li> <b>Title</b>:
                        @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name)){{ $data->service_name }}@endif
                    </li> -->
                    <li> <b>Location</b>: {{ $data->city }}, {{ $data->state }}, {{ $data->country }}</li>
                    <!-- <li class="d-none"> <b>Budget ID</b>: <span id="budg_id">{{ $data->budget_id }}</span> </li> -->
                    <!-- <li> <b>Beneficiaries</b>: <span id="budg_ben">{{ $data->beneficiaries }}</span> </li> -->
                    <!-- <li> <b>Duration</b>: <span id="budg_dur">{{ $data->duration }}</span> <span id="budg_tp">{{ $data->time_period }}</span> </li> -->
                    <!-- <li> <b>Out-Reach</b>: <span id="budg_outreach">{{ $data->outreach }}</span> </li> -->
                    <li> <b>SDG</b>: {{ $data->area_impact_sdg }}</li>
                    <li> <b>Description</b>:
                        @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name))@endif
                    </li>
                </ul>
                <div class="btnbx">
                    <a href="{{ $data->promote_url }}" class="btn btn-primary text-uppercase"> Apply to Program</a>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-sm-12 mt-4">
                <ul class="p-0">
                    <li>
                        <h5><strong><u>Description:</u></strong></h5>
                        @if(!empty($data->initiative_name))
                        <p>{!! $data->initiative_description !!}</p>
                        @elseif(!empty($data->service_name))
                        <p>{!! $data->service_description !!}</p>
                        @endif
                    </li>
                    <li>
                        <h5><strong><u>Address:</u></strong></h5>
                        <p><b>Street</b>: {{ $data->street }}</p>
                        <p><b>Region</b>: {{ $data->region }}</p>
                        <p><b>City</b>: {{ $data->city }}</p>
                        <p><b>State</b>: {{ $data->state }}</p>
                        <p><b>Country</b>: {{ $data->country }}</p>
                    </li>
                </ul>
            </div>
        </div> -->
    </div>
</section>

@endsection