<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/om-teste.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/om-teste.png') }}" alt="" height="50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/om-teste.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/om-teste.png') }}" alt="" height="50">
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
                <li class="menu-title"><span>@lang('translation.menu')
                </span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('view.patient')}}"role="button" aria-expanded="false">
                        <i class="mdi mdi-account-plus-outline"></i> <span>@lang('translation.user')
                        </span>
                    </a>
                    <a class="nav-link menu-link" href="{{route('list.patient')}}" role="button" aria-expanded="false">
                        <i class="mdi mdi-account-plus-outline"></i> <span> Listar Usuários
                        </span>
                    </a>
                    <a class="nav-link menu-link" href="#sidebarDashboards" role="button" aria-expanded="false">
                        <i class="mdi mdi-upload"></i> <span>@lang('translation.upload')
                        </span>
                    </a>

                </li> <!-- end Dashboard Menu -->
                </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
