"use strict";
$(document).ready(function () {
    $(".card-collapse").on('show.bs.collapse', function () {
        $(this).prev("div").find("i").removeClass("fa-plus").addClass("fa-minus");
    });
    $(".card-collapse").on('hide.bs.collapse', function () {
        $(this).prev("div").find("i").removeClass("fa-minus").addClass("fa-plus");
    });

//        swiper
    var swiper = new Swiper('.widget_swiper', {
        centeredSlides: true,
        autoplay:true,
        loop:true,
        speed:1000,
        autoplayDisableOnInteraction: false
    });
    $(".wrapper").on("resize", function() {
        setTimeout(function() {
            swiper.update();
        }, 400);
    });
});