<?php $__env->startSection('content'); ?>
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
            <div class="col-md-9 m-auto">
                <div class="card">
                    <div class="card-header">Initiative <?php echo e($socialInitiative->id); ?> [<?php echo e(str_limit($socialInitiative->initiative_name, $limit=100)); ?>]</div>
                    <div class="card-body">

                        <a href="<?php echo e(url('/admin/social-impact/initiatives/')); ?>" title="Back"><button
                                class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Back</button></a>
                        <a href="<?php echo e(url('/admin/social-impact/initiatives/' . $socialInitiative->id . '/edit')); ?>"
                            title="Edit Initiative"><button class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST"
                            action="<?php echo e(url('admin/social-impact/initiatives' . '/' . $socialInitiative->id)); ?>"
                            accept-charset="UTF-8" style="display:inline">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Initiative"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td><?php echo e($socialInitiative->id); ?></td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> <a class="text-primary"
                                                href="<?php echo e(url('/social-initiative/'.$socialInitiative->slug)); ?>" target="_blank"><?php echo e($socialInitiative->initiative_name); ?></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Impact SDG </th>
                                        <td class="text-success"> <?php echo e($socialInitiative->area_impact_sdg); ?> </td>
                                    </tr>
                                    <!-- <tr>
                                        <th> Beneficiaries </th>
                                        <td> <?php echo e($socialInitiative->beneficiaries); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Out Reach </th>
                                        <td> <?php echo e($socialInitiative->outreach); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Duration </th>
                                        <td> <?php echo e($socialInitiative->duration); ?> <?php echo e($socialInitiative->time_period); ?> </td>
                                    </tr> -->
                                    <tr>
                                        <th> Start Date </th>
                                        <td class="text-success"> <?php echo e(date('l, j F Y', strtotime($socialInitiative->start_date))); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> End Date </th>
                                        <td class="text-success"> <?php echo e(date('l, j F Y', strtotime($socialInitiative->end_date))); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Address </th>
                                        <td> <?php echo e($socialInitiative->street); ?>, <?php echo e($socialInitiative->region); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Location </th>
                                        <td> <?php echo e($socialInitiative->city); ?>, <?php echo e($socialInitiative->state); ?>, <?php echo e($socialInitiative->country); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Description </th>
                                        <td> <?php echo strip_tags($socialInitiative->initiative_description); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Add by </th>
                                        <td> <?php echo e($userData->first_name); ?> <?php echo e($userData->last_name); ?> <span class="text-success">[<?php $__currentLoopData = $userRole; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($role); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]</span> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <?php $__currentLoopData = $multiBudgetData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mbd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-sm-4 col-md-4 col-lg-4 mt-2">
                                <h4 class="text-danger">Budget <?php echo e($loop->iteration); ?></h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th> Beneficiaries </th>
                                                <td> <?php echo e($mbd->beneficiaries); ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Budget </th>
                                                <td> USD <?php echo e($mbd->budget); ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Out Reach </th>
                                                <td> <?php echo e($mbd->outreach); ?> </td>
                                            </tr>
                                            <tr>
                                                <th> Duration </th>
                                                <td> <?php echo e($mbd->duration); ?> <?php echo e($mbd->time_period); ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/social_initiative/show.blade.php ENDPATH**/ ?>