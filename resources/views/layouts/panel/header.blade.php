<!-- Header Start here -->
<!-- Top Start here -->
<div id="top">
    <!-- .navbar -->
    <nav class="navbar navbar-static-top">
        <div class="container-fluid m-0">
            <a class="navbar-brand mr-0" href="{{ route('dashboard') }}">
                <h4 class="text-white"><img src="{{ asset('admin/img/logow.png') }}" class="admin_img" alt="logo">
                    LIT</h4>
            </a>
            <div class="menu mr-sm-auto">
                <span class="toggle-left" id="menu-toggle">
                    <i class="fa fa-bars text-white"></i>
                </span>
            </div>
            <div class="navbar-toggleable-sm m-lg-auto d-none d-lg-flex top_menu" id="nav-content">
                <ul class="nav navbar-nav flex-row top_menubar">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/admin/dashboard') }}">
                            <i class="fa fa-inbox"></i> <span class="quick_text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/admin/user') }}">
                            <i class="fa fa fa-edit"></i> <span class="quick_text">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/admin/product') }}">
                            <i class="fa fa-map-marker"></i> <span class="quick_text">Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/admin/dashboard') }}">
                            <i class="fa fa-picture-o"></i> <span class="quick_text">Suppliers</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" target="_blank" href="{{ url('/') }}">
                            <i class="fa fa-globe"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="topnav dropdown-menu-right ml-auto">
                <div class="btn-group d-none">
                    <div class="notifications no-bg">
                        <a class="btn btn-default btn-sm messages" data-toggle="dropdown"> <i
                                class="fa fa-envelope fa-1x text-white"></i>
                            <span class="badge badge-warning">8</span>
                        </a>
                        <div class="dropdown-menu drop_box_align" role="menu" id="messages_dropdown">
                            <div class="popover-header">You have 8 Messages</div>
                            <div id="messages">
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/5.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data"><strong>hally</strong> sent you an image.
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/8.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data"><strong>Meri</strong> invitation for party.
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/7.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <strong>Remo</strong> meeting details .
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/6.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <strong>David</strong> upcoming events list.
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/5.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data"><strong>hally</strong> sent you an image.
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/8.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data"><strong>Meri</strong> invitation for party.
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/7.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <strong>Remo</strong> meeting details .
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/6.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <strong>David</strong> upcoming events list.
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popover-footer">
                                <a href="mail_inbox.html">Inbox</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-group d-none">
                    <div class="notifications messages no-bg">
                        <a class="btn btn-default btn-sm" data-toggle="dropdown"> <i class="fa fa-bell text-white"></i>
                            <span class="badge badge-danger">9</span>
                        </a>
                        <div class="dropdown-menu drop_box_align" role="menu">
                            <div class="popover-header">You have 9 Notifications</div>
                            <div id="notifications">
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/1.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>Remo</strong> sent you an image
                                            <br>
                                            <small class="primary_txt">just now.</small>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/2.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>clay</strong> business propasals
                                            <br>
                                            <small class="primary_txt">20min Back.</small>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/3.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>John</strong> meeting at Ritz
                                            <br>
                                            <small class="primary_txt">2hrs Back.</small>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/6.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>Luicy</strong> Request Invitation
                                            <br>
                                            <small class="primary_txt">Yesterday.</small>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/1.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>Remo</strong> sent you an image
                                            <br>
                                            <small class="primary_txt">just now.</small>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/2.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>clay</strong> business propasals
                                            <br>
                                            <small class="primary_txt">20min Back.</small>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/3.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>John</strong> meeting at Ritz
                                            <br>
                                            <small class="primary_txt">2hrs Back.</small>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/6.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>Luicy</strong> Request Invitation
                                            <br>
                                            <small class="primary_txt">Yesterday.</small>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="{{ asset('admin/img/mailbox_imgs/1.jpg') }}"
                                                class="message-img avatar rounded-circle" alt="avatar1"></div>
                                        <div class="col-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>Remo</strong> sent you an image
                                            <br>
                                            <small class="primary_txt">just now.</small>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popover-footer">
                                <a href="#">View All</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-group d-none">
                    <a class="btn btn-default btn-sm messages toggle-right">
                        &nbsp;
                        <i class="fa fa-cog text-white"></i>
                        &nbsp;
                    </a>
                </div>
                <div class="btn-group">
                    <div class="user-settings no-bg">
                        <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">

                            @if(!empty(Auth::user()->image))<img src="{{ asset('/images/user/large/'.Auth::user()->image) }}" class="admin_img2 rounded-circle avatar-img"
                                alt="Test">@else
                                    <img src="{{ asset('/images/user/user.png/') }}" class="admin_img2 rounded-circle avatar-img"
                                alt="Test">
                                @endif
                            <strong>Name</strong>
                            <span class="fa fa-sort-down white_bg"></span>
                        </button>
                        <div class="dropdown-menu admire_admin">
                            <div class="popover-header">Name</div>
                            <a class="dropdown-item" href="{{ url('/admin/profile') }}"><i class="fa fa-cogs"></i>
                                Profile Settings</a>
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-user"></i> User Status
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="fa fa-sign-out"></i>
                                {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- /.navbar -->
    <!-- /.head -->
</div>
<!-- /.Top ends here -->
<!-- /.Header ends here -->