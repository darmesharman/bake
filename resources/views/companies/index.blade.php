@extends('layouts.guest')

@section('title')
Компании
@endsection

@section('content')

<section class="p archive">

    <div class="page-title">
        <div class="container">
            @yield('title')
        </div>
    </div>

    <div class="page-content">
        <div class="container">

            <div class="archive-content">

                <div class="archive-body">
                    @forelse($companies as $company)

                        <article class="catalog-item line">
                            <div class="content">

                                <a href="{{ route('companies.show', $company) }}" class="image bg-cov" "
                                @if ($company->profileImages->isNotEmpty())
                                    style="background-image: url( {{ asset($company->profileImages[0]->path) }} )"
                                @endif
                                >
                                    <div class="images-count icon-picture">{{ $company->company_images_count }}</div>
                                </a>
                                <div class="info">

                                    <div class="title">
                                        <h5 class="theme-hov">
                                            <a href="{{ route('companies.show', $company) }}"
                                                rel="bookmark">
                                                {{ $company->name }}
                                            </a>
                                        </h5>
                                        <p class="icon-place">{{ $company->city->name }}</p>
                                    </div>

                                    <p class="desc">
                                        @if (strlen($company->short_description) > 100)
                                            {{ substr($company->short_description, 0, 100) }} <span style="color: silver">...</span>
                                        @else
                                            {{ $company->short_description }}
                                        @endif

                                    </p>

                                    <div class="bottom">
                                        <div class="tags small square">
                                            <div class="line">
                                                <a href="#" class="tag">{{ $company->category->name }}</a>
                                                <a href="#" class="tag">{{ $company->city->name }}</a>
                                            </div>
                                        </div>
                                        <div class="rating">
                                            <ul class="star-rating">
                                                {{-- need JS --}}
                                                <p style='display:none'>{{ $rating = $company->rating }}</p>
                                                @foreach(range(1, 5) as $star)
                                                    <li class="
                                                        @if($rating - 2 >= 0)
                                                                active
                                                                {{ $rating -= 2 }}
                                                        @elseif($rating - 1 >= 0)
                                                                half
                                                                {{ $rating -= 1 }}
                                                        @endif
                                                        ">
                                                    </li>
                                                @endforeach
                                                {{-- need JS --}}
                                            </ul>
                                            <div class="total">
                                                <span class="grey-text">{{ $company->rating }}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </article>
                    @empty
                        <div class="text-center border">clear</div>
                    @endforelse
                </div>

                <div class="archive-sidebar article">

                    <form action="{{ route('companies.index') }}" method="get">
                        @csrf
                        <div class="form-group">
                            <label for="archive_search">Поиск</label>
                            <div class="inline">
                                <input name="searchByName" type="text" id="archive_search" value="{{ Request::input('searchByName') }}" placeholder="Что вы ищите?">
                                <button type="submit" class="btn icon square icon-search input" id="archive_search_submit"></button>
                            </div>
                        </div>

                        <hr>

                        <h5>Фильтры</h5>

                        @livewire('category-select')

                        @livewire('city-select')

                        <button type="submit" class="btn btn-primary mxa">
                            Отфильтровать
                        </button>
                    </form>

                    <form action="{{ route('companies.index') }}" method="get">
                        <button type="submit" class="btn btn-primary mxa">
                            Очистить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
