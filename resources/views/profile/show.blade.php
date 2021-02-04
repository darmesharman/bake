@extends('layouts.app')

    @section('content')

        <div class="dashboard-content article-lg">

            <div class="d-block edit-profile">
                <div class="d-block-header"><h2 class="mb0">Редактировать профиль</h2></div>
                <form class="d-block-body article" id="edit_profile_form" action="{{ route('user-profile-information.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="grid-2">
                        <div class="line">
                            <div class="form-group">
                                <label for="first_name">Имя</label>
                                <input name="first_name" type="text" id="first_name" placeholder="Введите имя" class="required name-mask" data-type="name" value="{{ Auth::user()->first_name }}">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Фамилия</label>
                                <input name="last_name" type="text" id="last_name" placeholder="Введите фамилию" class="required name-mask" data-type="surname" value="{{ Auth::user()->last_name }}">
                            </div>
                            <div class="form-group full">
                                <label for="city">Город или область</label>
                                <select class="select-wrapper">
                                    @foreach ($cities as $city)
                                        <option data-id="11" value={{ $city->id }}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Номер телефона</label>
                                <input name="phone_number" type="text" id="phone_number" class="phone-mask required" data-type="phone" value="{{ Auth::user()->phone_number }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="text" id="email" placeholder="Введите Email" class="required" data-type="email" value="{{ Auth::user()->email }}">
                            </div>
                        <button class="btn full large square" id="save_edit_profile">Сохранить</button>
                </form>
                            <form action="{{ route('user-password.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="current_password">Старый пароль</label>
                                    <input name="current_password" type="password" id="current_password" placeholder="Введите cтарый пароль">
                                </div>

                                <div class="form-group">
                                    <label for="password">Новый пароль</label>
                                    <input name="password" type="password" id="password" placeholder="Введите новый пароль">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Повторите пароль</label>
                                    <input name="password_confirmation" type="password" id="password_confirmation" placeholder="Повторите новый пароль">
                                </div>
                                <button class="btn full large square" id="save_edit_profile">Сохранить</button>
                            </form>
                        </div>
                    </div>
            </div>

        </div>
@endsection
