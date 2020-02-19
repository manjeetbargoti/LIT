<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Users
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="container">
        <div class="row">
            <!-- User Basic Details -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">User #<?php echo e($user->id); ?> [<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>]</div>
                    <div class="card-body">

                        <a href="<?php echo e(url('/admin/users')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="<?php echo e(url('/admin/users/' . $user->id . '/edit')); ?>"
                            title="Edit user"><button class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="<?php echo e(url('admin/users' . '/' . $user->id)); ?>"
                            accept-charset="UTF-8" style="display:inline">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="Delete user"
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
                                        <td><?php echo e($user->id); ?></td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> <?php echo e($user->title); ?> <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Email </th>
                                        <td> <?php echo e($user->email); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Phone </th>
                                        <td> <?php echo e($user->phone); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Type </th>
                                        <td> <button class="btn btn-success btn-sm"><?php echo e(implode(', ', $user->getRoleNames()->toArray())); ?></button> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /. User Basic Details -->

            <!-- User Business Profile -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Business <?php if(!empty($business->id)): ?>#<?php echo e($business->id); ?> [<?php echo e($business->business_name); ?>] <?php endif; ?></div>
                    <div class="card-body">

                        <a href="<?php echo e(url('/admin/users')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <?php if(!empty($business->id)): ?>
                        <!-- <a href="<?php echo e(url('/admin/profile/business/' . $business->id . '/update')); ?>"
                            title="Edit user"><button class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>             -->

                        <form method="POST" action="<?php echo e(url('admin/business' . '/' . $business->id)); ?>"
                            accept-charset="UTF-8" style="display:inline">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <!-- <button type="submit" class="btn btn-danger btn-sm" title="Delete user"
                                onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button> -->
                        </form>
                        <?php endif; ?>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th> Business Name </th>
                                        <td><?php if(!empty($business->business_name)): ?> <?php echo e($business->business_name); ?> <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Priority SDG's </th>
                                        <td><?php if(!empty($business->priority_sdg)): ?> <?php echo e($business->priority_sdg); ?> <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Name </th>
                                        <td><?php if(!empty($business->contact_person_name)): ?> <?php echo e($business->contact_person_name); ?> <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Email </th>
                                        <td><?php if(!empty($business->email)): ?> <?php echo e($business->email); ?> <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Contact Person Phone </th>
                                        <td><?php if(!empty($business->phone)): ?> <?php echo e($business->phone); ?> <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Trade License Number </th>
                                        <td><?php if(!empty($business->trade_license_number)): ?> <?php echo e($business->trade_license_number); ?> <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <th> License Expiry Date </th>
                                        <td><?php if(!empty($business->license_expiry_date)): ?> <?php echo e($business->license_expiry_date); ?> <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Trade License Image </th>
                                        <td><?php if(!empty($business->trade_license_image)): ?> <img src="<?php echo e(url('/images/tradeLicense/large/'.$business->trade_license_image)); ?>" class="img-responsive" width="300" alt="<?php echo e($business->business_name); ?>"> <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Country </th>
                                        <td><?php if(!empty($business->country)): ?> <?php echo e($business->country); ?> <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <th> State </th>
                                        <td><?php if(!empty($business->state)): ?> <?php echo e($business->state); ?> <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <th> City </th>
                                        <td><?php if(!empty($business->city)): ?> <?php echo e($business->city); ?> <?php endif; ?></td>
                                    </tr>
                                    <tr>
                                        <th> Alternate Contact 1 </th>
                                        <td> 
                                            <ul>
                                                <li><strong>Name:</strong><?php if(!empty($business->alternate_contact_name_1)): ?> <?php echo e($business->alternate_contact_name_1); ?> <?php endif; ?></li>
                                                <li><strong>Email:</strong><?php if(!empty($business->alternate_contact_email_1)): ?> <?php echo e($business->alternate_contact_email_1); ?> <?php endif; ?></li>
                                                <li><strong>Job:</strong><?php if(!empty($business->alternate_contact_job_1)): ?> <?php echo e($business->alternate_contact_job_1); ?> <?php endif; ?></li>
                                                <li><strong>Company:</strong><?php if(!empty($business->alternate_contact_company_1)): ?> <?php echo e($business->alternate_contact_company_1); ?> <?php endif; ?></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Alternate Contact 2 </th>
                                        <td> 
                                            <ul>
                                                <li><strong>Name:</strong><?php if(!empty($business->alternate_contact_name_2)): ?> <?php echo e($business->alternate_contact_name_2); ?> <?php endif; ?></li>
                                                <li><strong>Email:</strong><?php if(!empty($business->alternate_contact_email_2)): ?> <?php echo e($business->alternate_contact_email_2); ?> <?php endif; ?></li>
                                                <li><strong>Job:</strong><?php if(!empty($business->alternate_contact_job_2)): ?> <?php echo e($business->alternate_contact_job_2); ?> <?php endif; ?></li>
                                                <li><strong>Company:</strong><?php if(!empty($business->alternate_contact_company_2)): ?> <?php echo e($business->alternate_contact_company_2); ?> <?php endif; ?></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <th> City </th>
                                        <td><?php if(!empty($business->city)): ?> <?php echo e($business->city); ?> <?php endif; ?></td>
                                    </tr> -->
                                    <tr>
                                        <th> Business Description </th>
                                        <td><?php if(!empty($business->business_description)): ?> <?php echo e($business->business_description); ?> <?php endif; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /. User Business profile -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/user/show.blade.php ENDPATH**/ ?>