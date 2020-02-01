<?php $__env->startSection('content'); ?>

<!-- slider start -->
<div id="litsliderabt" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo e(asset('front/dist/img/about/banner.jpg')); ?>" alt="First slide">
            <h3> Project Detail </h3>
        </div>
    </div>
</div>


<!-- Project Details Box -->
<section id="projectdetl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 float-left px-0">
                <img class="d-block w-100" src="<?php echo e(asset('images/initiative/large/'.$siImage->image_name)); ?>" alt="Second slide">
            </div>
            <div class="col-md-12 col-lg-6 pl-4">
                <img src="<?php echo e(asset('front/dist/img/home/heading-icon.png')); ?>" class="mb-2 mx-auto" alt="">
                <h2> <?php echo e($data->initiative_name); ?> </h2>
                <span class="pricebx"> AED <?php echo e($data->budget); ?> </span>
                <ul class="p-0">
                    <li> <b>Title</b>: <?php echo e($data->initiative_name); ?></li>
                    <li> <b>Location</b>: <?php echo e($data->city); ?>, <?php echo e($data->state); ?>, <?php echo e($data->country); ?></li>
                    <li> <b>Beneficiaries</b>: <?php echo e($data->beneficiaries); ?> [AED <?php echo e(round($benefit_per_person, 2)); ?> /person]</li>
                    <li> <b>Duration</b>: <?php echo e($data->duration); ?> months</li>
                    <li> <b>SDG</b>: <?php echo e($data->area_impact_sdg); ?></li>
                    <li> <b>Description</b>: <?php echo e($data->initiative_description); ?></li>
                </ul>
                <div class="btnbx">
                    <a href="<?php echo e(url('/social-initiative/add-to-cart/'.$data->id)); ?>" class="btn btn-primary text-uppercase"> Add to Impact Box</a>
                    <a href="#" class="btn btn-primary text-uppercase"> Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LIT[29_01_2020]\resources\views/front/social_initiatives/single_initiative.blade.php ENDPATH**/ ?>