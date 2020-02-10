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
                <h3> CSR Market Place </h3>
            </div>

            <div class="col-md-12 col-lg-12 mb-5">
                <div class="row">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-12 col-lg-12 mb-4">
                        <div class="box">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4 class="h4"><?php echo e($d->project_name); ?></h4>
                                    <h4 class="h6">Company: <strong class="text-primary"> <?php $__currentLoopData = \App\BusinessInfo::where('id', $d->business_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($b->business_name); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></strong> | Location: <span class="text-success"><?php echo e($d->city); ?>,
                                        <?php echo e($d->state); ?>, <?php echo e($d->country); ?></span></h4>
                                    <p class="h6">Budget: <?php echo e($d->budget); ?> AED | Submission Date</b>:
                                        <?php echo e($d->submission_time); ?> | Duration</b>: <?php echo e($d->project_timeline); ?>

                                        <?php echo e($d->time_period); ?> | Social Impact Points: <?php echo e($d->social_impact_points); ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <a href="#" class="btn btn-primary text-uppercase">Submit Proposal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/front/csr/list_csr.blade.php ENDPATH**/ ?>