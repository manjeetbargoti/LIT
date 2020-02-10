<?php $__env->startSection('content'); ?>
<!-- <header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Error 403
                </h4>
            </div>
        </div>
    </div>
</header> -->
<!-- <div class="outer">
    <div class="container">
        <div class="row">
            <div class='col-lg-4 m-auto'>
                <h3>
                    <center>403<br>
                        <small>You do not have right permission.</small></center>
                </h3>
            </div>
        </div>
    </div>
</div> -->

<div class="row m-center">
    <img src="<?php echo e(url('/images/error/403.png')); ?>" alt="" class="img-responsive m-auto" width="800">
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/errors/403.blade.php ENDPATH**/ ?>