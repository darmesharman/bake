@extends('layouts.guest')

@section('content')
<section class="company">
    <div class="company-header">
        @if(count($company->galleryImages) > 4){
            <div class="company-header-image">
                <div class="company-header-slider">
                    @foreach($company->galleryImages as $image)
                        <div class="image" style="background-image: url({{ asset($image->path) }})">
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            @foreach($company->galleryImages as $image)
                <div class="company-header-image bg-cov" style="background-image: url({{ asset($image->path) }})">
            @endforeach
        @endif

        <div class="top-bar-wrapper">
            <div class="container">
                <div class="top-bar df aie">
                    <div class="company-avatar">
                        <div class="image bg-cov"
                            @if($company->profileImages->isNotEmpty())
                                style="background-image: url( {{ asset($company->profileImages[0]->path) }})"
                            @endif
                        >
                        </div>
                    </div>

                    <div class="top-bar-info df aic jcsb fg white">
                        <div class="company-info">
                            <h1>{{ $company->name }}</h1>
                            <p class="icon-place">{{ $company->city->name }}</p>
                        </div>
                        <div class="btns">
                            <div class="line">
                                <button class="btn icon-share dashed">Поделиться</button>
                                <a href="#respond" class="anchor btn icon-chat green-theme">Написать отзыв</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="company-content">
        <div class="bottom-bar-wrapper">
            <div class="container">
                <div class="bottom-bar df jcsb aic">
                    <div class="stats">
                        <div class="item">
                            <div class="stats-icon">{{ $company->rating() }}
                            </div>
                            <div class="text">
                                <h6>Рейтинг</h6>
                                <div>
                                    <div class="icon-warning show-reviews-count toggle-dropdown">
                                        <div class="def-dropdown center">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="stats-icon icon-watch"></div>
                            <div class="text">

                            </div>
                        </div>
                    </div>
                    <button class="btn icon-send">Оставить заявку</button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="wrapper">
                <div class="body">
                    <div class="watch-video icon-play single-block">
                        <h6 class="mb0">Посмотрите видео про наш детский сад</h6>
                        <button class="btn bordered-theme small">Смотреть видео</button>
                    </div>

                    <div class="single-block slider-wrapper">
                        <div class="main-slider">
                            <div class="image" style="background-image: url({{ asset($company->company_image) }} )">
                            </div>
                        </div>
                    </div>

                    <div class="single-block big">
                        <h3 class="sb-header icon-file">Описание</h3>
                        <div class="sb-content article">
                            {{ $company->description }}
                        </div>
                    </div>

                    <div class="single-block big pricing">
                        <div class="sb-header icon-coins">Заголовок группы цен</div>
                        <div class="sb-content">
                            <div class="pricing-item">
                                <div class="text">
                                    <h6>Заголовок тарифа</h6>
                                    <p>Краткое описание тарифа</p>
                                </div>
                                <div class="price highlight static small">12 000 тг.</div>
                            </div>
                            <div class="pricing-item">
                                <div class="text">
                                    <h6>Заголовок тарифа</h6>
                                    <p>Краткое описание тарифа</p>
                                </div>
                                <div class="price highlight static small">12 000 тг.</div>
                            </div>
                            <div class="pricing-item">
                                <div class="text">
                                    <h6>Заголовок тарифа</h6>
                                    <p>Краткое описание тарифа</p>
                                </div>
                                <div class="price highlight static small">12 000 тг.</div>
                            </div>
                            <div class="pricing-item">
                                <div class="text">
                                    <h6>Заголовок тарифа</h6>
                                    <p>Краткое описание тарифа</p>
                                </div>
                                <div class="price highlight static small">12 000 тг.</div>
                            </div>
                        </div>
                    </div>

                    <div class="single-block single-map">
                        <script
                            src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=924d50da-b264-47e5-83a8-394475783990"
                            type="text/javascript"></script>

                    </div>


                </div>
                <div class="aside">
                    <div class="single-block big schedule">
                        <div class="schedule-header icon-time">

                        </div>
                        <div class="schedult-content">
                            <ul class="parameters-list">
                            </ul>
                        </div>
                        <div class="toggle-schedule">+ Показать полное расписание</div>
                    </div>

                    <div class="single-block big contacts">
                        <h3 class="sb-header icon-phone-call mb0">Контакты</h3>
                        <div class="sb-content no-p">
                            <p class="icon-place">{{ $company->city->name }}</p>
                            <p class="icon-view">Просмотры: {{ $company->views }}</p>
                        </div>
                    </div>

                    <div class="single-block big social">
                        <h3 class="sb-header icon-networking">Соц. сети</h3>
                        <div class="sb-content">
                            <div class="social-links">
                                {{ $company->site }}
                            </div>
                        </div>
                    </div>

                    <div class="single-block big">
                        <h3 class="sb-header icon-search">Ключевые слова</h3>
                        <div class="sb-content">
                            <div class="tags small square">
                                <div class="line">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-block big sticky">
                        <h3 class="sb-header icon-star sticky">Рейтинг</h3>
                        <div class="sb-content article">
                            <a href="#respond" class="btn bordered small ma anchor">Оставить отзывы</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="single-block big" id="reviews">
                <div class="sb-header icon-reviews">Отзывы и оценки</div>
                <div class="sb-content">
                    @foreach($company->comments as $comment)
                        <div id="comments" class="comments-area reviews-list">

                            <!-- #comment-## -->

                            <div class="item" id="comment-13">
                                <div class="avatar"
                                    style="background-image: url(https://secure.gravatar.com/avatar/e35086937b77462150c8144ce6867e94?s=96&amp;d=identicon&amp;r=g)">
                                </div>
                                <div class="review-content article">
                                    <div class="top">
                                        <div class="text">
                                            <h5>{{ $comment->user->last_name . ' ' . $comment->user->first_name }}
                                            </h5>
                                            <div class="date">{{ $comment->created_at }}</div>
                                        </div>
                                        <ul class="star-rating highlight">
                                            {{-- need JS --}}
                                            <p style='display:none'>{{ $rating = $comment->rating }}</p>
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
                                    </div>
                                    <div class="middle article-sm grey-text">
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                    <form method="POST"
                                        action="{{ route('comments.like', [$company, $comment]) }}">
                                        @csrf

                                        <div class="bottom btns sb bm">
                                            <div class="line">
                                                <button class="btn bordered small icon-like @auth {{ $comment->isLikedBy(Auth::user()) ? 'bg-warning' : '' }} @endauth">
                                                    Like
                                                    {{ $comment->likesNumber() }}
                                                </button>


                                                <a rel="nofollow"
                                                    class="comment-reply-link btn bordered-theme small icon-forward"
                                                    href="https://mykid.init.kz/company/%D0%A0%D0%BE%D0%BC%D0%B0%D1%88%D0%BA%D0%B0/?replytocom=13#respond"
                                                    data-commentid="13" data-postid="263"
                                                    data-belowelement="div-comment-13" data-respondelement="respond"
                                                    data-replyto="Комментарий к записи Жан Ильяс"
                                                    aria-label="Комментарий к записи Жан Ильяс">Ответить</a>
                                            </div>
                                        </div>
                                    </form>

                                    @auth
                                        @if(Auth::user()->hasComment($comment))
                                            <div class="bottom btns sb bm">
                                                <div class="line">
                                                    <form
                                                        action="{{ route('comments.edit', [$company, $comment]) }}"
                                                        method="GET">

                                                        <button class="btn bordered small">Edit</button>
                                                    </form>
                                                    <form method="POST"
                                                        action="{{ route('comments.destroy', [$company, $comment]) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <input type="hidden" value="{{ $company->id }}" name="company">
                                                        <button class="btn bordered small">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    @endauth
                                </div>

                            </div>

                            <!-- #comment-## -->
                        </div>

                    @endforeach
                </div>

            </div>
        </div>
        @auth
            <form method="POST" action="{{ route('comments.store', $company) }}">
                @csrf
                <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">
                        Оцените нас и напишите отзыв
                    </h3>
                    <p class="comment-form-comment"><label for="comment">Комментарий</label>
                        <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525"
                            required="required">{{ old('comment') }}</textarea>
                    </p>
                    @error('comment')
                        <p>{{ $message }}</p>
                    @enderror
                    <label for="rating">Ваша оценка</label>

                    <fieldset class="comments-rating">
                        <div class="rating-container">
                            @foreach(range(1, 10) as $rating)
                                <div class="rating-item">
                                    <input type="radio" id="rating-1" name="rating" value="{{ $rating }}">
                                    <label for="rating-1" class="icon-star"><i class="icon-star-solid"></i></label>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>
                    @error('rating')
                        <p>{{ $message }}</p>
                    @enderror
                    <p class="form-submit">
                        <input name="submit" type="submit" id="submit" class="submit" value="Отправить комментарий">
                    </p>
                </div>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth

    </div>

    <form action="{{ route('companies.destroy', $company) }}" method="POST">
        @csrf

        <button>DELETE</button>
    </form>
</section>

@endsection
