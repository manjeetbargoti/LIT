<?php $__env->startSection('content'); ?>

<!-- slider start -->
<div id="litslider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $im): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-item <?php if($key == 0): ?>active <?php endif; ?> <?php echo $key; ?>">
            <img class="d-block w-100" src="<?php echo e(asset('images/banners/'.$im->image)); ?>" alt="First slide">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 pl-0 text-center mb-4">
                            <img src="dist/img/home/heading-icon.png" class="mb-5" alt="" />
                            <h1 class="h1 text-uppercase"> Build your own </h1>
                            <h4 class="h4"> Sustainability Program </h4>
                            <ul class="nav slidenav mt-5" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="On-ground-tab" data-toggle="tab" href="#On-ground"
                                        role="tab" aria-controls="On-ground" aria-selected="true">Onground
                                        Sustainability Initiatives</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="engagement-tab" data-toggle="tab" href="#engagement"
                                        role="tab" aria-controls="engagement" aria-selected="false">360<sup>o</sup>
                                        Digital Marketing Services</a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="Both-tab" data-toggle="tab" href="#Both" role="tab"
                                        aria-controls="Both" aria-selected="false">Both</a>
                                </li> -->
                            </ul>
                        </div>
                        <div class="tab-content w-100" id="myTabContent">
                            <div class="tab-pane fade show active" id="On-ground" role="tabpanel"
                                aria-labelledby="On-ground-tab">
                                <form action="<?php echo e(url('/on-ground/search')); ?>" method="post" novalidate="novalidate">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-1">
                                            <select class="form-control" name="sdgs[]"
                                                value="<?php echo e(request('sdgs')); ?>" id="MultiSelect1" multiple data-placeholder="Select SDGs">
                                                <!-- <option value=""> Select Area of Impact </option> -->
                                                <?php $__currentLoopData = $sdgs->where('sdg_category', 'Onground'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($sdg->sdg_name); ?>"><?php echo e($sdg->sdg_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="budget"
                                                value="<?php echo e(request('budget')); ?>" id="budget">
                                                <option value="">Select Budget</option>
                                                <option value="in-kind">In kind partnerships</option>
                                                <option value="1,5000">$1-$5,000</option>
                                                <option value="5000,10000">$5,000-$10,000</option>
                                                <option value="10001,15000">$10,001-$15,000</option>
                                                <option value="15001,20000">$15,001-$20,000</option>
                                                <option value="20001,25000">$20,001-$25,000</option>
                                                <option value="25001,50000">$25,001-$50,000</option>
                                                <option value="50000,100000">$50,000 and Above</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="country"
                                                value="<?php echo e(request('country')); ?>" id="country" data-placeholder="Select Country">
                                                <option value=""> -- Select Country -- </option>
                                                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c->name); ?>"><?php echo e($c->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <!-- <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="state" id="state"
                                                value="<?php echo e(request('state')); ?>" data-placeholder="Select State">
                                                <option value=""> -- Select State -- </option>
                                            </select>
                                        </div> -->
                                        <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="city" id="city"
                                                value="<?php echo e(request('city')); ?>" data-placeholder="Select City">
                                                <option value="">City</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-12 pl-0 pr-0">
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="engagement" role="tabpanel" aria-labelledby="engagement-tab">
                                <form action="<?php echo e(url('/digital-service/search')); ?>" method="post"
                                    novalidate="novalidate">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-1">
                                            <select class="form-control" name="sdgs[]"
                                                value="<?php echo e(request('sdgs')); ?>" id="MultiSelect2" multiple data-placeholder="Select Campaign">
                                                <!-- <option value=""> Select Campaign </option> -->
                                                <?php $__currentLoopData = $sdgs->where('sdg_category', '360'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($sdg->sdg_name); ?>"><?php echo e($sdg->sdg_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="budget"
                                                value="<?php echo e(request('budget')); ?>" id="exampleFormControlSelect1">
                                                <option value=""> -- Budget -- </option>
                                                <option value="0,5000">$0-$5,000</option>
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
                                                value="<?php echo e(request('country')); ?>" id="country2">
                                                <option value=""> -- Select Country -- </option>
                                                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c->name); ?>"><?php echo e($c->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="state" id="state2"
                                                value="<?php echo e(request('state')); ?>">
                                                <option value=""> -- Select State -- </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="city" id="city2"
                                                value="<?php echo e(request('city')); ?>">
                                                <option value="">City</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-12 pl-0 pr-0">
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="Both" role="tabpanel" aria-labelledby="Both-tab">
                                <form action="<?php echo e(url('/all-search/result')); ?>" method="post" novalidate="novalidate">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="sdgs[]"
                                                value="<?php echo e(request('sdgs')); ?>" id="MultiSelect3" multiple data-placeholder="Select area of impact">
                                                <!-- <option value=""> Select area of impact </option> -->
                                                <?php $__currentLoopData = $sdgs->where('sdg_category', 'Onground'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($sdg->sdg_name); ?>"><?php echo e($sdg->sdg_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="sdgs2[]"
                                                value="<?php echo e(request('sdgs2')); ?>" id="MultiSelect4" multiple data-placeholder="Select 360 Digital Service">
                                                <!-- <option value=""> Select 360 Digital Service </option> -->
                                                <?php $__currentLoopData = $sdgs->where('sdg_category', '360'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sdg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($sdg->sdg_name); ?>"><?php echo e($sdg->sdg_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="budget"
                                                value="<?php echo e(request('budget')); ?>" id="exampleFormControlSelect1">
                                                <option value=""> -- Budget -- </option>
                                                <option value="0,5000">$0-$5,000</option>
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
                                                value="<?php echo e(request('country')); ?>" id="country3">
                                                <option value=""> -- Select Country -- </option>
                                                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c->name); ?>"><?php echo e($c->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div cSlass="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="state" id="state3"
                                                value="<?php echo e(request('state')); ?>">
                                                <option value=""> -- Select State -- </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12 pl-0 pr-1">
                                            <select class="form-control search-slt" name="city" id="city3"
                                                value="<?php echo e(request('city')); ?>">
                                                <option value="">City</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-sm-12 pl-0 pr-0">
                                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 pl-0 text-center">
                        <p class="text-uppercase pt-5"> creativity for impact </p>
                    </div>
                </div>
            </div>
        </div>

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
            <?php if(!empty($instaImages->data)): ?>
            <?php $__currentLoopData = $instaImages->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instaImg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- <div class="col-md-6 col-lg-3 pb-3 px-2"><a href="<?php echo e($instaImg->link); ?>" target="_blank"><img
                        src="<?php echo e($instaImg->images->low_resolution->url); ?>" class="img-fluid" /></a></div> -->
            <div class="col-md-6 col-lg-3 pb-3 px-2">
                <div class="insta_imgbox">
                    <a href="<?php echo e($instaImg->link); ?>" target="_blank">
                        <img src="<?php echo e($instaImg->images->low_resolution->url); ?>" class="img-fluid" />
                        <div class="likecomment">
                            <a class="like_left" href="<?php echo e($instaImg->link); ?>"><i class="fa fa-thumbs-up">
                                </i><span><?php echo e($instaImg->likes->count); ?></span></a>
                            <a class="comment_right" href="<?php echo e($instaImg->link); ?>"><i class="fa fa-comments">
                                </i><span><?php echo e($instaImg->comments->count); ?></span></a>
                        </div>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            <?php else: ?>
            
            <?php for($i=1; $i < 7; $i++): ?>
            <div class="col-md-6 col-lg-3 pb-3 px-2">
                <div class="insta_imgbox">
                    <a href="#" target="_blank">
                        <img src="<?php echo e(asset('/admin/img/gallery/full/'.$i.'.jpg')); ?>" class="img-fluid" />
                        <div class="likecomment">
                            <a class="like_left" href="#"><i class="fa fa-thumbs-up">
                                </i><span>Insta image</span></a>
                            <a class="comment_right" href="#"><i class="fa fa-comments">
                                </i><span><?php echo e($i); ?></span></a>
                        </div>
                    </a>
                </div>
            </div>
            <?php endfor; ?>
            
            <?php endif; ?>

        </div>
    </div>
</section>
<!-- Suggested Programs Box -->
<section id="programs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-4">
                <span class="titlesm text-uppercase"> suggested programs</span>
                <h2 class="h2"> Initiative Project Campaigns </h2>
            </div>
            <div class="col-md-6 col-lg-2">
                <span class="numbtitle"> Number of Initiatives</span>
                <h3 class="h3"><?php echo e(\App\SocialInitiative::where('status', 1)->count()); ?></h3>
            </div>
            <div class="col-md-6 col-lg-2">
                <span class="numbtitle"> Number of Projects</span>
                <h3 class="h3"><?php echo e(\App\Proposal::where('status', 1)->count()); ?></h3>
            </div>
            <div class="col-md-6 col-lg-2">
                <span class="numbtitle"> Number of Campaigns</span>
                <h3 class="h3"><?php echo e(\App\InstaCampaigns::where('status', 1)->count()); ?></h3>
            </div>
            <div class="col-md-6 col-lg-2">
                <span class="numbtitle"> Number of Activists</span>
                <h3 class="h3"><?php echo e(\App\User::where('status', 1)->count()); ?></h3>
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
        <h2 class="h2"> <?php echo e(__('')); ?> </h2>
        <div id="projslider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $__currentLoopData = $social_initiatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $si): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
                    <span class="aed"><?php if($si->max_budget == $si->min_budget): ?> USD <?php echo e($si->budget); ?> <?php elseif($si->max_budget != $si->min_budget): ?> USD <?php echo e($si->min_budget); ?> - <?php echo e($si->max_budget); ?> <?php endif; ?></span>
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
            <?php $__currentLoopData = $success_story; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-6">
                <img src="<?php echo e(asset('/images/successStory/large/'.$ss->feature_image)); ?>" class="mb-3" alt="<?php echo e($ss->title); ?>" />
                <h3 class="h3"><?php echo e($ss->title); ?></h3>
                <p><?php echo e($ss->short_content); ?></p>
                <ul class="numbtitle text-uppercase">
                    <!-- <li> <span>1</span> comments</li> -->
                    <!-- <li>|</li> -->
                    <li> By <a href="#"> <?php echo e($ss->first_name); ?> <?php echo e($ss->last_name); ?> </a> </li>
                </ul>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12 col-lg-12 text-center mt-4"> <a href="<?php echo e(url('/success-stories')); ?>" class="btn btnwhite"> READ MORE </a></div>
        </div>
    </div>
</section>
<!-- patnerlogos Box -->
<section id="patnerlogos">
    <div class="container">
        <div class="row align-items-center">
            <span class="titlesm text-uppercase"> Changemakers</span>
            <h2 class="h2"> Our Partners </h2>
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
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/homepage.blade.php ENDPATH**/ ?>