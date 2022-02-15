<nav class="navbar top-navbar">
    <div class="container-fluid">

        <div class="navbar-left">
            <div class="navbar-btn">
                <a href="{{ url('/') }}"><img src="{{ asset('images/logo-poliklinik.png') }}" alt="Oculux Logo" class="img-fluid logo"></a>
                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
            </div>
            <ul class="nav navbar-nav">
                {{-- <li><a href="javascript:void(0);" class="megamenu_toggle icon-menu" title="Mega Menu">Mega</a></li>
                <li class="p_social"><a href="page-social.html" class="social icon-menu" title="News">Social</a></li>
                <li class="p_news"><a href="page-news.html" class="news icon-menu" title="News">News</a></li>
                <li class="p_blog"><a href="page-blog.html" class="blog icon-menu" title="Blog">Blog</a></li> --}}
                @yield('header-menu')
            </ul>
        </div>

        <div class="navbar-right">
            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <li><a href="@if(Auth::check() === true) {{ url('/logout') }} @else {{ url('/login') }} @endif" class="icon-menu"><i class="icon-power"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
</nav>
