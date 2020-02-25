<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | {{ config('app.name') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('/images/logo/'.config('app.favicon')) }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--global styles-->
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}" />
    <!-- end of global styles-->
    <link rel="stylesheet" href="{{ asset('admin/vendors/c3/css/c3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/toastr/css/toastr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/izitoast/css/iziToast.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/switchery/css/switchery.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pages/new_dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pages/form_layouts.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/inputlimiter/css/jquery.inputlimiter.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/chosen/css/chosen.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('admin/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/jquery-tagsinput/css/jquery.tagsinput.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/daterangepicker/css/daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/datepicker/css/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-switch/css/bootstrap-switch.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/multiselect/css/multi-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pages/form_elements.css') }}" />
    <!-- /.End of Global Styles -->
    <!--Plugin styles-->
    <link rel="stylesheet"
        href="{{ asset('admin/vendors/jquery-validation-engine/css/validationEngine.jquery.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/datepicker/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/datetimepicker/css/DateTimePicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" />
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link rel="stylesheet" href="{{ asset('admin/css/pages/form_validations.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/multiselect/css/multi-select.css') }}" />
    <!-- end of page level styles -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/checkbox_css/css/checkbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pages/radio_checkbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2/css/select2.min.css') }}" />

    <!-- File input css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/fileinput/css/fileinput.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/blueimp-gallery-with-desc/css/blueimp-gallery.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/blueimp_file_upload/css/jquery.fileupload.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/blueimp_file_upload/css/jquery.fileupload-ui.css') }}" />

    <!-- Date & Time picker -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/daterangepicker/css/daterangepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/datepicker/css/bootstrap-datepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/vendors/inputlimiter/css/jquery.inputlimiter.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/css/pages/profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/pages/gallery.css') }}" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <!-- /.Datatables -->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">


</head>

<body class="fixed_header">

    <!-- Pre-Loader Starts here -->
    <div class="preloader" style=" position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 100000;
        backface-visibility: hidden;
        background: #ffffff;">
        <div class="preloader_img" style="width: 200px;
            height: 200px;
            position: absolute;
            left: 48%;
            top: 48%;
            background-position: center;
            z-index: 999999">
            <img src="{{ asset('admin/img/loader.gif') }}" style=" width: 40px;" alt="loading...">
        </div>
    </div>
    <!-- /.Pre-Loader End here -->

    <!-- Body wrap start here -->
    <div id="wrap">

        @include('layouts.panel.header')

        <!-- Wrapper Start here -->
        <div class="wrapper">
            @include('layouts.panel.sidebar')

            <!-- Content Section start here -->
            <div id="content" class="bg-container">
                @yield('content')
            </div>
            <!-- /.COntent section end here -->
        </div>
        <!-- /.Wrapper ends here -->

        @include('layouts.panel.footer')

    </div>
    <!-- /.Body wrap ends here -->

    <!-- Scripts -->
    <!-- global scripts-->
    <script src="{{ asset('admin/js/components.js') }} "></script>
    <script src="{{ asset('admin/js/custom.js') }} "></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/chosen/js/chosen.jquery.min.js') }}"></script>
    <!-- global scripts end-->
    <script src="{{ asset('admin/vendors/raphael/js/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/d3/js/d3.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/c3/js/c3.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/switchery/js/switchery.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/flotchart/js/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/vendors/flotchart/js/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/vendors/flotchart/js/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('admin/vendors/flotchart/js/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('admin/vendors/flotspline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/flotchart/js/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('admin/vendors/flotchart/js/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin/vendors/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/jquery_newsTicker/js/newsTicker.js') }}"></script>
    <script src="{{ asset('admin/vendors/countUp.js/js/countUp.min.js') }}"></script>
    <!--end of plugin scripts-->
    <script src="{{ asset('admin/js/pages/new_dashboard.js') }}"></script>
    <script src="{{ asset('admin/vendors/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/izi_toastr.js') }}"></script>

    <!--Plugin scripts-->
    <script src="{{ asset('admin/vendors/jquery-validation-engine/js/jquery.validationEngine.js') }}"></script>
    <script src="{{ asset('admin/vendors/jquery-validation-engine/js/jquery.validationEngine-en.js') }}"></script>
    <script src="{{ asset('admin/vendors/jquery-validation/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('admin/vendors/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datetimepicker/js/DateTimePicker.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/moment/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('admin/js/pages/radio_checkbox.js') }}"></script>
    <!--End of plugin scripts-->

    <script src="{{ asset('admin/vendors/fullcalendar/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/mini_calendar.js') }}"></script>

    <!--Page level scripts-->
    <script src="{{ asset('admin/js/form.js') }}"></script>
    <script src="{{ asset('admin/js/pages/form_elements.js') }}"></script>
    <script src="{{ asset('admin/js/pages/form_validation.js') }}"></script>
    <!-- end page level scripts -->
    <script src="{{ asset('admin/vendors/select2/js/select2.js') }}"></script>

    <script src="{{ asset('admin/vendors/fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/fileinput/js/theme.js') }}"></script>

    <!-- Date & Time picker -->
    <script src="{{ asset('admin/vendors/jquery.uniform/js/jquery.uniform.js') }}"></script>
    <script src="{{ asset('admin/vendors/inputlimiter/js/jquery.inputlimiter.js') }}"></script>
    <script src="{{ asset('admin/js/pluginjs/jquery.validVal.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/datetime_piker.js') }}"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js">
    </script>
    <!-- /.Datatables -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script src="{{ asset('admin/js/pages/file_upload.js') }}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <script src="{{ asset('js/repeater.js') }}"></script>

    <script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
    </script>

    <script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fade">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error text-danger"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                    <div class="progress-bar bg-success" style="width:0%;"></div>
                </div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start m-t-10" disabled>
                    <i class="fa fa-arrow-up"></i>
                    <span>Start</span>
                </button>
                {% } %} {% if (!i) { %}
                <button class="btn btn-warning cancel m-t-10">
                    <i class="fa fa-close"></i>
                    <span>Cancel</span>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fade">
            <td>
                <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
            </td>
            <td>
                <p class="name">
                    {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
                    <span>{%=file.name%}</span> {% } %}
                </p>
                {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete m-t-10" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                    <i class="fa fa-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
                <button class="btn btn-warning cancel m-t-10">
                    <i class="fa fa-close"></i>
                    <span>Cancel</span>
                </button>
                {% } %}
            </td>
        </tr>
        {% } %}
    </script>

    <script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
    </script>

    <script>
    // Creating Property URL
    // $('#product_name').change(function(e) {
    //     $.get('{{ url("/admin/product/create") }}', {
    //             'product_name': $(this).val()
    //         },
    //         function(data) {
    //             $('#slug').val(data.slug);
    //         }
    //     );
    // });
    </script>

    <script>
    $('#UserRoleType').change(function() {
        if ($(this).val() == 'Supplier' || $(this).val() == 'Seller') {
            $('#BusinessName').removeClass('d-none').addClass('d-block-new');
            $('#SupplierCategory').removeClass('d-none').addClass('d-block-new');
        } else {
            $('#BusinessName').removeClass('d-block-new').addClass('d-none');
            $('#SupplierCategory').removeClass('d-block-new').addClass('d-none');
        }
    });

    $(function() {
        if ($('#UserRoleType').val() == "Supplier" || $('#UserRoleType').val() == "Seller") {
            $('#EditBusinessName').removeClass('d-none').addClass('d-block-new');
            $('#EditSupplierCategory').removeClass('d-none').addClass('d-block-new');
        } else {
            $('#EditBusinessName').removeClass('d-block-new').addClass('d-none');
            $('#EditSupplierCategory').removeClass('d-block-new').addClass('d-none');
        }
    });
    </script>

    <script>
    // Check Username
    $('#UserName').blur(function() {
        var error_username = '';
        var username = $('#UserName').val();
        var _token = $('input[name="_token"]').val();
        var filter = /^([a-zA-Z0-9_]{3,20})+$/;
        if (!filter.test(username)) {
            $('#error_username').html(
                '<label class="text-danger"><i class="fa fa-exclamation-circle"></i> Invalid Username</label>'
            );
            $('#UserName').addClass('has-error');
        } else {
            $.ajax({
                url: "{{ url('/checkusername') }}",
                method: "POST",
                data: {
                    username: username,
                    _token: _token
                },
                success: function(result) {
                    if (result == 'unique') {
                        $('#error_username').html(
                            '<label class="text-success"><i class="fa fa-check"></i> Username Available</label>'
                        );
                        $('#UserName').removeClass('has-error');
                    } else {
                        $('#error_username').html(
                            '<label class="text-danger"><i class="fa fa-exclamation-circle"></i> Username already exist.</label>'
                        );
                        $('#UserName').addClass('has-error');
                    }
                }
            })
        }
    });

    // Check User Email
    $('#email').blur(function() {
        var error_email = '';
        var email = $('#email').val();
        var _token = $('input[name="_token"]').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email)) {
            $('#error_email').html(
                '<label class="text-danger"><i class="fa fa-exclamation-circle"></i> Invalid Email</label>');
            $('#email').addClass('has-error');
        } else {
            $.ajax({
                url: "{{ url('/checkemail') }}",
                method: "POST",
                data: {
                    email: email,
                    _token: _token
                },
                success: function(result) {
                    if (result == 'unique') {
                        $('#error_email').html(
                            '<label class="text-success"><i class="fa fa-check"></i> Email Available</label>'
                        );
                        $('#email').removeClass('has-error');
                    } else {
                        $('#error_email').html(
                            '<label class="text-danger"><i class="fa fa-exclamation-circle"></i> Email already exist.</label>'
                        );
                        $('#email').addClass('has-error');
                    }
                }
            })
        }
    });
    </script>

    <script>
    // $(function() {
    //     if ($('#UserRoleType').val() == "Supplier") {
    //         $('#BusinessName').removeClass('d-none').addClass('d-block-new');
    //         $('#SupplierCategory').removeClass('d-none').addClass('d-block-new');
    //     } else {
    //         $('#BusinessName').removeClass('d-block-new').addClass('d-none');
    //         $('#SupplierCategory').removeClass('d-block-new').addClass('d-none');
    //     }
    // });
    </script>

    <script>
    // TinyMCE Text Editor for Description
    var editor_config = {
        height: 250,
        // width: 750,
        path_absolute: "/",
        selector: "textarea.my-editor",
        branding: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                'body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
    </script>

    <script>
    $('#country').change(function() {
        var countryID = $(this).val();
        var _token = $('input[name="_token"]').val();
        if (countryID) {
            $.ajax({
                type: "get",
                url: "/get-state-list?country_name=" + countryID,
                data: {
                    _token: _token
                },
                success: function(res) {
                    if (res) {
                        $("#state").empty();
                        $("#state").append('<option>Select State</option>');
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
                url: "/get-city-list?state_name=" + stateID,
                success: function(res) {
                    if (res) {
                        $("#city").empty();
                        $("#city").append('<option>Select City</option>');
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
    $(document).ready(function() {
        $('#repeater').createRepeater();
    });
    </script>

</body>

</html>