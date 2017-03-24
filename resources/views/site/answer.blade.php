@extends('layouts.app')

@section('header')
    @parent
    <meta http-equiv="refresh" content="6;url=/" />
@endsection

@section('header')
    @include('site.header')
@endsection

@section('content')
    <div id="thank-you" class="container">
        <div>
            <h2>{{ session('success') }}</h2>
        </div>
    </div>
@endsection
