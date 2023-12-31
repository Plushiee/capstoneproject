<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin | @yield('title')</title>
    <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo-only.png') }}">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="{{ asset('assets/images/logo-only.png') }}">

    <!-- style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/animate.css/animate.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/glyphicons/glyphicons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/material-design-icons/material-design-icons.css') }}"
        type="text/css" />

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" type="text/css" />
    <!-- build:css ../assets/styles/app.min.css -->
    <link rel="stylesheet" href="{{ asset('assets/styles/app.css') }}" type="text/css" />
    <!-- endbuild -->
    <link rel="stylesheet" href="{{ asset('assets/styles/font.css') }}" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('addCSS')
</head>

<body>

    <div class="app" id="app">

        @include('admins.layouts.sidebar')

        <div id="content" class="app-content box-shadow-z0" role="main">

            @include('admins.layouts.navbar')

            @include('admins.layouts.footer')

            <div ui-view class="app-body" id="view">



                @yield('contents')



            </div>

        </div>

    </div>




    <!-- build:js ('assets/js/app.html.js')  -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    {{-- <script src="{{ asset('assets/libs/jquery/jquery/dist/jquery.js') }}"></script> --}}

    <!-- Bootstrap -->
    <script src="{{ asset('assets/libs/jquery/tether/dist/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
    <!-- core -->
    <script src="{{ asset('assets/libs/jquery/underscore/underscore-min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/PACE/pace.min.js') }}"></script>

    <script src="{{ asset('assets/js/config.lazyload.js') }}"></script>

    <script src="{{ asset('assets/js/palette.js') }}"></script>
    <script src="{{ asset('assets/js/ui-load.js') }}"></script>
    <script src="{{ asset('assets/js/ui-jp.js') }}"></script>
    <script src="{{ asset('assets/js/ui-include.js') }}"></script>
    <script src="{{ asset('assets/js/ui-device.js') }}"></script>
    <script src="{{ asset('assets/js/ui-form.js') }}"></script>
    <script src="{{ asset('assets/js/ui-nav.js') }}"></script>
    <script src="{{ asset('assets/js/ui-screenfull.js') }}"></script>
    <script src="{{ asset('assets/js/ui-scroll-to.js') }}"></script>
    <script src="{{ asset('assets/js/ui-toggle-class.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.dropdown-toggles').on('click', function() {
                var caretIcon = $(this).find('.caret-icon');
                caretIcon.toggleClass('bi-caret-down-fill bi-caret-up-fill');
            });
        });
    </script>

    <!-- ajax -->
    {{-- <script src="{{ asset('assets/libs/jquery/jquery-pjax/jquery.pjax.js') }}"></script> --}}
    <script src="{{ asset('assets/js/ajax.js') }}"></script>

    @yield('addJS')

</body>

</html>
