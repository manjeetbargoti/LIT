@extends('layouts.front.design')
@section('content')

<style>
    .tail-select {
        width: 100% !important;
    }
</style>

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
            <div class="col-md-3 col-lg-3 mb-5">
                <div class="range mt-3" style="height: 100% !important;">
                    <form method="Post" action="{{ url('/on-ground/search') }}">
                        {{ csrf_field() }}
                        <!-- <label for="customRange">Budget</label> -->
                        <!-- <input type="range" class="custom-range" name="budget" min="0" max="100000000" id="customRange"> -->
                        <div class="form-group">
                            <label for="Budget">Budget</label>
                            <select class="form-control search-slt" name="budget" id="budget">
                                <option value="">Select Budget</option>
                                <option value="0,0">In kind partnerships</option>
                                <option value="1,5000">$1-$5,000</option>
                                <option value="5000,1000">$5,000-$10,000</option>
                                <option value="10001,15000">$10,001-$15,000</option>
                                <option value="15001,20000">$15,001-$20,000</option>
                                <option value="20001,25000">$20,001-$25,000</option>
                                <option value="25001,50000">$25,001-$50,000</option>
                                <option value="50000,100000">$50,000 and Above</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="SDGs">SDG's</label>
                            <select class="form-control" name="sdgs[]" id="MultiSelect1" multiple
                                data-placeholder="Select SDGs" style="width: 200px !important;">
                                <!-- <option value=""> Select Area of Impact </option> -->
                                @foreach($allSDG->where('sdg_category', 'Onground') as $sdg)
                                <option value="{{ $sdg->sdg_name }}">{{ $sdg->sdg_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Country">Country</label>
                            <select class="form-control search-slt" name="country" id="country"
                                data-placeholder="Select Country">
                                <option value=""> -- Select Country -- </option>
                                @foreach($countryList as $c)
                                <option value="{{ $c->name }}" @if($c->name == $country) selected @endif>{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="City">City</label>
                            <select class="form-control search-slt" name="city" id="city" value="{{ request('city') }}"
                                data-placeholder="Select City">
                                <option value="">City</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-info" value="Search">
                        </div>
                    </form>
                    <!-- <div id="result"> <span> <b></b>0 USD</span> </div>
                    <div id="end"> <span> <b>10,000</b> USD</span></div> -->
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
                                <li> <b>Duration</b>: {{ $d->duration }} {{ $d->time_period }}</li>
                            </ul>
                            @if(!empty($d->initiative_name))
                            <a href="{{ url('/social-initiative/'.$d->slug) }}" class="btn btn-primary text-uppercase">
                                Read More</a>
                            @elseif(!empty($d->service_name))
                            <a href="#" class="btn btn-primary text-uppercase">
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