<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/favicon.jpg" type="image/x-icon">
    <title> <?php echo e(config('app.name')); ?> </title>
    <meta name="description" content="">
    <link rel="icon" href="" sizes="32x32">
    <link rel="icon" href="" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="">
    <meta name="msapplication-TileImage" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/dist/css/bootstrap.css')); ?>" type="text/css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/dist/css/main.css')); ?>" type="text/css">
    <!-- All Page Responsive CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/dist/css/responsiveall.css')); ?>" type="text/css">
    <!-- Font CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('front/font/font.css')); ?>" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Login/Register Page CSS -->
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(asset('/front/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/front/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/front/vendor/animate/animate.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/front/vendor/css-hamburgers/hamburgers.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/front/vendor/animsition/css/animsition.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/front/vendor/select2/select2.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/front/vendor/daterangepicker/daterangepicker.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/front/css/util.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/front/css/main.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

</head>

<body>


    <?php echo $__env->make('layouts.front.header2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->yieldContent('content'); ?>


    <?php echo $__env->make('layouts.front.footer2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- jQuery first then Bootstrap JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src="<?php echo e(asset('front/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/dist/js/custom.js')); ?>"></script>

    <!-- jQuery for Login/Register -->
    <script src="<?php echo e(asset('front/vendor/animsition/js/animsition.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/vendor/bootstrap/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('front/vendor/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/vendor/daterangepicker/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/vendor/daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('front/vendor/countdowntime/countdowntime.js')); ?>"></script>
    <script src="<?php echo e(asset('front/js/main.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script>
    // Iterate over each select element
    $('').each(function() {

        // Cache the number of options
        var $this = $(this),
            numberOfOptions = $(this).children('option').length;

        // Hides the select element
        $this.addClass('s-hidden');

        // Wrap the select element in a div
        $this.wrap('<div class="select"></div>');

        // Insert a styled div to sit over the top of the hidden select element
        $this.after('<div class="styledSelect"></div>');

        // Cache the styled div
        var $styledSelect = $this.next('div.styledSelect');

        // Show the first select option in the styled div
        $styledSelect.text($this.children('option').eq(0).text());

        // Insert an unordered list after the styled div and also cache the list
        var $list = $('<ul />', {
            'class': 'options'
        }).insertAfter($styledSelect);

        // Insert a list item into the unordered list for each select option
        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        // Cache the list items
        var $listItems = $list.children('li');

        // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.styledSelect.active').each(function() {
                $(this).removeClass('active').next('ul.options').hide();
            });
            $(this).toggleClass('active').next('ul.options').toggle();
        });

        // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
        // Updates the select element to have the value of the equivalent option
        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            /* alert($this.val()); Uncomment this for demonstration! */
        });

        // Hides the unordered list when clicking outside of it
        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });

    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
    </script>

    <!-- Notification -->
    <script>
    <?php if(Session::has('message')): ?>
    var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
    switch (type) {
        case 'info':
            toastr.info("<?php echo e(Session::get('message')); ?>");
            break;

        case 'warning':
            toastr.warning("<?php echo e(Session::get('message')); ?>");
            break;

        case 'success':
            toastr.success("<?php echo e(Session::get('message')); ?>");
            break;

        case 'error':
            toastr.error("<?php echo e(Session::get('message')); ?>");
            break;
    }
    <?php endif; ?>
    </script>

    <script>
    $('#country').change(function() {
        var countryID = $(this).val();
        var _token = $('input[name="_token"]').val();
        if (countryID) {
            $.ajax({
                type: "get",
                url: "/get-state?country_name=" + countryID,
                data: {
                    _token: _token
                },
                success: function(res) {
                    if (res) {
                        $("#state").empty();
                        $("#state").append('<option value="">Select State</option>');
                        $.each(res, function(key, value) {
                            $("#state").append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $("#state").empty();
                    }
                }
            });
        } else {
            $("#state").empty();
            $("#city").empty();
        }
    });
    // Get City List According to state
    $('#state').on('change', function() {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: "GET",
                url: "/get-city?state_name=" + stateID,
                success: function(res) {
                    if (res) {
                        $("#city").empty();
                        $("#city").append('<option value="">Select City</option>');
                        $.each(res, function(key, value) {
                            $("#city").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {
                        $("#city").empty();
                    }
                }
            });
        } else {
            $("#city").empty();
        }
    });
    </script>

    <script>
    $('#country2').change(function() {
        var countryID = $(this).val();
        var _token = $('input[name="_token"]').val();
        if (countryID) {
            $.ajax({
                type: "get",
                url: "/get-state?country_name=" + countryID,
                data: {
                    _token: _token
                },
                success: function(res) {
                    if (res) {
                        $("#state2").empty();
                        $("#state2").append('<option value="">Select State</option>');
                        $.each(res, function(key, value) {
                            $("#state2").append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $("#state2").empty();
                    }
                }
            });
        } else {
            $("#state2").empty();
            $("#city2").empty();
        }
    });
    // Get City List According to state
    $('#state2').on('change', function() {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: "GET",
                url: "/get-city?state_name=" + stateID,
                success: function(res) {
                    if (res) {
                        $("#city2").empty();
                        $("#city2").append('<option value="">Select City</option>');
                        $.each(res, function(key, value) {
                            $("#city2").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {
                        $("#city2").empty();
                    }
                }
            });
        } else {
            $("#city2").empty();
        }
    });
    </script>

    <script>
    $('#country3').change(function() {
        var countryID = $(this).val();
        var _token = $('input[name="_token"]').val();
        if (countryID) {
            $.ajax({
                type: "get",
                url: "/get-state?country_name=" + countryID,
                data: {
                    _token: _token
                },
                success: function(res) {
                    if (res) {
                        $("#state3").empty();
                        $("#state3").append('<option value="">Select State</option>');
                        $.each(res, function(key, value) {
                            $("#state3").append('<option value="' + key + '">' + value +
                                '</option>');
                        });
                    } else {
                        $("#state3").empty();
                    }
                }
            });
        } else {
            $("#state3").empty();
            $("#city3").empty();
        }
    });
    // Get City List According to state
    $('#state3').on('change', function() {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: "GET",
                url: "/get-city?state_name=" + stateID,
                success: function(res) {
                    if (res) {
                        $("#city3").empty();
                        $("#city3").append('<option value="">Select City</option>');
                        $.each(res, function(key, value) {
                            $("#city3").append('<option value="' + key + '">' + value +
                                '</option>');
                        });

                    } else {
                        $("#city3").empty();
                    }
                }
            });
        } else {
            $("#city3").empty();
        }
    });
    </script>
</body>

</html><?php /**PATH D:\GITHUB\LIT\resources\views/layouts/front/design.blade.php ENDPATH**/ ?>