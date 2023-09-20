<header class="header_main header_home">
    <div class="ds_wrapper wrapper_top">
        <div class="container">
            <div class="row">
                <span class="toogle_span">
                    Información
                </span>
                <div class="notification_bar">
                    <div class="col-sm-9 col-lg-9 padd_l">
                        <div class="ds_top_notification">
                            <div class="br_notification_content">
                                <i class="fa fa-mobile">
                                </i>
                                <div class="notification_text">
                                    Contactanos al (261)6659497
                                </div>
                                <!--1103cf-->
                            </div>
                            <div class="br_notification_content">
                                <i class="fa fa-map-marker">
                                </i>
                                <div class="notification_text">
                                    Dorrego 3068, Mendoza
                                </div>
                            </div>
                            <div class="br_notification_content">
                                <i class="fa fa-send">
                                </i>
                                <div class="notification_text">
                                    <a href="mailto:info@barber.com">
                                        info@oldbarberchair.com.ar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-lg-3 padd_r">
                        <div class="ds_social_notification">
                            <a target="_blank" href="https://www.instagram.com/old.barber.chair/" target="_blank">
                                <i class="fa fa-instagram">
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header top section -->
    <!-- header menu section start -->
    <div class="ds_wrapper wrapper_nav">
        <div class="container">
            <div class="row">
                <!-- navbar toggle start -->
                <div class="navbar-header pull-right">
                    <button type="button" class="navbar_toggle" data-toggle="collapse" data-target="#myNavbar">
                        <i class="fa fa-list-ul">
                        </i>
                    </button>
                </div>
                <!-- navbar toggle end-->
                <div class="col-sm-2 col-lg-2 col-md-2 col-xs-5">
                    <div class="ds_logo_left">
                        <a href="{{ route('home') }}">
                            <img alt="" src="{{ asset('assets/logo_chico.png') }}" width="25%">
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8 col-md-8 col-xs-12 ds_navigation_menu">
                    <!-- navbar_collapse -->
                    <div class="navbar_collapse">
                        <nav>
                            <ul class="menu">
                                <li class="current_page_item">
                                    <a href="{{ route('home') }}">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#price">
                                        Precios
                                    </a>
                                </li>
                                <li>
                                    <a href="#services">
                                        Servicios
                                    </a>
                                </li>
                                <li>
                                    <a href="#hours">
                                        Horarios
                                    </a>
                                </li>
                                <li>
                                    <a href="#contact">
                                        Contacto
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}">
                                        Ingresar
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- navbar_collapse -->
                </div>
                <div class="pull-right hidden-xs" id="appointment_btn">
                    <div class="appointment_btn">
                        <a href="https://api.whatsapp.com/send?phone=2616659497">
                            Reservar un turno
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header menu section end -->
</header>
