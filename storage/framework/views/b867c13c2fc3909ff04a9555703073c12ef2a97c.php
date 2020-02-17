<?php $__env->startSection('content'); ?>

<div id="litsliderstory" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo e(asset('front/dist/img/about/banner.jpg')); ?>" alt="First slide">
            <h3> Programs </h3>
        </div>
    </div>
</div>


<!-- contactus Box -->
<section id="program">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 text-center mb-5">
                <img src="<?php echo e(asset('front/dist/img/home/heading-icon.png')); ?>" class="mb-2 mx-auto" alt="">
                <h3> CSR Market Place </h3>
            </div>

            <div class="col-md-12 col-lg-12 mb-5">
                <div class="row">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-12 col-lg-12 mb-4">
                        <div class="box">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h4 class="h4"><?php echo e($d->project_name); ?></h4>
                                    <h4 class="h6">Company: <strong class="text-primary"> <?php $__currentLoopData = \App\BusinessInfo::where('id', $d->business_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($b->business_name); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></strong> | Location: <span class="text-success"><?php echo e($d->city); ?>,
                                        <?php echo e($d->state); ?>, <?php echo e($d->country); ?></span></h4>
                                    <p class="h6">Budget: USD <?php echo e($d->budget); ?> | Submission Date</b>:
                                        <?php echo e($d->submission_time); ?> | Duration</b>: <?php echo e($d->project_timeline); ?>

                                        <?php echo e($d->time_period); ?> | Social Impact Points: <?php echo e($d->social_impact_points); ?></p>
                                </div>
                                <div class="col-sm-2">
                                    <a href="#" data-toggle="modal" data-target="#submitProposal-<?php echo e($d->id); ?>" class="btn btn-primary text-uppercase">Submit Proposal</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Model -->
                    <div class="modal fade" id="submitProposal-<?php echo e($d->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e($d->project_name); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo e(url('/csr-market/submit-proposal')); ?>" method="Post">
                                        <?php echo e(csrf_field()); ?>

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
                                            <input type="text" name="proposal_id" class="form-control" value="<?php echo e($d->id); ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="modal-footer"> -->
                                    <!-- <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button> -->
                                    <!-- <input type="submit" class="btn btn-primary" value="Submit"> -->
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/front/csr/list_csr.blade.php ENDPATH**/ ?>