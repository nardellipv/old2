<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('assets/images/xs/'.userConnect()->image.'.jpg') }}" class="user-photo media-object" alt="User">
            <div class="dropdown">
                <span>Bienvenido,</span>
                <strong>{{ userConnect()->name }}</strong>
            </div>
            <hr>
            <ul class="row list-unstyled">
                <li class="col-4">
                    <small>Ventas M.</small>
                    <h6>${{ $saleSum }}</h6>
                </li>
                <li class="col-4">
                    <small>Egreso M.</small>
                    <h6>${{ $exitChasSum }}</h6>
                </li>
                <li class="col-4">
                    <small>Comis. M.</small>
                    <h6>${{ $commissionSum }}</h6>
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
                <ul id="main-menu" class="metismenu li_animation_delay">
                    <li>
                        <a href="#App" class="has-arrow"><i class="fa fa-dollar"></i><span>Movimientos</span></a>
                        <ul>
                            <li><a href="{{ route('cash.index') }}">Caja</a></li>
                            <li><a href="{{ route('receipt.index') }}">Recibos Generados</a></li>
                            <li><a href="{{ route('historic.move') }}">Movimientos Historicos</a></li>
                        </ul>
                    </li>
                </ul>
                <ul id="main-menu" class="metismenu li_animation_delay">
                    <li>
                        <a href="#App" class="has-arrow"><i class="fa fa-user"></i><span>Clientes</span></a>
                        <ul>
                            <li><a href="{{ route('list.client') }}">Clientes</a></li>
                            <li><a href="{{ route('addNew.client') }}">Agregar Cliente</a></li>
                        </ul>
                    </li>
                </ul>
                <ul id="main-menu" class="metismenu li_animation_delay">
                    <li>
                        <a href="#App" class="has-arrow"><i class="fa fa-cut"></i><span>Barberos</span></a>
                        <ul>
                            <li><a href="{{ route('list.employee') }}">Listado</a></li>
                            <li><a href="{{ route('addNew.employee') }}">Agregar Barbero</a></li>
                            <li><a href="{{ route('status.employee') }}">Barbero Baja</a></li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <ul id="main-menu" class="metismenu li_animation_delay">
                    <li>
                        <a href="#App" class="has-arrow"><i class="fa fa-th-large"></i><span>Ajustes</span></a>
                        <ul>
                            <li><a href="{{ route('list.branch') }}">Sucursales</a></li>
                            <li><a href="javascript:void(0);"><span>Productos</span></a>
                                <ul>
                                    <li><a href="{{ route('list.product') }}">Listado</a></li>
                                    <li><a href="{{ route('addNew.product') }}">Agregar Producto</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('list.payment') }}">Medios de Pagos</a></li>
                            @if(userConnect()->admin == 'Y')
                            <li><a href="javascript:void(0);"><span>Usuarios</span></a>
                                <ul>
                                    <li><a href="{{ route('user.list') }}">Listado</a></li>
                                    <li><a href="{{ route('addNew.user') }}">Agregar Usuario</a></li>
                                    <li><a href="{{ route('profile.index', userConnect()->id) }}">Mi Perfil</a></li>
                                </ul>
                            </li>
                            @else
                            <li><a href="javascript:void(0);"><span>Usuarios</span></a>
                                <ul>
                                    <li><a href="{{ route('profile.index', userConnect()->id) }}">Mi Perfil</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
