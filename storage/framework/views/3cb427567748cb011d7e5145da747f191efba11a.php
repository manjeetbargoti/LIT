<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    System Settings
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 m-auto">
                <div class="card">
                    <div class="card-header">Website Options</div>
                    <div class="card-body">

                        <?php if($errors->any()): ?>
                        <ul class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>

                        <form method="post" class="form-horizontal login_validator"
                            enctype="multipart/form-data" id="form_inline_validator">
                            <?php echo csrf_field(); ?>
                            <!-- Site Title Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Site Title" class="col-form-label"><?php echo e(__('Site Title')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="site_name" name="site_name"
                                        class="form-control <?php if ($errors->has('site_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('site_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        value="<?php echo e(config('app.name')); ?>">
                                </div>
                            </div>
                            <!-- /.Site Title Input Field -->

                            <!-- Site Url Input Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Site Url" class="col-form-label"><?php echo e(__('Site Url')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="text" id="SiteUrl" name="site_url"
                                        class="form-control <?php if ($errors->has('site_url')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('site_url'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        value="<?php echo e(config('app.url')); ?>">
                                </div>
                            </div>
                            <!-- /.Site Url Input Field -->

                            <!-- Website Logo Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Website Logo" class="col-form-label"><?php echo e(__('Website Logo')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="file" name="site_logo" id="site_logo" accept="image/*"
                                        class="form-control" placeholder="Site Logo">
                                    <div class="help-block">
                                        <span><a href="<?php echo e(asset('/images/logo/'.config('app.logo'))); ?>" target="_blank"><img
                                                    src="<?php echo e(asset('/images/logo/'.config('app.logo'))); ?>" width="60"></a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.Website Logo Field -->

                            <!-- Website Favicon Field -->
                            <div class="form-group row">
                                <div class="col-xl-4 text-xl-right">
                                    <label for="Website Favicon" class="col-form-label"><?php echo e(__('Website Favicon')); ?></label>
                                </div>
                                <div class="col-xl-4">
                                    <input type="file" name="site_icon" id="site_icon" accept="image/*"
                                        class="form-control" placeholder="Site icon">
                                    <div class="help-block">
                                        <s pan><a href="<?php echo e(asset('/images/logo/'.config('app.favicon'))); ?>" target="_blank"><img
                                                    src="<?php echo e(asset('/images/logo/'.config('app.favicon'))); ?>" width="60"></a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Website Favicon Field -->

                            <div class="form-actions form-group row">
                                <div class="col-xl-4 m-auto">
                                    <input type="reset" value="Reset" class="btn btn-warning pull-left">
                                    <input type="submit" value="Update" class="btn btn-primary pull-right">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/system/options.blade.php ENDPATH**/ ?>