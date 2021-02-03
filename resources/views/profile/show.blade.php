<<<<<<< HEAD
@extends('layouts.app')

    @section('content')

        <div class="dashboard-content article-lg">

    <div class="d-block edit-profile">
        <div class="d-block-header"><h2 class="mb0">Редактировать профиль</h2></div>
        <form class="d-block-body article" id="edit_profile_form">
            <div class="grid-2">
                <div class="line">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input name="name" type="text" id="name" placeholder="Введите имя" class="required name-mask" data-type="name" value="Тест">
                    </div>
                    <div class="form-group">
                        <label for="surname">Фамилия</label>
                        <input name="surname" type="text" id="surname" placeholder="Введите фамилию" class="required name-mask" data-type="surname" value="Тест">
                    </div>
                    <div class="form-group full">
                        <label for="city">Город или область</label>
                        <div class="select-wrapper">
                            <input name="city" type="text" id="city" placeholder="Выберите город или область" readonly="" class="required" data-type="select" value="Алматы">
                            <ul class="select-dropdown"><li data-id="11">Алматинская область</li><li data-id="13">Алматы</li><li data-id="29">Нур-Султан</li></ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Номер телефона</label>
                        <input name="phone" type="text" id="phone" class="phone-mask required" data-type="phone" value="+7 (747) 499-12-03" placeholder="+7 (747) 499-12-03">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="text" id="email" placeholder="Введите Email" class="required" data-type="email" value="test@init.kz">
                    </div>
                    <div class="form-group">
                        <label for="password">Новый пароль</label>
                        <input name="password" type="password" id="password" placeholder="Введите новый пароль">
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Повторите пароль</label>
                        <input name="password_confirm" type="password" id="password_confirm" placeholder="Повторите новый пароль">
                    </div>
                </div>
            </div>
            <button class="btn full large square" id="save_edit_profile">Сохранить</button>
        </form>
    </div>

            </div>
@endsection
=======
    <div class="dashboard-content article-lg">
        <div class="d-block edit-profile">
            <div class="d-block-header"><h2 class="mb0">Редактировать профиль</h2></div>
            <form class="d-block-body article" id="edit_profile_form" action="{{ route('user.update')}}" method="POST">
                @csrf
                @method('PUT')
                    <div class="grid-2">
                        <div class="line">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input name="first_name" type="text" id="name" placeholder="Введите имя" class="required name-mask" data-type="name" value="{{ Auth::user()->first_name }}">
                            </div>
                            <div class="form-group">
                                <label for="surname">Фамилия</label>
                                <input name="last_name" type="text" id="surname" placeholder="Введите фамилию" class="required name-mask" data-type="surname" value="{{ Auth::user()->last_name }}">
                            </div>
                            <div class="form-group full">
                                <label for="city">Город или область</label>
                                <div class="select-wrapper">
                                    <select>
                                        @foreach ($cities as $city)
                                            <option value={{ $city->id }} >{{ $city->name }}</option>
                                        @endforeach

                                    </select>
                                    <ul class="select-dropdown"><li data-id="11">Алматинская область</li>

                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Номер телефона</label>
                                <input name="phone_number" type="text" id="phone" class="phone-mask required" data-type="phone" value="{{ Auth::user()->phone_number }}" placeholder="+7 (747) 499-12-03">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="text" id="email" placeholder="Введите Email" class="required" data-type="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Старый пароль</label>
                                <input name="old_password" type="password" id="password" placeholder="Введите старый пароль">
                            </div>
                            <div class="form-group">
                                <input name="old_password" type="hidden" id="password" placeholder="Введите старый пароль">
                            </div>
                            <div class="form-group">
                                <label for="password">Новый пароль</label>
                                <input name="password" type="password" id="password" placeholder="Введите новый пароль">
                            </div>
                            <div class="form-group">
                                <label for="password_confirm">Повторите пароль</label>
                                <input name="password_confirm" type="password" id="password_confirm" placeholder="Повторите новый пароль">
                            </div>
                        </div>
                    </div>
                    <button class="btn full large square" id="save_edit_profile">Сохранить</button>
            </form>
        </div>
    </div>
>>>>>>> b7370e0300254836f02b6396e64d846ae4fb1bc5
