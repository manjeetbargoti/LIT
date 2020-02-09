@extends('layouts.front.design')
@section('content')

<div id="litsliderabt" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('/front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> {{ $data->name }} </h3>
        </div>
    </div>
</div>

{!! $data->content !!}

@endsection
