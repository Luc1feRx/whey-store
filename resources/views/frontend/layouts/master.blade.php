<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Electro &#8211; Electronics Ecommerce Theme</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/animate.min.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/font-electro.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/owl-carousel.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/colors/yellow.css') }}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/toastr.min.css') }}" media="all" />
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

        @yield('addCss')
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>

        <link rel="shortcut icon" href="assets/images/fav-icon.png">
    </head>

    <body class="home-v2">
        <div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            @include('frontend.layouts.header')
            @yield('content')
            @include('frontend.layouts.footer')

        </div><!-- #page -->

        <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/tether.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.easing.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/electro.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/assets/js/toastr.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        @include('frontend.partials.toastr')

        @yield('addJs')
        @if (session('error'))
            @include('frontend.partials.toastr')
        @endif
        <script>
            // Add a click event listener to all elements with the custom-dropdown-link class
            var dropdownLinks = document.querySelectorAll('.custom-dropdown-link');
        
            dropdownLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    // Prevent the default behavior of the link
                    event.preventDefault();
        
                    // Get the link's href attribute and navigate to the specified page
                    var linkHref = this.getAttribute('href');
                    if (linkHref) {
                        window.location.href = linkHref;
                    }
                });
            });


            function copyToClipboard(sku) {
                var text = jQuery('.'+sku).val();
                console.log(text);
                if (window.clipboardData && window.clipboardData.setData) {
                    // IE specific code path to prevent textarea being shown while dialog is visible.
                    return clipboardData.setData("Text", text); 

                } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
                    var textarea = document.createElement("textarea");
                    textarea.textContent = text;
                    textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in MS Edge.
                    document.body.appendChild(textarea);
                    textarea.select();
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "3000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                    try {
                        Command: toastr["success"]("Thành công")
                        return document.execCommand("copy");  // Security exception may be thrown by some browsers.
                    } catch (ex) {
                        Command: toastr["error"]("Thất bại")
                        console.warn("Copy to clipboard failed.", ex);
                        return false;
                    } finally {
                        document.body.removeChild(textarea);
                    }
                }
            }
        </script>
    </body>
</html>
