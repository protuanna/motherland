<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Dashboard - Ace Admin</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    {{ HTML::style('assets/css/bootstrap.min.css'); }}
    {{ HTML::style('assets/font-awesome/4.2.0/css/font-awesome.min.css'); }}

    {{ HTML::style('assets/css/jquery-ui.min.css'); }}
    {{ HTML::style('assets/fonts/fonts.googleapis.com.css'); }}
    {{ HTML::style('assets/css/chosen.min.css'); }}
    {{ HTML::style('assets/css/ace.min.css'); }}
    {{ HTML::style('assets/css/ace-part2.min.css'); }}
    {{ HTML::style('assets/css/ace-ie.min.css'); }}

    {{ HTML::script('assets/js/ace-extra.min.js'); }}
    {{ HTML::script('assets/js/html5shiv.min.js'); }}
    {{ HTML::script('assets/js/respond.min.js'); }}
    <script type="text/javascript">
            var WEB_ROOT = "{{ URL::to('/')}}";
    </script>
    {{ HTML::script('assets/js/jquery.2.1.1.min.js'); }}
    {{ HTML::script('assets/js/jquery.1.11.1.min.js'); }}
    {{ HTML::script('assets/js/bootstrap.min.js'); }}
    {{ HTML::script('assets/js/ace-elements.min.js'); }}
    {{ HTML::script('assets/js/chosen.jquery.js'); }}
    {{ HTML::script('assets/js/jquery-ui.min.js'); }}
    {{ HTML::script('assets/js/jquery.ui.touch-punch.min.js'); }}
    {{ HTML::script('assets/js/ace.min.js'); }}
    {{ HTML::script('assets/js/ace-elements.min.js'); }}
    {{ HTML::script('assets/js/moment.min.js'); }}
    {{ HTML::script('assets/js/bootbox.min.js'); }}
    {{ HTML::script('assets/admin/js/format.js'); }}
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-container" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="{{ URL::route('admin.dashboard') }}" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Quản trị Motherland.ltd
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>Xin chào,</small>
                                    {{$user['user_full_name']}}
								</span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="{{URL::route('admin.user_change',array('id' => base64_encode($user['user_id'])))}}">
                                <i class="ace-icon fa fa-unlock"></i>
                                Đổi mật khẩu
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="{{URL::route('admin.logout')}}">
                                <i class="ace-icon fa fa-power-off"></i>
                                Đăng xuất
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>

<div class="main-container" id="main-container">
    <div id="sidebar" class="sidebar sidebar-fixed sidebar-scroll responsive">
        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                <button class="btn btn-success">
                    <i class="ace-icon fa fa-youtube"></i>
                </button>

                <button class="btn btn-info">
                    <i class="ace-icon fa fa-facebook"></i>
                </button>

                <button class="btn btn-warning">
                    <i class="ace-icon fa fa-twitter"></i>
                </button>

                <button class="btn btn-danger">
                    <i class="ace-icon fa fa-google-plus"></i>
                </button>
            </div>

            <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                <span class="btn btn-success"></span>

                <span class="btn btn-info"></span>

                <span class="btn btn-warning"></span>

                <span class="btn btn-danger"></span>
            </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
            <li class="@if(Route::currentRouteName() == 'admin.dashboard')active @endif">
                <a href="{{URL::route('admin.dashboard')}}">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="@if(Route::currentRouteName() == 'admin.user_view' || Route::currentRouteName() == 'admin.permission_view'|| Route::currentRouteName() == 'admin.groupUser_view')active @endif">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text"> Quản trị tài khoản</span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu  nav-show ">
                    <li class="@if(Route::currentRouteName() == 'admin.user_view')active @endif">
                        <a href="{{URL::route('admin.user_view')}}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Danh sách tài khoản
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class="@if(Route::currentRouteName() == 'admin.groupUser_view')active @endif">
                        <a href="{{URL::route('admin.groupUser_view')}}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Danh sách nhóm quyền
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            <li class="@if(Route::currentRouteName() == 'admin.mngSite_banner_view' || Route::currentRouteName() == 'admin.mngSite_page_view')active @endif">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-sitemap"></i>
                    <span class="menu-text"> Quản trị site</span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu  nav-show ">
                    <li class="@if(Route::currentRouteName() == 'admin.mngSite_banner_view')active @endif">
                        <a href="{{URL::route('admin.mngSite_banner_view')}}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Quản trị banner
                        </a>

                        <b class="arrow"></b>
                    </li>
                    <li class="@if(Route::currentRouteName() == 'admin.mngSite_page_view')active @endif">
                        <a href="{{URL::route('admin.mngSite_page_view')}}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Quản trị page
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>
    </div>

    <div class="main-content">
        {{$content}}
    </div><!-- /.main-content -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-info">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-300"></i>
    </a>
</div><!-- /.main-container -->

<!-- inline scripts related to this page -->
</body>
</html>
