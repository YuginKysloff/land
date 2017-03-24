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

@yield('header')
@yield('content')
@yield('footer')
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/vegas.min.js') }}"></script>
<script src="{{ asset('js/sliders.js') }}"></script>
<script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
</body>
</html>