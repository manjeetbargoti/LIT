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
                    <div class="card-header">Create New Initiative</div>
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

                        <form method="POST" action="<?php echo e(url('/admin/social-impact/initiatives')); ?>"
                            accept-charset="UTF-8" class="form-horizontal login_validator repeater-form"
                            enctype="multipart/form-data" id="form_inline_validator">
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
                                        value="<?php echo e(old('initiative_name')); ?>" required>
                                    <?php echo $errors->first('initiative_name', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="col-xl-4 <?php echo e($errors->has('area_impact_sdg') ? 'has-error' : ''); ?>">
                                    <select class="form-control <?php if ($errors->has('area_impact_sdg')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('area_impact_sdg'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> chzn-select"
                                        name="area_impact_sdg[]" id="area_impact_sdg" multiple value="<?php echo e(old('area_impact_sdg')); ?>"
                                        required data-placeholder="-- Select SDG --">
                                        <?php $__currentLoopData = $sdgs->where('sdg_category','Onground'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($s->sdg_name); ?>"><?php echo e($loop->iteration); ?>. <?php echo e($s->sdg_name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <select>
                                            <?php echo $errors->first('area_impact_sdg', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Initiative Description"
                                        class="col-form-label"><?php echo e(__('Initiative Description *')); ?>

                                        <!-- <span class="small text-info">(Max 200 words)</span> -->
                                    </label>
                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('initiative_description') ? 'has-error' : ''); ?>">
                                    <textarea class="form-control <?php if ($errors->has('initiative_description')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('initiative_description'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="initiative_description" id="initiative_description"
                                        value="<?php echo e(old('initiative_description')); ?>" rows="3" required maxlength="1000"
                                        placeholder="Max 1000 words"></textarea>
                                    <?php echo $errors->first('initiative_description', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Project Scalability"
                                        class="col-form-label"><?php echo e(__('Describe the scalability of this project *')); ?>

                                        <!-- <span class="small text-info">(Max 200 words)</span> -->
                                    </label>
                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('project_scalability') ? 'has-error' : ''); ?>">
                                    <textarea class="form-control <?php if ($errors->has('project_scalability')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('project_scalability'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="project_scalability" id="project_scalability"
                                        value="<?php echo e(old('project_scalability')); ?>" rows='3' required maxlength="1000"
                                        placeholder="Max 1000 words"></textarea>
                                    <?php echo $errors->first('project_scalability', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Project SDG Relevance"
                                        class="col-form-label"><?php echo e(__("Describe the project's relevance to the SDG's *")); ?>

                                        <!-- <span class="small text-info">(Max 200 words)</span> -->
                                    </label>

                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('sdg_relevance') ? 'has-error' : ''); ?>">
                                    <textarea class="form-control <?php if ($errors->has('sdg_relevance')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('sdg_relevance'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="sdg_relevance" id="sdg_relevance" value="<?php echo e(old('sdg_relevance')); ?>"
                                        rows="3" required maxlength="1000" placeholder="Max 1000 words"></textarea>
                                    <?php echo $errors->first('sdg_relevance', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Relevance to National Agenda"
                                        class="col-form-label"><?php echo e(__("Describe the project's relevance to National Agenda *")); ?>

                                        <!-- <span class="small text-info">(Max 200 words)</span> -->
                                    </label>

                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('relevance_national_agenda') ? 'has-error' : ''); ?>">
                                    <textarea
                                        class="form-control <?php if ($errors->has('relevance_national_agenda')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('relevance_national_agenda'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="relevance_national_agenda" id="relevance_national_agenda"
                                        value="<?php echo e(old('relevance_national_agenda')); ?>" rows="3" required maxlength="1000"
                                        placeholder="Max 1000 words"></textarea>
                                    <?php echo $errors->first('relevance_national_agenda', '<p class="help-block">:message</p>
                                    '); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Project innovation"
                                        class="col-form-label"><?php echo e(__("How innovative is the project? *")); ?>

                                        <!-- <span class="small text-info">(Max 1000 words)</span> -->
                                    </label>

                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('project_innovation') ? 'has-error' : ''); ?>">
                                    <textarea class="form-control <?php if ($errors->has('project_innovation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('project_innovation'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="project_innovation" id="project_innovation"
                                        value="<?php echo e(old('project_innovation')); ?>" rows="3" required maxlength="1000"
                                        placeholder="Max 1000 words"></textarea>
                                    <?php echo $errors->first('project_innovation', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Program Benefits"
                                        class="col-form-label"><?php echo e(__("List of benefits of the program *")); ?>

                                        <!-- <span class="small text-info">(Max 200 words)</span> -->
                                    </label>

                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('program_benefits') ? 'has-error' : ''); ?>">
                                    <textarea class="form-control <?php if ($errors->has('program_benefits')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('program_benefits'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="program_benefits" id="program_benefits"
                                        value="<?php echo e(old('program_benefits')); ?>" rows="5" required maxlength="1000"
                                        placeholder="Max 1000 words"></textarea>
                                    <?php echo $errors->first('program_benefits', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Program Stage" class="col-form-label"><?php echo e(__("Program Stage *")); ?>

                                        <!-- <span class="small text-info">(Max 200 words)</span> -->
                                    </label>

                                </div>
                                <div class="col-xl-4 <?php echo e($errors->has('program_stage') ? 'has-error' : ''); ?>">
                                    <select class="form-control <?php if ($errors->has('program_stage')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('program_stage'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        name="program_stage" id="program_stage" value="<?php echo e(old('program_stage')); ?>"
                                        required>
                                        <option value="">Select Stage</option>
                                        <option value="Ideation">Ideation</option>
                                        <option value="Prototype">Prototype</option>
                                        <option value="Testing">Testing</option>
                                        <option value="Launch/ Already in the Market">Launch/ Already in the Market</option>
                                    </select>
                                    <?php echo $errors->first('program_stage', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Image" class="col-form-label"><?php echo e(__('')); ?></label>
                                </div>
                                <div class="flex-sb-m w-full p-t-3 p-b-32">
                                    <div class="contact100-form-checkbox">
                                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="in_partnership"
                                            value="1">
                                        <label class="label-checkbox100" for="ckb1">
                                            In kind Partnership.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="dynamic_field" id="repeater">
                                <div class="repeater-heading" align="left" id="AddMoreButton">
                                    <button type="button" class="btn btn-primary repeater-add-btn">Add More
                                        Budget</button>
                                </div>
                                <div class="items">
                                    <div class="item-content">
                                        <div class="form-group row first_line">
                                            <div class="col-xl-2 text-xl-right">
                                                <label for="Initiative info"
                                                    class="col-form-label"><?php echo e(__('Time Duration *')); ?></label>
                                            </div>
                                            <div
                                                class="input-group col-xl-3 <?php echo e($errors->has('start_date') ? 'has-error' : ''); ?>">
                                                <span class="input-group-addon">Start</span>
                                                <input class="form-control <?php if ($errors->has('start_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('start_date'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                    name="start_date[]" type="date" data-date-format="yyyy-mm-dd"
                                                    id="dp2" value="<?php echo e(old('start_date')); ?>" placeholder="Start Date"
                                                    required>
                                                <?php echo $errors->first('start_date', '<p class="help-block">:message</p>'); ?>

                                            </div>

                                            <div
                                                class="input-group col-xl-3 <?php echo e($errors->has('end_date') ? 'has-error' : ''); ?>">
                                                <span class="input-group-addon">End</span>
                                                <input class="form-control <?php if ($errors->has('end_date')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('end_date'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                    name="end_date[]" type="date" data-date-format="yyyy-mm-dd"
                                                    id="dp2-1" value="<?php echo e(old('end_date')); ?>" placeholder="End Date"
                                                    required>
                                                <?php echo $errors->first('end_date', '<p class="help-block">:message</p>'); ?>

                                            </div>

                                            <div
                                                class="input-group col-xl-3 <?php echo e($errors->has('duration') ? 'has-error' : ''); ?>">
                                                <!-- <span class="input-group-addon">months</span> -->
                                                <div class="input-group">
                                                    <span class="input-group-addon">Out Reach</span>
                                                    <input class="form-control <?php if ($errors->has('outreach')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('outreach'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                        name="outreach[]" type="text" id="outreach"
                                                        value="<?php echo e(old('outreach')); ?>" placeholder="Number of Out Reach"
                                                        required>
                                                </div>
                                                <?php echo $errors->first('outreach', '<p class="help-block">:message</p>'); ?>

                                            </div>

                                            <div class="col-xl-1" id="deleteBtn">
                                                <button type="button" onclick="$(this).parents('.items').remove()"
                                                    name="remove" id="remove" id="remove-btn" class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-xl-2 text-xl-right">
                                                <label for="Initiative info"
                                                    class="col-form-label"><?php echo e(__('')); ?></label>
                                            </div>
                                            <div class="input-group col-xl-3 <?php echo e($errors->has('beneficiaries') ? 'has-error' : ''); ?>">
                                                <span class="input-group-addon">Beneficieries</span>
                                                <input class="form-control <?php if ($errors->has('beneficiaries')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('beneficiaries'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                    name="beneficiaries[]" type="number" pattern="[-+]?[0-9]*[.,]?[0-9]+" id="Beneficiaries"
                                                    value="<?php echo e(old('beneficiaries')); ?>"
                                                    placeholder="number of Beneficieries" required>
                                                <?php echo $errors->first('beneficiaries', '<p class="help-block">:message</p>
                                                '); ?>

                                            </div>

                                            <div class="input-group col-xl-3 <?php echo e($errors->has('budget') ? 'has-error' : ''); ?>"
                                                id="budgetDiv">
                                                <span class="input-group-addon">$</span>
                                                <input class="form-control <?php if ($errors->has('budget')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('budget'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                    name="budget[]" type="text" id="Budget" value="<?php echo e(old('budget')); ?>"
                                                    placeholder="Budget" required>
                                                <?php echo $errors->first('budget', '<p class="help-block">:message</p>'); ?>

                                            </div>

                                            <div
                                                class="input-group col-xl-3 <?php echo e($errors->has('duration') ? 'has-error' : ''); ?>">
                                                <!-- <span class="input-group-addon">months</span> -->
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <select class="time-period" name="time_period[]">
                                                            <option value="Days">Days</option>
                                                            <option value="Month">Months</option>
                                                            <option value="Year">Year</option>
                                                        </select>
                                                    </div>
                                                    <input class="form-control <?php if ($errors->has('duration')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('duration'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                                        name="duration[]" type="text" id="Duration"
                                                        value="<?php echo e(old('duration')); ?>" placeholder="Duration" required>
                                                </div>
                                                <?php echo $errors->first('duration', '<p class="help-block">:message</p>'); ?>

                                            </div>
                                        </div>
                                        <hr>
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
                                        type="text" id="Region" value="<?php echo e(old('region')); ?>" placeholder="Locality"
                                        required>
                                    <?php echo $errors->first('region', '<p class="help-block">:message</p>'); ?>

                                </div>

                                <div class="col-xl-4 <?php echo e($errors->has('street') ? 'has-error' : ''); ?>">
                                    <input class="form-control <?php if ($errors->has('street')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('street'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="street"
                                        type="text" id="Street" value="<?php echo e(old('street')); ?>" placeholder="Street">
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
                                        <option value="" selected> -- Select Country -- </option>
                                        <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($coun->name); ?>"><?php echo e($coun->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <option value="" selected> -- Select State -- </option>
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
                                        <option value="" selected> -- Select City -- </option>
                                    </select>
                                    <?php echo $errors->first('city', '<p class="help-block">:message</p>'); ?>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Youtube Video" class="col-form-label"><?php echo e(__('Video URL')); ?></label>
                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('video_link') ? 'has-error' : ''); ?>">
                                    <input type="text" id="video_link"
                                        class="form-control <?php if ($errors->has('video_link')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('video_link'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        value="<?php echo e(old('video_link')); ?>" name="video_link"
                                        placeholder="Youtube video link" />
                                    <!-- <i class="fas fa-camera"></i> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Image" class="col-form-label"><?php echo e(__('')); ?></label>
                                </div>
                                <div class="flex-sb-m w-full p-t-3 p-b-32">
                                    <div class="contact100-form-checkbox">
                                        <input class="input-checkbox100" id="ckb2" type="checkbox" name="promote"
                                            value="1">
                                        <label class="label-checkbox100" for="ckb2">
                                            I would like to promote the program to encourage participation and
                                            registration.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row" id="showUrl">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Promotion url" class="col-form-label"><?php echo e(__('Promotion URL')); ?></label>
                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('promote_url') ? 'has-error' : ''); ?>">
                                    <input type="text" id="promote_url"
                                        class="form-control <?php if ($errors->has('promote_url')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('promote_url'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                        value="<?php echo e(old('promote_url')); ?>" name="promote_url"
                                        placeholder="Add your program page url here" />
                                    <!-- <i class="fas fa-camera"></i> -->
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
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-xl-2 text-xl-right">
                                    <label for="Featured Program"
                                        class="col-form-label"><?php echo e(__('Featured (Suggest this program) *')); ?></label>
                                </div>
                                <div class="col-xl-9 <?php echo e($errors->has('featured') ? 'has-error' : ''); ?>">
                                    <div class="add_image">
                                        <input type="checkbox" id="featured" name="featured" value="1" />
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
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/social_initiative/create.blade.php ENDPATH**/ ?>