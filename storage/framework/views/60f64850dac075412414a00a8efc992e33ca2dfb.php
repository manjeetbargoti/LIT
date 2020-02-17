<?php $__env->startSection('content'); ?>
<style>
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
                    Profile
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body">

                        <a href="<?php echo e(url('/admin/profile')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <form class="form-horizontal login_validator" id="tryitForm"
                            action="<?php echo e(url('/admin/profile/'.$user->id.'/edit')); ?>" method="post" accept-charset="UTF-8"
                            enctype="multipart/form-data">

                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-center text-lg-right">
                                            <label class="col-form-label">Profile Pic</label>
                                        </div>
                                        <div class="col-lg-6 text-center text-lg-left">
                                            <p><?php if(!empty($user->avatar)): ?><img
                                                    src="<?php echo e(url('/images/user/large/'.$user->avatar)); ?>"
                                                    alt="<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>" width="100"><?php endif; ?></p>
                                            <div class="add_image">
                                                <input type="button" id="add_more" class="btn btn-info"
                                                    value="Add image" />
                                                <input type="text" id="CurrentImage" name="current_image"
                                                    value="<?php echo e($user->image); ?>" class="d-none" />
                                                <!-- <i class="fas fa-camera"></i> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="user title" class="col-form-label">Title *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <select name="title" id="UserTitle" class="form-control">
                                                    <option value="Mr." <?php if($user->title == 'Mr.'): ?> selected <?php endif; ?>>Mr.
                                                    </option>
                                                    <option value="Ms." <?php if($user->title == 'Ms.'): ?> selected <?php endif; ?>>Ms.
                                                    </option>
                                                    <option value="Mrs." <?php if($user->title == 'Mrs.'): ?> selected
                                                        <?php endif; ?>>Mrs.</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="username" class="col-form-label">Username *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <input readonly type="text" name="username" id="username"
                                                    class="form-control" value="<?php echo e($user->username); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="First Name" class="col-form-label">First Name *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <input type="text" name="first_name" id="first_name"
                                                    class="form-control" value="<?php echo e($user->first_name); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row m-t-25">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Last Name" class="col-form-label">Last Name *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                                </span>
                                                <input type="text" name="last_name" id="last_name" class="form-control"
                                                    value="<?php echo e($user->last_name); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Email" class="col-form-label">Email *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-envelope text-primary"></i></span>
                                                <input type="text" placeholder="Email Address" id="email" name="email"
                                                    class="form-control" value="<?php echo e($user->email); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="phone" class="col-form-label">Phone
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-phone text-primary"></i></span>
                                                <input type="text" placeholder=" " id="phone" name="phone"
                                                    class="form-control" value="<?php echo e($user->phone); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Bio" class="col-form-label">Bio
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-file-o text-primary"></i></span>
                                                <textarea placeholder=" " rows="2" id="bio" name="bio"
                                                    class="form-control" value="<?php echo e($user->bio); ?>"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="Country" class="col-form-label">Country
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-globe text-primary"></i></span>
                                                <select id="country" name="country"
                                                    class="form-control" value="<?php echo e($user->country); ?>">
                                                    <option value="">Select Country</option>
                                                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($ctry->name); ?>"><?php echo e($ctry->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="State" class="col-form-label">State
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-globe text-primary"></i></span>
                                                <select id="state" name="state"
                                                    class="form-control" value="<?php echo e($user->state); ?>">
                                                    <option value="">Select State</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-lg-right">
                                            <label for="City" class="col-form-label">City
                                                *</label>
                                        </div>
                                        <div class="col-xl-6 col-lg-8">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="fa fa-globe text-primary"></i></span>
                                                <select id="city" name="city"
                                                    class="form-control" value="<?php echo e($user->city); ?>">
                                                    <option value="">Select City</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6 m-auto">
                                            <button class="btn btn-warning" type="reset" id="clear">
                                                <i class="fa fa-refresh"></i>
                                                Reset
                                            </button>
                                            <button class="btn btn-primary pull-right" type="submit">
                                                <i class="fa fa-user"></i>
                                                Update
                                            </button>
                                        </div>
                                    </div>
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
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/profile/edit.blade.php ENDPATH**/ ?>