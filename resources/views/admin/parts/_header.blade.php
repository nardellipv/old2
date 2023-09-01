<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-brand">
            <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
            <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars"></i></button>
            <a href="index.html">Old Barber Chair</a>
        </div>

        <div class="navbar-right">
            <div class="pagination-email d-flex align-items-center">
                @if(!empty(checkUserBranch()['1']->name))
                <small>Conectado a <b>{{ checkUserBranch()['1']->name }}</b></small>
                @else
                <small>Conectado a <b><mark>Todas las sucursales</mark></b></small>
                @endif
            </div>

            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('logout') }}" class="icon-menu" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
