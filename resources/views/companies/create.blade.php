@extends('layouts.guest')

@section('title')
    Добавить компанию
@endsection

@section('content')
<div class="body">
    <div class="py-12">
        <div class="container">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-auto">
                    <label class="mb-2">Название</label>
                    <input type="text" name="name" class="form-control" id="staticEmail2" placeholder="Name"
                        value="{{ old('name') }}">
                </div>

                <div class="form-row">
                    <div class="col">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Категория</label>
                        <select class="custom-select mr-sm-2" name="category" id="inlineFormCustomSelect">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Подкатегория</label>
                        <select class="custom-select mr-sm-2" name="sub_category" id="inlineFormCustomSelect">
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label for="inputPassword4">Город или область</label>
                    <select class="custom-select mr-sm-2" name="city" id="inlineFormCustomSelect">
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="inputPassword4">Регион или район</label>
                    <select class="custom-select mr-sm-2" name="district" id="inlineFormCustomSelect">
                    </select>
                </div>

                <div class="form-group row">
                    <label for="company_image" class="col-md-4 col-form-label text-md-right">Comapny Image</label>
                    <div class="col-md-6">
                        <input id="company_image" type="file" class="form-control" accept="image/*" name="company_image"
                            >
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Описание</label>
                    <textarea class="form-control" name="description"
                        rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Краткое описание</label>
                    <textarea class="form-control" name="short_description"
                        rows="3">{{ old('short_description') }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone_numbers">Телефон</label>
                        <input type="text" name="phone_number" class="form-control"
                            placeholder="+7(_ _ _)_ _ _ - _ _ - _ _" value="{{ old('phone_number') }}">
                    </div>

                    @foreach (range(0, 2) as $i)
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Дополнительный телефон</label>
                            <input type="text" class="form-control" name="additional_phone_numbers[]"
                                placeholder="+7(_ _ _)_ _ _ - _ _ - _ _"
                                value="{{ old('additional_phone_numbers.' . $i) }}">
                        </div>
                    @endforeach
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone_number">Сайт</label>
                        <input type="text" class="form-control" name="site" value="{{ old('site') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">E-mail</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                </div>

                <button class="btn btn-success mt-3">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
