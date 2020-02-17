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
                <img class="d-block w-50 img-responsive" style="margin: auto; display: block;"
                    src="{{ asset('images/user/large/'.$data->avatar) }}"
                    alt="{{ $data->first_name }} {{ $data->last_name }}">
                @else
                <img class="d-block w-50 img-responsive" style="margin: auto; display: block;"
                    src="{{ asset('images/user/user.png') }}" alt="{{ $data->first_name }} {{ $data->last_name }}">
                @endif
            </div>
            <div class="col-md-12 col-lg-6 pl-4">
                <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-2 mx-auto" alt="">
                <h2> {{ $data->title }} {{ $data->first_name }} {{ $data->last_name }}</h2>
                <span class="pricebx"> {{ $data->role }} </span>
                <ul class="p-0">
                    <li> <b>Social Impact Points</b>: {{ $data->sip_points }} </li>
                    <li> <b>Location</b>: {{ $data->city }}, {{ $data->state }}, {{ $data->country }}</li>
                    <li> <b>Bio</b>: {{ $data->bio }}</li>
                </ul>
                <div class="btnbx">
                    <a href="{{ url('/users/activists/'.$data->id) }}" data-toggle="modal" data-target="#hireActivist-{{ $data->id }}" class="btn btn-primary text-uppercase"> Express
                        Interest</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Model -->
<div class="modal fade" id="hireActivist-{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="hireActivistLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hireActivistLabel">{{ $data->title }} {{ $data->first_name }} {{ $data->last_name }} [SIP: {{ $data->sip_points }}]</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="Post">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="position" class="form-control" placeholder="Position" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="organization" class="form-control" placeholder="Organization" required>
                    </div>
                    <div class="form-group d-none">
                        <input type="text" name="activist_id" class="form-control" value="{{ $data->id }}">
                    </div>
                    <!-- <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection