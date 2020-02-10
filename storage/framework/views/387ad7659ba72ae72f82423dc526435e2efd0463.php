<?php $__env->startSection('content'); ?>

<div id="litsliderabt" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo e(asset('/front/dist/img/about/banner.jpg')); ?>" alt="First slide">
            <h3> <?php echo e($data->name); ?> </h3>
        </div>
    </div>
</div>

<?php echo $data->content; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/front/pages/single.blade.php ENDPATH**/ ?>