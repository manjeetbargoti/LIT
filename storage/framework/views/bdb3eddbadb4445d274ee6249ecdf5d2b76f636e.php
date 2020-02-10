<?php $__env->startSection('content'); ?>
<style>
.form-group label {
    margin-top: 0px;
}

.product_image_upload .fileinput-upload-button {
    display: none;
}

#filediv {
    display: inline-block !important;
}

#file {
    color: green;
    padding: 5px;
    border: 1px dashed #123456;
    background-color: #f9ffe5
}

#noerror {
    color: green;
    text-align: left
}

#error {
    color: red;
    text-align: left
}

#img {
    width: 17px;
    border: none;
    height: 17px;
    margin-left: 10px;
    cursor: pointer;
}

.abcd img {
    height: 100px;
    width: 100px;
    padding: 5px;
    border-radius: 10px;
    border: 1px solid #e8debd
}

#close {
    vertical-align: top;
    background-color: red;
    color: white;
    border-radius: 5px;
    padding: 4px;
    margin-left: -13px;
    margin-top: 1px;
}
</style>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Social Impact
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">Edit Initiative</div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/admin/social-impact/initiatives')); ?>" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <br />
                        <br />

                        <?php if($errors->any()): ?>
                        <ul class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>

                        <form method="POST"
                            action="<?php echo e(url('/admin/social-impact/initiatives/' . $socialInitiative->id)); ?>"
                            accept-charset="UTF-8" class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo e(csrf_field()); ?>


                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative Name"
                                        class="col-form-label"><?php echo e(__('Initiative Name *')); ?></label>
                                </div>
                                <div class="col-xl-5 <?php echo e($errors->has('initiative_name') ? 'has-error' : ''); ?>">
                                    <input class="form-control <?php if ($errors->has('initiative_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('initiative_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="initiative_name" type="text" id="initiative_name"
                                        value="<?php echo e($socialInitiative->initiative_name); ?>" required>
                                    <?php echo $errors->first('initiative_name', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="col-xl-4 <?php echo e($errors->has('area_impact_sdg') ? 'has-error' : ''); ?>">
                                    <select class="form-control <?php if ($errors->has('area_impact_sdg')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('area_impact_sdg'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="area_impact_sdg" id="area_impact_sdg" value="<?php echo e(old('area_impact_sdg')); ?>" required>
                                        <option value=""> -- Select SDG -- </option>
                                        <?php $__currentLoopData = $sdgs->where('sdg_category','Onground'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($s->sdg_name); ?>" <?php if($s->sdg_name == $socialInitiative->area_impact_sdg): ?> selected <?php endif; ?>><?php echo e($loop->iteration); ?>. <?php echo e($s->sdg_name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                                    <?php echo $errors->first('area_impact_sdg', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative Description"
                                        class="col-form-label"><?php echo e(__('Initiative Description *')); ?></label>
                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('initiative_description') ? 'has-error' : ''); ?>">
                                    <textarea class="form-control <?php if ($errors->has('initiative_description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('initiative_description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="initiative_description" id="initiative_description"
                                        value="<?php echo e(old('initiative_description')); ?>" rows="5"
                                        required><?php echo e($socialInitiative->initiative_description); ?></textarea>
                                    <?php echo $errors->first('initiative_description', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative info"
                                        class="col-form-label"><?php echo e(__('Initiative info *')); ?></label>
                                </div>
                                <div class="col-xl-3 <?php echo e($errors->has('beneficiaries') ? 'has-error' : ''); ?>">
                                    <input class="form-control <?php if ($errors->has('beneficiaries')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('beneficiaries'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="beneficiaries" type="text" id="Beneficiaries"
                                        value="<?php echo e($socialInitiative->beneficiaries); ?>"
                                        placeholder="no. of Beneficieries" required>
                                    <?php echo $errors->first('beneficiaries', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="input-group col-xl-3 <?php echo e($errors->has('budget') ? 'has-error' : ''); ?>">
                                    <span class="input-group-addon">AED</span>
                                    <input class="form-control <?php if ($errors->has('budget')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('budget'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="budget"
                                        type="text" id="Budget" value="<?php echo e($socialInitiative->budget); ?>"
                                        placeholder="Budget" required>
                                    <?php echo $errors->first('budget', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="input-group col-xl-3 <?php echo e($errors->has('duration') ? 'has-error' : ''); ?>">
                                    <span class="input-group-addon">months</span>
                                    <input class="form-control <?php if ($errors->has('duration')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('duration'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="duration"
                                        type="text" id="Duration" value="<?php echo e($socialInitiative->duration); ?>"
                                        placeholder="Duration" required>
                                    <?php echo $errors->first('duration', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Address" class="col-form-label"><?php echo e(__('Address *')); ?></label>
                                </div>
                                <div class="col-xl-5 <?php echo e($errors->has('region') ? 'has-error' : ''); ?>">
                                    <input class="form-control <?php if ($errors->has('region')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('region'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="region"
                                        type="text" id="Region" value="<?php echo e($socialInitiative->region); ?>"
                                        placeholder="Locality" required>
                                    <?php echo $errors->first('region', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="col-xl-4 <?php echo e($errors->has('street') ? 'has-error' : ''); ?>">
                                    <input class="form-control <?php if ($errors->has('street')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('street'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="street"
                                        type="text" id="Street" value="<?php echo e($socialInitiative->street); ?>"
                                        placeholder="Street">
                                    <?php echo $errors->first('street', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Location" class="col-form-label"><?php echo e(__('Location *')); ?></label>
                                </div>
                                <div class="col-xl-3 <?php echo e($errors->has('country') ? 'has-error' : ''); ?>">
                                    <select name="country" id="country"
                                        class="form-control <?php if ($errors->has('country')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('country'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> chzn-select"
                                        value="<?php echo e(old('country')); ?>" required>
                                        <?php echo $country_dropdown; ?>
                                    </select>
                                    <?php echo $errors->first('country', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="col-xl-3 <?php echo e($errors->has('state') ? 'has-error' : ''); ?>">
                                    <select name="state" id="state"
                                        class="form-control <?php if ($errors->has('state')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('state'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        value="<?php echo e(old('state')); ?>" required>
                                        <?php echo $state_dropdown; ?>
                                    </select>
                                    <?php echo $errors->first('state', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="col-xl-3 <?php echo e($errors->has('city') ? 'has-error' : ''); ?>">
                                    <select name="city" id="city"
                                        class="form-control <?php if ($errors->has('city')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('city'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        value="<?php echo e(old('city')); ?>" required>
                                        <?php echo $city_dropdown; ?>
                                    </select>
                                    <?php echo $errors->first('city', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Image"
                                        class="col-form-label"><?php echo e(__('Initiative Images *')); ?></label>
                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('country') ? 'has-error' : ''); ?>">
                                    <div class="add_image">
                                        <input type="button" id="add_more" class="btn btn-info" value="Select Image" />
                                        <!-- <i class="fas fa-camera"></i> -->
                                        <!-- <input type="text" id="CurrentImage" name="current_image[]"
                                            value="<?php echo e($socialInitiative->image); ?>" class="d-none" /> -->
                                    </div>

                                    <div id="abcd1" class="abcd col-sm-12 m-t-5">
                                        <?php $__currentLoopData = \App\SocialInitiativeImages::where('social_initiative_id',
                                        $socialInitiative->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sIimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img class="img-responsive" width="100"
                                            src="<?php echo e(asset('/images/initiative/large/'.$sIimg->image_name)); ?>"
                                            alt="<?php echo e($socialInitiative->initiative_name); ?>" style="padding: 0 0.1em;">
                                        <a href="<?php echo e(url('/admin/initiative/image/' . $sIimg->id . '/delete')); ?>"><i
                                                id="close" alt="delete" class="fa fa-close"></i></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="col-xl-10 m-auto">
                                    <input class="btn btn-danger pull-left" type="reset" value="Reset Details">
                                    <input class="btn btn-success pull-right" type="submit" value="Create Initiative">
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
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/social_initiative/edit.blade.php ENDPATH**/ ?>