<?php $__env->startSection('content'); ?>

<div id="litsliderstory" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo e(asset('front/dist/img/about/banner.jpg')); ?>" alt="First slide">
            <h3> <?php echo e($data->title); ?> <?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?> </h3>
        </div>
    </div>
</div>

<!-- Single Activist -->
<section id="projectdetl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 float-left px-0">
            	<?php if(!empty($data->avatar)): ?>
                <img class="d-block w-50 img-responsive" style="margin: auto; display: block;" src="<?php echo e(asset('images/user/large/'.$data->avatar)); ?>" alt="<?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?>">
                <?php else: ?>
                <img class="d-block w-50 img-responsive" style="margin: auto; display: block;" src="<?php echo e(asset('images/user/user.png')); ?>" alt="<?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?>">
                <?php endif; ?>
            </div>
            <div class="col-md-12 col-lg-6 pl-4">
                <img src="<?php echo e(asset('front/dist/img/home/heading-icon.png')); ?>" class="mb-2 mx-auto" alt="">
                <h2> <?php echo e($data->title); ?> <?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?></h2>
                <span class="pricebx"> <?php echo e($data->role); ?> </span>
                <ul class="p-0">
                    <li> <b>Title</b>: <?php if(!empty($data->initiative_name)): ?><?php echo e($data->initiative_name); ?><?php elseif(!empty($data->service_name)): ?><?php echo e($data->service_name); ?><?php endif; ?> </li>
                    <li> <b>Location</b>: <?php echo e($data->city); ?>, <?php echo e($data->state); ?>, <?php echo e($data->country); ?></li>
                    <li> <b>Beneficiaries</b>: <?php echo e($data->beneficiaries); ?>

                    <li> <b>Duration</b>: <?php echo e($data->duration); ?> months</li>
                    <li> <b>SDG</b>: <?php echo e($data->area_impact_sdg); ?></li>
                    <li> <b>Description</b>: <?php if(!empty($data->initiative_name)): ?><?php echo e($data->initiative_name); ?><?php elseif(!empty($data->service_name)): ?><?php endif; ?></li>
                </ul>
                <div class="btnbx">
                    <a href="<?php echo e(url('/users/activists/'.$data->id)); ?>" class="btn btn-primary text-uppercase"> Express Interest</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/front/users/singleActivist.blade.php ENDPATH**/ ?>