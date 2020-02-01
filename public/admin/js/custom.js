"use strict";

$(window).on("load",function() {
    $('.preloader img').fadeOut();
    $('.preloader').fadeOut(1000);
});

$(document).ready(function() {

    $('[data-toggle="tooltip"]').tooltip();

    // menu js

    $('#menu').admireMenu();
    Admire.navBar();
    Admire.admireAnimatePanel();
    function _fix() {
        //Get window height and the wrapper height
        var height = $(window).height() - $("#top").height();
        var wrapper = $(".wrapper");
        wrapper.css("min-height", height + "px");
        var content = wrapper.height();

        //If the wrapper height is greater than the window

        if (content > height)
        {
            //then set sidebar height to the wrapper
            $("#right, html, body").css("min-height", content + 0 + "px");
            $("#left").css("min-height", content + 2 + "px");
        }
        else
        {
            //Otherwise, set the sidebar to the height of the window
            $("#right, html, body").css("min-height", height + 0 + "px");
            $("#left").css("min-height", height + 2 + "px");
        }
    }
    function fix_sidebar() {
        //Make sure the body tag has the .fixed class
        if (!$("body").hasClass("fixed")) {
            return;
        }
        if($(window).width() > 767)
        {
            $('.left_content').slimscroll({
                height: $(window).height()-58,
                size: '5px',
                opacity: 0.2
            });
        }
        else {
            $(".left_content").slimScroll({
                destroy: true,
                height: '100%'
            });
        }
    }
    //Fire upon load admire
    setTimeout(_fix, 100);
    //Fix the fixed layout sidebar scroll bug
    fix_sidebar();

    //Fire when wrapper is resized
    $(".wrapper").resize(function() {
        _fix();
        fix_sidebar();
    });

    // slim scroll for header and right sections
    function right_content(){
        $('.right_content').slimscroll({
            height: $(window).height(),
            size: '5px',
            opacity: 0.2
        });
    }
    right_content();

    $('#messages').slimscroll({
        height: '222px',
        size: '5px',
        opacity: 0.2
    });

    $('#notifications').slimscroll({
        height: '235px',
        size: '5px',
        opacity: 0.2
    });
    function headerResize() {
        if($(window).width()>767){
            $(".fixed_header #top").addClass("fixed-top");
            var fixedHeaderTop=$("#top").height();
            $(".fixed_header .wrapper").css("margin-top",fixedHeaderTop);
        }else{
            $("#top").removeClass("fixed-top");
            $(".fixed_header .wrapper").css("margin-top",0);
        }
    }
    headerResize();
    $(window).on("resize",function () {
        headerResize();
    });

});

(function($, window, document, undefined) {


    var pluginName = "admireMenu",
        defaults = {
            toggle: true,
            doubleTapToGo: false
        };
    function Plugin(element, options) {
        this.element = element;
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }
    Plugin.prototype = {
        init: function() {
            var $this = $(this.element),
                $toggle = this.settings.toggle,
                obj = this
            if (this.isIE() <= 9) {
                $this.find("li.active").has("ul").children("ul").collapse("show");
                $this.find("li").not(".active").has("ul").children("ul").collapse("hide");
            } else {
                $this.find("li.active").has("ul").children("ul").addClass("collapse show");
                $this.find("li").not(".active").has("ul").children("ul").addClass("collapse");
            }
            //add the "doubleTapToGo" class to active items if needed
            if (obj.settings.doubleTapToGo) {
                $this.find("li.active").has("ul").children("a").addClass("doubleTapToGo");
            }
            $this.find("li").has("ul").children("a").on("click", function(e) {
                e.preventDefault();
                //Do we need to enable the double tap
                if (obj.settings.doubleTapToGo) {
                    //if we hit a second time on the link and the href is valid, navigate to that url
                    if (obj.doubleTapToGo($(this)) && $(this).attr("href") !== "#" && $(this).attr("href") !== "") {
                        e.stopPropagation();
                        document.location = $(this).attr("href");
                        return;
                    }
                }
                $(this).parent("li").toggleClass("active").children("ul").collapse({
                    toggle: true,
                    animate: false
                });
                $this.find("li.active").has("ul").children("ul").addClass("collapse show");

                if ($toggle) {
                    $(this).parent("li").siblings().removeClass("active").children("ul.show").collapse("hide");
                    $this.find("li.active").has("ul").children("ul").addClass("collapse show");
                    $this.find("li").not(".active").has("ul").children("ul").removeClass("show");
                }
            });
        },
        isIE: function() {
            var undef,
                v = 3,
                div = document.createElement("div"),
                all = div.getElementsByTagName("i");
            while (
                div.innerHTML = "<!--[if gt IE " + (++v) + "]><i></i><![endif]-->",
                    all[0]
                ) {
                return v > 4 ? v : undef;
            }
        },
        //Enable the link on the second click.
        doubleTapToGo: function(elem) {
            var $this = $(this.element);
            //if the class "doubleTapToGo" exists, remove it and return
            if (elem.hasClass("doubleTapToGo")) {
                elem.removeClass("doubleTapToGo");
                return true;
            }
            //does not exists, add a new class and return false
            if (elem.parent().children("ul").length) {
                //first remove all other class
                $this.find(".doubleTapToGo").removeClass("doubleTapToGo");
                //add the class on the current element
                elem.addClass("doubleTapToGo");
                return false;
            }
        }
    };
    $.fn[pluginName] = function(options) {
        this.each(function() {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });
        return this;
    };

})(jQuery, window, document);


//    Modernizr
(function(window) {
    var
        // Is Modernizr defined on the global scope
        Modernizr = typeof Modernizr !== "undefined" ? Modernizr : false,
        // whether or not is a touch device
        isTouchDevice = Modernizr ? Modernizr.touch : !!('ontouch' in window || 'onmsgesturechange' in window),
        // Are we expecting a touch or a click?
        buttonPressedEvent = (isTouchDevice) ? 'touch' : 'click',
        Admire = function() {
            this.init();
        };
    // Initialization method
    Admire.prototype.init = function() {
        this.isTouchDevice = isTouchDevice;
        this.buttonPressedEvent = buttonPressedEvent;
    };
    Admire.prototype.getViewportHeight = function() {
        var docElement = document.documentElement,
            client = docElement.clientHeight,
            inner = window.innerHeight;
        if (client < inner)
            return inner;
        else
            return client;
    };
    Admire.prototype.getViewportWidth = function() {
        var docElement = document.documentElement,
            client = docElement.clientWidth,
            inner = window.innerWidth;
        if (client < inner)
            return inner;
        else
            return client;
    };
    // Creates a Admire object.
    window.Admire = new Admire();
})(this);

// =====================resize js===================
//  jQuery resize event-
(function($, h, c) {
        var a = $([]), e = $.resize = $.extend($.resize, {}), i, k = "setTimeout", j = "resize", d = j + "-special-event", b = "delay", f = "throttleWindow";
        e[b] = 250;
        e[f] = true;
        $.event.special[j] = {setup: function() {
            if (!e[f] && this[k]) {
                return false;
            }
            var l = $(this);
            a = a.add(l);
            $.data(this, d, {w: l.width(), h: l.height()});
            if (a.length === 1) {
                g();
            }
        }, teardown: function() {
            if (!e[f] && this[k]) {
                return false
            }
            var l = $(this);
            a = a.not(l);
            l.removeData(d);
            if (!a.length) {
                clearTimeout(i);
            }
        }, add: function(l) {
            if (!e[f] && this[k]) {
                return false
            }
            var n;
            function m(s, o, p) {
                var q = $(this), r = $.data(this, d);
                r.w = o !== c ? o : q.width();
                r.h = p !== c ? p : q.height();
                n.apply(this, arguments)
            }
            if ($.isFunction(l)) {
                n = l;
                return m
            } else {
                n = l.handler;
                l.handler = m
            }
        }};
        function g() {
            i = h[k](function() {
                a.each(function() {
                    var n = $(this), m = n.width(), l = n.height(), o = $.data(this, d);
                    if (m !== o.w || l !== o.h) {
                        n.trigger(j, [o.w = m, o.h = l])
                    }
                });
                g()
            }, e[b])
        }}
)(jQuery, this);
// =====================resize js end===============
(function($) {
    var $navBar = $('nav.navbar'),
        $body = $('body'),
        $menu = $('#menu');
    function addPaddingTop(el, val) {
        el.css('padding-top', val);
    }
    function removePaddingTop(el) {
        el.css('padding-top', 'inherit');
    }
    function getHeight(el) {
        return el.outerHeight();
    }
    function init() {
        var isFixedNav = $navBar.hasClass('navbar-fixed-top');
        var bodyPadTop = isFixedNav ? $navBar.outerHeight(true) : 0;
        $body.css('padding-top', bodyPadTop);
        if ($body.hasClass('menu-affix')) {
            $menu
                .css({
                    height: function() {
                        return $(window).height();
                    },
                    top: bodyPadTop - 1,
                    bottom: 0
                });
        }
    }
    Admire.navBar = function() {
        var resizeTimer;
        init();
        $(window).resize(function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(init(), 250);
        });
    };
    return Admire;
})(jQuery);
(function($, Admire) {
    var $body = $('body'),
        $leftToggle = $('.toggle-left'),
        $rightToggle = $('.toggle-right');
    var leftopened = 0;
    Admire.admireAnimatePanel = function() {
        if ($('#left').length) {
            $leftToggle.on(Admire.buttonPressedEvent, function(e) {
                if ($(window).width() < 768) {
                    $body.toggleClass('sidebar-left-opened');
                    $body.removeClass("sidebar-right-opened");
                    $('.left_content').slimscroll({
                        height: 'auto',
                        size: '5px',
                        opacity: 0.2
                    });
                } else {
                    $body.toggleClass("sidebar-left-hidden");
                    $body.removeClass("sidebar-right-opened");
                }
            });
        } else {
            $leftToggle.addClass('hidden');
        }
        if ($('#right').length) {
            $rightToggle.on(Admire.buttonPressedEvent, function(e) {

                if ($body.hasClass("sidebar-right-opened")) {
                    $body.removeClass("sidebar-right-opened");
                    if (leftopened == 1) {
                        if ($(window).width() < 768) {
                            $body.addClass('sidebar-left-opened');
                        } else {
                            $body.removeClass('sidebar-left-hidden');
                        }
                    }
                } else {
                    $body.addClass("sidebar-right-opened");
                    if ($(window).width() < 768) {
                        if ($body.hasClass("sidebar-left-opened")) {
                            leftopened = 1;
                        } else {
                            leftopened = 0;
                        }
                        $body.removeClass("sidebar-left-opened");
                    } else {
                        if ($body.hasClass("sidebar-left-hidden")) {
                            leftopened = 0;
                        } else {
                            leftopened = 1;
                        }
                        $body.addClass("sidebar-left-hidden");
                    }
                }
            });
        } else {
            $rightToggle.addClass('hidden');
        }
    };
    return Admire;
})(jQuery, Admire || {});

function loadjscssfile(filename, filetype) {
    if (filetype == "css") {
        var fileref = document.createElement("link");
        fileref.rel = "stylesheet";
        fileref.type = "text/css";
        fileref.href = 'css/skins/' + filename;
        $("#skin_change").attr("href", "css/skins/"+filename+"")
    }
}

//    ==========================Different cards=====================
//        Card close
$('.card-header .fa-close').on('click', function () {
    $(this).closest('.card').parent().hide('slow');
});
//        Card toggle
$(".card-header .fa-chevron-up").on("click",function () {
    $(this).closest('.card').find('.card-body').slideToggle();
    $(this).toggleClass("fa-chevron-up").toggleClass("fa-chevron-down");
});

//        Card edit
(function($){
    $.fn.setCursorToTextEnd = function() {
        var $initialVal = this.val();
        this.val($initialVal);
    };
})(jQuery);
$(".card-header .fa-pencil").on('click',function(e){
    var edit=$(this).closest('.card').find('.card-header .card-title').text();
    var editable = $(this).closest('.card').find('.card-header');
    var editBox = "<div class='card_editbox'><input type='text' class='form-control text_for_save' maxlength='20' value='" + edit + "'></div>";
    if(!$(this).hasClass("fa-check")){
        editable.after(editBox);
        $(this).closest('.card').find("input").focus().setCursorToTextEnd();
    }else{
        $(this).closest(".card").find(".card_editbox").remove();
    }
    $(this).toggleClass('fa-check').toggleClass('fa-pencil');
});
$(".card").on("input",".text_for_save",function(){
    $(this).closest('.card').find('.card-header .card-title').text($(this).val());
});

//        Card colors
$(".card-header .fa-tint").on('click',function () {
    var colorpick=$(this).closest('.card').find('.card-header');
    var headerColor='<div class="header_colors">' +
        '<div class="inline_table"><div class="bg-primary" data-color="bg-primary"></div></div>' +
        '<div class="inline_table"><div class="bg-success" data-color="bg-success"></div></div>' +
        '<div class="inline_table"><div class="bg-warning" data-color="bg-warning"></div></div>' +
        '<div class="inline_table"><div class="bg-danger" data-color="bg-danger"></div></div>' +
        '<div class="inline_table"><div class="bg-info" data-color="bg-info"></div></div>' +
        '<div class="inline_table"><div class="bg-mint" data-color="bg-mint"></div></div>' +
        '<div class="inline_table"><div class="bg-white" data-color="bg-white"></div></div></div>'
    if($(this).hasClass("fa-tint")){
        colorpick.after(headerColor);
    }else{
        $(this).closest(".card").find('.header_colors').hide('slow');
    }
    $(".header_colors").each(function () {
        $(this).find('.inline_table div').on('click',function () {
            $(this).closest('.card').find('.card-header').removeClass().addClass("card-header "+$(this).attr("data-color"));
        });
    });
    $(this).toggleClass("fa-tint").toggleClass("fa-file-image-o");
});

//        Full screen
$(".card-header .fa-arrows-alt").on('click',function () {
    $(this).closest('.card').toggleClass('fullscreen');
});

//        Card Refreshing
$(".card_refresh").on("click",function(){
    var card = $(this).parents(".card");
    card_refresh(card);
    setTimeout(function(){
        card_refresh(card);
    },2000);
});

function card_refresh(card){
    if(!card.hasClass("card-refreshing")){
        card.append('<div class="card_refresh_section"><img src="img/loader.gif"/></div>');
        card.find(".card_refresh_section").width(card.width()).height(card.height());
        card.addClass("card-refreshing");

    }else{
        card.find(".card_refresh_section").remove();
        card.removeClass("card-refreshing");
    }
}



// Multiple Property Image upload by admin or user
var abc = 0; // Declaring and defining global increment variable.
$(document).ready(function() {
    $('#add_more').click(function() {
        $('.add_image').before($("<div/>", {
            id: 'filediv'
        }).fadeIn('slow').append($("<input/>", {
            name: 'file[]',
            type: 'file',
            id: 'file'
        }).trigger('click'), ));
    });

    // Following function will executes on change event of file input to select different file.
    $('body').on('change', '#file', function() {
        if (this.files && this.files[0]) {
            abc += 1; // Incrementing global variable by 1.
            var z = abc - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
            $(this).hide();
            $("#abcd" + abc).append($("<i></i>", {
                id: 'close',
                alt: 'delete',
                class: 'fa fa-close'
            }).click(function() {
                $(this).parent().parent().remove();
            }));
        }
    });
    // To Preview Image
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };
    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name) {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});

$('#product_name').keyup(function() {
    var str = $(this).val();
    var trims = $.trim(str);
    var rservice_url = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
    $('#ProductSlug').val(rservice_url.toLowerCase());
});

$('#CMSPageName').keyup(function() {
    var str = $(this).val();
    var trims = $.trim(str);
    var rservice_url = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
    $('#CMSPageSlug').val(rservice_url.toLowerCase());
});

$('#StoryTitle').keyup(function() {
    var str = $(this).val();
    var trims = $.trim(str);
    var story_url = trims.replace(/[^a-z0-9]/gi, '-').replace(/-+/g, '-').replace(/^-|-$/g, '')
    $('#StorySlug').val(story_url.toLowerCase());
});
