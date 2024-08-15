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
                <li class="nav-item @if (in_array(Route::currentRouteName(),[
                    'Users.index',
                    'Users.create',
                    "Users.show",
                    "Users.edit"
                ]))
                    active
                @endif">
                    <a href="{{ route('Users.index') }}" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-user"></i>
                        </span>
                        <span class="pcoded-mtext">User Management</span>
                    </a>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-box"></i></span><span class="pcoded-mtext">Settings</span></a>
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
            </ul>
        </div>
    </div>
</nav>
