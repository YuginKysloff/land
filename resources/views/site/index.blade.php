@extends('layouts.app')

@section('header')
    @parent
@endsection

@section('header')
    @include('site.header')
@endsection

@section('content')
    @include('site.content')
@endsection

@section('footer')
    @include('site.footer')
@endsection