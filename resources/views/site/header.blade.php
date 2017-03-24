@section('header')
    <header id="header" >
        <div class="container">
            <div class="welcome">
                <div class="logo animated fadeInDown"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" alt="Yugin Kysloff studio"></a></div>
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
@endsection