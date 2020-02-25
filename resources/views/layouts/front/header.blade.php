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
                    <a href="{{ url('/') }}">
                        <img class="default_logo" src="{{ asset('front/dist/img/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-10">
                    <ul id="respMenu" class="ace-responsive-menu  float-right" data-menu-style="horizontal">
                        <li>
                            <a href="{{ url('/about-us') }}"><span class="title">ABOUT us</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/csr-market-place') }}"><span class="title">CSR MARKET PLACE</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/users/activists') }}"><span class="title">ACTIVISTS</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/success-stories') }}"><span class="title">SUCCESS STORIES</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/contact-us') }}"><span class="title">CONTACT US</span></a>
                        </li>
                        @guest
                        <li>
                            <!-- <a href="{{ route('login') }}" class="btn"><span class="title">Sign in/Register</span></a> -->
                            <a href="{{ route('login') }}" class="btn regbtn"><span class="title">Sign in/Register</span></a>
                        </li>
                        @else
                        <li>
                            <a href="#" class="icon"><span class="title"><img src="{{ asset('front/dist/img/user.png') }}" alt="user"
                                        class="usericon" /></span></a>
                            <!-- Level Two-->
                            <ul>
                                <li><a href="{{ url('/admin/profile') }}">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a></li>
                                <li><a href="{{ url('/admin/profile') }}">My Account</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>
                            </ul>
                        </li>
                        @endguest
                        <li>
                            <?php $totals = 0; ?>
                            @foreach((array) session('cart') as $id => $details)
                                <?php $totals += $details['qty']; ?>
                            @endforeach
                            <a class="icon"><span class="title"> <img src="{{ asset('front/dist/img/shopping-cart.png') }}" class="carticon" alt="shopping-cart" /></span>
                                <sup class="badge badge-primary">
                                    {{ $totals }}
                                </sup>
                            </a>
                                <!-- Level Two-->
                                @if(session('cart'))
                                <ul class="@if($totals > 0) d-block @endif">
                                    <?php $total = 0 ?>
                                    @foreach(session('cart') as $id => $details)

                                    <?php $total += $details['qty']; ?>
                                    <li>
                                        <!-- <span class="itemimg">
                                            <img src="{{ asset('front/dist/img/home/blog2.jpg') }}">
                                        </span> -->
                                        <div class="carttext">
                                            <h5>{{ $loop->iteration }}. {{ $details['name'] }}, {{ $details['beneficiaries'] }} Beneficiaries, Duration: {{ $details['duration'] }} Months </h5>
                                            <p><strong><i class="fa fa-hand-o-right"></i> Budget:</strong> USD {{ $details['budget'] }}</p>
                                            <p><strong><i class="fa fa-user"></i> Beneficiaries:</strong> {{ $details['beneficiaries'] }}</p>
                                            <!-- <p><strong><i class="fa fa-check-square-o"></i> Quantity:</strong> {{ $total }}</p> -->
                                            <p><strong><i class="fa fa-clock-o"></i> Duration:</strong> {{ $details['duration'] }} Months</p>
                                            <p><strong><i class="fa fa-check-square-o"></i> Spend Per Person:</strong> {{ number_format(preg_replace('/[ ,]+/', '', $details['budget']) / $details['beneficiaries'] / preg_replace('/[ ,]+/', '', $details['duration']), 2) }} per person/month</p>
                                            <a href="javascript.void(0);" class="button_link" data-toggle="modal" data-target="#QueryForm{{ $details['rid'] }}">Express Interest</a>
                                            <a href="{{ url('/cart-item/'.$details['rid'].'/remove/') }}" class="button_link btn-danger pull-right">Remove</a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
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
<!-- Responsive Menu -->