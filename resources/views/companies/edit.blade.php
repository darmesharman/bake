@extends('layouts.guest')

@section('content')
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

        <form action="{{ route('companies.update', $company) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="col-auto">
                <label class="mb-2">Название</label>
                <input type="text" name="name" class="form-control" id="staticEmail2" placeholder="Name"
                    value="{{ $company->name }}">
            </div>

            <div class="form-row">
                <div class="col">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Категория</label>
                    <select class="custom-select mr-sm-2" name="category" id="inlineFormCustomSelect">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if ($company->hasCategory($category))
                                    selected
                                @endif
                            >
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
                        <option value="{{ $city->id }}"
                            {{ $city->name}}
                            @if ($company->hasCity($city))
                                selected
                            @endif
                        >
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input
                            id="images"
                            type="file"
                            class="myfrm form-control"
                            accept="image/*"
                            name="company_images[]"
                            required
                            multiple >
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Описание</label>
                <textarea class="form-control" name="description" rows="3">{{ $company->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Краткое описание</label>
                <textarea class="form-control" name="short_description"
                    rows="3">{{ $company->short_description }}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone_numbers">Телефон</label>
                    <input type="text" name="phone_number" class="form-control"
                        placeholder="+7(_ _ _)_ _ _ - _ _ - _ _" value="{{ $company->phone_number }}">
                </div>

                @foreach ($company->additional_phone_numbers as $additional_phone_number)
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Дополнительный телефон</label>
                        <input type="text" class="form-control" name="additional_phone_numbers[]"
                            placeholder="+7(_ _ _)_ _ _ - _ _ - _ _"
                            value="{{ $additional_phone_number->phone_number }}">
                    </div>
                @endforeach
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone_number">Сайт</label>
                    <input type="text" class="form-control" name="site" value="{{ $company->site }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputPassword4">E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{ $company->email }}">
                </div>
            </div>
        </div>

        <button class="btn btn-success mt-3">Update</button>
    </form>
</div>
</div>
        <script type="text/javascript">
            $(function() {
            // Multiple images preview with JavaScript
                var previewImages = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#company_images').on('change', function() {
            previewImages(this, 'div.images-preview-div');
            });
            });
        </script>
    @endsection


