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
            <div class="col-md-12 col-lg-6 float-left px-0 m-auto">
                <img class="d-block img-responsive m-auto" width="300"
                    src="{{ asset('images/initiative/large/'.$siImage->image_name) }}" alt="Second slide">
            </div>
            <div class="col-md-12 col-lg-6 pl-4">
                <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                <h2 class="mb-2">
                    @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name)){{ $data->service_name }}@endif
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
                <span class="pt-2">
                    <li> <b>Location</b>: {{ $data->city }}, {{ $data->state }}, {{ $data->country }}</li>
                </span>
                <ul class="p-0">
                    <li> <b>Title</b>:
                        @if(!empty($data->initiative_name)){{ $data->initiative_name }}@elseif(!empty($data->service_name)){{ $data->service_name }}@endif
                    </li>
                    <li><b>Program Stage</b>: {{ $data->program_stage }}</li>
                    @if($data->video_link)
                    <li><b>Video Link</b>: <a target="_blank" href="{{ $data->video_link }}">{{ $data->video_link }}</a>
                    </li>
                    @endif
                    <li class="d-none"> <b>Budget ID</b>: <span id="budg_id">{{ $data->budget_id }}</span> </li>
                    <li class="d-none"> <b>Initiative ID</b>: <input type="hidden" id="inti_ID" value="{{ $data->id }}"></li>
                </ul>
                <div class="btnbx mt-2">
                    @if(!empty($data->initiative_name))
                    <a id="budget_href" href="{{ url('/social-initiative/add-to-cart/'.$data->id.'/'.$data->budget_id) }}"
                        class="btn btn-primary text-uppercase"> Add to Impact Box</a>
                    @elseif(!empty($data->service_name))
                    <a href="{{ url('/digital-service/add-to-cart/'.$data->id.'/'.$data->budget_id) }}"
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
                        <td><span id="budg_dur">{{ $data->duration }}</span> <span
                                id="budg_tp">{{ $data->time_period }}</span></td>
                    </tr>
                    <tr>
                        <th>Out-Reach</th>
                        <td><span id="budg_outreach">{{ $data->outreach }}</span></td>
                    </tr>
                    <tr>
                        <th>Initiative Description</th>
                        <td>{!! $data->initiative_description !!}</td>
                    </tr>
                    <tr>
                        <th>Scalability of this project</th>
                        <td>{!! $data->project_scalability !!}</td>
                    </tr>
                    <tr>
                        <th>Project's relevance to the SDGs</th>
                        <td>{!! $data->sdg_relevance !!}</td>
                    </tr>
                    <tr>
                        <th>Project's relevance to National Agenda</th>
                        <td>{!! $data->relevance_national_agenda !!}</td>
                    </tr>
                    <tr>
                        <th>How innovative is the project? </th>
                        <td>{!! $data->project_innovation !!}</td>
                    </tr>
                    <tr>
                        <th>List of benefits of the program * </th>
                        <td>{!! $data->program_benefits !!}</td>
                    </tr>
                    <tr>
                        <th>Program Stage</th>
                        <td>{!! $data->program_stage !!}</td>
                    </tr>
                    <tr>
                        <th>Location</th>
                        <td>@if(!empty($data->street)){{ $data->street }},@endif @if(!empty($data->region)){{ $data->region }},@endif @if(!empty($data->city)){{ $data->city }},@endif @if(!empty($data->state)){{ $data->state }},@endif
                            @if(!empty($data->country)){{ $data->country }}@endif</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection