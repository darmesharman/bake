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
                        <label class="col-md-4 col-form-label text-md-right">Company Profile</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input
                                    id="images"
                                    type="file"
                                    class="myfrm form-control"
                                    accept="image/*"
                                    name="profile_image"
                                    >
                                </div>
                            </div>
                        </div>
                        <label for="company_image" class="col-md-4 col-form-label text-md-right">Comapny Galleries</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input
                                    id="company_image"
                                    type="file"
                                    class="myfrm form-control"
                                    accept="image/*"
                                    name="company_images[]"
                                    multiple>
                                </div>
                            </div>
                        </div>

                    </div>

                    @foreach (['Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday', 'Saturday', 'Sunday'] as $index => $weekDay)
                        <div class="inline form-group">
                            <label>{{ $weekDay }}</label>
                            <input type="time" class="" name="start_times[]" >
                            <input type="time" class="without_ampm" name="end_times[]" >
                            <div class="form-group toggler fit large">
                                <input type="checkbox" id="enable_monday{{ $index }}" name="working[]" value="{{ $index }}">
                                <label for="enable_monday{{ $index }}"><span></span></label>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="inline form-group">
                        <label>Tuesday</label>
                        <input type="time" class="without_ampm" name="start_times[]" >
                        <input type="time" class="without_ampm" name="end_times[]" >
                        <div class="form-group toggler fit large">
                            <input type="checkbox" checked id="enable_tuesday" name="week_days[]" value="2">
                            <label for="enable_tuesday"><span></span></label>
                        </div>
                    </div>
                    <div class="inline form-group">
                        <label>Wednesday</label>
                        <input type="time" class="without_ampm" name="start_times[]" >
                        <input type="time" class="without_ampm" name="end_times[]" >
                        <div class="form-group toggler fit large">
                            <input type="checkbox" checked id="enable_wednesday" name="week_days[]" value="3">
                            <label for="enable_wednesday"><span></span></label>
                        </div>
                    </div>
                    <div class="inline form-group">
                        <label>Thursday</label>
                        <input type="time" class="without_ampm" name="start_times[]" >
                        <input type="time" class="without_ampm" name="end_times[]" >
                        <div class="form-group toggler fit large">
                            <input type="checkbox" checked id="enable_wednesday" name="week_days[]" value="4">
                            <label for="enable_thursday"><span></span></label>
                        </div>
                    </div>
                    <div class="inline form-group">
                        <label>Friday</label>
                        <input type="time" class="without_ampm" name="start_times[]" >
                        <input type="time" class="without_ampm" name="end_times[]" >
                        <div class="form-group toggler fit large">
                            <input type="checkbox" checked id="enable_firday" name="week_days[]" value="5">
                            <label for="enable_firday"><span></span></label>
                        </div>
                    </div>
                    <div class="inline form-group">
                        <label>Saturday</label>
                        <input type="time" class="without_ampm" name="start_times[]" >
                        <input type="time" class="without_ampm" name="end_times[]" >
                        <div class="form-group toggler fit large">
                            <input type="checkbox" checked id="enable_saturday" name="week_days[]" value="6">
                            <label for="enable_saturday"><span></span></label>
                        </div>
                    </div>
                    <div class="inline form-group">
                        <label>Sunday</label>
                        <input type="time" class="without_ampm" name="start_times[]" >
                        <input type="time" class="without_ampm" name="end_times[]" >
                        <div class="form-group toggler fit large">
                            <input type="checkbox" checked id="enable_sunday" name="week_days[]" value="0">
                            <label for="enable_sunday"><span></span></label>
                        </div>
                    </div> --}}

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

                        @foreach (range(0, 3) as $i)
                            <div class="form-group col-md-6">
                                <label class="btn icon bordered
                                @if ($i == 0)
                                    icon-vk
                                @elseif ($i == 1)
                                    icon-instagram
                                @elseif ($i == 2)
                                    icon-twitter
                                @elseif ($i == 3)
                                    icon-whatsapp
                                @endif
                                "
                                style=""></label>
                                <label for="inputPassword4">Link for sites</label>
                                <input type="text" class="form-control" name="social_media_links[]"
                                    placeholder="Link"
                                    value="{{ old('social_media_links' . $i) }}">
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

                    <button class="btn btn-successs mt-3">Add</button>

                </form>
            </div>
        </div>
    </div>
@endsection
