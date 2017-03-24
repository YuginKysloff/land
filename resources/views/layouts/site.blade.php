<!DOCTYPE HTML>
<html lang="{{ config('app.locale') }}">
<head>
    @section('head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="HandheldFriendly" content="True">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="description" content="{{ $settings['description'] }}">
        <meta name="keywords" content="{{ $settings['keywords'] }}">
        <meta name="author" content="{{ $settings['author'] }}">
        <title>{{ $settings['title'] }}</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/vegas.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.bxslider.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    @show
</head>
<body>
    @section('header')
        <header id="header" >
            <div class="container">
                <div class="welcome">
                    <div class="logo animated fadeInDown"><a href="{{ route('index') }}"><img src="{{ asset('images/logo.png') }}" alt="Yugin Kysloff studio"></a></div>
                    <div class="social-icons">
                        <ul class="animated fadeInDownBig">
                            <li><a href="{{ $settings['vk'] }}" target="_blank"><i class="fa fa-fw fa-vk"></i></a></li>
                            <li><a href="{{ $settings['facebook'] }}" target="_blank"><i class="fa fa-fw fa-facebook"></i></a></li>
                            <li><a href="{{ $settings['instagram'] }}" target="_blank"><i class="fa fa-fw fa-instagram"></i></a></li>
                            <li><a href="{{ $settings['skype'] }}"><i class="fa fa-fw fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    @show

    @yield('content')

    @section('footer')
        <footer>
            <div id="footer">
                <div class="container">
                    <div class="email-form">
                        <h4>Свяжитесь с нами и помните: <span>обо всем можно договориться!</span></h4>
                        <div class="newsletter">
                            <form action="{{ route('index') }}" name="newsletter" class="newsletter" method="post">
                                @if(isset($errors->messages()['name']))
                                    <div class="form_error">
                                        {!! $errors->messages()['name'][0] !!}
                                    </div>
                                @endif
                                <input type="text" name="name" id="name" placeholder="ВАШЕ ИМЯ*">
                                @if(isset($errors->messages()['email']))
                                    <div class="form_error">
                                        {!! $errors->messages()['email'][0] !!}
                                    </div>
                                @endif
                                <input type="text" name="email" id="email" placeholder="ВАШ EMAIL*">
                                @if(isset($errors->messages()['message']))
                                    <div class="form_error">
                                        {!! $errors->messages()['message'][0] !!}
                                    </div>
                                @endif
                                <textarea name="message" id="message" cols="40" rows="2" placeholder="ВВЕДИТЕ СООБЩЕНИЕ*"></textarea>
                                {{ csrf_field() }}
                                <button type="submit" name="submit" value="callback">ОТПРАВИТЬ</button>
                            </form>
                        </div>
                    </div>
                    <div class="social-icons social-icons-footer">
                        <ul>
                            <li>{{ $settings['tel'] }}</li>
                            <li><a href="{{ $settings['vk'] }}" target="_blank"><i class="fa fa-fw fa-vk"></i></a></li>
                            <li><a href="{{ $settings['facebook'] }}" target="_blank"><i class="fa fa-fw fa-facebook"></i></a></li>
                            <li><a href="{{ $settings['instagram'] }}" target="_blank"><i class="fa fa-fw fa-instagram"></i></a></li>
                            <li><a href="{{ $settings['skype'] }}"><i class="fa fa-fw fa-skype"></i></a></li>
                            <li>{{ $settings['email'] }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    @show

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/vegas.min.js') }}"></script>
<script src="{{ asset('js/sliders.js') }}"></script>
<script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
</body>
</html>