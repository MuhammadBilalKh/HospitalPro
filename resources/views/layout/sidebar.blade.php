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
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                    <a href="/" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project"
                    class="nav-item @if (in_array(Route::currentRouteName(), ['Blocks.index', 'Blocks.create', 'Blocks.show', 'Blocks.edit'])) active @endif">
                    <a href="{{ route('Blocks.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span class="pcoded-mtext">Manage Blocks</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
