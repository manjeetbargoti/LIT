<!-- Sidebar Start here -->
<!-- <div class="wrapper"> -->
<div id="left">
    <div class="menu_scroll">
        <div class="media user-media">
            <div class="user-media-toggleHover">
                <span class="fa fa-user"></span>
            </div>
            <div class="user-wrapper">
                <a class="user-link" href="#">
                    <?php if(!empty(Auth::user()->avatar)): ?><img
                        class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="Test"
                        src="<?php echo e(asset('/images/user/large/'.Auth::user()->avatar)); ?>"><?php else: ?>
                    <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="Test"
                        src="<?php echo e(asset('/images/user/user.png')); ?>">
                    <?php endif; ?>
                    <p class="text-white user-info"><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></p>
                </a>
            </div>
        </div>
        <!-- #menu -->
        <ul id="menu">
            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            <!-- Dashboard -->
            <li class="<?php echo e((request()->is('admin/dashboard')) ? 'active':''); ?>">
                <a href="<?php echo e(route('dashboard')); ?>">
                    <i class="fa fa-home"></i>
                    <span class="link-title menu_hide">&nbsp;Dashboard</span>
                </a>
            </li>
            <!-- /.Dashboard -->
            <?php endif; ?>

            <!-- User Management -->
            <li class="dropdown_menu <?php echo e((request()->is('admin/profile*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/profile')); ?>">
                    <i class="fa fa-users"></i>
                    <span class="link-title menu_hide">&nbsp; Account Settings</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="<?php echo e((request()->is('admin/profile')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/profile')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; My Profile
                        </a>
                    </li>
                    <?php if(auth()->check() && auth()->user()->hasAnyRole('Super Admin|Social Enterprise|Corporate|Government')): ?>
                    <li class="<?php echo e((request()->is('admin/profile/company')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/profile/company')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Company Profile
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="<?php echo e((request()->is('admin/banner*'))  ? 'active':''); ?>">
                        <a href="#"><i class="fa fa-angle-right"></i> &nbsp; Banners
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul>
                            <li class="<?php echo e((request()->is('admin/banner')) ? 'active' : ''); ?>"><a
                                    href="<?php echo e(url('/admin/banner')); ?>"><i class="fa fa-angle-right text-aqua"></i> &nbsp; All
                                    Banners</a></li>
                            <li class="<?php echo e((request()->is('admin/banner/add')) ? 'active' : ''); ?>"><a
                                    href="<?php echo e(url('/admin/banner/add')); ?>"><i class="fa fa-plus text-aqua"></i> &nbsp; Add
                                    Banner</a></li>
                        </ul>
                    </li>
                    <!-- <li class="<?php echo e((request()->is('admin/profile/address')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/profile/address')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Address</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <!-- /.User Management -->

            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            <!-- System Settings -->
            <li class="dropdown_menu <?php echo e((request()->is('admin/system*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/system')); ?>">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; System</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="<?php echo e((request()->is('admin/system/options')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/options')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Site Options
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/system/contact-info')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/contact-info')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Contact info
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/system/social-links')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/social-links')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Social Links
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/system/robots.txt')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/robots.txt')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Robots.txt</span>
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/system/htaccess')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/htaccess')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; .htaccess</span>
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/system/custom-code')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/custom-code')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Custom Code</span>
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/system/terms-condition')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/system/terms-condition')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Terms & Conditions</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- /.System Settings -->
            <?php endif; ?>

            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            <!-- User Management -->
            <li class="dropdown_menu <?php echo e((request()->is('admin/user*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/users')); ?>">
                    <i class="fa fa-users"></i>
                    <span class="link-title menu_hide">&nbsp; User Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="<?php echo e((request()->is('admin/users')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/users')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Users
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/user/role')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/user/role')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; User Roles
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/user/permission')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/user/permission')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; User Permissions</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- /.User Management -->
            <?php endif; ?>

            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            <!-- Page Management -->
            <li class="dropdown_menu <?php echo e((request()->is('admin/pages*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/pages')); ?>">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Page Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="<?php echo e((request()->is('admin/pages*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/pages')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Pages
                        </a>
                    </li>
                    <!-- <li class="<?php echo e((request()->is('admin/page-category')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/page-category')); ?>">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Page Category</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <!-- /.Page Management -->
            <?php endif; ?>

            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            <!-- Social Goals Management -->
            <li class="dropdown_menu <?php echo e((request()->is('admin/sdgs*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/sdgs')); ?>">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Social Goals (SDG's)</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="<?php echo e((request()->is('admin/sdgs*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('/admin/sdgs')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; SDG's
                        </a>
                    </li>
                </ul>
            </li>
            <!-- /.Social Goals Management -->
            <?php endif; ?>

            <?php if(auth()->check() && auth()->user()->hasAnyRole('Super Admin|NGO|Social Enterprise|Corporate|Government')): ?>
            <!-- Product Management -->
            <li class="dropdown_menu <?php echo e((request()->is('admin/social-impact*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/social-impact')); ?>">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Social Impact</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="<?php echo e((request()->is('admin/social-impact/initiatives*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/social-impact/initiatives')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Social Initiatives
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/social-impact/proposals*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/social-impact/proposals')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Proposals (RFP)
                        </a>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('activist_access')): ?>
                    <!-- <li class="<?php echo e((request()->is('admin/social-impact/activity-job*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/social-impact/activity-job')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Volunteers Job
                        </a>
                    </li> -->
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('digital_service_access')): ?>
                    <!-- <li class="<?php echo e((request()->is('admin/social-impact/digital-service*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/social-impact/digital-service')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; 360 Digital Marketing Services
                        </a>
                    </li> -->
                    <?php endif; ?>
                </ul>
            </li>
            <!-- /.Product Management -->
            <?php endif; ?>

            <!-- Success Story Management -->
            <li class="dropdown_menu <?php echo e((request()->is('admin/success-stories*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/success-stories')); ?>">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Success Story</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
            </li>
            <!-- /.Page Management -->

            <!-- Support Center -->
            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
            <li class="dropdown_menu <?php echo e((request()->is('admin/support*')) ? 'active':''); ?>">
                <a href="<?php echo e(url('/admin/supports')); ?>">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Support Center</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="<?php echo e((request()->is('admin/support/submit-proposals*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/support/submit-proposals')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Proposals Query
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/support/initiative-query*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/support/initiative-query')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Initiative Query
                        </a>
                    </li>
                    <li class="<?php echo e((request()->is('admin/support/activist-query*')) ? 'active':''); ?>">
                        <a href="<?php echo e(url('admin/support/activist-query')); ?>">
                            <i class="fa fa-angle-right"></i> &nbsp; Social Startup Query
                        </a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
            <!-- /.Support Center -->
        </ul>
        <!-- /#menu -->
    </div>
</div>
<!-- /.Sidebar ends here --><?php /**PATH D:\GITHUB\LIT\resources\views/layouts/panel/sidebar.blade.php ENDPATH**/ ?>