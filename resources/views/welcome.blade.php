@extends('layouts.guest')

@section('content')
<form action="{{ route('companies.index') }}" method="GET">
    <section class="first-slide bg-cov rel" style="background-image: url()">
        <div class="mask stretch-a"></div>
        <div class="container">
            <div class="wrapper">
                <h1>Каталог детских организации</h1>
                <p class="grey-text mg-text">Детские сады, образовательные центры, спортивные кружки и многое другое.</p>
                <div class="fs-search mb3 mt3">
                    <div class="search-fields">
                        <select name="sitiID" class="dynamic-list required">
                            <option value=""></option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ Request::input('sitiID') == $city->id ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
                        </select>
                        <select name="distID" class="dynamic-list required">
                            <option value=""></option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}" {{ Request::input('distID') == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                        <select name="kategoriID" class="dynamic-list required">
                            <option value=""></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ Request::input('kategoriID') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn lg-text input">Поиск</button>
                </div>
                <p class="grey-text">Или выберите популярные категории:</p>
                <div class="tags small theme">
                    <div class="line">
                        @foreach($categories as $category)
                            <a href="{{ route('companies.index', ['kategoriID' => $category->id]) }}" class="tag">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<section class="companies p">
    <div class="container">
        <div class="wrapper article-bg">
            <div class="tac article">
                <h3 class="section-title">Каталог</h3>
                <div class="tabs center">
                    <div class="tab active">Популярные</div>
                    <div class="tab">Лучшие</div>
                    <div class="tab">Новые</div>
                    <div class="tab">Все</div>
                </div>
            </div>
            <div class="companies-slider slick-m">

                @foreach ($companies as $company)
                        <a href="{{ route('companies.show', $company) }}" class="company-item bg-cov rel db"
                        @if ($company->profileImages->isNotEmpty())
                            style="background-image: url(
                                {{ asset($company->profileImages[0]->path) }}
                                );"
                        @endif
                        >
                        <div class="stretch-a mask"></div>
                        <div class="content">
                            <div class="tags-icon">
                                <div class="line">
                                    <div class="tag icon-check no-hov">Верифицирован</div>
                                </div>
                            </div>
                            <div class="rating">{{ $company->rating }}</div>
                            <div class="text white">
                                <h5>Детский сад {{ $company->name }}</h5>
                                <p class="grey-text lg-text">{{ $company->city->name }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</section>

<section class="p-lg white rel bg-fix">
    <div class="blackout-a"></div>
    <div class="container">
        <div class="grid-2 wrapper rel z2">
            <div class="line">
                <div class="article">
                    <h2>Streamline Your Business</h2>
                    <p class="lg-text">We’re full-service, local agents who know how to find people and home each together. We use online tools with an unmatched search capability to make you smarter and faster.</p>
                    <button class="btn">Начать сотрудничество</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p">
    <div class="container">
        <div class="wrapper article-bg">
            <div class="article tac">
                <h2 class="section-title">Последние события</h2>
                <p class="lg-text grey-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo ducimus minus voluptates.</p>
            </div>
            <div class="grid-3">
                <div class="line">
                @foreach ($blogs as $blog)
                    <div class="blog-card rel white">
                        <div class="tags abs z3 small theme">
                            <div class="line">
                                @foreach ($blog->tags as $tag)
                                    <a class="tag" href="#">{{ $tag->name }}</a>
                                @endforeach

                            </div>
                        </div>
                        <div class="image bg-cov stretch-a" style="background-image: url({{ asset($blog->blogImage->path) }})"></div>
                        <a href="#" class="content-wrapper db rel z2 grey static">
                            <div class="content article-sm">
                                <div class="date highlight no-hov grey small">{{ date_format($blog->created_at, 'Y-m-d') }}</div>
                                <h4>{!! $blog->title !!}</h4>
                                <p>{!! substr($blog->content, 0, 100) !!}</p>
                            </div>
                        </a>
                    </div>
                @endforeach


                </div>
            </div>
            <a href="{{ route('blogs.index') }}" class="btn bordered-theme mxa large">Смотреть все</a>
        </div>
    </div>
</section>
@endsection


