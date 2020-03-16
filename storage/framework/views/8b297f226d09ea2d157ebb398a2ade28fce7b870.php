<?php $__env->startSection('title', 'Single Title'); ?>
<?php $__env->startSection('content'); ?>

<!-- slider start -->
<div id="litsliderabt" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo e(asset('front/dist/img/about/banner.jpg')); ?>" alt="First slide">
            <h3> Project Info </h3>
        </div>
    </div>
</div>


<!-- Project Details Box -->
<section id="projectdetl">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 float-left px-0">
                <img class="d-block img-responsive m-auto" width="300" src="<?php echo e(asset('images/initiative/large/'.$siImage->image_name)); ?>"
                    alt="Second slide">
            </div>
            <div class="col-md-12 col-lg-6 pl-4">
                <img src="<?php echo e(asset('front/dist/img/home/heading-icon.png')); ?>" class="mb-2 mx-auto" alt="">
                <h2> <?php if(!empty($data->initiative_name)): ?><?php echo e($data->initiative_name); ?><?php elseif(!empty($data->service_name)): ?><?php echo e($data->service_name); ?><?php endif; ?>
                </h2>
                <span class="col-12 col-lg-3">
                    <select name="budget" id="budgetList" class="form-control col-sm-3">
                        <?php if(empty($data->budget)): ?>
                            <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($d2->id); ?>">USD <?php echo e($d2->budget); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <option>USD <?php echo e($data->budget); ?></option>
                        <?php endif; ?>
                    </select>
                </span>
                <ul class="p-0">
                    <li> <b>Title</b>:
                        <?php if(!empty($data->initiative_name)): ?><?php echo e($data->initiative_name); ?><?php elseif(!empty($data->service_name)): ?><?php echo e($data->service_name); ?><?php endif; ?>
                    </li>
                    <li> <b>Location</b>: <?php echo e($data->city); ?>, <?php echo e($data->state); ?>, <?php echo e($data->country); ?></li>
                    <li class="d-none"> <b>Budget ID</b>: <span id="budg_id"><?php echo e($data->budget_id); ?></span> </li>
                    <li> <b>Beneficiaries</b>: <span id="budg_ben"><?php echo e($data->beneficiaries); ?></span> </li>
                    <li> <b>Duration</b>: <span id="budg_dur"><?php echo e($data->duration); ?></span> <span id="budg_tp"><?php echo e($data->time_period); ?></span> </li>
                    <li> <b>Out-Reach</b>: <span id="budg_outreach"><?php echo e($data->outreach); ?></span> </li>
                    <li> <b>SDG</b>: <?php echo e($data->area_impact_sdg); ?></li>
                    <li> <b>Description</b>:
                        <?php if(!empty($data->initiative_name)): ?><?php echo e($data->initiative_name); ?><?php elseif(!empty($data->service_name)): ?><?php endif; ?>
                    </li>
                </ul>
                <div class="btnbx">
                    <?php if(!empty($data->initiative_name)): ?>
                    <a href="<?php echo e(url('/social-initiative/add-to-cart/'.$data->id)); ?>"
                        class="btn btn-primary text-uppercase"> Add to Impact Box</a>
                    <a href="<?php echo e(url('/initiative-programs/'.$data->slug)); ?>" class="btn btn-primary text-uppercase"> Learn More</a>
                    <?php elseif(!empty($data->service_name)): ?>
                    <a href="<?php echo e(url('/digital-service/add-to-cart/'.$data->id)); ?>"
                        class="btn btn-primary text-uppercase"> Add to Impact Box</a>
                    <a href="<?php echo e(url('/digital-programs/'.$data->slug)); ?>" class="btn btn-primary text-uppercase"> Learn More</a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/front/social_initiatives/single_initiative.blade.php ENDPATH**/ ?>