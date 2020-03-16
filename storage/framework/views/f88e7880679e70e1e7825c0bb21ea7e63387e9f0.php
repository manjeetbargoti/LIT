<!-- Responsive Menu -->
<div class="topnav">
    <div class="container">
        <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <h3>Menu</h3>
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <a href="<?php echo e(url('/')); ?>">
                        <img class="default_logo" src="<?php echo e(asset('/images/logo/'.config('app.logo'))); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-10">
                    <ul id="respMenu" class="ace-responsive-menu  float-right" data-menu-style="horizontal">
                        <li>
                            <a href="<?php echo e(url('/about-us')); ?>"><span class="title">ABOUT us</span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/csr-market-place')); ?>"><span class="title">CSR MARKET PLACE</span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/program/apply-to-program')); ?>"><span class="title">Apply Program</span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/users/activists')); ?>"><span class="title">SOCIAL STRATUPS</span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/success-stories')); ?>"><span class="title">SUCCESS STORIES</span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/contact-us')); ?>"><span class="title">CONTACT US</span></a>
                        </li>
                        <?php if(auth()->guard()->guest()): ?>
                        <li>
                            <!-- <a href="<?php echo e(route('login')); ?>" class="btn"><span class="title">Sign in/Register</span></a> -->
                            <a href="<?php echo e(route('login')); ?>" class="btn regbtn"><span class="title">Sign in/Register</span></a>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="#" class="icon"><span class="title"><img src="<?php echo e(asset('front/dist/img/user.png')); ?>" alt="user"
                                        class="usericon" /></span></a>
                            <!-- Level Two-->
                            <ul>
                                <li><a href="<?php echo e(url('/admin/profile')); ?>"><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></a></li>
                                <li><a href="<?php echo e(url('/admin/profile')); ?>">My Account</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <li>
                            <?php $totals = 0; ?>
                            <?php $__currentLoopData = (array) session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $totals += $details['qty']; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <a class="icon"><span class="title"> <img src="<?php echo e(asset('front/dist/img/shopping-cart.png')); ?>" class="carticon" alt="shopping-cart" /></span>
                                <sup class="badge badge-primary">
                                    <?php echo e($totals); ?>

                                </sup>
                            </a>
                                <!-- Level Two-->
                                <?php if(session('cart')): ?>
                                <ul class="<?php if($totals > 0): ?> d-block <?php endif; ?>">
                                    <?php $total = 0 ?>
                                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php $total += $details['qty']; ?>
                                    <li>
                                        <!-- <span class="itemimg">
                                            <img src="<?php echo e(asset('front/dist/img/home/blog2.jpg')); ?>">
                                        </span> -->
                                        <div class="carttext">
                                            <h5><?php echo e($loop->iteration); ?>. <?php echo e($details['name']); ?>, <?php echo e($details['beneficiaries']); ?> Beneficiaries, Duration: <?php echo e($details['duration']); ?> Months </h5>
                                            <p><strong><i class="fa fa-hand-o-right"></i> Budget:</strong> USD <?php echo e($details['budget']); ?></p>
                                            <p><strong><i class="fa fa-user"></i> Beneficiaries:</strong> <?php echo e($details['beneficiaries']); ?></p>
                                            <!-- <p><strong><i class="fa fa-check-square-o"></i> Quantity:</strong> <?php echo e($total); ?></p> -->
                                            <p><strong><i class="fa fa-clock-o"></i> Duration:</strong> <?php echo e($details['duration']); ?> Months</p>
                                            <!-- <p><strong><i class="fa fa-check-square-o"></i> Spend Per Person:</strong> <?php echo e(number_format(preg_replace('/[ ,]+/', '', $details['budget']) / $details['beneficiaries'] / preg_replace('/[ ,]+/', '', $details['duration']), 2)); ?> per person/month</p> -->
                                            <a href="javascript.void(0);" class="button_link" data-toggle="modal" data-target="#QueryForm<?php echo e($details['rid']); ?>">Express Interest</a>
                                            <a href="<?php echo e(url('/cart-item/'.$details['rid'].'/remove/')); ?>" class="button_link btn-danger pull-right">Remove</a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </li>
                        <!-- <li>
                            <div class="header_search  float-right">
                                <div class="header_search-button"></div>
                                <div class="header_search-field">
                                    <form role="search" method="get" action="#" class="search-form">
                                        <input type="text" id="search-form-5d7bac88094d1" class="search-field"
                                            placeholder="Search …" value="" name="s">
                                        <input class="search-button" type="submit" value="Search">
                                    </form>
                                </div>
                            </div>
                        </li> -->
                    </ul>
        </nav>
    </div>
</div>
</div>
<!-- Responsive Menu --><?php /**PATH D:\GITHUB\LIT\resources\views/layouts/front/header.blade.php ENDPATH**/ ?>