@extends('layouts.front.design')
@section('content')

<div id="litsliderabt" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('/front/dist/img/about/banner.jpg') }}" alt="First slide">
            <h3> Contact us </h3>
        </div>
    </div>
</div>

<!-- contactus Box -->
<section id="contactus">
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-12 text-center mb-5"><img class="mb-2 mx-auto" src="{{ asset('/front/dist/img/home/heading-icon.png') }}" alt="" />
<h2>Contact Us</h2>
</div>
<div class="col-md-12 col-lg-5  offset-lg-1 float-left px-0"><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462565.197581445!2d54.94755498654818!3d25.075085310621684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sin!4v1576174247849!5m2!1sen!2sin" width="100%" height="520" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
<div class="col-md-12 col-lg-5 pl-4"><form action="{{ url('/contact-us/form') }}" method="post">
@csrf
<div class="form-group"><input id="name" class="form-control" name="name" type="text" placeholder="Full Name" /></div>
<div class="form-group"><input id="email" class="form-control" name="email" type="email" placeholder="Email Address" /></div>
<div class="form-group"><input id="tel" class="form-control" name="phone" type="tel" placeholder="Contact Number" /></div>
<div class="form-group"><textarea id="sub" class="form-control" name="message" type="text" placeholder="Query.." /></textarea>
<div class="form-group">&nbsp;</div>
<button class="btn btn-primary" type="submit">Submit</button></form></div>
</div>
</div>
</section>

@endsection
