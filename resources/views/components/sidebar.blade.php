<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="{{ url('/') }}"><img src="{{ asset('images/logo-poliklinik.png') }}" alt="Oculux Logo" class="img-fluid logo"><span>Poliklinik</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="dropdown">
                @yield('sidebar-biodata')
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                @yield('sidebar-menu')
            </ul>
        </nav>
    </div>
</div>
