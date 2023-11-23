    <!-- aside -->
    <div id="aside" class="app-aside modal nav-dropdown">
        <!-- fluid app aside -->
        <div class="left navside dark dk" data-layout="column">
            <div class="navbar no-radius">
                <!-- brand -->
                <a class="navbar-brand">
                    <div ui-include="{{ asset('assets/images/logo.svg') }}"></div>
                    <img src="{{ asset('assets/images/logo.png') }}" alt="." class="hide">
                    <span class="hidden-folded inline">MyCapstone </span>
                </a>
                <!-- / brand -->
            </div>
            <div class="hide-scroll" data-flex>
                <nav class="scroll nav-light">

                    <ul class="nav" ui-nav>
                        <li class="nav-header hidden-folded">
                            <small class="text-muted">Main</small>
                        </li>

                        <li>
                            <a href="{{ route('userDashboard') }}">
                                <span class="nav-icon">
                                    <i class="material-icons">&#xe3fc;
                                    </i>
                                </span>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('userOrder') }}">
                                <span class="nav-icon">
                                    <i class="material-icons">add_shopping_cart
                                    </i>
                                </span>
                                <span class="nav-text">My Order</span>
                            </a>
                        </li>

                        {{-- <li>
                            <a>
                                <span class="nav-label">
                                    <b class="label rounded label-sm primary">5</b>
                                </span>
                                <span class="nav-icon">
                                    <i class="material-icons">&#xe5c3;
                                        <span ui-include="{{ asset('assets/images/i_1.svg') }}"></span>
                                    </i>
                                </span>
                                <span class="nav-text">Apps</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="inbox.html">
                                        <span class="nav-text">Inbox</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <span class="nav-text">Contacts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="calendar.html">
                                        <span class="nav-text">Calendar</span>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}

                        <li>
                            <a>
                                <span class="nav-caret">
                                    <i class="fa fa-caret-down"></i>
                                </span>
                                <span class="nav-icon">
                                    <i class="material-icons">web

                                    </i>
                                </span>
                                <span class="nav-text">Data Tamu</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="{{ route('userListTamu') }}">
                                        <span class="nav-text">List Tamu</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="asides.html">
                                        <span class="nav-text">Ucapan</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a>
                                <span class="nav-caret">
                                    <i class="fa fa-caret-down"></i>
                                </span>
                                <span class="nav-icon">
                                    <i class="material-icons">&#xe8f0;

                                    </i>
                                </span>
                                <span class="nav-text">Data Undangan</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="{{ route('userMempelai') }}">
                                        <span class="nav-text">Mempelai</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('userAcara') }}">
                                        <span class="nav-text">Acara</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="footers.html">
                                        <span class="nav-text">Galeri</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('userCerita') }}">
                                        <span class="nav-text">Cerita</span>
                                    </a>
                                </li>
                            </ul>
                        </li>



                    </ul>
                </nav>
            </div>
            <div class="b-t">
                <div class="nav-fold">
                    <a href="profile.html">
                        <span class="pull-left">
                            <img src="{{ asset('/assets/images/a0.jpg') }}" alt="..." class="w-40 img-circle">
                        </span>
                        <span class="clear hidden-folded p-x">
                            <span class="block _500">Jean Reyes</span>
                            <small class="block text-muted"><i
                                    class="fa fa-circle text-success m-r-sm"></i>online</small>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- / -->
