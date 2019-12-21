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
                    <a href="#">
                        <img class="default_logo" src="{{ asset('front/dist/img/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-10">
                    <ul id="respMenu" class="ace-responsive-menu  float-right" data-menu-style="horizontal">
                        <li>
                            <a href="index.html"><span class="title">ABOUT us</span></a>
                        </li>
                        <li>
                            <a href="mmj-card.html"><span class="title">CSR MARKET PLACE</span></a>
                        </li>
                        <li>
                            <a href="how-it-works.html"><span class="title">SUCCESS STORY</span></a>
                        </li>
                        <li>
                            <a href="our-story.html"><span class="title">CONTACT US</span></a>
                        </li>
                        @guest
                        <li>
                            <a href="#" class="btn"><span class="title">Sign in/Register</span></a>
                        </li>
                        @else
                        <li>
                            <a href="#" class="icon"><span class="title"><img src="{{ asset('front/dist/img/user.png') }}" alt="user"
                                        class="usericon" /></span></a>
                            <!-- Level Two-->
                            <ul>
                                <li><a href="#">Sub Item One</a></li>
                                <li><a href="#">Sub Item Two</a></li>
                                <li><a href="#">Sub Item Three</a></li>
                                <li><a href="#">Sub Item Four</a></li>
                            </ul>
                        </li>
                        @endguest
                        <li>
                            <a href="#" class="icon"><span class="title"> <img src="{{ asset('front/dist/img/shopping-cart.png') }}"
                                        class="carticon" alt="shopping-cart" /> <b>95 </b> </span></a>
                            <!-- Level Two-->
                            <ul>
                                <li><a href="#">Sub Item One</a></li>
                                <li><a href="#">Sub Item Two</a></li>
                                <li><a href="#">Sub Item Three</a></li>
                                <li><a href="#">Sub Item Four</a></li>
                            </ul>
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
<!-- Responsive Menu -->