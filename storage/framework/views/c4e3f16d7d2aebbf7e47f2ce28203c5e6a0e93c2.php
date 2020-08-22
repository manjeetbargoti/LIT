<?php $__env->startSection('content'); ?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="register100-form">
                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <?php echo csrf_field(); ?>
                    <span class="login100-form-title p-b-20">
                        <?php echo e(__('REGISTER')); ?>

                    </span>

                    <div class="row">
                        <div class="form-group col-sm-6" data-validate="Role is required">
                            <label for="What Are you ?"><?php echo e(__('What Are you ? *')); ?></label>
                            <select name="roles" id="Roles" class="form-control <?php if ($errors->has('roles')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('roles'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                value="<?php echo e(old('roles')); ?>" required autocomplete="roles" autofocus>
                                <option value="" selected> -- Select what are you ? -- </option>
                                <option value="NGO">NGO</option>
                                <option value="Social Enterprise">Social Enterprise</option>
                                <option value="Corporate">Corporate</option>
                                <option value="Government">Government</option>
                                <option value="Activist">Social Startups</option>
                            </select>
                            <?php if ($errors->has('roles')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('roles'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group col-sm-6" data-validate="Username is required">
                            <label for="Username"><?php echo e(__('Username *')); ?></label>
                            <input type="text" name="username" id="UserName"
                                class="form-control <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                value="<?php echo e(old('username')); ?>" required autocomplete="username">
                            <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-2" data-validate="Title is required">
                            <label for="Title"><?php echo e(__('Title *')); ?></label>
                            <select name="title" id="Title" class="form-control <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                value="<?php echo e(old('title')); ?>" required autocomplete="title">
                                <option value="Mr.">Mr.</option>
                                <option value="Ms.">Ms.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Dr.">Dr.</option>
                            </select>
                            <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group col-sm-5" data-validate="First name is required">
                            <label for="First Name"><?php echo e(__('First Name *')); ?></label>
                            <input type="text" name="first_name" id="FirstName"
                                class="form-control <?php if ($errors->has('first_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('first_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                value="<?php echo e(old('first_name')); ?>" required autocomplete="first_name">
                            <?php if ($errors->has('first_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('first_name'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group col-sm-5" data-validate="Last name is required">
                            <label for="Last Name"><?php echo e(__('Last Name')); ?></label>
                            <input type="text" name="last_name" id="LastName"
                                class="form-control <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                value="<?php echo e(old('last_name')); ?>" autocomplete="last_name">
                            <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6" data-validate="Email is required">
                            <label for="Email Address"><?php echo e(__('Email Address *')); ?></label>
                            <input type="text" name="email" id="EmailAddress"
                                class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" value="<?php echo e(old('email')); ?>"
                                required autocomplete="email">
                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group col-sm-6" data-validate="Phone is required">
                            <label for="Phone"><?php echo e(__('Phone *')); ?></label>
                            <input type="text" name="phone" id="PhoneNumber"
                                class="form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" value="<?php echo e(old('phone')); ?>"
                                required autocomplete="phone">
                            <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6" data-validate="Password is required">
                            <label for="Password"><?php echo e(__('Password *')); ?></label>
                            <input type="password" name="password" id="Password"
                                class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                value="<?php echo e(old('password')); ?>" required autocomplete="password">
                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>

                        <div class="form-group col-sm-6" data-validate="Confirm password is required">
                            <label for="Confirm Password"><?php echo e(__('Confirm Password *')); ?></label>
                            <input type="password" name="password_confirmation" id="ConfPassword"
                                class="form-control <?php if ($errors->has('password_confirmation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password_confirmation'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                value="<?php echo e(old('password_confirmation')); ?>" required
                                autocomplete="password_confirmation">
                            <?php if ($errors->has('password_confirmation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password_confirmation'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="terms">
                            <label class="label-checkbox100" for="ckb1">
                                I accept <a href="#">Terms & Conditions</a>.
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="login100-form-btn" type="submit">
                        <?php echo e(__('REGISTER')); ?>

                        </button>
                    </div>

                    <div class="w-full text-center p-t-55">
                        <span class="txt2">
                            Already have an account?
                        </span>

                        <a href="<?php echo e(route('login')); ?>" class="txt2 bo1">
                            Login here
                        </a>
                    </div>
                </form>
            </div>


            <div class="register100-more" style="background-image: url('<?php echo e(url('/images/static/bg-01.jpg')); ?>');">
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/auth/register.blade.php ENDPATH**/ ?>