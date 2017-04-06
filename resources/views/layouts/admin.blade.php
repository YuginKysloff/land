<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>

        @section('head')
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>{{ $title }}</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css/skin-blue.min.css') }}">
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        @show

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @section('header')
                <header class="main-header">
                    <a href="/" class="logo">
                        <span class="logo-mini"><b>YK</b>S</span>
                        <span class="logo-lg"><b>Yugin Kysloff</b> Studio</span>
                    </a>
                    <nav class="navbar navbar-static-top" role="navigation">
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <li class="dropdown user user-menu">
                                    <a href="{{ route('users') }}">
                                        <img src="{{ asset('images/avatar.jpg') }}" class="user-image" alt="User's avatar">
                                        <span>{{ Auth::user()->name }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
            @show

            @section('sidebar')
                <aside class="main-sidebar">
                    <section class="sidebar">
                        <ul class="sidebar-menu">
                            <li class="header">Админ меню</li>
                            <li class="active">
                                <a href="{{ route('statistics') }}">
                                    <i class="fa fa-line-chart"></i>
                                    <span>Статистика</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-phone"></i>
                                    <span>CRM</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('slides') }}">
                                    <i class="fa fa-file-picture-o"></i>
                                    <span>Слайды</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users') }}">
                                    <i class="fa fa-user"></i>
                                    <span>Пользователи</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-industry"></i>
                                    <span>Настройки сайта</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Link in level 2</a></li>
                                    <li><a href="#">Link in level 2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa  fa-sign-out"></i>
                                    <span>Выход</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </section>
                </aside>
            @show

            @yield('content')

            @section('footer')
                <footer class="main-footer">
                    <!-- To the right -->
                    <div class="pull-right hidden-xs">
                        Anything you want
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright &copy; <?=date('Y')?> <a href="#">Company</a>.</strong> All rights reserved.
                </footer>
            @show
        </div>

        @section('scripts')
            <script src="{{ asset('js/jquery.js') }}"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/app.min.js') }}"></script>
        @show
    </body>
</html>
