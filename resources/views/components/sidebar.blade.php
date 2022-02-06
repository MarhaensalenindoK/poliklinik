<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="index.html"><img src="/images/icon.svg" alt="Oculux Logo" class="img-fluid logo"><span>Oculux</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                <li class="header">Main</li>
                <li class="active open">
                    <a href="#myPage" class="has-arrow"><i class="icon-home"></i><span>My Page</span></a>
                    <ul>
                        <li class="active"><a href="index.html">My Dashboard</a></li>
                        <li><a href="index4.html">Web Analytics</a></li>
                        <li><a href="index5.html">Event Monitoring</a></li>
                        <li><a href="index6.html">Finance Performance</a></li>
                        <li><a href="index7.html">Sales Monitoring</a></li>
                        <li><a href="index8.html">Hospital Management</a></li>
                        <li><a href="index9.html">Campaign Monitoring</a></li>
                        <li><a href="index10.html">University Analytics</a></li>
                        <li><a href="index11.html">eCommerce Analytics</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
