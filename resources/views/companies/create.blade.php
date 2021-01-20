@extends('layouts.guest')
    @section('content')
        <div class="body">
            <div class="py-12">
                <div class="container">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-auto">
                            <label class="mb-2">Название</label>
                            <input type="text" name="name" class="form-control" id="staticEmail2" placeholder="Name" required value="{{ old('name') }}">
                            @error('name')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Категория</label>
                                <select class="custom-select mr-sm-2" name="category" id="inlineFormCustomSelect">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            @error('category')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror

                            <div class="col">
                                <label class="mr-sm-2" for="inlineFormCustomSelect">Подкатегория</label>
                                <select class="custom-select mr-sm-2" name="sub_category" id="inlineFormCustomSelect">
                                </select>
                            </div>

                            @error('sub_category')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="inputPassword4">Город или область</label>
                            <select class="custom-select mr-sm-2" name="city" id="inlineFormCustomSelect">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @error('city')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="inputPassword4">Регион или район</label>
                            <select class="custom-select mr-sm-2" name="region" id="inlineFormCustomSelect">
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">
                                        {{ $region->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @error('region')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group row">
                            <label for="company_image" class="col-md-4 col-form-label text-md-right">Comapny Image</label>
                            <div class="col-md-6">
                                <input
                                    id="company_image"
                                    type="file"
                                    class="form-control"
                                    accept="image/*"
                                    name="company_image"
                                    required
                                >
                            </div>
                        </div>
                        @error('company_image')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Описание</label>
                            <textarea class="form-control" name="description"  rows="3">{{ old('description') }}</textarea>
                        </div>

                        @error('description')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Краткое описание</label>
                            <textarea class="form-control" name="short_description" rows="3">{{ old('short_description') }}</textarea>
                        </div>

                        @error('short_description')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone_number">Телефон</label>
                                <input type="text" name="numbers[]" class="form-control"  placeholder="+7(_ _ _)_ _ _ - _ _ - _ _">
                            </div>

                            @error('numbers')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror

                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Дополнительный телефон</label>
                                <input type="text" class="form-control" name="numbers[]"  placeholder="+7(_ _ _)_ _ _ - _ _ - _ _">
                            </div>

                            @error('numbers')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror

                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone_number">Сайт</label>
                                <input type="text" class="form-control" name="site">
                            </div>

                            @error('site')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror

                            <div class="form-group col-md-6">
                                <label for="inputPassword4">E-mail</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            @error('email')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                          </div>


                        <button class="btn btn-success mt-3">Add</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection

