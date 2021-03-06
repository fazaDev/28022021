<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">
        @guest

        @else
        <!-- User box -->
        <div class="user-box text-center">
            <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-lg">
            <div class="dropdown">
                <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">{{ Auth::user()->role }}</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted">
                        <i class="mdi mdi-settings"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#" class="text-custom">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('home') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @if(Auth::user()->role == 'admin')
                <li>
                    <a href="{{route('siswa')}}">
                        <i class="fas fa-child"></i>
                        <span> Data Siswa </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('guru')}}">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span> Data Guru </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('pembayaran-spp')}}">
                        <i class="far fa-credit-card"></i>
                        <span> Pembayaran SPP </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-users"></i>
                        <span> User </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('halaman.index') }}">
                        <i class="far fa-credit-card"></i>
                        <span> Halaman</span>
                    </a>
                </li>

                @endif
                @if(Auth::user()->role == 'user')
                <li>
                    <a href="{{ route('history') }}">
                        <i class="far fa-credit-card"></i>
                        <span> Catatan Pembayaran</span>
                    </a>
                </li>
                @endif

            </ul>

        </div>
        <!-- End Sidebar -->
        @endguest

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
