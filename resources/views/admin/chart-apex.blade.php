<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Protend - Project Management Admin Dashboard HTML Template
    </title>
    <link rel="shortcut icon" href="./images/favicon.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- APP CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>

<body class="sidebar-expand">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">
                        <a href="index.html">
                <img src="./images/logo.png" alt="Protend logo">
            </a>
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-left-arrow-alt'></i>
            </div>
        </div>
        <!-- SIDEBAR MENU -->
        <div class="simlebar-sc" data-simplebar>
            <ul class="sidebar-menu tf">
                <li class="sidebar-submenu">
                    <a href="index.html" class="sidebar-menu-dropdown">
                        <i class='bx bxs-home'></i>
                        <span>Dashboard</span>
                        <div class="dropdown-icon">
                            <i class='bx bx-chevron-down'></i>
                        </div>
                    </a>
                    <ul class="sidebar-menu sidebar-menu-dropdown-content">
                        <li>
                            <a href="index.html">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="user-profile.html">
                                User Profile
                            </a>
                        </li>
<li>
                            <a href="user-login.html">
                                User Login
                            </a>
                        </li>
                        <li>
                            <a href="new-account.html">
                               New Account
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-submenu">
                    <a href="project.html" class="sidebar-menu-dropdown">
                        <i class='bx bxs-bolt'></i>
                        <span>Project</span>
                        <div class="dropdown-icon"><i class='bx bx-chevron-down'></i></div>
                    </a>
                    <ul class="sidebar-menu sidebar-menu-dropdown-content">
                        <li>
                            <a href="project.html">
                               Project
                            </a>
                        </li>
                        <li>
                            <a href="project-details.html">
                                Project Details
                            </a>
                        </li>
                        <li>
                            <a href="new-project.html">
                                New Project
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-submenu">
                    <a href="clients.html" class="sidebar-menu-dropdown">
                        <i class='bx bxs-user'></i>
                        <span>Client</span>
                        <div class="dropdown-icon"><i class='bx bx-chevron-down'></i></div>
                    </a>
                    <ul class="sidebar-menu sidebar-menu-dropdown-content">
                                                <li>
                            <a href="clients.html">
                               Manager Client
                            </a>
                        </li>
                        <li>
                            <a href="client-details.html">
                                Client Details
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="board.html">
                        <i class='bx bxs-dashboard'></i>
                        <span>Board</span>
                    </a>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class='bx bx-calendar'></i>
                        <span>Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="message.html">
                        <i class='bx bxs-message-rounded-detail' ></i>
                        <span>Message</span>
                    </a>
                </li>
                <li class="sidebar-submenu">
                    <a href="#" class="sidebar-menu-dropdown current-menu-item">
                        <i class='bx bxs-component' ></i>
                        <span>Components</span>
                        <div class="dropdown-icon"><i class='bx bx-chevron-down'></i></div>
                    </a>
                    <ul class="sidebar-menu sidebar-menu-dropdown-content active">
                        <li>
                            <a href="chart-apex.html">
                                Apex Charts
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a class="darkmode-toggle" id="darkmode-toggle" onclick="switchTheme()">
                        <div>
                            <i class='bx bx-cog mr-10'></i>
                            <span>darkmode</span>
                        </div>

                        <span class="darkmode-switch"></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->

        <!-- Main Header -->
    <div class="main-header">
        <div class="d-flex">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu'></i>
            </div>
            <div class="main-title">
                Apex Charts
            </div>
        </div>

        <div class="d-flex align-items-center">

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-search-alt' ></i>
                    </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary h-100" type="submit"><i class='bx bx-search-alt' ></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="btn dropdown-toggle" id="header-lang-img">
                            EN 
                            <i class='bx bx-caret-down'></i>
                        </span>
                    </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                        <img src="./images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">
                        <img src="./images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">
                        <img src="./images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">
                        <img src="./images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">
                        <img src="./images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                    </a>
                </div>
            </div>
            <!-- <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="bx bx-fullscreen"></i>
                    </button>
            </div> -->
            <div class="dropdown d-inline-block mt-12">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="./images/profile/profile.png"
                            alt="Header Avatar">
                        <span class="pulse-css"></span>
                        <span class="info d-xl-inline-block  color-span">
                            <span class="d-block fs-20 font-w600">Randy Riley</span>
                            <span class="d-block mt-7" >randy.riley@gmail.com</span>
                        </span>
                            
                        <i class='bx bx-chevron-down'></i>
                    </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span>Profile</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span>My Wallet</span></a>
                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span>Settings</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span>Lock screen</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="user-login.html"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span>Logout</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Header -->

    <!-- MAIN CONTENT -->
    <div class="main">

        <div class="main-content">
            <div class="row">
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="box left-dot h-100">
                        <div class="box-title">Line Charts</div>
                        <div class="box-body">
                            <div id="line-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="box left-dot h-100">
                        <div class="box-title">Area Charts</div>
                        <div class="box-body">
                            <div id="area-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="box left-dot h-100">
                        <div class="box-title">Column Charts</div>
                        <div class="box-body">
                            <div id="column-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="box left-dot h-100">
                        <div class="box-title">Pie Charts</div>
                        <div class="box-body">
                            <div id="pie-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="box left-dot h-100">
                        <div class="box-title">PolarArea Charts</div>
                        <div class="box-body">
                            <div id="polar-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="box left-dot h-100">
                        <div class="box-title">Radar Charts</div>
                        <div class="box-body">
                            <div id="radar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->
    <!-- APEX CHART -->

    <script src="./libs/jquery/jquery.min.js"></script>
    <script src="./libs/moment/min/moment.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./libs/peity/jquery.peity.min.js"></script>
    <script src="./libs/chart.js/Chart.bundle.min.js"></script>
    <script src="./libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./libs/apexcharts/apexcharts.js"></script>
    <script src="./libs/simplebar/simplebar.min.js"></script>


    <!-- APP JS -->
    <script src="./js/main.js"></script>
    <script src="./js/shortcode.js"></script>
    <script src="./js/pages/apexchart.js"></script>
</body>

</html>