<?php $__env->startSection('content'); ?>

<!-- slider start -->
<div id="litslider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo e(asset('front/dist/img/home/slide.jpg')); ?>" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo e(asset('front/dist/img/home/slide.jpg')); ?>" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo e(asset('front/dist/img/home/slide.jpg')); ?>" alt="Third slide">
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
            <form action="<?php echo e(url('/on-ground/search')); ?>" method="post" novalidate="novalidate">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 pl-0 text-center mb-4">
                                <img src="dist/img/home/heading-icon.png" class="mb-5" alt="" />
                                <h1 class="h1 text-uppercase"> Build your own </h1>
                                <h4 class="h4"> Sustainability Program </h4>
                                <ul class="nav slidenav mt-5" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="On-ground-tab" data-toggle="tab"
                                            href="#On-ground" role="tab" aria-controls="On-ground"
                                            aria-selected="true">Onground Sustainability Initiatives</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="engagement-tab" data-toggle="tab" href="#engagement"
                                            role="tab" aria-controls="engagement" aria-selected="false">360<sup>o</sup> Digital Marketing Services</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                            <a class="nav-link" id="Both-tab" data-toggle="tab" href="#Both" role="tab" aria-controls="Both" aria-selected="false">Both</a>
                                        </li> -->
                                </ul>
                            </div>
                            <div class="tab-content w-100" id="myTabContent">
                                <div class="tab-pane fade show active" id="On-ground" role="tabpanel"
                                    aria-labelledby="On-ground-tab">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="sdgs"
                                                value="<?php echo e(request('sdgs')); ?>" id="exampleFormControlSelect1">
                                                <option value=""> Select Area of Impact </option>
                                                <?php $__currentLoopData = $sdgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($sdg->sdg_name); ?>"><?php echo e($sdg->sdg_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="budget"
                                                value="<?php echo e(request('budget')); ?>" id="exampleFormControlSelect1">
                                                <option value=""> -- Budget -- </option>
                                                <option value="5000,1000">$5,000-$10,000</option>
                                                <option value="10001,15000">$10,001-$15,000</option>
                                                <option value="15001,20000">$15,001-$20,000</option>
                                                <option value="20001,25000">$20,001-$25,000</option>
                                                <option value="25001,50000">$25,001-$50,000</option>
                                                <option value="50000,100000">$50,000 and Above</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="country"
                                                value="<?php echo e(request('country')); ?>" id="country">
                                                <option value=""> -- Select Country -- </option>
                                                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c->name); ?>"><?php echo e($c->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="state" id="state"
                                                value="<?php echo e(request('state')); ?>">
                                                <option value=""> -- Select State -- </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="city" id="city"
                                                value="<?php echo e(request('city')); ?>">
                                                <option value="">City</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-12 pl-0 pr-0">
                                            <button type="submit" class="btn btn-primary wrn-btn">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="engagement" role="tabpanel"
                                    aria-labelledby="engagement-tab">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" id="exampleFormControlSelect1">
                                                <option> -- Select Campaign -- </option>
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
                                                <option> -- Budget -- </option>
                                                <option>$5,000-$10,000</option>
                                                <option>$10,000-$20,000</option>
                                                <option>$20,000-$30,000</option>
                                                <option>$30,000-$40,000</option>
                                                <option>$40,000-$50,000</option>
                                                <option>$50,000 and Above</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" id="exampleFormControlSelect1">
                                                <option> -- Select Country -- </option>
                                                <option>Country 1</option>
                                                <option>Country 2</option>
                                                <option>Country 3</option>
                                                <option>Country 4</option>
                                                <option>Country 5</option>
                                                <option>Country 6</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" id="exampleFormControlSelect1">
                                                <option> -- Select State -- </option>
                                                <option>State 1</option>
                                                <option>State 2</option>
                                                <option>State 3</option>
                                                <option>State 4</option>
                                                <option>State 5</option>
                                                <option>State 6</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
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
                                            <button type="submit" class="btn btn-primary wrn-btn">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade" id="Both" role="tabpanel" aria-labelledby="Both-tab">sdfdsf</div> -->
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
                <h2 class="h2"> Lightup with LIT </h2>
            </div>
            <?php $__currentLoopData = $instaImages->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instaImg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- <div class="col-md-6 col-lg-3 pb-3 px-2"><a href="<?php echo e($instaImg->link); ?>" target="_blank"><img
                        src="<?php echo e($instaImg->images->low_resolution->url); ?>" class="img-fluid" /></a></div> -->
            <div class="col-md-6 col-lg-3 pb-3 px-2">
                <div class="insta_imgbox">
                    <img src="<?php echo e(asset('front/dist/img/home/insta5.jpg')); ?>" class="img-fluid" />
                    <div class="likecomment">
                        <a class="like_left" href="#"><i class="fa fa-thumbs-up"> </i><span><?php echo e($instaImg->likes->count); ?></span></a>
                        <a class="comment_right" href="#"><i class="fa fa-comments"> </i><span><?php echo e($instaImg->comments->count); ?></span></a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
        <img class="d-block w-100" src="<?php echo e(asset('front/dist/img/home/program.jpg')); ?>" alt="Second slide">
    </div>
    <div class="col-md-12 col-lg-7 offset-lg-5 px-0 projbg">
        <h2 class="h2"> Lorem Ipsum Dummy </h2>
        <div id="projslider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $__currentLoopData = $social_initiatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $si): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
                    <span class="aed"><?php echo e($si->budget); ?> AED</span>
                    <h3 class="h3"> <?php echo e($si->initiative_name); ?> </h3>
                    <ul>
                        <li> Beneficiaries: <?php echo e($si->beneficiaries); ?> </li>
                        <li> Duration: <?php echo e($si->duration); ?> Months </li>
                    </ul>
                    <a href="<?php echo e(url('/social-initiative/'.$si->slug)); ?>" class="btn btnwhite"> READ MORE </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <h2 class="h2"> Success Stories </h2>
            <img src="<?php echo e(asset('front/dist/img/home/heading-icon.png')); ?>" class="mb-5" alt="" />
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-6">
                <img src="<?php echo e(asset('front/dist/img/home/blog1.jpg')); ?>" class="mb-3" alt="" />
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
                <img src="<?php echo e(asset('front/dist/img/home/blog2.jpg')); ?>" class="mb-3" alt="" />
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
            <img src="<?php echo e(asset('front/dist/img/home/heading-icon.png')); ?>" class="mb-5" alt="" />
        </div>
        <div class="row align-items-center">
            <div class="col-md-2 col-lg-2">
                <img src="<?php echo e(asset('front/dist/img/home/logo1.jpg')); ?>" class="mb-3" alt="" />
            </div>
            <div class="col-md-2 col-lg-2">
                <img src="<?php echo e(asset('front/dist/img/home/logo2.jpg')); ?>" class="mb-3" alt="" />
            </div>
            <div class="col-md-2 col-lg-2">
                <img src="<?php echo e(asset('front/dist/img/home/logo3.jpg')); ?>" class="mb-3" alt="" />
            </div>
            <div class="col-md-2 col-lg-2">
                <img src="<?php echo e(asset('front/dist/img/home/logo4.jpg')); ?>" class="mb-3" alt="" />
            </div>
            <div class="col-md-2 col-lg-2">
                <img src="<?php echo e(asset('front/dist/img/home/logo5.jpg')); ?>" class="mb-3" alt="" />
            </div>
            <div class="col-md-2 col-lg-2">
                <img src="<?php echo e(asset('front/dist/img/home/logo6.jpg')); ?>" class="mb-3" alt="" />
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LIT[29_01_2020]\resources\views/homepage.blade.php ENDPATH**/ ?>