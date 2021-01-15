{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('registration.store') }}">
            @csrf

            <div>
                <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            </div>

            <div>
                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone_number" value="{{ __('Phone number') }}" />
                <x-jet-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="city" value="{{ __('City') }}" />
                <x-jet-input id="city" class="block mt-1 w-full" type="city" name="city" :value="old('city')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

@extends('layouts.guest')

@section('content')
    <section class="auth">
        <div class="wrapper">
            <div class="auth-wrapper">
                <form method="POST" action="{{ route('registration.store') }}" class="article large" id="register_form">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <h1></h1>
                    <p>Для регистрации введите, пожалуйста, следующие данные:</p>
                    <div class="form-group radio-toggler">
                        <input type="radio" id="register_user" name="role" value="user" checked>
                        <label for="register_user">Пользователь</label>
                        <input type="radio" id="register_company" name="role" value="company">
                        <label for="register_company">Компания</label>
                    </div>

                    <div class="grid-2">
                        <div class="line">
                            <div class="form-group">
                                <label for="register_name">Имя</label>
                                <input name="first_name" type="text" class="name-mask required" data-type="name" id="register_name" placeholder="Введите имя">
                            </div>
                            <div class="form-group">
                                <label for="register_suname">Фамилия</label>
                                <input name="last_name" type="text" class="name-mask required" data-type="surname" id="register_suname" placeholder="Введите фамилию">
                            </div>
                            <div class="form-group full">
                                <label for="register_city">Город или область</label>
                                <div class="select-wrapper">
                                    <input name="city" type="text" id="register_city" placeholder="Выберите город или область"   class="required" data-type="select">
                                    <ul class="select-dropdown"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="register_phone">Номер телефона</label>
                                <input name="phone_number" type="text" id="register_phone" class="phone-mask required" data-type="phone">
                            </div>
                            <div class="form-group">
                                <label for="register_email">Email</label>
                                <input name="email" type="text" id="register_email" placeholder="Введите email" class="required" data-type="email">
                            </div>
                            <div class="form-group">
                                <label for="register_password">Пароль</label>
                                <input name="password" type="password" id="register_password" placeholder="Введите пароль" class="required" data-type="password">
                            </div>
                            <div class="form-group">
                                <label for="register_password_confirm">Повторите пароль</label>
                                <input name="password_confirmation" type="password" id="register_password_confirm" placeholder="Введите пароль повторно" class="required" data-type="confirm_pass">
                            </div>
                        </div>
                    </div>
                    <div class="form-group checkbox fit">
                        <input name="agree" type="checkbox" id="register_agree" class="required" data-type="checkbox">
                        <label for="register_agree"><span>Я согласен с <a href="/privacy">политикой конфидициальности</a></span></label>
                    </div>
                    <button class="btn full large square" id="register_confirm">Зарегистрироваться</button>
                    <p class="mb0">Если Вы уже зарегистрированны, то <a href="/login">авторизируйтесь</a></p>
                </form>

                <div class="form-group confirm-code">
                    <div class="loading"></div>
                    <div class="confirm-code-wrapper article">
                        <h3>Верификация</h3>
                        <p class="grey-text">
                            Для защиты Вашего аккаунта мы отправили SMS с кодом на Ваш мобильный телефон. Это бесплатно.
                        </p>
                        <div class="code-input-wrapper">
                            <input type="text" class="code-input code-mask code" id="code">
                        </div>
                        <div class="code-timer">
                            <p class="grey-text">Запросить код повторно можно через <span id="code-timer"></span> секунд</p>
                            <a href="#" class="send-again dn">Отправить код повторно</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide white">
                <img src="/wp-content/themes/init/img/wave.svg">
                <ul>
                    <li class="icon-dashboard">
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
        </div>
    </section>
@endsection
