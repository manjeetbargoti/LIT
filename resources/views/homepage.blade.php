@extends('layouts.front.design')
@section('content')

<!-- slider start -->
<div id="litslider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('front/dist/img/home/slide.jpg') }}" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('front/dist/img/home/slide.jpg') }}" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('front/dist/img/home/slide.jpg') }}" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#litslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#litslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <section class="search-sec">
        <div class="container">
            <form action="#" method="post" novalidate="novalidate">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 pl-0 text-center mb-4">
                                <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-5" alt="" />
                                <h1 class="h1 text-uppercase"> Build your own </h1>
                                <h4 class="h4"> Corporate Social Responsivbility Program </h4>
                                <ul class="slidenav mt-5">
                                    <li> <a href="">On-ground Activities</a></li>
                                    <li> <a href="">Online engagement</a></li>
                                    <li> <a href="">Both</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-1">
                                <select class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option>Area of Impact/ SDG</option>
                                    <option>GOAL 1: No Poverty</option>
                                    <option>GOAL 2: Zero Hunger</option>
                                    <option>GOAL 3: Good Health and Well-being</option>
                                    <option>GOAL 4: Quality Education</option>
                                    <option>GOAL 5: Gender Equality</option>
                                    <option>GOAL 6: Clean Water and Sanitation</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                <select class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option>Budget</option>
                                    <option>$5,000-$10,000</option>
                                    <option>$10,000-$20,000</option>
                                    <option>$20,000-$30,000</option>
                                    <option>$30,000-$40,000</option>
                                    <option>$40,000-$50,000</option>
                                    <option>$50,000 and Above</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-1">
                                <div class="multiselect">
                                    <div class="selectBox" onclick="showCheckboxes()">
                                        <select class="form-control">
                                            <option>Country</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" />First Country</label>
                                        <label for="two">
                                            <input type="checkbox" id="two" />Second Country</label>
                                        <label for="three">
                                            <input type="checkbox" id="three" />Third Country</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-1">
                                <select class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option>City</option>
                                    <option>City one</option>
                                    <option>City two</option>
                                    <option>City three</option>
                                    <option>City four</option>
                                    <option>City five</option>
                                    <option>City six</option>
                                </select>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-12 pl-0 pr-0">
                                <button type="button" class="btn btn-primary wrn-btn">Search</button>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 pl-0 text-center">
                                <p class="text-uppercase pt-5"> creativity for impact </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<!-- Instagram Box -->
<section id="insta">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-6 pb-3 px-2 instabg">
                <h2 class="h2"> Lorem Ipsum Dummy </h2>
            </div>
            @foreach($instaImages->data as $instaImg)
            <div class="col-md-6 col-lg-3 pb-3 px-2"><a href="{{ $instaImg->link }}" target="_blank"><img src="{{ $instaImg->images->low_resolution->url }}"
                    class="img-fluid" /></a></div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- Suggested Programs Box -->
<section id="programs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-4">
                <span class="titlesm text-uppercase"> suggested programs</span>
                <h2 class="h2"> Lorem Ipsum Dummy </h2>
            </div>
            <div class="col-md-6 col-lg-2">
                <span class="numbtitle"> Number of Projects</span>
                <h3 class="h3">23</h3>
            </div>
            <div class="col-md-6 col-lg-2">
                <span class="numbtitle"> Number of Campaigns</span>
                <h3 class="h3">15</h3>
            </div>
            <div class="col-md-6 col-lg-2">
                <span class="numbtitle"> Number of Events</span>
                <h3 class="h3">54</h3>
            </div>
            <div class="col-md-6 col-lg-2">
                <span class="numbtitle">Awards of Exellency</span>
                <h3 class="h3">10</h3>
            </div>
        </div>
    </div>
</section>
<!-- Water project Box -->
<section id="project">
    <div class="col-md-12 col-lg-5 float-left px-0">
        <img class="d-block w-100" src="{{ asset('front/dist/img/home/program.jpg') }}" alt="Second slide">
    </div>
    <div class="col-md-12 col-lg-7 offset-lg-5 px-0 projbg">
        <h2 class="h2"> Lorem Ipsum Dummy </h2>
        <div id="projslider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <span class="aed">8000 AED</span>
                    <h3 class="h3"> Water Project </h3>
                    <ul>
                        <li> Beneficiaries: 120,000 AED </li>
                        <li> Duration: 3 Months </li>
                    </ul>
                    <a href="#" class="btn btnwhite"> READ MORE </a>
                </div>
                <div class="carousel-item">
                    <span class="aed">8000 AED</span>
                    <h3 class="h3"> Water Project </h3>
                    <ul>
                        <li> Beneficiaries: 120,000 AED </li>
                        <li> Duration: 3 Months </li>
                    </ul>
                    <a href="#" class="btn btnwhite"> READ MORE </a>
                </div>
                <div class="carousel-item">
                    <span class="aed">8000 AED</span>
                    <h3 class="h3"> Water Project </h3>
                    <ul>
                        <li> Beneficiaries: 120,000 AED </li>
                        <li> Duration: 3 Months </li>
                    </ul>
                    <a href="#" class="btn btnwhite"> READ MORE </a>
                </div>
                <div class="bx">
                    <a class="carousel-control-prev" href="#projslider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#projslider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Box -->
<section id="blog">
    <div class="container">
        <div class="row align-items-center">
            <span class="titlesm text-uppercase"> Story telling</span>
            <h2 class="h2"> Lorem Ipsum </h2>
            <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-5" alt="" />
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-6">
                <img src="{{ asset('front/dist/img/home/blog1.jpg') }}" class="mb-3" alt="" />
                <h3 class="h3">My Story 2 -Lorem Ipsum </h3>
                <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                    web designs.</p>
                <ul class="numbtitle text-uppercase">
                    <li> <span>1</span> comments</li>
                    <li>|</li>
                    <li> By <a href="#"> Author </a> </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-6">
                <img src="{{ asset('front/dist/img/home/blog2.jpg') }}" class="mb-3" alt="" />
                <h3 class="h3">My Story 2 -Lorem Ipsum </h3>
                <p> Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                    web designs.</p>
                <ul class="numbtitle text-uppercase">
                    <li> <span>1</span> comments</li>
                    <li>|</li>
                    <li> By <a href="#"> Author </a> </li>
                </ul>
            </div>
            <div class="col-md-12 col-lg-12 text-center mt-4"> <a href="#" class="btn btnwhite"> READ MORE </a></div>
        </div>
    </div>
</section>
<!-- patnerlogos Box -->
<section id="patnerlogos">
    <div class="container">
        <div class="row align-items-center">
            <span class="titlesm text-uppercase"> Changemakers</span>
            <h2 class="h2"> Lorem Ipsum </h2>
            <img src="{{ asset('front/dist/img/home/heading-icon.png') }}" class="mb-5" alt="" />
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 col-lg-2">
                <img src="{{ asset('front/dist/img/home/logo1.jpg') }}" class="mb-3" alt="" />
            </div>
            <div class="col-md-2 col-lg-2">
                <img src="{{ asset('front/dist/img/home/logo2.jpg') }}" class="mb-3" alt="" />
            </div>
            <div class="col-md-2 col-lg-2">
                <img src="{{ asset('front/dist/img/home/logo3.jpg') }}" class="mb-3" alt="" />
            </div>
            <div class="col-md-2 col-lg-2">
                <img src="{{ asset('front/dist/img/home/logo4.jpg') }}" class="mb-3" alt="" />
            </div>
            <div class="col-md-2 col-lg-2">
                <img src="{{ asset('front/dist/img/home/logo5.jpg') }}" class="mb-3" alt="" />
            </div>
            <div class="col-md-2 col-lg-2">
                <img src="{{ asset('front/dist/img/home/logo6.jpg') }}" class="mb-3" alt="" />
            </div>
        </div>
    </div>
</section>

@endsection