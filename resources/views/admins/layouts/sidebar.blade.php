    <!-- aside -->
    <div id="aside" class="app-aside modal nav-dropdown">
        <!-- fluid app aside -->
        <div class="left navside dark dk" data-layout="column">
            <div class="navbar no-radius">
                <!-- brand -->
                <a class="navbar-brand">
                    <div ui-include="{{ asset('assets/images/logo.svg') }}"></div>
                    {{-- <img src="{{ asset('assets/images/logo-only.png') }}" alt="."> --}}
                    <span class="hidden-folded inline"><img src="{{ asset('assets/images/logo-cp.png') }}" alt=".">
                    </span>
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
                            <a href="{{ route('adminDashboard') }}">
                                <span class="nav-icon">
                                    <i class="material-icons">&#xe3fc;
                                    </i>
                                </span>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('adminPesanan') }}">
                                <span class="nav-icon">
                                    <i class="material-icons">add_shopping_cart
                                    </i>
                                </span>
                                <span class="nav-text">Daftar Pesanan</span>
                            </a>
                        </li>
                        @if(Auth::user()->super_admin == true)
                        <li>
                            <a>
                                <span class="nav-caret">
                                    <i class="fa fa-caret-down"></i>
                                </span>
                                <span class="nav-icon">
                                    <i class="material-icons">web
                                    </i>
                                </span>
                                <span class="nav-text">Data Akun</span>
                            </a>
                            <ul class="nav-sub">
                                <li>
                                    <a href="{{ route('adminAkunUser') }}">
                                        <span class="nav-text">Akun Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('adminAkunAdmin') }}">
                                        <span class="nav-text">Akun Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- / -->
