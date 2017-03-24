@extends('layouts.site')

@section('content')
    <div id="slider" class="container">
        <ul class="bxslider">
            @if(is_object($slides))
                @foreach($slides as $slide)
                    <li>
                        <div class="title">{!! $slide->title !!}</div>
                        <h3>{!! $slide->subtitle !!}</h3>
                        <div class="scroller">
                            <a href="#footer">
                                <span><span class="scroll-down"></span></span>
                                СКРОЛЛ ДЛЯ СВЯЗИ
                            </a>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endsection