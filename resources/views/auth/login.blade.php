@extends('layouts.guest')

@section('title')
    Логин
@endsection

@section('content')
    <section class="auth">
        <div class="wrapper">
            <div class="slide white" style="background-image: url(img/auth.jpg)">
                <img src="/img/wave.svg">
                <ul>
                    <li class="icon-dashboard ">
                        <div class="text">
                            <h5>Заголовок</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic ullam qui unde?</p>
                        </div>
                    </li>
                    <li class="icon-internet">
                        <div class="text">
                            <h5>Заголовок</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic ullam qui unde?</p>
                        </div>
                    </li>
                    <li class="icon-analytics">
                        <div class="text">
                            <h5>Заголовок</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic ullam qui unde?</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="auth-wrapper">
                <form class="article" id="login_form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <h1>@yield('title')</h1>
                    @if (session('status') == 'reset-password')
                        <div class="message success">
                            <div class="text">
                                <h6>Ваш пароль был изменён</h6>
                                <p>Вы можете авторизоваться использую новый пароль</p>
                            </div>
                        </div>
                    @endif



                    <div class="form-group">
                        <label for="phone_number">Номер телефона</label>
                        <input name="phone_number" type="text" id="phone_number" class="phone-mask required" data-type="phone">
                    </div>
                    <div class="form-group">
                        <label for="login_password">Пароль</label>
                        <input name="password" type="password" id="login_password" class="required" data-type="password" placeholder="Введите пароль">
                    </div>
                    <div class="df jcsb aic">
                        <div class="form-group checkbox fit">
                            <input name="remember" type="checkbox" id="login_remember">
                            <label for="login_remember">Запомнить меня</label>
                        </div>
                        <a href="{{ route('forgotPassword.index') }}">Забыли пароль?</a>
                    </div>
                    <button class="btn full large square" id="login_confirm">Войти</button>
                    <p>Если у Вас еще нет аккаунта - <a href="{{ route('registration.create') }}">зарегистрируйтесь</a></p>
                </form>
            </div>
        </div>
    </section>
@endsection


