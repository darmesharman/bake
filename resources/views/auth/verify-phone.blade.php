@extends('layouts.guest')

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
            <form action="{{ route('verifyPhone.postVerify') }}" method="POST">
                @csrf

                <div class="form-group confirm-code">
                    <div class="confirm-code-wrapper article">
                        <h3>Верификация</h3>
                        <p class="grey-text">
                            Для защиты Вашего аккаунта мы отправили SMS с кодом на Ваш мобильный телефон. Это бесплатно.
                        </p>
                        <div class="code-input-wrapper">
                            <input type="hidden" name="token" class="code-input code-mask code" id="code" value="{{ $token }}" >
                            <input type="hidden" name="phone_number" class="code-input code-mask code" id="code" value="{{ $phone_number }}">
                            <input type="text" name="code" class="code-input code-mask code" id="code">
                        </div>
                        <button type="submit" class="btn btn-success mxa">Hello</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('verifyPhone.resend') }}" method="POST" >
                @csrf

                <div class="code-timer">
                    <input type="hidden" name="token" class="code-input code-mask code" id="code" value="{{ $token }}" >
                    <input type="hidden" name="phone_number" class="code-input code-mask code" id="code" value="{{ $phone_number }}">
                    <p class="grey-text">Запросить код повторно можно через <span id="code-timer"></span> секунд</p>
                    <button type="submit">Отправить код повторно</button>
                </div>
            </form>
        </div>
    </section>

@endsection
