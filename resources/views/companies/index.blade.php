@extends('layouts.guest')
    @section('title')
    Компании
    @endsection
    @section('content')

        <section class="p archive">

            <div class="page-title">
                <div class="container">
                    <h1>@yield('title')</h1>
                </div>
            </div>

            <div class="page-content">
                <div class="container">

                    <div class="archive-content">

                        <div class="archive-body">
                            @foreach ($companies as $company)

                            <article class="catalog-item line">
                                <div class="content">

                                    <a href="{{ route('companies.show', $company) }}" class="image bg-cov" "
                                    @if ($company->profileImages->isNotEmpty())
                                        style="background-image: url( {{ asset($company->profileImages[0]->path) }} )"
                                    @endif
                                    >
                                        <div class="images-count icon-picture">{{ count($company->galleryImages) }}</div>
                                    </a>
                                    <div class="info">

                                        <div class="title">
                                            <h5 class="theme-hov"><a href="{{ route('companies.show', $company) }}" rel="bookmark">{{ $company->name }}</a></h5>
                                            <p class="icon-place">{{ $company->city->name }}</p>
                                        </div>

                                        <p class="desc">{{ $company->short_description }}</p>

                                        <div class="bottom">
                                            <div class="tags small square">
                                                <div class="line">
                                                    <a href="#" class="tag">{{ $company->category->name }}</a>
                                                    <a href="#" class="tag">{{ $company->city->name }}</a>
                                                </div>
                                            </div>
                                            <div class="rating">
                                                <ul class="star-rating">
                                                    <p style='display:none'>{{ $rating = $company->comments->avg('rating') }}</p>
                                                    <p style='display:none'>{{ $temp_rating = $rating }}</p>

                                                    @foreach (range(1, 5) as $star)
                                                        <li class="
                                                                @if ($temp_rating - 2 >= 0)
                                                                    active
                                                                    {{ $temp_rating -= 2 }}
                                                                @elseif ($temp_rating - 1 >= 0)
                                                                    half
                                                                    {{ $temp_rating -= 1 }}
                                                                @endif
                                                            "
                                                        >
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            <div class="total">

                                                <span class="grey-text">
                                                    {{ $rating ? number_format($rating / 2, 1) : '0.0' }}
                                                </span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                </article>
                                @endforeach
                        </div>


                        <div class="archive-sidebar article">

                            <div class="form-group">
                                <label for="archive_search">Поиск</label>
                                <div class="inline">
                                    <input type="text" id="archive_search" placeholder="Что вы ищите?">
                                    <button class="btn icon square icon-search input" id="archive_search_submit"></button>
                                </div>
                            </div>

                            <hr>

                            <h5>Фильтры</h5>

                            <div class="form-group">
                                <label for="category">Категория</label>
                                <div class="select-wrapper">
                                    <select class="dynamic-list required">
                                        @foreach ($cities as $city)  {{-- citiler => city --}}
                                            <option value="{{ $city->id }}">
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <ul class="select-dropdown">

                                    </ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subcategory">Подкатегория</label>
                                <div class="select-wrapper">
                                    <input type="text" id="subcategory" placeholder="Выберите подкатегорию" readonly disabled class="parent dynamic-list required" data-type="select" data-child="#city">
                                    <ul class="select-dropdown"></ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="city">Город или область</label>
                                <div class="select-wrapper">
                                    <input type="text" id="city" placeholder="Выберите город или область" readonly disabled class="parent dynamic-list show-all required" data-type="select" data-child="#district">
                                    <ul class="select-dropdown"></ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="district">Регион или район</label>
                                <div class="select-wrapper">
                                    <input type="text" id="district" placeholder="Выберите регион или район" readonly disabled class="dynamic-list parent required" data-type="select" data-child="#microdistrict">
                                    <ul class="select-dropdown"></ul>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="microdistrict">Микрорайон</label>
                                <div class="select-wrapper">
                                    <input type="text" id="microdistrict" placeholder="Выберите микрорайон" readonly disabled class="dynamic-list required" data-type="select">
                                    <ul class="select-dropdown"></ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

