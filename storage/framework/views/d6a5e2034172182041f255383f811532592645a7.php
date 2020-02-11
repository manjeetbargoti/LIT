<?php $__env->startSection('content'); ?>

<div id="litsliderstory" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo e(asset('front/dist/img/about/banner.jpg')); ?>" alt="First slide">
            <h3> Success Story </h3>
        </div>
    </div>
</div>


<!-- contactus Box -->
<section id="contactus">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center mb-5">
                <img src="<?php echo e(asset('front/dist/img/home/heading-icon.png')); ?>" class="mb-2 mx-auto" alt="">
                <h2> Success Story </h2>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-lg-4 mb-5">
                <div class="box">
                    <img src="<?php echo e(asset('/images/successStory/large/'.$d->feature_image)); ?>" class="mb-3  img-fluid" alt="">
                    <h3 class="h3"><?php echo e($d->title); ?></h3>
                    <p><?php echo e($d->short_content); ?></p>
                    <a href="<?php echo e(url('/success-story/'.$d->slug)); ?>" class="btn btn-primary text-uppercase"> Read More</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/front/success-story/all_story.blade.php ENDPATH**/ ?>