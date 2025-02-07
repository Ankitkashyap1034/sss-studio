<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index-2.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index-2.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="" alt="Logo" height="22">
            </span>
            <span class="logo-lg">
                <img src="" alt="Logo" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('admin/dashboard')}}">
                        <i class="mdi mdi-speedometer"></i> <span>Dashboards</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('admin.create.bank')}}">
                        <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Bank</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('admin.create.payment.platform')}}">
                        <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Payment Platform</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('admin.create.offer')}}">
                        <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Offers</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('admin.create.card.type')}}">
                        <i class="mdi mdi-view-grid-plus-outline"></i> <span data-key="t-apps">Credit Card Types</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{url('logout')}}">
                        <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span data-key="t-apps">Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>