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
                        <img class="default_logo" src="<?php echo e(asset('front/dist/img/logo.png')); ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-10">
                    <ul id="respMenu" class="ace-responsive-menu  float-right" data-menu-style="horizontal">
                        <li>
                            <a href="#"><span class="title">ABOUT us</span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/csr-market-place')); ?>"><span class="title">CSR MARKET PLACE</span></a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/success-stories')); ?>"><span class="title">SUCCESS STORIES</span></a>
                        </li>
                        <li>
                            <a href="#"><span class="title">CONTACT US</span></a>
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
                                <li><a href="#">My Account</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form></li>
                            </ul>
                        </li>
                        <?php endif; ?>
                        <li>
                                <a class="icon"><span class="title"> <img src="<?php echo e(asset('front/dist/img/shopping-cart.png')); ?>" class="carticon" alt="shopping-cart" /></span><sup class="badge badge-primary"><?php echo e(Session::has('cart') ? Session::get('cart')->totalQty : '0'); ?></sup></a>
                                <!-- Level Two-->
                                <?php if(Session::has('cart') ? Session::get('cart')->totalQty : '0' > 0): ?>
                                <ul class="<?php if(Session::has('cart') ? Session::get('cart')->totalQty : '0' > 0): ?> d-block <?php endif; ?>">
                                    <?php $itmes = Session::has('cart') ? Session::get('cart')->items : '' ?>
                                    <?php $__currentLoopData = $itmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <!-- <span class="itemimg">
                                            <img src="<?php echo e(asset('front/dist/img/home/blog2.jpg')); ?>">
                                        </span> -->
                                        <div class="carttext">
                                            <h5><?php echo e($loop->iteration); ?>. <?php echo e($item['item']->initiative_name); ?>, <?php echo e($item['item']->beneficiaries); ?> Beneficiaries, Duration: <?php echo e($item['item']->duration); ?> Months </h5>
                                            <p><strong><i class="fa fa-hand-o-right"></i> Budget:</strong> AED <?php echo e($item['item']->budget); ?></p>
                                            <p><strong><i class="fa fa-user"></i> Beneficiaries:</strong> <?php echo e($item['item']->beneficiaries); ?></p>
                                            <p><strong><i class="fa fa-clock-o"></i> Duration:</strong> <?php echo e($item['item']->duration); ?> Months</p>
                                            <p><strong><i class="fa fa-check-square-o"></i> Spend Per Person:</strong> <?php echo e(number_format($item['item']->budget / $item['item']->beneficiaries / $item['item']->duration, 2)); ?> per person/month</p>
                                            <a href="#" class="button_link">Express Interest</a> <a href="<?php echo e(url('/cart-item/'.$item['item']->id.'/remove/')); ?>" class="button_link btn-danger pull-right">Remove</a>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <td>Total Spend</td>
                                            <td>AED <?php echo e(Session::has('cart') ? Session::get('cart')->totalPrice : ''); ?></td>
                                        </tr>
                                    </table>
                                    </li>
                                </ul>
                                <?php endif; ?>
                            </li>
                        <li>
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
                        </li>
                    </ul>
        </nav>
    </div>
</div>
</div>
<!-- Responsive Menu --><?php /**PATH D:\GITHUB\LIT\resources\views/layouts/front/header.blade.php ENDPATH**/ ?>