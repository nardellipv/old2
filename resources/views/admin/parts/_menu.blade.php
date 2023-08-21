<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('assets/images/user.png') }}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Bienvenido,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ userConnect()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
            <hr>
            <ul class="row list-unstyled">
                <li class="col-4">
                    <small>Sales</small>
                    <h6>561</h6>
                </li>
                <li class="col-4">
                    <small>Order</small>
                    <h6>920</h6>
                </li>
                <li class="col-4">
                    <small>Revenue</small>
                    <h6>$23B</h6>
                </li>
            </ul>
        </div>
        <!-- Nav tabs -->
        <!-- <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i class="fa fa-book"></i></a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#question"><i class="fa fa-question"></i></a></li>
        </ul> -->

        <!-- Tab panes -->

        <div class="tab-content padding-0">
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu li_animation_delay">
                    <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : ''}}">
                        <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                    </li>
                </ul>
                <hr>
                <ul id="main-menu" class="metismenu li_animation_delay">
                    <li>
                        <a href="#App" class="has-arrow"><i class="fa fa-th-large"></i><span>Ajustes</span></a>
                        <ul>
                            <li><a href="{{ route('list.branch') }}">Sucursales</a></li>
                            <li><a href="{{ route('list.employee') }}">Barberos</a></li>
                            <li><a href="{{ route('list.payment') }}">Medios de Pagos</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
