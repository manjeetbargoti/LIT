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
                    @if(!empty(Auth::user()->avatar))<img
                        class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="Test"
                        src="{{ asset('/images/user/large/'.Auth::user()->avatar) }}">@else
                    <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="Test"
                        src="{{ asset('/images/user/user.png') }}">
                    @endif
                    <p class="text-white user-info">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                </a>
            </div>
        </div>
        <!-- #menu -->
        <ul id="menu">
            <!-- Dashboard -->
            <li class="{{ (request()->is('admin/dashboard')) ? 'active':'' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-home"></i>
                    <span class="link-title menu_hide">&nbsp;Dashboard</span>
                </a>
            </li>
            <!-- /.Dashboard -->

            <!-- User Management -->
            <li class="dropdown_menu {{ (request()->is('admin/profile*')) ? 'active':'' }}">
                <a href="{{ url('/admin/profile') }}">
                    <i class="fa fa-users"></i>
                    <span class="link-title menu_hide">&nbsp; Account Settings</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="{{ (request()->is('admin/profile')) ? 'active':'' }}">
                        <a href="{{ url('admin/profile') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; My Profile
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/profile/company')) ? 'active':'' }}">
                        <a href="{{ url('admin/profile/company') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Company Profile
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/profile/address')) ? 'active':'' }}">
                        <a href="{{ url('admin/profile/address') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Address</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- /.User Management -->

            <!-- System Settings -->
            <li class="dropdown_menu {{ (request()->is('admin/system*')) ? 'active':'' }}">
                <a href="{{ url('/admin/system') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; System</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="{{ (request()->is('admin/system/options')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/options') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Site Options
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/system/contact-info')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/contact-info') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Contact info
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/system/social-links')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/social-links') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Social Links
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/system/robots.txt')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/robots.txt') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Robots.txt</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/system/htaccess')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/htaccess') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; .htaccess</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/system/custom-code')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/custom-code') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Custom Code</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/system/terms-condition')) ? 'active':'' }}">
                        <a href="{{ url('admin/system/terms-condition') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Terms & Conditions</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- /.System Settings -->

            <!-- User Management -->
            <li class="dropdown_menu {{ (request()->is('admin/user*')) ? 'active':'' }}">
                <a href="{{ url('/admin/users') }}">
                    <i class="fa fa-users"></i>
                    <span class="link-title menu_hide">&nbsp; User Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="{{ (request()->is('admin/users')) ? 'active':'' }}">
                        <a href="{{ url('admin/users') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Users
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/user/role')) ? 'active':'' }}">
                        <a href="{{ url('admin/user/role') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; User Roles
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/user/permission')) ? 'active':'' }}">
                        <a href="{{ url('admin/user/permission') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; User Permissions</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- /.User Management -->

            <!-- Page Management -->
            <li class="dropdown_menu {{ (request()->is('admin/pages*')) ? 'active':'' }}">
                <a href="{{ url('/admin/pages') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Page Management</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="{{ (request()->is('admin/pages*')) ? 'active':'' }}">
                        <a href="{{ url('admin/pages') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Pages
                        </a>
                    </li>
                    <!-- <li class="{{ (request()->is('admin/page-category')) ? 'active':'' }}">
                        <a href="{{ url('admin/page-category') }}">
                            <i class="fa fa-angle-right"></i>
                            <span class="link-title"> &nbsp; Page Category</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <!-- /.Page Management -->

            <!-- Social Goals Management -->
            <li class="dropdown_menu {{ (request()->is('admin/sdgs*')) ? 'active':'' }}">
                <a href="{{ url('/admin/sdgs') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Social Goals (SDG's)</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="{{ (request()->is('admin/sdgs*')) ? 'active':'' }}">
                        <a href="{{ url('/admin/sdgs') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; SDG's
                        </a>
                    </li>
                </ul>
            </li>
            <!-- /.Social Goals Management -->

            <!-- Product Management -->
            <li class="dropdown_menu {{ (request()->is('admin/social-impact*')) ? 'active':'' }}">
                <a href="{{ url('/admin/social-impact') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Social Impact</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
                <ul>
                    <li class="{{ (request()->is('admin/social-impact/initiatives*')) ? 'active':'' }}">
                        <a href="{{ url('admin/social-impact/initiatives') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Social Initiatives
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/social-impact/proposals*')) ? 'active':'' }}">
                        <a href="{{ url('admin/social-impact/proposals') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Proposals (RFP)
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/social-impact/activity-job*')) ? 'active':'' }}">
                        <a href="{{ url('admin/social-impact/activity-job') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; Volunteers
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/social-impact/digital-service*')) ? 'active':'' }}">
                        <a href="{{ url('admin/social-impact/digital-service') }}">
                            <i class="fa fa-angle-right"></i> &nbsp; 360 Digital Marketing Services
                        </a>
                    </li>
                </ul>
            </li>
            <!-- /.Product Management -->

            <!-- Success Story Management -->
            <li class="dropdown_menu {{ (request()->is('admin/success-stories*')) ? 'active':'' }}">
                <a href="{{ url('/admin/success-stories') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span class="link-title menu_hide">&nbsp; Success Story</span>
                    <span class="fa arrow menu_hide"></span>
                </a>
            </li>
            <!-- /.Page Management -->

        <!-- Support Center -->
        <li class="dropdown_menu {{ (request()->is('admin/support*')) ? 'active':'' }}">
            <a href="{{ url('/admin/supports') }}">
                <i class="fa fa-file-text-o"></i>
                <span class="link-title menu_hide">&nbsp; Support Center</span>
                <span class="fa arrow menu_hide"></span>
            </a>
            <ul>
                <li class="{{ (request()->is('admin/support/product-query*')) ? 'active':'' }}">
                    <a href="{{ url('admin/support/product-query') }}">
                        <i class="fa fa-angle-right"></i> &nbsp; Product Queries
                    </a>
                </li>
                <li class="{{ (request()->is('admin/support/supplier-query')) ? 'active':'' }}">
                    <a href="{{ url('admin/support/supplier-query') }}">
                        <i class="fa fa-angle-right"></i> &nbsp; Supplier Queries
                    </a>
                </li>
                <li class="{{ (request()->is('admin/support/contact-query')) ? 'active':'' }}">
                    <a href="{{ url('admin/support/contact-query') }}">
                        <i class="fa fa-angle-right"></i> &nbsp; Contact Queries
                    </a>
                </li>
                <li class="{{ (request()->is('admin/support/subscribers')) ? 'active':'' }}">
                    <a href="{{ url('admin/support/subscribers') }}">
                        <i class="fa fa-angle-right"></i> &nbsp; Subscribers
                    </a>
                </li>
            </ul>
        </li>
        <!-- /.Support Center -->
        </ul>
        <!-- /#menu -->
    </div>
</div>
<!-- /.Sidebar ends here -->