<?php $__env->startSection('content'); ?>
<!-- Right Section start here -->
<header class="head">
    <div class="main-bar">
        <div class="row">
            <div class="col-6">
                <h4 class="m-t-5">
                    <i class="fa fa-home"></i>
                    Dashboard
                </h4>
            </div>
        </div>
    </div>
</header>
<div class="outer">
    <div class="inner bg-container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-12">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <div class="bg-primary top_cards">
                            <div class="row icon_margin_left">
                                <div class="col-lg-5 col-5 icon_padd_left">
                                    <div class="float-left">
                                        <span class="fa-stack fa-sm">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i
                                                class="fa fa-question fa-stack-1x fa-inverse text-primary sales_hover"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-7 icon_padd_right">
                                    <div class="float-right cards_content">
                                        <span class="number_val" id="sales_count">5</span><i
                                            class="fa fa-long-arrow-up fa-2x"></i>
                                        <br />
                                        <span class="card_description">Queries</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="bg-success top_cards">
                            <div class="row icon_margin_left">
                                <div class="col-lg-5  col-5 icon_padd_left">
                                    <div class="float-left">
                                        <span class="fa-stack fa-sm">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i
                                                class="fa fa-product-hunt fa-stack-1x fa-inverse text-success visit_icon"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-7 icon_padd_right">
                                    <div class="float-right cards_content">
                                        <span class="number_val" id="visitors_count">5</span><i
                                            class="fa fa-long-arrow-up fa-2x"></i>
                                        <br />
                                        <span class="card_description">Products</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="bg-warning top_cards">
                            <div class="row icon_margin_left">
                                <div class="col-lg-5 col-5 icon_padd_left">
                                    <div class="float-left">
                                        <span class="fa-stack fa-sm">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-truck fa-stack-1x fa-inverse text-warning revenue_icon"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-7 icon_padd_right">
                                    <div class="float-right cards_content">
                                        <span class="number_val" id="revenue_count"></span>
                                        <i class="fa fa-long-arrow-up fa-2x"></i>
                                        <br />
                                        <span class="card_description">Suppliers</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="bg-mint top_cards">
                            <div class="row icon_margin_left">
                                <div class="col-lg-5 col-5 icon_padd_left">
                                    <div class="float-left">
                                        <span class="fa-stack fa-sm">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-users  fa-stack-1x fa-inverse text-mint sub"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-7 icon_padd_right">
                                    <div class="float-right cards_content">
                                        <span class="number_val"
                                            id="subscribers_count"><?php echo e(\App\User::count()); ?></span><i
                                            class="fa fa-long-arrow-up fa-2x"></i>
                                        <br />
                                        <span class="card_description">Users</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-12 stat_align">
                <div class="card weather_section md_align_section">
                    <div class="card-body">
                        <div class="row margin_align">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="icon sun-shower">
                                            <div class="cloud"></div>
                                            <div class="sun">
                                                <div class="rays"></div>
                                            </div>
                                            <div class="rain"></div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="weather-value">
                                            <span class=" text-white"><span class="degree">25&deg;</span>
                                            </span>
                                        </div>
                                        <div class="weather_location">
                                            <span class="text-white"><i class="fa fa-map-marker"></i> Dubai</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row weekly_report">
                                    <div class="col-3">
                                        <span>Mon</span>
                                        <br />
                                        <img src="img/w1.png" alt="weather">
                                        <p>27&deg;</p>
                                    </div>
                                    <div class="col-3">
                                        <span>Tue</span>
                                        <br />
                                        <img src="img/w2.png" alt="weather">
                                        <p>23&deg;</p>
                                    </div>
                                    <div class="col-3">
                                        <span>Wed</span>
                                        <br />
                                        <img src="img/w3.png" alt="weather">
                                        <p>19&deg;</p>
                                    </div>
                                    <div class="col-3">
                                        <span>Thu</span>
                                        <br />
                                        <img src="img/w4.png" alt="weather">
                                        <p>38&deg;</p>
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
<!-- /.Right section ends here -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.panel.design', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GITHUB\LIT\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>