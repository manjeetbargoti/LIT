<?php $__env->startSection('content'); ?>
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

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
                    <div class="card-header"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                        (<?php echo e(implode(', ', $user->getRoleNames()->toArray())); ?>)</div>
                    <div class="card-body">
                        <!-- <a href="<?php echo e(url('/admin/dashboard')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a> -->
                        <a href="<?php echo e(url('/admin/profile/' . $user->id . '/edit')); ?>" title="Edit user"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>
                        <?php if($businessData_count > 0): ?>
                            <a href="<?php echo e(url('/admin/profile/business/' . $businessData->id . '/update')); ?>" title="Update Business Profile"><button class="btn btn-success btn-sm"><i
                                    class="fa fa-plus" aria-hidden="true"></i> Update Business Profile</button></a>
                        <?php else: ?>
                            <a href="<?php echo e(url('/admin/profile/add-business')); ?>" title="Update Business Profile"><button class="btn btn-success btn-sm"><i
                                    class="fa fa-plus" aria-hidden="true"></i> Update Business Profile</button></a>
                        <?php endif; ?>
                        <a href="<?php echo e(url('/admin/profile/' . $user->id . '/change-password')); ?>"
                            title="Change Password"><button class="btn btn-primary btn-sm pull-right"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Change Password</button></a>
                        <br />
                        <br />
                        <div class="row">
                            <div class="col-lg-6 m-t-10">
                                <div class="text-center">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new zoom image-circle">
                                                <?php if(!empty($user->avatar)): ?>
                                                <img class="img-responsive" width="150"
                                                    src="<?php echo e(url('/images/user/large/'.$user->avatar)); ?>"
                                                    alt="<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>"
                                                    class="admin_img_width">
                                                <?php else: ?>
                                                <img class="img-responsive" width="150"
                                                    src="<?php echo e(url('/images/user/user.png')); ?>"
                                                    alt="<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>"
                                                    class="admin_img_width">
                                                <?php endif; ?>
                                            </div>
                                            <div
                                                class="fileinput-preview fileinput-exists thumb_zoom zoom admin_img_width">
                                            </div>
                                            <!-- <div class="btn_file_position">
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Change image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="Changefile">
                                                </span>
                                                <a href="#" class="btn btn-warning fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <ul class="nav nav-inline view_user_nav_padding">
                                        <li class="nav-item card_nav_hover">
                                            <a class="nav-link active" href="#user" id="home-tab" data-toggle="tab"
                                                aria-expanded="true">User Details</a>
                                        </li>
                                        <?php if($roleName == "NGO"): ?>
                                        <li class="nav-item card_nav_hover">
                                            <a class="nav-link" href="#business" id="hats-tab"
                                                data-toggle="tab">Business
                                                info</a>
                                        </li>
                                        <?php endif; ?>
                                        <li class="nav-item card_nav_hover">
                                            <a class="nav-link" href="#address" id="followers"
                                                data-toggle="tab">Address</a>
                                        </li>
                                    </ul>
                                    <div id="clothing-nav-content" class="tab-content m-t-10">
                                        <div role="tabpanel" class="tab-pane fade show active" id="user">
                                            <table class="table" id="users">
                                                <tr>
                                                    <td>Username</td>
                                                    <td class="inline_edit">
                                                        <span><?php echo e($user->username); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td class="inline_edit">
                                                        <span><?php echo e($user->title); ?> <?php echo e($user->first_name); ?>

                                                            <?php echo e($user->last_name); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>E-mail</td>
                                                    <td>
                                                        <span><?php echo e($user->email); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Phone Number</td>
                                                    <td>
                                                        <span><?php echo e($user->phone); ?></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Role</td>
                                                    <td>
                                                        <span><label
                                                                class="badge badge-success badge-lg badge-pill"><?php echo e(implode(', ', $user->getRoleNames()->toArray())); ?></label></span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Created At</td>
                                                    <td><?php echo e(date('d M, Y (h:i:s A)', strtotime($user->created_at))); ?>

                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="business">
                                            <div class="card_nav_body_padding">
                                                <table class="table" id="users">
                                                    <tr>
                                                        <td>Business Name</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($supplierData->business_name)): ?><?php echo e($supplierData->business_name); ?>

                                                                <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Description</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($supplierData->description)): ?><?php echo e($supplierData->description); ?>

                                                                <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Category</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($supplierData->business_name)): ?>
                                                                <?php echo e($supplierData->category); ?> <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>License Number</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($supplierData->license_number)): ?>
                                                                <?php echo e($supplierData->license_number); ?> <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Website</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($supplierData->website)): ?>
                                                                <?php echo e($supplierData->website); ?> <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Country</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($supplierData->country)): ?>
                                                                <?php $__currentLoopData = \App\Country::where('iso3',$supplierData->country)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($cnt->name); ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>State</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($supplierData->state)): ?>
                                                                <?php echo e($supplierData->state); ?> <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($supplierData->city)): ?>
                                                                <?php echo e($supplierData->city); ?> <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="#"
                                                                class="btn btn-sm btn-info pull-right">Edit</a> 
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="address">
                                            <div class="card_nav_body_padding follower_images">
                                                <table class="table" id="users">
                                                    <tr>
                                                        <td>Name</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($userAddress->name)): ?><?php echo e($userAddress->name); ?>

                                                                <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($userAddress->phone)): ?>
                                                                <?php echo e($userAddress->phone); ?> <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($userAddress->address1)): ?><?php echo e($userAddress->address1); ?>

                                                                <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Country</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($userAddress->country)): ?>
                                                                <?php $__currentLoopData = \App\Country::where('iso3',$userAddress->country)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($cnt->name); ?>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>State</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($userAddress->state)): ?>
                                                                <?php echo e($userAddress->state); ?> <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($userAddress->city)): ?>
                                                                <?php echo e($userAddress->city); ?> <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td class="inline_edit">
                                                            <span><?php if(!empty($userAddress->zipcode)): ?>
                                                                <?php echo e($userAddress->zipcode); ?> <?php endif; ?></span>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="row">
                                                    <?php if(!empty($userAddress)): ?> <a class="btn btn-info btn-sm pull-right"
                                                        href="<?php echo e(url('/admin/user/address/'.$userAddress->id.'/edit')); ?>">Edit
                                                        Address</a> <?php else: ?><a class="btn btn-info btn-sm pull-right"
                                                        href="<?php echo e(url('/admin/user/address/create')); ?>">Add
                                                        Address</a><?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card m-t-35">
                    <div class="card-header bg-white">
                        <div>
                            <i class="fa fa-question-circle"></i>
                            Recent Query
                        </div>
                    </div>
                    <div class="card-body padding">
                        <div class="feed">
                            <?php if(!empty($productquery)): ?>
                            <h4>Product Queries</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Product</th>
                                            <th>Product Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $productquery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->email); ?></td>
                                            <td><?php echo e($item->phone); ?></td>
                                            <?php $__currentLoopData = \App\Product::where('id', $item->product_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php echo e($prod->product_name); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <td><?php if($item->product_type == 1): ?><label
                                                    class="badge badge-success">VVIP</label><?php elseif($item->product_type
                                                == 0): ?> <label class="badge badge-info">Basic</label> <?php endif; ?></td>
                                            <td><?php if($item->status == 1): ?><label
                                                    class="badge badge-success">Done</label><?php elseif($item->status == 0): ?>
                                                <label class="badge badge-danger">Pending</label> <?php endif; ?></td>
                                            <td>
                                                <a href="<?php echo e(url('/admin/support/product-query/' . $item->id)); ?>"
                                                    title="View Query"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                                <a href="<?php echo e(url('/admin/support/product-query/' . $item->id . '/edit')); ?>"
                                                    title="Edit Query"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button></a>

                                                <form method="POST"
                                                    action="<?php echo e(url('/admin/support/product-query' . '/' . $item->id)); ?>"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <?php echo e(csrf_field()); ?>

                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Query"
                                                        onclick="return confirm('Confirm delete?')"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>

                                                <a href="<?php echo e(url('/admin/send-email/' . $item->id)); ?>"
                                                    title="Send Email"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-envelope" aria-hidden="true"></i> </button></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                                <?php if(!empty($supplierQuery)): ?>
                                <h4>Supplier Queries</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Supplier</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $supplierQuery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($item->name); ?></td>
                                                <td><?php echo e($item->email); ?></td>
                                                <td><?php echo e($item->phone); ?></td>

                                                <td><?php $__currentLoopData = \App\User::where('id', $item->supplier_id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($supp->first_name); ?> <?php echo e($supp->last_name); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>

                                                <td><?php echo e($item->location); ?></td>
                                                <td><?php if($item->status == 1): ?><label
                                                        class="badge badge-success">Done</label><?php elseif($item->status ==
                                                    0): ?>
                                                    <label class="badge badge-danger">Pending</label> <?php endif; ?></td>
                                                <td>
                                                    <a href="<?php echo e(url('/admin/support/supplier-query/' . $item->id)); ?>"
                                                        title="View Query"><button class="btn btn-info btn-sm"><i
                                                                class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                                    <a href="<?php echo e(url('/admin/support/supplier-query/' . $item->id . '/edit')); ?>"
                                                        title="Edit Query"><button class="btn btn-primary btn-sm"><i
                                                                class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </button></a>

                                                    <form method="POST"
                                                        action="<?php echo e(url('/admin/support/supplier-query' . '/' . $item->id)); ?>"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Delete Query"
                                                            onclick="return confirm('Confirm delete?')"><i
                                                                class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class="pagination-wrapper"> </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <!-- <ul>
                                <li>
                                    <h5>
                                        test
                                    </h5>
                                    <p>
                                        Mail received from
                                        <strong>John</strong> .
                                    </p>
                                    <i>1 hr back</i>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/profile/view.blade.php ENDPATH**/ ?>