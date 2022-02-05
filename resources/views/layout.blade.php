<!doctype html>
<html lang="en">

<head>
<title>Lorem | Home</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="keywords" content="admin template, Oculux admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/vivify.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}"/>

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/site.min.css') }}">

</head>
<body class="theme-cyan font-montserrat rtl">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>

<!-- Theme Setting -->
<div class="themesetting">
    <a href="javascript:void(0);" class="theme_btn"><i class="icon-magic-wand"></i></a>
    <div class="card theme_color">
        <div class="header">
            <h2>Theme Color</h2>
        </div>
        <ul class="choose-skin list-unstyled mb-0">
            <li data-theme="green"><div class="green"></div></li>
            <li data-theme="orange"><div class="orange"></div></li>
            <li data-theme="blush"><div class="blush"></div></li>
            <li data-theme="cyan" class="active"><div class="cyan"></div></li>
            <li data-theme="indigo"><div class="indigo"></div></li>
            <li data-theme="red"><div class="red"></div></li>
        </ul>
    </div>
    <div class="card font_setting">
        <div class="header">
            <h2>Font Settings</h2>
        </div>
        <div>
            <div class="fancy-radio mb-2">
                <label><input name="font" value="font-krub" type="radio"><span><i></i>Krub Google font</span></label>
            </div>
            <div class="fancy-radio mb-2">
                <label><input name="font" value="font-montserrat" type="radio" checked><span><i></i>Montserrat Google font</span></label>
            </div>
            <div class="fancy-radio">
                <label><input name="font" value="font-roboto" type="radio"><span><i></i>Robot Google font</span></label>
            </div>
        </div>
    </div>
    <div class="card setting_switch">
        <div class="header">
            <h2>Settings</h2>
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                RTL Version
                <div class="float-right">
                    <label class="switch">
                        <input type="checkbox" class="rtl-btn" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
            </li>
            <li class="list-group-item">
                Horizontal Henu
                <div class="float-right">
                    <label class="switch">
                        <input type="checkbox" class="hmenu-btn" >
                        <span class="slider round"></span>
                    </label>
                </div>
            </li>
            <li class="list-group-item">
                Mini Sidebar
                <div class="float-right">
                    <label class="switch">
                        <input type="checkbox" class="mini-sidebar-btn">
                        <span class="slider round"></span>
                    </label>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    <nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="index.html"><img src="/images/icon.svg" alt="Oculux Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-envelope"></i>
                            <span class="notification-dot bg-green">4</span>
                        </a>
                        <ul class="dropdown-menu right_chat email vivify fadeIn">
                            <li class="header green">You have 4 New eMail</li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-red"><span>FC</span></div>
                                        <div class="media-body">
                                            <span class="name">James Wert <small class="float-right text-muted">Just now</small></span>
                                            <span class="message">Update GitHub</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-indigo"><span>FC</span></div>
                                        <div class="media-body">
                                            <span class="name">Folisise Chosielie <small class="float-right text-muted">12min ago</small></span>
                                            <span class="message">New Messages</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media">
                                        <img class="media-object " src="/images/xs/avatar5.jpg" alt="">
                                        <div class="media-body">
                                            <span class="name">Louis Henry <small class="float-right text-muted">38min ago</small></span>
                                            <span class="message">Design bug fix</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="media mb-0">
                                        <img class="media-object " src="/images/xs/avatar2.jpg" alt="">
                                        <div class="media-body">
                                            <span class="name">Debra Stewart <small class="float-right text-muted">2hr ago</small></span>
                                            <span class="message">Fix Bug</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="notification-dot bg-azura">4</span>
                        </a>
                        <ul class="dropdown-menu feeds_widget vivify fadeIn">
                            <li class="header blue">You have 4 New Notifications</li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left bg-red"><i class="fa fa-check"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-danger">Issue Fixed <small class="float-right text-muted">9:10 AM</small></h4>
                                        <small>WE have fix all Design bug with Responsive</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left bg-info"><i class="fa fa-user"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-info">New User <small class="float-right text-muted">9:15 AM</small></h4>
                                        <small>I feel great! Thanks team</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left bg-orange"><i class="fa fa-question-circle"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-warning">Server Warning <small class="float-right text-muted">9:17 AM</small></h4>
                                        <small>Your connection is not private</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="feeds-left bg-green"><i class="fa fa-thumbs-o-up"></i></div>
                                    <div class="feeds-body">
                                        <h4 class="title text-success">2 New Feedback <small class="float-right text-muted">9:22 AM</small></h4>
                                        <small>It will give a smart finishing to your site</small>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown language-menu">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="fa fa-language"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="/images/flag/us.svg " class="w20 mr-2 rounded-circle"> US English</a>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="/images/flag/gb.svg " class="w20 mr-2 rounded-circle"> UK English</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="/images/flag/russia.svg " class="w20 mr-2 rounded-circle"> Russian</a>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="/images/flag/arabia.svg " class="w20 mr-2 rounded-circle"> Arabic</a>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="/images/flag/france.svg " class="w20 mr-2 rounded-circle"> French</a>
                        </div>
                    </li>
                    <li><a href="javascript:void(0);" class="megamenu_toggle icon-menu" title="Mega Menu">Mega</a></li>
                    <li class="p_social"><a href="page-social.html" class="social icon-menu" title="News">Social</a></li>
                    <li class="p_news"><a href="page-news.html" class="news icon-menu" title="News">News</a></li>
                    <li class="p_blog"><a href="page-blog.html" class="blog icon-menu" title="Blog">Blog</a></li>
                </ul>
            </div>

            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="javascript:void(0);" class="search_toggle icon-menu" title="Search Result"><i class="icon-magnifier"></i></a></li>
                        <li><a href="javascript:void(0);" class="right_toggle icon-menu" title="Right Menu"><i class="icon-bubbles"></i><span class="notification-dot bg-pink">2</span></a></li>
                        <li><a href="page-login.html" class="icon-menu"><i class="icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
    </nav>

    <div class="search_div">
        <div class="card">
            <div class="body">
                <form id="navbar-search" class="navbar-form search-form">
                    <div class="input-group mb-0">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                            <a href="javascript:void(0);" class="search_toggle btn btn-danger"><i class="icon-close"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <span>Search Result <small class="float-right text-muted">About 90 results (0.47 seconds)</small></span>
        <div class="table-responsive">
            <table class="table table-hover table-custom spacing5">
                <tbody>
                    <tr>
                        <td class="w40">
                            <span>01</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avtar-pic w35 bg-red" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name"><span>SS</span></div>
                                <div class="ml-3">
                                    <a href="page-invoices-detail.html" title="">South Shyanne</a>
                                    <p class="mb-0">south.shyanne@example.com</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>02</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Avatar Name">
                                <div class="ml-3">
                                    <a href="javascript:void(0);" title="">Zoe Baker</a>
                                    <p class="mb-0">zoe.baker@example.com</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>03</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                    <div class="avtar-pic w35 bg-indigo" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name"><span>CB</span></div>
                                <div class="ml-3">
                                    <a href="javascript:void(0);" title="">Colin Brown</a>
                                    <p class="mb-0">colinbrown@example.com</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>04</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avtar-pic w35 bg-green" data-toggle="tooltip" data-placement="top" title="" data-original-title="Avatar Name"><span>KG</span></div>
                                <div class="ml-3">
                                    <a href="javascript:void(0);" title="">Kevin Gill</a>
                                    <p class="mb-0">kevin.gill@example.com</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>05</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="/images/xs/avatar5.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Avatar Name">
                                <div class="ml-3">
                                    <a href="javascript:void(0);" title="">Brandon Smith</a>
                                    <p class="mb-0">Maria.gill@example.com</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>06</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="/images/xs/avatar6.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Avatar Name">
                                <div class="ml-3">
                                    <a href="javascript:void(0);" title="">Kevin Baker</a>
                                    <p class="mb-0">kevin.baker@example.com</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>07</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Avatar Name">
                                <div class="ml-3">
                                    <a href="javascript:void(0);" title="">Zoe Baker</a>
                                    <p class="mb-0">zoe.baker@example.com</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="megamenu" class="megamenu particles_js">
        <a href="javascript:void(0);" class="megamenu_toggle btn btn-danger"><i class="icon-close"></i></a>
        <div class="container">
            <div class="row clearfix">
                <div class="col-12">
                    <ul class="q_links">
                        <li><a href="app-inbox.html"><i class="icon-envelope"></i><span>Inbox</span></a></li>
                        <li><a href="app-chat.html"><i class="icon-bubbles"></i><span>Messenger</span></a></li>
                        <li><a href="app-calendar.html"><i class="icon-calendar"></i><span>Event</span></a></li>
                        <li><a href="page-profile.html"><i class="icon-user"></i><span>Profile</span></a></li>
                        <li><a href="page-invoices.html"><i class="icon-printer"></i><span>Invoice</span></a></li>
                        <li><a href="page-timeline.html"><i class="icon-list"></i><span>Timeline</span></a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card w_card3">
                        <div class="body">
                            <div class="text-center"><i class="icon-picture text-info"></i>
                                <h4 class="m-t-25 mb-0">104 Picture</h4>
                                <p>Your gallery download complete</p>
                                <a href="javascript:void(0);" class="btn btn-info btn-round">Download now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card w_card3">
                        <div class="body">
                            <div class="text-center"><i class="icon-diamond text-success"></i>
                                <h4 class="m-t-25 mb-0">813 Point</h4>
                                <p>You are doing great job!</p>
                                <a href="javascript:void(0);" class="btn btn-success btn-round">Read now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="card w_card3">
                        <div class="body">
                            <div class="text-center"><i class="icon-social-twitter text-primary"></i>
                                <h4 class="m-t-25 mb-0">3,756</h4>
                                <p>New Followers on Twitter</p>
                                <a href="javascript:void(0);" class="btn btn-primary btn-round">Find more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <ul class="list-group">
                        <li class="list-group-item">
                            Anyone send me a message
                            <div class="float-right">
                                <label class="switch">
                                    <input type="checkbox" checked="">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Anyone seeing my profile page
                            <div class="float-right">
                                <label class="switch">
                                    <input type="checkbox" checked="">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            Anyone posts a comment on my post
                            <div class="float-right">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="particles-js"></div>
    </div>

    <div id="rightbar" class="rightbar">
        <div class="body">
            <ul class="nav nav-tabs2">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Chat-one">Chat</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat-list">List</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat-groups">Groups</a></li>
            </ul>
            <hr>
            <div class="tab-content">
                <div class="tab-pane vivify fadeIn delay-100 active" id="Chat-one">
                    <div class="chat_detail">
                        <ul class="chat-widget clearfix">
                            <li class="left float-left">
                                <div class="avtar-pic w35 bg-pink"><span>KG</span></div>
                                <div class="chat-info">
                                    <span class="message">Hello, John<br>What is the update on Project X?</span>
                                </div>
                            </li>
                            <li class="right">
                                <img src="/images/xs/avatar1.jpg" class="rounded" alt="">
                                <div class="chat-info">
                                    <span class="message">Hi, Alizee<br> It is almost completed. I will send you an email later today.</span>
                                </div>
                            </li>
                            <li class="left float-left">
                                <div class="avtar-pic w35 bg-pink"><span>KG</span></div>
                                <div class="chat-info">
                                    <span class="message">That's great. Will catch you in evening.</span>
                                </div>
                            </li>
                            <li class="right">
                                <img src="/images/xs/avatar1.jpg" class="rounded" alt="">
                                <div class="chat-info">
                                    <span class="message">Sure we'will have a blast today.</span>
                                </div>
                            </li>
                        </ul>
                        <div class="input-group mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <a href="javascript:void(0);" class=""><i class="icon-camera text-warning"></i></a>
                                </span>
                            </div>
                            <textarea type="text" row="" class="form-control" placeholder="Enter text here..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="tab-pane vvivify fadeIn delay-100" id="Chat-list">
                    <ul class="right_chat list-unstyled mb-0">
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-red"><span>FC</span></div>
                                    <div class="media-body">
                                        <span class="name">Folisise Chosielie</span>
                                        <span class="message">offline</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Marshall Nichols</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-red"><span>FC</span></div>
                                    <div class="media-body">
                                        <span class="name">Louis Henry</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-orange"><span>DS</span></div>
                                    <div class="media-body">
                                        <span class="name">Debra Stewart</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-green"><span>SW</span></div>
                                    <div class="media-body">
                                        <span class="name">Lisa Garett</span>
                                        <span class="message">offline since May 12</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Debra Stewart</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Lisa Garett</span>
                                        <span class="message">offline since Jan 18</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-indigo"><span>FC</span></div>
                                    <div class="media-body">
                                        <span class="name">Louis Henry</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-pink"><span>DS</span></div>
                                    <div class="media-body">
                                        <span class="name">Debra Stewart</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-info"><span>SW</span></div>
                                    <div class="media-body">
                                        <span class="name">Lisa Garett</span>
                                        <span class="message">offline since May 12</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane vivify fadeIn delay-100" id="Chat-groups">
                    <ul class="right_chat list-unstyled mb-0">
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-cyan"><span>DT</span></div>
                                    <div class="media-body">
                                        <span class="name">Designer Team</span>
                                        <span class="message">offline</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
						</li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-azura"><span>SG</span></div>
                                    <div class="media-body">
                                        <span class="name">Sale Groups</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-orange"><span>NF</span></div>
                                    <div class="media-body">
                                        <span class="name">New Fresher</span>
                                        <span class="message">online</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-indigo"><span>PL</span></div>
                                    <div class="media-body">
                                        <span class="name">Project Lead</span>
                                        <span class="message">offline since May 12</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="index.html"><img src="/images/icon.svg" alt="Oculux Logo" class="img-fluid logo"><span>Oculux</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="/images/user.png" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Louis Pierce</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                        <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
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
                    <li><a href="index2.html"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                    <li><a href="index3.html"><i class="icon-diamond"></i><span>Crypto Coin</span></a></li>
                    <li><a href="../hrms/index.html"><i class="icon-rocket"></i><span>HRMS System</span></a></li>
                    <li><a href="../jobportal/index.html"><i class="icon-badge"></i><span>Job Portal</span></a></li>
                    <li><a href="../landing/index.html"><i class="icon-cursor"></i><span>Landing Page</span></a></li>
                    <li class="header">App</li>
                    <li>
                        <a href="#Contact" class="has-arrow"><i class="icon-book-open"></i><span>Contact</span></a>
                        <ul>
                            <li><a href="app-contact.html">List View</a></li>
                            <li><a href="app-contact2.html">Grid View</a></li>
                        </ul>
                    </li>
                    <li><a href="app-inbox.html"><i class="icon-envelope"></i><span>Email</span></a></li>
                    <li><a href="app-chat.html"><i class="icon-bubbles"></i><span>Messenger</span></a></li>
                    <li>
                        <a href="#Project" class="has-arrow"><i class="icon-bubbles"></i><span>Project</span></a>
                        <ul>
                            <li><a href="app-taskboard.html">Taskboard</a></li>
                            <li><a href="app-project-list.html">Project list</a></li>
                            <li><a href="app-ticket.html">Ticket List</a></li>
                            <li><a href="app-ticket-details.html">Ticket Details</a></li>
                            <li><a href="app-clients.html">Clients</a></li>
                            <li><a href="app-todo.html">Todo List</a></li>
                        </ul>
                    </li>
                    <li><a href="app-calendar.html"><i class="icon-calendar"></i><span>Calendar</span></a></li>
                    <li class="header">UI Elements</li>
                    <li>
                        <a href="#uiIcons" class="has-arrow"><i class="icon-tag"></i><span>Icons</span></a>
                        <ul>
                            <li><a href="ui-icons.html">FontAwesome</a></li>
                            <li><a href="ui-icons-line.html">Simple Line</a></li>
                            <li><a href="ui-icons-themify.html">Themify Icon</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#uiComponents" class="has-arrow"><i class="icon-diamond"></i><span>Components</span></a>
                        <ul>
                            <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-colors.html">Colors</a></li>
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-tabs.html">Tabs</a></li>
                            <li><a href="ui-progressbars.html">Progress Bars</a></li>
                            <li><a href="ui-modals.html">Modals</a></li>
                            <li><a href="ui-notifications.html">Notifications</a></li>
                            <li><a href="ui-dialogs.html">Dialogs</a></li>
                            <li><a href="ui-list-group.html">List Group</a></li>
                            <li><a href="ui-media-object.html">Media Object</a></li>
                            <li><a href="ui-nestable.html">Nestable</a></li>
                            <li><a href="ui-range-sliders.html">Range Sliders</a></li>
                            <li><a href="ui-helper-class.html">Helper Classes</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#forms" class="has-arrow"><i class="icon-pencil"></i><span>Forms</span></a>
                        <ul>
                            <li><a href="forms-basic.html">Basic Elements</a></li>
                            <li><a href="forms-advanced.html">Advanced Elements</a></li>
                            <li><a href="forms-validation.html">Form Validation</a></li>
                            <li><a href="forms-wizard.html">Form Wizard</a></li>
                            <li><a href="forms-summernote.html">Summernote</a></li>
                            <li><a href="forms-dragdropupload.html">Drag &amp; Drop Upload</a></li>
                            <li><a href="forms-editors.html">CKEditor</a></li>
                            <li><a href="forms-markdown.html">Markdown</a></li>
                            <li><a href="forms-cropping.html">Image Cropping</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#Tables" class="has-arrow"><i class="icon-layers"></i><span>Tables</span></a>
                        <ul>
                            <li><a href="table-normal.html">Normal Tables</a></li>
                            <li><a href="table-color.html">Tables Color</a></li>
                            <li><a href="table-jquery-datatable.html">Jquery Datatables</a></li>
                            <li><a href="table-editable.html">Editable Tables</a></li>
                            <li><a href="table-filter.html">Table Filter</a></li>
                            <li><a href="table-dragger.html">Table dragger</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#charts" class="has-arrow"><i class="icon-pie-chart"></i><span>Charts</span></a>
                        <ul>
                            <li><a href="chart-c3.html">C3 Charts</a></li>
                            <li><a href="chart-chartjs.html">ChartJS</a></li>
                            <li><a href="chart-morris.html">Morris Charts</a></li>
                            <li><a href="chart-flot.html">Flot Charts</a></li>
                            <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                            <li><a href="chart-jquery-knob.html">Jquery Knob</a></li>
                        </ul>
                    </li>
                    <li><a href="map-jvectormap.html"><i class="icon-map"></i><span>jVector Map</span></a></li>
                    <li class="header">Extra</li>
                    <li><a href="widgets.html"><i class="icon-puzzle"></i><span>Widgets</span></a></li>
                    <li>
                        <a href="#Authentication" class="has-arrow"><i class="icon-lock"></i><span>Authentication</span></a>
                        <ul>
                            <li><a href="page-login.html">Login</a></li>
                            <li><a href="page-login2.html">Login Version2</a></li>
                            <li><a href="page-register.html">Register</a></li>
                            <li><a href="page-forgot-password.html">Forgot Password</a></li>
                            <li><a href="page-404.html">Page 404</a></li>
                            <li><a href="page-maintenance.html">Maintenance</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#Pages" class="has-arrow"><i class="icon-docs"></i><span>Pages</span></a>
                        <ul>
                            <li><a href="page-blank.html">Blank Page</a></li>
                            <li><a href="page-profile.html">User Profile</a></li>
                            <li><a href="page-user-list.html">User List</a></li>
                            <li><a href="page-testimonials.html">Testimonials</a></li>
                            <li><a href="page-invoices.html">Invoices</a></li>
                            <li><a href="page-timeline.html">Timeline</a></li>
                            <li><a href="page-search-results.html">Search Results</a></li>
                            <li><a href="page-gallery.html">Image Gallery</a></li>
                            <li><a href="page-pricing.html">Pricing</a></li>
                            <li><a href="page-coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li>
                    <li><a href="../documentation/index.html"><i class="icon-doc"></i><span>Documentation</span></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>My Page</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                            <li class="breadcrumb-item active" aria-current="page">My Page</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create Campaign</a>
                        <a href="https://themeforest.net/item/oculux-bootstrap-4x-admin-dashboard-clean-modern-ui-kit/23091507" class="btn btn-sm btn-success" title="Themeforest"><i class="icon-basket"></i> Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i class="fa fa-briefcase"></i></div>
                                <div class="ml-4">
                                    <span>Total income</span>
                                    <h4 class="mb-0 font-weight-medium">$7,805</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-azura text-white rounded-circle"><i class="fa fa-credit-card"></i></div>
                                <div class="ml-4">
                                    <span>New expense</span>
                                    <h4 class="mb-0 font-weight-medium">$3,651</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-orange text-white rounded-circle"><i class="fa fa-users"></i></div>
                                <div class="ml-4">
                                    <span>Daily Visits</span>
                                    <h4 class="mb-0 font-weight-medium">5,805</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-pink text-white rounded-circle"><i class="fa fa-life-ring"></i></div>
                                <div class="ml-4">
                                    <span>Bounce rate</span>
                                    <h4 class="mb-0 font-weight-medium">$13,651</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Users</h2>
                        </div>
                        <div class="body">
                            <div class="row text-center">
                                <div class="col-6 border-right pb-4 pt-4">
                                    <label class="mb-0">New Users</label>
                                    <h4 class="font-30 font-weight-bold text-col-blue">2,025</h4>
                                </div>
                                <div class="col-6 pb-4 pt-4">
                                    <label class="mb-0">Return Visitors</label>
                                    <h4 class="font-30 font-weight-bold text-col-blue">1,254</h4>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="form-group">
                                <label class="d-block">New Users <span class="float-right">77%</span></label>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Return Visitors <span class="float-right">50%</span></label>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Engagement <span class="float-right">23%</span></label>
                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card user_statistics">
                        <div class="header">
                            <h2>Earning Report</h2>
                        </div>
                        <div class="body">
                            <div id="chart-bar" style="height: 302px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-custom spacing5">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">#</th>
                                    <th>Client</th>
                                    <th style="width: 50px;">Amount</th>
                                    <th style="width: 50px;">Status</th>
                                    <th style="width: 110px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span>01</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avtar-pic w35 bg-red" data-toggle="tooltip" data-placement="top" title="Avatar Name"><span>SS</span></div>
                                            <div class="ml-3">
                                                <a href="page-invoices-detail.html" title="">South Shyanne</a>
                                                <p class="mb-0">south.shyanne@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$1200</td>
                                    <td><span class="badge badge-success ml-0 mr-0">Done</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-default" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope"></i></button>
                                        <button type="button" class="btn btn-sm btn-default " title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                        <button type="button" class="btn btn-sm btn-default" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>02</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                            <div class="ml-3">
                                                <a href="javascript:void(0);" title="">Zoe Baker</a>
                                                <p class="mb-0">zoe.baker@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$378</td>
                                    <td><span class="badge badge-success ml-0 mr-0">Done</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-default" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope"></i></button>
                                        <button type="button" class="btn btn-sm btn-default " title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                        <button type="button" class="btn btn-sm btn-default" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>03</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                                <div class="avtar-pic w35 bg-indigo" data-toggle="tooltip" data-placement="top" title="Avatar Name"><span>CB</span></div>
                                            <div class="ml-3">
                                                <a href="javascript:void(0);" title="">Colin Brown</a>
                                                <p class="mb-0">colinbrown@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$653</td>
                                    <td><span class="badge badge-success ml-0 mr-0">Done</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-default" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope"></i></button>
                                        <button type="button" class="btn btn-sm btn-default " title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                        <button type="button" class="btn btn-sm btn-default" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>04</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avtar-pic w35 bg-green" data-toggle="tooltip" data-placement="top" title="Avatar Name"><span>KG</span></div>
                                            <div class="ml-3">
                                                <a href="javascript:void(0);" title="">Kevin Gill</a>
                                                <p class="mb-0">kevin.gill@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$451</td>
                                    <td><span class="badge badge-warning  ml-0 mr-0">Panding</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-default" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope"></i></button>
                                        <button type="button" class="btn btn-sm btn-default " title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                        <button type="button" class="btn btn-sm btn-default" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>05</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="/images/xs/avatar5.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                            <div class="ml-3">
                                                <a href="javascript:void(0);" title="">Brandon Smith</a>
                                                <p class="mb-0">Maria.gill@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$1,989</td>
                                    <td><span class="badge badge-success  ml-0 mr-0">Done</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-default" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope"></i></button>
                                        <button type="button" class="btn btn-sm btn-default " title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                        <button type="button" class="btn btn-sm btn-default" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>06</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="/images/xs/avatar6.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                            <div class="ml-3">
                                                <a href="javascript:void(0);" title="">Kevin Baker</a>
                                                <p class="mb-0">kevin.baker@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$343</td>
                                    <td><span class="badge badge-warning  ml-0 mr-0">Panding</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-default" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope"></i></button>
                                        <button type="button" class="btn btn-sm btn-default " title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                        <button type="button" class="btn btn-sm btn-default" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>07</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="Avatar Name" alt="Avatar" class="w35 h35 rounded">
                                            <div class="ml-3">
                                                <a href="javascript:void(0);" title="">Zoe Baker</a>
                                                <p class="mb-0">zoe.baker@example.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$378</td>
                                    <td><span class="badge badge-success ml-0 mr-0">Done</span></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-default" title="Send Invoice" data-toggle="tooltip" data-placement="top"><i class="icon-envelope"></i></button>
                                        <button type="button" class="btn btn-sm btn-default " title="Print" data-toggle="tooltip" data-placement="top"><i class="icon-printer"></i></button>
                                        <button type="button" class="btn btn-sm btn-default" title="Delete" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <a class="card" href="javascript:void(0)">
                        <div class="body text-center">
                            <img class="img-thumbnail rounded-circle" src="/images/sm/avatar1.jpg" alt="">
                            <h6 class="mt-3">Michelle Green</h6>
                            <div class="text-center text-muted">Intranet Developer</div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="row clearfix">
                                <div class="col-6">
                                    <i class="fa fa-tag font-22"></i>
                                    <div><span class="text-muted">9 Badges</span></div>
                                </div>
                                <div class="col-6">
                                    <i class="fa fa-dollar font-22"></i>
                                    <div><span class="text-muted">$ 3.100</span></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="card">
                        <div class="body">
                            <div class="card-text">
                                <div class="mt-0">
                                    <small class="float-right text-muted">10/200 GB</small>
                                    <span>Memory</span>
                                    <div class="progress progress-xxs">
                                        <div style="width: 60%;" class="progress-bar"></div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <small class="float-right text-muted">40 MB</small>
                                    <span>Bandwidth</span>
                                    <div class="progress progress-xxs">
                                        <div style="width: 50%;" class="progress-bar"></div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <small class="float-right text-muted">73%</small>
                                    <span>Activity</span>
                                    <div class="progress progress-xxs">
                                        <div style="width: 40%;" class="progress-bar"></div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <small class="float-right text-muted">400 GB</small>
                                    <span>FTP</span>
                                    <div class="progress progress-xxs mb-0">
                                        <div style="width: 80%;" class="progress-bar bg-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- Javascript -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>

<script src="{{ asset('assets/bundles/c3.bundle.js') }}"></script>

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/index.js') }}"></script>
</body>
</html>
