<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Social Goals (SDG's)
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit SDG</div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/admin/sdgs')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <?php if($errors->any()): ?>
                        <ul class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(url('/admin/sdgs/' . $sdg->id)); ?>" accept-charset="UTF-8"
                            class="form-horizontal" id="form_block_validator" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('PATCH')); ?>


                            <div class="form-group <?php echo e($errors->has('sdg_name') ? 'has-error' : ''); ?>">
                                <label for="SDG Name" class="control-label"><?php echo e('SDG Name'); ?></label>
                                <input class="form-control" name="sdg_name" type="text" id="sdg_name"
                                    value="<?php echo e($sdg->sdg_name); ?>" required>
                                <?php echo $errors->first('sdg_name', '<p class="help-block">:message</p>'); ?>

                            </div>

                            <div class="form-group <?php echo e($errors->has('sdg_category') ? 'has-error' : ''); ?>">
                                <label for="SDG Category" class="control-label"><?php echo e('SDG Category'); ?></label>
                                <select class="form-control" name="sdg_category" id="sdg_category"
                                    value="<?php echo e(old('sdg_category')); ?>" required>
                                    <option value=""> -- Select Category -- </option>
                                    <option value="Onground" <?php if($sdg->sdg_category == "Onground"): ?> selected <?php endif; ?>> Onground Activity Goal </option>
                                    <option value="360" <?php if($sdg->sdg_category == "360"): ?> selected <?php endif; ?>> 360ْ Digital Marketing </option>
                                </select>
                                <?php echo $errors->first('sdg_category', '<p class="help-block">:message</p>'); ?>

                            </div>

                            <div class="form-group <?php echo e($errors->has('sdg_description') ? 'has-error' : ''); ?>">
                                <label for="Permissions" class="control-label"><?php echo e('SDG Description'); ?></label>
                                <textarea name="sdg_description" id="SDGDescription" rows="5" class="form-control"><?php echo e($sdg->sdg_description); ?></textarea>
                                <?php echo $errors->first('sdg_description', '<p class="help-block">:message</p>'); ?>

                            </div>

                            <div class="form-group">
                                <input class="btn btn-warning pull-left" type="reset" value="Reset">
                                <input class="btn btn-primary pull-right" type="submit" value="Update SDG">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/sdgs/edit.blade.php ENDPATH**/ ?>