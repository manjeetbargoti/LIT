<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Pages
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
                    <div class="card-header">Page <?php echo e($page->id); ?></div>
                    <div class="card-body">

                        <a href="<?php echo e(url('/admin/pages')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="<?php echo e(url('/admin/pages/' . $page->id . '/edit')); ?>" title="Edit Page"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST" action="<?php echo e(url('admin/pages' . '/' . $page->id)); ?>" accept-charset="UTF-8"
                            style="display:inline">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Page"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td><?php echo e($page->id); ?></td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> <?php echo e($page->name); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> URL </th>
                                        <td> <a href="<?php echo e(url('/'.$page->slug)); ?>"><?php echo e(url('/'.$page->slug)); ?></a> </td>
                                    </tr>
                                    <tr>
                                        <th> Content </th>
                                        <td> <?php echo strip_tags($page->content); ?> </td>
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
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/pages/show.blade.php ENDPATH**/ ?>