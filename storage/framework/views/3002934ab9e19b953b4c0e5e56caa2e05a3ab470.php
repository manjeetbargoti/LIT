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
            <div class="col-md-12 m-auto">
                <div class="card">
                    <div class="card-header">Proposals</div>
                    <div class="card-body">
                        <a href="<?php echo e(url('/admin/social-impact/proposals/create')); ?>" class="btn btn-success btn-sm" title="Add New Page">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="<?php echo e(url('/admin/social-impact/proposals')); ?>" accept-charset="UTF-8"
                            class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..."
                                    value="<?php echo e(request('search')); ?>">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br />
                        <br />
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Project Name</th>
                                        <th>Company</th>
                                        <th>Submission Date</th>
                                        <th>Poject Time</th>
                                        <th>Budget</th>
                                        <th>SIP</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $proposal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><a href="<?php echo e(url('/request-proposal/'.$item->slug)); ?>" target="_blank"><?php echo e($item->project_name); ?></a>
                                        </td>
                                        <td><?php echo e($item->business_id); ?></td>
                                        <td><?php echo e($item->submission_time); ?></td>
                                        <td><?php echo e($item->project_timeline); ?> <?php echo e($item->time_period); ?></td>
                                        <td>USD <?php echo e($item->budget); ?></td>
                                        <td><?php echo e($item->city); ?>, <?php echo e($item->country); ?></td>
                                        <td><?php if($item->status == 1): ?> <a class="btn btn-sm btn-success text-white" href="<?php echo e(url('/admin/proposal/'.$item->id.'/disable')); ?>">Enable</a> <?php else: ?> <a class="btn btn-sm btn-danger text-white" href="<?php echo e(url('/admin/proposal/'.$item->id.'/enable')); ?>">Disable</a> <?php endif; ?></td>
                                        <td>
                                            <a href="<?php echo e(url('/admin/social-impact/proposals/' . $item->id)); ?>" title="View Proposal"><button
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"
                                                        aria-hidden="true"></i> </button></a>
                                            <a href="<?php echo e(url('/admin/social-impact/proposals/' . $item->id . '/edit')); ?>"
                                                title="Edit Proposal"><button class="btn btn-primary btn-sm"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button></a>

                                            <form method="POST" action="<?php echo e(url('/admin/social-impact/proposals' . '/' . $item->id)); ?>"
                                                accept-charset="UTF-8" style="display:inline">
                                                <?php echo e(method_field('DELETE')); ?>

                                                <?php echo e(csrf_field()); ?>

                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Proposal"
                                                    onclick="return confirm('Confirm delete?')"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $proposal->appends(['search' =>
                                Request::get('search')])->render(); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/proposals/index.blade.php ENDPATH**/ ?>