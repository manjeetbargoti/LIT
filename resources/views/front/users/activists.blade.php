@extends('layouts.front.design')
@section('content')

<div id="litsliderstory" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> Social Startups </h3>
        </div>
    </div>
</div>


<!-- contactus Box -->
<section id="contactus">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center mb-5">
                <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                <h2> Social Startups </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-md-3 col-lg-3 mb-5">
                <div class="filter-section">
                    <form method="POST" action="{{ url('/users/activists') }}">
                        @csrf
                        <div class="form-group">
                            <h5 style="background: #e62240;color: #fff;padding: 0.5em;border-radius: 5px;">Filter by
                                Location</h5>
                        </div>
                        <div class="form-group">
                            <label for="Country">SDGs</label>
                            <select class="form-control" name="sdg" id="sdg">
                                <option value="">Select SDGs</option>
                                @foreach($sdgs as $sdg)
                                <option value="{{ $sdg->sdg_name }}" >{{ $sdg->sdg_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Country">Country</label>
                            <select class="form-control" name="country" id="actcountry">
                                <option value="">Select Country</option>
                                @foreach($country as $cntry)
                                <option value="{{ $cntry->name }}" @if(!empty($countryname))@if($cntry->name ==
                                    $countryname) selected @endif @endif>{{ $cntry->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- <div class="form-group">
                            <label for="State">State</label>
                            <select class="form-control" name="state" id="state">
                                <option value="">Select State</option>
                            </select>
                        </div> -->

                        <div class="form-group">
                            <label for="City">City</label>
                            <select class="form-control" name="city" id="actcity">
                                <option value="">Select City</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="Filter" class="form-control btn-info">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-9 mb-5">
                <div class="row">
                    <div class="col-sm-12">
                        @if($data->count() == 0)
                        <p class="text-center">Sorry! no result found for your search.</p>
                        <p><?php echo $data['country']; ?></p>
                        @endif
                    </div>

                    @foreach($data as $d)
                    <div class="col-md-4 col-lg-4 mb-5">
                        <div class="box">
                            @if(!empty($d->avatar))
                            <img src="{{ asset('/images/user/large/'.$d->avatar) }}" style="height: 248px !important;"
                                class="mb-3 img-fluid" height="245" alt="{{ $d->first_name }} {{ $d->last_name }}">
                            @else
                            <img src="{{ asset('/images/user/user.png') }}" class="mb-3 img-fluid"
                                alt="{{ $d->first_name }} {{ $d->last_name }}">
                            @endif
                            <h3 class="h3">{{ $d->title }} {{ $d->first_name }} {{ $d->last_name }}</h3>
                            <p><b>Location</b>: {{ $d->city }}, {{ $d->country }}</p>
                            <p><strong>Social Impact Points: {{ $d->sip_points }}</strong></p>
                            <a href="{{ url('/users/activists/'.$d->id) }}"
                                class="btn btn-success mt-2 btn-sm text-uppercase"> Read More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection