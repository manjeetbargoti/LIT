<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Roles
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
                    <div class="card-header">Edit Role #<?php echo e($role->id); ?></div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/admin/user/role')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
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

                        <form method="POST" action="<?php echo e(url('/admin/user/role/' . $role->id)); ?>" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo e(csrf_field()); ?>


                            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                <label for="name" class="control-label"><?php echo e('Name'); ?></label>
                                <input class="form-control" name="name" type="text" id="name"
                                    value="<?php echo e(isset($role->name) ? $role->name : ''); ?>">
                                <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

                            </div>

                            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                <label for="Permissions" class="control-label"><?php echo e('Permissions'); ?></label>
                                <select class="form-control chzn-select" name="permissions[]" id="Permissions" multiple>
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($p->name); ?>" <?php $__currentLoopData = $roleName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if($rn == $p->name): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>><?php echo e($p->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

                            </div>


                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Update">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/role/edit.blade.php ENDPATH**/ ?>