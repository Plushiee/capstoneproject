<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- Plugin -->
    <link rel="stylesheet" href="{{asset('user/libs/owl.carousel/assets/owl.carousel.min.css')}}">

    <!-- APP CSS -->
    <link rel="stylesheet" href=" {{asset('user/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href=" {{asset('user/css/grid.css')}} ">
    <link rel="stylesheet" href=" {{asset('user/css/style.css')}} ">
    <link rel="stylesheet" href=" {{asset('user/css/responsive.css')}} ">

    <!-- Per Page CSS -->
    @yield('css')

</head>

<body class="sidebar-expand">

    <!-- SIDEBAR -->

    @include('user.layouts.sidebar')

    <!-- END SIDEBAR -->

    <!-- Main Header -->

    @include('user.layouts.navbar')

    <!-- End Main Header -->

    <!-- MAIN CONTENT -->

    @yield('contents')

    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->
    <!-- APEX CHART -->

    <script src="{{ asset('user/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('user/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('user/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/libs/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('user/libs/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('user/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/libs/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('user/libs/simplebar/simplebar.min.js') }}"></script>

    <!-- APP JS -->
    <script src="{{ asset('user/js/main.js') }}"></script>
    <script src="{{ asset('user/js/dashboard.js') }}"></script>
    <script src="{{ asset('user/js/shortcode.js') }}"></script>
    <script src="{{ asset('user/js/pages/dashboard.js') }}"></script>

    <!-- Per Page JS -->
    @yield('javascripts')

</body>

</html>
