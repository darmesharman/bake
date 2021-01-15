@extends('layouts.guest')

@section('content')
<form action="{{ route('verifyPhone.postVerify') }}" method="POST">
    @csrf

    <div class="form-group confirm-code">
        <div class="confirm-code-wrapper article">
            <h3>Верификация</h3>
            <p class="grey-text">
                Для защиты Вашего аккаунта мы отправили SMS с кодом на Ваш мобильный телефон. Это бесплатно.
            </p>
            <div class="code-input-wrapper">
                <input type="text" name="token" class="code-input code-mask code" id="code" value="{{ $token }}" >
                <input type="text" name="phone_number" class="code-input code-mask code" id="code" value="{{ $phone_number }}">
                <input type="text" name="code" class="code-input code-mask code" id="code">
            </div>
            <button type="submit">hello</button>
        </div>
    </div>
</form>

<form action="{{ route('verifyPhone.resend') }}" method="POST">
    @csrf

    <div class="code-timer">
        <input type="text" name="token" class="code-input code-mask code" id="code" value="{{ $token }}" >
        <input type="text" name="phone_number" class="code-input code-mask code" id="code" value="{{ $phone_number }}">
        <p class="grey-text">Запросить код повторно можно через <span id="code-timer"></span> секунд</p>
        <button type="submit">Отправить код повторно</button>
    </div>
</form>
@endsection
