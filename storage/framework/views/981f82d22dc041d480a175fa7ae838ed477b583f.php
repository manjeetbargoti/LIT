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
                        <a href="<?php echo e(url('/admin/social-impact/digital-service')); ?>" title="Back"><button
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
                            action="<?php echo e(url('/admin/social-impact/digital-service/' . $instaCamp->id)); ?>"
                            accept-charset="UTF-8" class="form-horizontal login_validator" enctype="multipart/form-data"
                            id="form_inline_validator">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo e(csrf_field()); ?>


                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Service Name"
                                        class="col-form-label"><?php echo e(__('Service Name *')); ?></label>
                                </div>
                                <div class="col-xl-5 <?php echo e($errors->has('service_name') ? 'has-error' : ''); ?>">
                                    <input class="form-control <?php if ($errors->has('service_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('service_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="service_name" type="text" id="service_name"
                                        value="<?php echo e($instaCamp->service_name); ?>" required>
                                    <?php echo $errors->first('service_name', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="col-xl-4 <?php echo e($errors->has('area_impact_sdg') ? 'has-error' : ''); ?>">
                                    <select class="form-control <?php if ($errors->has('area_impact_sdg')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('area_impact_sdg'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="area_impact_sdg" id="area_impact_sdg" value="<?php echo e(old('area_impact_sdg')); ?>" required>
                                        <option value=""> -- Select SDG -- </option>
                                        <?php $__currentLoopData = $sdgs->where('sdg_category','360'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($s->sdg_name); ?>" <?php if($s->sdg_name == $instaCamp->area_impact_sdg): ?> selected <?php endif; ?>><?php echo e($loop->iteration); ?>. <?php echo e($s->sdg_name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <select>
                                    <?php echo $errors->first('area_impact_sdg', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Service Description"
                                        class="col-form-label"><?php echo e(__('Service Description *')); ?></label>
                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('service_description') ? 'has-error' : ''); ?>">
                                    <textarea class="form-control <?php if ($errors->has('service_description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('service_description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="service_description" id="service_description"
                                        value="<?php echo e(old('service_description')); ?>" rows="5"
                                        required><?php echo e($instaCamp->service_description); ?></textarea>
                                    <?php echo $errors->first('service_description', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative info"
                                        class="col-form-label"><?php echo e(__('Time Duration *')); ?></label>
                                </div>
                                <div class="input-group col-xl-3 <?php echo e($errors->has('start_date') ? 'has-error' : ''); ?>">
                                    <span class="input-group-addon">Start</span>
                                    <input class="form-control <?php if ($errors->has('start_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('start_date'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="start_date" type="text" data-date-format="yyyy-mm-dd" id="dp2"
                                        value="<?php echo e($instaCamp->start_date); ?>" placeholder="Start Date" required>
                                    <?php echo $errors->first('start_date', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="input-group col-xl-3 <?php echo e($errors->has('end_date') ? 'has-error' : ''); ?>">
                                    <span class="input-group-addon">End</span>
                                    <input class="form-control <?php if ($errors->has('end_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('end_date'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="end_date" type="text" data-date-format="yyyy-mm-dd" id="dp2-1" value="<?php echo e($instaCamp->end_date); ?>" placeholder="End Date"
                                        required>
                                    <?php echo $errors->first('end_date', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="input-group col-xl-3 <?php echo e($errors->has('duration') ? 'has-error' : ''); ?>">
                                    <!-- <span class="input-group-addon">months</span> -->
                                    <div class="input-group">
                                        <span class="input-group-addon">Out Reach</span>
                                        <input class="form-control <?php if ($errors->has('outreach')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('outreach'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="outreach"
                                        type="text" id="outreach" value="<?php echo e($instaCamp->outreach); ?>" placeholder="No. of People"
                                        required>
                                    </div>
                                    <?php echo $errors->first('outreach', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative info"
                                        class="col-form-label"><?php echo e(__('Service info *')); ?></label>
                                </div>
                                <div class="col-xl-3 <?php echo e($errors->has('beneficiaries') ? 'has-error' : ''); ?>">
                                    <input class="form-control <?php if ($errors->has('beneficiaries')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('beneficiaries'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="beneficiaries" type="text" id="Beneficiaries"
                                        value="<?php echo e($instaCamp->beneficiaries); ?>"
                                        placeholder="no. of Beneficieries" required>
                                    <?php echo $errors->first('beneficiaries', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="input-group col-xl-3 <?php echo e($errors->has('budget') ? 'has-error' : ''); ?>">
                                    <span class="input-group-addon">$</span>
                                    <input class="form-control <?php if ($errors->has('budget')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('budget'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="budget"
                                        type="text" id="Budget" value="<?php echo e($instaCamp->budget); ?>"
                                        placeholder="Budget" required>
                                    <?php echo $errors->first('budget', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="input-group col-xl-3 <?php echo e($errors->has('duration') ? 'has-error' : ''); ?>">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <select class="time-period" name="time_period">
                                                <option value="Days" <?php if($instaCamp->time_period == 'Day'): ?> selected <?php endif; ?>>Days</option>
                                                <option value="Month" <?php if($instaCamp->time_period == 'Month'): ?> selected <?php endif; ?>>Months</option>
                                                <option value="Year" <?php if($instaCamp->time_period == 'Year'): ?> selected <?php endif; ?>>Year</option>
                                            </select>
                                        </div>
                                        <input class="form-control <?php if ($errors->has('duration')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('duration'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="duration"
                                        type="text" id="Duration" value="<?php echo e($instaCamp->duration); ?>" placeholder="Duration"
                                        required>
                                    </div>
                                    <?php echo $errors->first('duration', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Image"
                                        class="col-form-label"><?php echo e(__('')); ?></label>
                                </div>
                                <div class="flex-sb-m w-full p-t-3 p-b-32">
                                    <div class="contact100-form-checkbox">
                                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="in_partnership" <?php if($instaCamp->duration == 1): ?> checked <?php endif; ?> value="1">
                                        <label class="label-checkbox100" for="ckb1">
                                            In kind Partnership.
                                        </label>
                                    </div>
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
                                        type="text" id="Region" value="<?php echo e($instaCamp->region); ?>"
                                        placeholder="Locality" required>
                                    <?php echo $errors->first('region', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="col-xl-4 <?php echo e($errors->has('street') ? 'has-error' : ''); ?>">
                                    <input class="form-control <?php if ($errors->has('street')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('street'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="street"
                                        type="text" id="Street" value="<?php echo e($instaCamp->street); ?>"
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
                                    <label for="Youtube Video"
                                        class="col-form-label"><?php echo e(__('Video URL')); ?></label>
                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('video_link') ? 'has-error' : ''); ?>">
                                    <input type="text" id="video_link" class="form-control <?php if ($errors->has('video_link')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('video_link'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        value="<?php echo e($instaCamp->video_link); ?>" name="video_link" placeholder="Youtube video link" />
                                    <!-- <i class="fas fa-camera"></i> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Image"
                                        class="col-form-label"><?php echo e(__('Service Images *')); ?></label>
                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('country') ? 'has-error' : ''); ?>">
                                    <div class="add_image">
                                        <input type="button" id="add_more" class="btn btn-info" value="Select Image" />
                                        <!-- <i class="fas fa-camera"></i> -->
                                        <!-- <input type="text" id="CurrentImage" name="current_image[]"
                                            value="<?php echo e($instaCamp->image); ?>" class="d-none" /> -->
                                    </div>

                                    <div id="abcd1" class="abcd col-sm-12 m-t-5">
                                        <?php $__currentLoopData = \App\InstaCampImages::where('insta_camp_id',
                                        $instaCamp->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sIimg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img class="img-responsive" width="100"
                                            src="<?php echo e(asset('/images/initiative/large/'.$sIimg->image_name)); ?>"
                                            alt="<?php echo e($instaCamp->service_name); ?>" style="padding: 0 0.1em;">
                                        <a href="<?php echo e(url('/admin/digital-service/image/' . $sIimg->id . '/delete')); ?>"><i
                                                id="close" alt="delete" class="fa fa-close"></i></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <div class="col-xl-10 m-auto">
                                    <input class="btn btn-danger pull-left" type="reset" value="Reset Details">
                                    <input class="btn btn-success pull-right" type="submit" value="Upadate Service">
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
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/insta_camp/edit.blade.php ENDPATH**/ ?>