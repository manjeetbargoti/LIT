<?php $__env->startSection('content'); ?>

<div id="litsliderstory" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo e(asset('front/dist/img/about/banner.jpg')); ?>" alt="First slide">
            <h3> Programs </h3>
        </div>
    </div>
</div>


<!-- contactus Box -->
<section id="program">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center mb-5">
                <img src="<?php echo e(asset('front/dist/img/home/heading-icon.png')); ?>" class="mb-2 mx-auto" alt="">
                <h3> Programs </h3>
            </div>

            <div class="col-md-12 col-lg-12 mb-5">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6" style="border-right: 1px dashed #000;">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="text-center mb-5">360ْ Digital Marketing Services</h4>
                            </div>
                            
                            <?php if($data2_count == 0): ?>
                            <div class="col-md-12 col-lg-12 mb-4">
                                <h5 class="text-center">Sorry! no result found.</h5>
                            </div>
                            <?php endif; ?>
                            <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-6 mb-4">
                                <div class="box">
                                    <?php if(!empty($d->image)): ?>
                                    <img src="<?php echo e(asset('images/initiative/large/'.$d->image)); ?>" class="mb-3 img-fluid"
                                        alt="<?php if(!empty($d->initiative_name)): ?><?php echo e($d->initiative_name); ?><?php elseif(!empty($d->service_name)): ?><?php endif; ?>">
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('images/initiative/large/default.png')); ?>" class="mb-3 img-fluid"
                                        alt="<?php if(!empty($d->initiative_name)): ?><?php echo e($d->initiative_name); ?><?php elseif(!empty($d->service_name)): ?><?php endif; ?>">
                                    <?php endif; ?>
                                    <h4 class="h4">
                                        <?php if(!empty($d->initiative_name)): ?><?php echo e($d->initiative_name); ?><?php elseif(!empty($d->service_name)): ?><?php endif; ?>
                                    </h4>
                                    <h5 class="h5"><?php echo e($d->budget); ?> AED </h5>
                                    <ul class="p-0">
                                        <li> <b>Beneficiaries</b>: <?php echo e($d->beneficiaries); ?></li>
                                        <li> <b>Duration</b>: <?php echo e($d->duration); ?></li>
                                    </ul>
                                    <?php if(!empty($d->initiative_name)): ?>
                                    <a href="<?php echo e(url('/social-initiative/'.$d->slug)); ?>"
                                        class="btn btn-primary text-uppercase">
                                        Read More</a>
                                    <?php elseif(!empty($d->service_name)): ?>
                                    <a href="<?php echo e(url('/digital-service/'.$d->slug)); ?>"
                                        class="btn btn-primary text-uppercase">
                                        Read More</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6" style="border-left: 1px dashed #000;">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="text-center mb-5">Onground Sustainability Initiatives</h4>
                            </div>
                            
                            <?php if($data_count == 0): ?>
                            <div class="col-md-12 col-lg-12 mb-4">
                                <h5 class="text-center">Sorry! no result found.</h5>
                            </div>
                            <?php endif; ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 col-lg-6 mb-4">
                                <div class="box">
                                    <?php if(!empty($d->image)): ?>
                                    <img src="<?php echo e(asset('images/initiative/large/'.$d->image)); ?>" class="mb-3 img-fluid"
                                        alt="<?php if(!empty($d->initiative_name)): ?><?php echo e($d->initiative_name); ?><?php elseif(!empty($d->service_name)): ?><?php endif; ?>">
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('images/initiative/large/default.png')); ?>" class="mb-3 img-fluid"
                                        alt="<?php if(!empty($d->initiative_name)): ?><?php echo e($d->initiative_name); ?><?php elseif(!empty($d->service_name)): ?><?php endif; ?>">
                                    <?php endif; ?>
                                    <h4 class="h4">
                                        <?php if(!empty($d->initiative_name)): ?><?php echo e($d->initiative_name); ?><?php elseif(!empty($d->service_name)): ?><?php endif; ?>
                                    </h4>
                                    <h5 class="h5"><?php echo e($d->budget); ?> AED </h5>
                                    <ul class="p-0">
                                        <li> <b>Beneficiaries</b>: <?php echo e($d->beneficiaries); ?></li>
                                        <li> <b>Duration</b>: <?php echo e($d->duration); ?></li>
                                    </ul>
                                    <?php if(!empty($d->initiative_name)): ?>
                                    <a href="<?php echo e(url('/social-initiative/'.$d->slug)); ?>"
                                        class="btn btn-primary text-uppercase">
                                        Read More</a>
                                    <?php elseif(!empty($d->service_name)): ?>
                                    <a href="<?php echo e(url('/digital-service/'.$d->slug)); ?>"
                                        class="btn btn-primary text-uppercase">
                                        Read More</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/front/social_initiatives/all_search_result.blade.php ENDPATH**/ ?>