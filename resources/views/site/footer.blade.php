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
@endsection