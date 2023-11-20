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
                    <a href="chart-apex.html" class="sidebar-menu-dropdown">
                        <i class='bx bxs-component' ></i>
                        <span>Components</span>
                        <div class="dropdown-icon"><i class='bx bx-chevron-down'></i></div>
                    </a>
                    <ul class="sidebar-menu sidebar-menu-dropdown-content">
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
                Clients
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
        <div class="main-content client">
            <div class="row">
                <div class="col-12">
                    <div class="box card-box">
                        <div class="icon-box bg-color-1">
                            <div class="icon bg-icon-1">
                                <i class="bx bxs-bell bx-tada"></i>
                            </div>
                            <div class="content">
                                <h5 class="title-box">Notification</h5>
                                <p class="color-1 mb-0 pt-4">5 Unread notification</p>
                            </div>
                        </div>
                        <div class="icon-box bg-color-2">
                            <div class="icon bg-icon-2">
                                <i class='bx bxs-message-rounded'></i>
                            </div>
                            <div class="content click-c">
                                <h5 class="title-box">Message</h5>
                                <p class="color-2 mb-0 pt-4">5 Unread notification</p>
                            </div>
                            <div class="notification-list card">
                                <div class="top box-header">
                                    <h5>Notification</h5>

                                </div>
                                <div class="pd-1r">
                                    <div class="divider"></div>
                                </div>

                                <div class="box-body">
                                    <ul class="list">
                                        <li class="d-flex no-seen">
                                            <div class="img-mess"><img class="mr-14" src="./images/avatar/avt-1.png" alt="avt"></div>
                                            <div class="info">
                                                <a href="#" class="font-w600 mb-0 color-primary">Elizabeth Holland</a>
                                                <p class="pb-0 mb-0 line-h14 mt-6">Proin ac quam et lectus vestibulum</p>
                                            </div>
                                        </li>

                                        <li class="d-flex">
                                            <div class="img-mess"><img class="mr-14" src="./images/avatar/avt-1.png" alt="avt"></div>
                                            <div class="info">
                                                <a href="#" class="font-w600 mb-0 color-primary">Elizabeth Holland</a>
                                                <p class="pb-0 mb-0 line-h14 mt-6">Proin ac quam et lectus vestibulum</p>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="btn-view">
                                        <a class="font-w600 h5" href="message.html">View All</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="icon-box bg-color-3">
                            <a class="create d-flex" href="calendar.html">
                                <div class="icon bg-icon-3">
                                    <i class="bx bx-calendar"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title-box">Calendar</h5>
                                    <p class="color-3 mb-0 pt-4">5 Unread notification</p>
                                </div>
                            </a>
                        </div>
                        <div class="icon-box bg-color-4">
                            <a class="create d-flex" href="#" data-toggle="modal" data-target="#add_project">
                                <div class="icon bg-white">
                                    <i class="bx bx-plus"></i>
                                </div>
                                <div class="content d-flex align-items-center">
                                    <h5 class="color-white">Create New Project</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-body d-flex justify-content-between pt-0 pb-0">
                            <div class="search-form d-flex">
                                <input type="text" placeholder="Client Name" class="form-control">
                                <select class="form-control" id="inputState">
                                    <option selected>Select Company Name</option>
                                    <option>Company 1 </option>
                                    <option>Company 2</option>
                                </select>
                                <button type="submit" class="search d-flex"><i class="fas fa-search"></i>Search</button>
                            </div>
                            <div class="list-action">
                                <a class="list" href="#" onclick="liststyle()"><i class='bx bx-menu' ></i></a>
                                <a href="#" class="list-board active" onclick="listboard()"><i class='bx bxs-dashboard' ></i></a>
                                <a href="#" class="add" data-toggle="modal" data-target="#add_client">Add Client<i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/1.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href="client-details.html"><h5 class="mt-17">Tom Schneider</h5></a>
                            
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/2.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href="client-details.html"><h5 class="mt-17">Emma Carrol</h5></a>                
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/3.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href="client-details.html"><h5 class="mt-17">Kyle Baker</h5></a>
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/4.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href="client-details.html">
                                <h5 class="mt-17">Kathryn Pearson</h5>
                            </a>
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/5.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href="client-details.html"><h5 class="mt-17">Danielle Meyer</h5></a>
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/6.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href="client-details.html"><h5 class="mt-17">Roy Carpenter</h5></a>
                            
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/7.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href="client-details.html"><h5 class="mt-17">Andreea Wade</h5></a>
                            
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/8.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href="client-details.html"><h5 class="mt-17">Tom Schneider</h5></a>
                            
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/9.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href="client-details.html"><h5 class="mt-17">Brandon Collins</h5></a>
                            
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/10.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href="client-details.html"><h5 class="mt-17">Kathy Andrews</h5></a>
                            
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/11.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href=""><h5 class="mt-17">Bobby Mendez</h5></a>
                            
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-3 col-md-6 col-sm-12 mb-25">
                    <div class="box client">

                        <div class="dropdown">
                            <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-dots-horizontal-rounded'></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_client"><i class="bx bx-trash"></i> Delete</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_client"><i class="bx bx-edit mr-5"></i>Edit</a>
                            </div>
                        </div>
                        <div class="box-body pt-5 pb-0">
                            <div class="img-box">
                                <img src="./images/client/12.png" alt="">
                                <div class="pulse-css"></div>
                            </div>
                            <a href=""><h5 class="mt-17">Doris Sanders</h5></a>
                            
                            <p class="fs-14 font-w400 font-main">Founder at <span class="text-clo-primary font-w500 pl-4">Company Name</span></p>
                            <ul class="info">
                                <li class="fs-14"><i class='bx bxs-phone'></i>(589)505-4521</li>
                                <li class="fs-14"><i class='bx bxs-envelope'></i>tom.name@mail.com</li>
                            </ul>
                            <div class="group-btn d-flex justify-content-between">
                                <a class="bg-btn-pri color-white" href="message.html">Message</a>
                                <a class="bg-btn-sec color-main" href="user-profile.html">View Profile</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div id="add_project" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Project Name</label>
                                            <input class="form-control" value="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Client</label>
                                            <select class="select">
                                                <option>Client 1</option>
                                                <option>Client 2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control " type="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <div class="cal-icon">
                                                <input class="form-control " type="date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Rate</label>
                                            <input placeholder="$50" class="form-control" value="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <select class="select">
                                                <option>Hourly</option>
                                                <option selected>Fixed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <select class="select">
                                                <option selected>High</option>
                                                <option>Medium</option>
                                                <option>Low</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Upload Files</label>
                                    <input class="form-control" type="file">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="add_client" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Client</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Upload Avata</label>
                                    <input class="form-control" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Client Company</label>
                                    <select class="form-control select">
                                    <option>Company Name</option>
                                    <option>Company Name</option>
                                    <option>Company Name</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client Phone</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Client Email</label>
                                    <input type="text" class="form-control" value="">
                                </div>

                                <div class="submit-section text-center">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal custom-modal fade" id="delete_client" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Client</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6 mb-0">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6 mb-0">
                                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="edit_client" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Client</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" value="Tom Schneider">
                                </div>
                                <div class="form-group">
                                    <label>Client Company</label>
                                    <select class="form-control select">
                                    <option>Company Name</option>
                                    <option>Company Name</option>
                                    <option>Company Name</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client Phone</label>
                                    <input type="text" class="form-control" value="(589)505-4521">
                                </div>
                                <div class="form-group">
                                    <label>Client Email</label>
                                    <input type="text" class="form-control" value="tom.name@mail.com">
                                </div>
                                <div class="form-group">
                                    <label>Upload Files</label>
                                    <input class="form-control" type="file">
                                </div>
                                <div class="submit-section text-center">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->

    <!-- Plugin -->

    <script src="./libs/jquery/jquery.min.js"></script>
    <script src="./libs/moment/min/moment.min.js"></script>
    <script src="./libs/apexcharts/apexcharts.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./libs/peity/jquery.peity.min.js"></script>
    <script src="./libs/chart.js/Chart.bundle.min.js"></script>
    <script src="./libs/owl.carousel/owl.carousel.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./libs/simplebar/simplebar.min.js"></script>

    <!-- APP JS -->
    <script src="./js/main.js"></script>
    <script src="./js/shortcode.js"></script>
    <script src="./js/pages/clients.js"></script>
</body>

</html>