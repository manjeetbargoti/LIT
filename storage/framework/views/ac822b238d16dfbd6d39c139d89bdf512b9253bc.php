<?php $__env->startSection('content'); ?>

<div id="litsliderstory" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo e(asset('front/dist/img/about/banner.jpg')); ?>" alt="First slide">
            <h3> <?php echo e($data->title); ?> <?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?> </h3>
        </div>
    </div>
</div>

<!-- Single Activist -->
<section id="projectdetl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 float-left px-0">
                <?php if(!empty($data->avatar)): ?>
                <img class="d-block w-50 img-responsive" style="margin: auto; display: block;"
                    src="<?php echo e(asset('images/user/large/'.$data->avatar)); ?>"
                    alt="<?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?>">
                <?php else: ?>
                <img class="d-block w-50 img-responsive" style="margin: auto; display: block;"
                    src="<?php echo e(asset('images/user/user.png')); ?>" alt="<?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?>">
                <?php endif; ?>
            </div>
            <div class="col-md-12 col-lg-6 pl-4">
                <img src="<?php echo e(asset('front/dist/img/home/heading-icon.png')); ?>" class="mb-2 mx-auto" alt="">
                <h2> <?php echo e($data->title); ?> <?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?></h2>
                <span class="pricebx"> <?php echo e($data->role); ?> </span>
                <ul class="p-0">
                    <li> <b>Social Impact Points</b>: <?php echo e($data->sip_points); ?> </li>
                    <li> <b>Location</b>: <?php echo e($data->city); ?>, <?php echo e($data->state); ?>, <?php echo e($data->country); ?></li>
                    <li> <b>Bio</b>: <?php echo e($data->bio); ?></li>
                </ul>
                <div class="btnbx">
                    <a href="<?php echo e(url('/users/activists/'.$data->id)); ?>" data-toggle="modal" data-target="#hireActivist-<?php echo e($data->id); ?>" class="btn btn-primary text-uppercase"> Express
                        Interest</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Model -->
<div class="modal fade" id="hireActivist-<?php echo e($data->id); ?>" tabindex="-1" role="dialog" aria-labelledby="hireActivistLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hireActivistLabel"><?php echo e($data->title); ?> <?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?> [SIP: <?php echo e($data->sip_points); ?>]</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="Post">
            <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="position" class="form-control" placeholder="Position" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="organization" class="form-control" placeholder="Organization" required>
                    </div>
                    <div class="form-group d-none">
                        <input type="text" name="activist_id" class="form-control" value="<?php echo e($data->id); ?>">
                    </div>
                    <!-- <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/front/users/singleActivist.blade.php ENDPATH**/ ?>