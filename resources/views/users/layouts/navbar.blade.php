<!-- content -->

<div class="app-header white box-shadow">
    <div class="navbar navbar-toggleable-sm flex-row align-items-center">
        <!-- Open side - Naviation on mobile -->
        <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
            <i class="material-icons">&#xe5d2;</i>
        </a>
        <!-- / -->

        <ul class="nav navbar-nav ml-auto flex-row">

            <li class="nav-item dropdown">
                <a class="nav-link p-0 clear" href="#" data-toggle="dropdown">
                    <span class="hidden-md-down nav-text m-l-sm text-left">
                        <span class="_500 ">{{ Auth::user()->nama }}</span>
                        <small class="text-muted">Administrator</small>
                    </span>
                    <span class="avatar w-32">
                        <img src="{{ asset('assets/images/a0.jpg') }}" alt="...">
                        <i class="on b-white bottom"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-overlay pull-right">
                    <a class="dropdown-item" href="#">
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <span>My Order</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <span>Settings</span>
                    </a>
                    <div class="dropdown-divider"></div>

                    <form action="{{ route('userLogout') }}" method="post">
                        @csrf
                        <input type="hidden" name="tipeAkun" value="users">
                        <button type="submit" class="dropdown-item" ui-sref="access.signin">Sign out</button>
                    </form>
                </div>
            </li>
            <li class="nav-item hidden-md-up">
                <a class="nav-link pl-2" data-toggle="collapse" data-target="#collapse">
                    <i class="material-icons">&#xe5d4;</i>
                </a>
            </li>
        </ul>
        <!-- / navbar right -->
    </div>
</div>



<!-- / -->
