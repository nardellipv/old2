<nav>
    <div class="nav-wrapper">
        <a href="javascript:void(0)" class="brand-logo">
            <span class="text">
                <p>Barber chair</p>
            </span>
        </a>
        <ul class="left">
            <li class="hide-on-med-and-down">
                <a href="javascript: void(0);" class="nav-toggle">
                    <span class="bars bar1"></span>
                    <span class="bars bar2"></span>
                    <span class="bars bar3"></span>
                </a>
            </li>
            <li class="hide-on-large-only">
                <a href="javascript: void(0);" class="sidebar-toggle">
                    <span class="bars bar1"></span>
                    <span class="bars bar2"></span>
                    <span class="bars bar3"></span>
                </a>
            </li>
            <li class="search-box">
                <a href="javascript: void(0);"><i class="material-icons">search</i></a>
                <form class="app-search">
                    <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                </form>
            </li>
        </ul>
         <ul class="right">
            <li><a class="dropdown-trigger" href="javascript: void(0);" data-target="user_dropdown"><img src="{{ asset('assets/images/users/2.jpg') }}" alt="user" class="circle profile-pic"></a>
                <ul id="user_dropdown" class="mailbox dropdown-content dropdown-user">
                    <li>
                        <div class="dw-user-box">
                            <div class="u-img"><img src="{{ asset('assets/images/users/2.jpg') }}" alt="user"></div>
                            <div class="u-text">
                                <h4>Steve Harvey</h4>
                                <p>steve@gmail.com</p>
                                <a class="waves-effect waves-light btn-small red white-text">View Profile</a>
                            </div>
                        </div>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="material-icons">account_circle</i> My Profile</a></li>
                    <li><a href="#"><i class="material-icons">account_balance_wallet</i> My Balance</a></li>
                    <li><a href="#"><i class="material-icons">inbox</i> Inbox</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="material-icons">settings</i> Account Setting</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="material-icons">power_settings_new</i> Logout</a></li>
                </ul>
            </li>
        </ul> 
    </div>
</nav>