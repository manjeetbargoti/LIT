@extends('layouts.front.design')
@section('title', 'Single Title')
@section('content')

<!-- slider start -->
<div id="litsliderabt" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> @if(!empty($data->initiative_name)) {{ $data->initiative_name }} @elseif(!empty($data->service_name)) {{ $data->service_name }} @endif </h3>
        </div>
    </div>
</div>


<!-- Project Details Box -->
<section id="projectdetl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 float-left px-0 m-auto">
                <img class="d-block img-responsive m-auto" width="300" src="{{ asset('images/initiative/large/'.$siImage->image_name) }}"
                    alt="Second slide">
            </div>
            <div class="col-md-12 col-lg-6 pl-4">
                <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                <h2> @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name)){{ $data->service_name }}@endif
                </h2>
                <span class="col-12 col-lg-3">
                    <select name="budget" id="budgetList" class="form-control col-sm-3">
                        @if(empty($data->budget))
                            @foreach($data2 as $d2)
                            <option value="{{ $d2->id }}">USD {{ $d2->budget }}</option>
                            @endforeach
                        @else
                            <option>USD {{ $data->budget }}</option>
                        @endif
                    </select>
                </span>
                <ul class="p-0">
                    <li> <b>Title</b>:
                        @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name)){{ $data->service_name }}@endif
                    </li>
                    <li> <b>Location</b>: {{ $data->city }}, {{ $data->state }}, {{ $data->country }}</li>
                    <li class="d-none"> <b>Budget ID</b>: <span id="budg_id">{{ $data->budget_id }}</span> </li>
                </ul>
                <div class="btnbx">
                    @if(!empty($data->initiative_name))
                    <a href="{{ url('/social-initiative/add-to-cart/'.$data->id) }}"
                        class="btn btn-primary text-uppercase"> Add to Impact Box</a>
                    @elseif(!empty($data->service_name))
                    <a href="{{ url('/digital-service/add-to-cart/'.$data->id) }}"
                        class="btn btn-primary text-uppercase"> Add to Impact Box</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mt-4">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Beneficiaries</th>
                    <td id="budg_ben">{{ $data->beneficiaries }}</td>
                </tr>
                <tr>
                    <th>SDG</th>
                    <td>{{ $data->area_impact_sdg }}</td>
                </tr>
                <tr>
                    <th>Initiative Duration</th>
                    <td><span id="budg_dur">{{ $data->duration }}</span> <span id="budg_tp">{{ $data->time_period }}</span></td>
                </tr>
                <tr>
                    <th>Out-Reach</th>
                    <td><span id="budg_outreach">{{ $data->outreach }}</span></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>@if(!empty($data->initiative_name))
                         {!! $data->initiative_description !!}
                        @elseif(!empty($data->service_name))
                        {!! $data->service_description !!}
                        @endif</td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td>{{ $data->street }}, {{ $data->region }},{{ $data->city }}, {{ $data->state }}, {{ $data->country }}</td>
                </tr>
            </table>
            </div>
        </div>
    </div>
</section>

@endsection