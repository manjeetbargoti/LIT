<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Projects for Proposal
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
                    <div class="card-header">Project #<?php echo e($proposals->id); ?> [<?php echo e($proposals->project_name); ?>]</div>
                    <div class="card-body">

                        <a href="<?php echo e(url('/admin/social-impact/proposals')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="<?php echo e(url('/admin/social-impact/proposals/' . $proposals->id . '/edit')); ?>" title="Edit SDG"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST" action="<?php echo e(url('admin/social-impact/proposals' . '/' . $proposals->id)); ?>" accept-charset="UTF-8"
                            style="display:inline">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="Delete SDG"
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
                                        <td><?php echo e($proposals->id); ?></td>
                                    </tr>
                                    <tr>
                                        <th> Project Name </th>
                                        <td> <?php echo e($proposals->project_name); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Project Description </th>
                                        <td> <?php echo $proposals->project_description; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Project Status </th>
                                        <td> <?php if($proposals->status == 1): ?> <a class="btn btn-sm btn-success text-white" href="<?php echo e(url('/admin/proposal/'.$proposals->id.'/disable')); ?>">Enable</a> <?php else: ?> <a class="btn btn-sm btn-danger text-white" href="<?php echo e(url('/admin/proposal/'.$proposals->id.'/enable')); ?>">Disable</a> <?php endif; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Organization </th>
                                        <td> <?php echo $proposals->business_id; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Organization Background </th>
                                        <td> <?php echo $proposals->company_background; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Name </th>
                                        <td> <?php echo $proposals->contact_person_name; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Email </th>
                                        <td> <?php echo $proposals->email; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Phone </th>
                                        <td> <?php echo $proposals->phone; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Fax </th>
                                        <td> <?php echo $proposals->fax_number; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Project Goals </th>
                                        <td> <?php echo $proposals->project_goals; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Submission Date </th>
                                        <td> <?php echo $proposals->submission_time; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Project Timeline </th>
                                        <td> <?php echo $proposals->project_timeline; ?> <?php echo $proposals->time_period; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Proposal Elements </th>
                                        <td> <?php echo $proposals->proposal_elements; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Evolution Criteria </th>
                                        <td> <?php echo $proposals->evolution_criteria; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Possible Challanges </th>
                                        <td> <?php echo $proposals->possible_challanges; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Budget </th>
                                        <td> <?php echo $proposals->budget; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Social Impact Points </th>
                                        <td> <?php echo $proposals->social_impact_points; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Country </th>
                                        <td> <?php echo $proposals->country; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> State </th>
                                        <td> <?php echo $proposals->state; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> City </th>
                                        <td> <?php echo $proposals->city; ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Add By </th>
                                        <td> <?php $__currentLoopData = App\User::where('id', $proposals->user_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $addBy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($addBy->first_name); ?> <?php echo e($addBy->last_name); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/proposals/show.blade.php ENDPATH**/ ?>