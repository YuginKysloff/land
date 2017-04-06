@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавление слайда
            </h1>
            {{--<a class="breadcrumb add" href="{{ route('addSlideGet') }}">Добавить слайд</a>--}}
            {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
            {{--<li class="active">Here</li>--}}
            {{--</ol>--}}
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <form action="{{ route('storeSlide') }}" method="POST">
                                <input type="text" name="title">
                                <input type="text" name="subtitle">
                                <input type="checkbox" name="published" value="1">
                                <input type="number" name="weight" value="{{ $count }}">
                                {{ csrf_field() }}
                                <input type="submit" value="Создать">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection