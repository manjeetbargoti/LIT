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
            <div class="col-md-3 col-lg-3 text-center mb-5">
                <div class="range mt-3">
                    <form>
                        <label for="customRange">Budget</label>
                        <input type="range" class="custom-range" id="customRange">
                    </form>
                    <div id="result"> <span> <b></b> AED</span> </div>
                    <div id="end"> <span> <b>10,000</b> AED</span></div>
                </div>
            </div>

            <div class="col-md-9 col-lg-9 mb-5">
                <div class="row">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 col-lg-4 mb-4">
                        <div class="box">
                            <?php if(!empty($d->image)): ?>
                            <img src="<?php echo e(asset('images/initiative/large/'.$d->image)); ?>" class="mb-3 img-fluid" alt="<?php echo e($d->initiative_name); ?>">
                            <?php else: ?>
                            <img src="<?php echo e(asset('images/initiative/large/default.png')); ?>" class="mb-3 img-fluid" alt="<?php echo e($d->initiative_name); ?>">
                            <?php endif; ?>
                            <h4 class="h4"><?php echo e($d->initiative_name); ?> </h4>
                            <h5 class="h5"><?php echo e($d->budget); ?> AED </h5>
                            <ul class="p-0">
                                <li> <b>Beneficiaries</b>: <?php echo e($d->beneficiaries); ?></li>
                                <li> <b>Duration</b>: <?php echo e($d->duration); ?></li>
                            </ul>
                            <a href="<?php echo e(url('/social-initiative/'.$d->slug)); ?>" class="btn btn-primary text-uppercase"> Read More</a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/front/social_initiatives/all_initiatives.blade.php ENDPATH**/ ?>