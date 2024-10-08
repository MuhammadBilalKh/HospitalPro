<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">DigiHMS</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Settings</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.dashboard') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item @if (in_array(Route::currentRouteName(), ['Patient.index', 'Patient.create', 'Patient.show', 'Patient.edit'])) active @endif">
                    <a href="{{ route('Patient.index') }}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-clipboard"></i>
                        </span>
                        <span class="pcoded-mtext">Patients Management</span>
                    </a>
                </li>
                <li class="nav-item @if (in_array(Route::currentRouteName(), ['Users.index', 'Users.create', 'Users.show', 'Users.edit'])) active @endif">
                    <a href="{{ route('Users.index') }}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-user"></i>
                        </span>
                        <span class="pcoded-mtext">User Management</span>
                    </a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-settings"></i></span><span class="pcoded-mtext">Settings</span></a>
                    <ul class="pcoded-submenu">
                        <li class="nav-item @if (in_array(Route::currentRouteName(), ['Blocks.index', 'Blocks.create', 'Blocks.show', 'Blocks.edit'])) active @endif"><a
                                href="{{ route('Blocks.index') }}">Manage Blocks</a></li>
                        <li class="nav-item @if (in_array(Route::currentRouteName(), [
                                'Departments.index',
                                'Departments.create',
                                'Departments.edit',
                                'Departments.show',
                            ])) active @endif">
                            <a href="{{ route('Departments.index') }}" class="nav-link">Manage Department</a>
                        </li>
                        <li class="nav-item
                        @if (in_array(Route::currentRouteName(), ['Wards.index', 'Wards.create', 'Wards.edit', 'Wards.show']))  @endif">
                            <a href="{{ route('Wards.index') }}" class="nav-link">Manage Wards</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-box"></i></span><span class="pcoded-mtext">Vendors</span></a>
                    <ul class="pcoded-submenu">
                        <li class="nav-item @if (in_array(Route::currentRouteName(), ['Vendors.index', 'Vendors.create', 'Vendors.show', 'Vendors.edit'])) active @endif"><a
                                href="{{ route('Vendors.index') }}">Vendors Details</a></li>
                        <li class="nav-item @if (Route::currentRouteName() == 'vendors.manage_reviews') active @endif">
                            <a href="{{ route('vendors.manage_reviews') }}">Reviews</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (in_array(Route::currentRouteName(), ['Doctor.index', 'Doctor.create', 'Doctor.show', 'Doctor.edit'])) active @endif">
                    <a href="{{ route('Doctor.index') }}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-user"></i>
                        </span>
                        <span class="pcoded-mtext">Doctor Profiling</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
