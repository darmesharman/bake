<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/fav.png') }}" />
        <link rel="profile" href="https://gmpg.org/xfn/11">

        @livewireStyles
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/theme.css">

        <script src="jquery/1.9.1/jquery.js"></script>
    </head>
    <body class="font-sans antialiased">

    <div class="preloader" id="dashboard_preloader">
        <div class="preloader-wrapper">
            <div class="preloader-content">

                <div class="spinner-wrapper">
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>

                <svg>
                    <defs>
                        <filter id="goo">
                            <feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur"></feGaussianBlur>
                            <feColorMatrix in="blur" mode="matrix" values="
                                1 0 0 0 0
                                0 1 0 0 0
                                0 0 1 0 0
                                0 0 0 25 -8" result="goo"></feColorMatrix>
                            <feBlend in="SourceGraphic" in2="goo"></feBlend>
                        </filter>
                    </defs>
                </svg>

            </div>
            <span>mykid.init.kz</span>
        </div>
    </div>
<section class="dashboard">

    <div class="notifications"></div>

    <div class="dashboard-sidebar">

        <div class="d-tabs">

            <a href="/" class="logo-tab icon-analytics"></a>

            <nav>
                <ul>
                    <li class="d-tab show-s-window icon-avatar" data-sidebar="dashboard">Кабинет</li>
                    <li class="d-tab show-s-window icon-archive" data-sidebar="company">Компании</li>
                    <li class="d-tab show-s-window icon-chat" data-sidebar="reviews">Отзывы</li>
                    <li class="d-tab show-s-window icon-wallet" data-sidebar="payments">Платежи</li>
                    <li class="d-tab show-s-window icon-help" data-sidebar="help">Помощь</li>
                </ul>
            </nav>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <li><button type="submit" class="d-tab icon-off">Выйти</button></li>
            </form>
        </div>

        <div class="links">

            <div class="links-top">

                <div class="sidebar-window show-always">

                    <h5 class="links-header mb0">Уведомления</h5>

                    <div class="last-notifs">

                        <a href="#" class="item">
                            <div class="avatar">Ж</div>
                            <div class="text">
                                <div class="header">
                                    <h5>Жан Ильяс</h5>
                                    <div class="time">12 минут назад</div>
                                </div>
                                <p>Оставил комментарий на фотографии</p>
                            </div>
                        </a>

                        <a href="#" class="item">
                            <div class="avatar">Ж</div>
                            <div class="text">
                                <div class="header">
                                    <h5>Жан Ильяс</h5>
                                    <div class="time">12 минут назад</div>
                                </div>
                                <p>Оставил комментарий на фотографии</p>
                            </div>
                        </a>

                        <a href="#" class="item">
                            <div class="avatar">Ж</div>
                            <div class="text">
                                <div class="header">
                                    <h5>Жан Ильяс</h5>
                                    <div class="time">12 минут назад</div>
                                </div>
                                <p>Оставил комментарий на фотографии</p>
                            </div>
                        </a>

                        <a href="#" class="item">
                            <div class="avatar">Ж</div>
                            <div class="text">
                                <div class="header">
                                    <h5>Жан Ильяс</h5>
                                    <div class="time">12 минут назад</div>
                                </div>
                                <p>Оставил комментарий на фотографии</p>
                            </div>
                        </a>

                        <a href="/notifications" class="watch-all">Посмотреть все уведомления</a>

                    </div>

                </div>

                <div class="sidebar-window" data-name="dashboard">

                    <h5 class="links-header mb0">Кабинет <div class="close-window icon-close"></div></h5>

                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}" class="active">
                                <h6>Главная</h6>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('profile.show') }}">
                                <h6>Редактировать профиль</h6>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            </a>
                        </li>

                        <li>
                            <a href="/dashboard/favourite/">
                                <h6>Избранные</h6>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            </a>
                        </li>
                    </ul>

                </div>

                <div class="sidebar-window" data-name="company">

                    <h5 class="links-header mb0">Компании <div class="close-window icon-close"></div></h5>

                    <ul>
                        <li>
                            <a href="/dashboard/my-companies">
                                <h6>Мои компании</h6>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/requisites/">
                                <h6>Реквизиты</h6>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/members/">
                                <h6>Наши сотрудники</h6>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-window" data-name="reviews">

                    <h5 class="links-header mb0">Кабинет <div class="close-window icon-close"></div></h5>

                    <ul>
                        <li>
                            <a href="/dashboard/reviews/">
                                <h6>Мои отзывы</h6>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-window" data-name="payments">

                    <h5 class="links-header mb0">Кабинет <div class="close-window icon-close"></div></h5>

                    <ul>
                        <li>
                            <a href="/dashboard/payments/">
                                <h6>Платежи</h6>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-window" data-name="help">

                    <h5 class="links-header mb0">Помощь <div class="close-window icon-close"></div></h5>

                    <div class="help-block article">
                        <p>Если у вас есть вопросы, Вы можете обратиться в службу поддержки</p>
                        <button class="btn full square">Служба поддержки</button>
                    </div>
                </div>

            </div>

            <div class="user-balance">
                <form class="article-sm rel z1 article-sm">
                    <h5 class="icon-wallet">0 тг.</h5>
                    <p class="grey-text">Баланс на вашем счету</p>
                    <div class="form-group">
                        <div class="input-wrapper">
                            <div class="icon">тг.</div>
                            <input type="text" class="price-mask required" data-type="balance" placeholder="0">
                        </div>
                    </div>
                    <button class="btn small square full large balance-btn">Пополнить счет</button>
                </form>
            </div>

        </div>
    </div>

    <div class="dashboard-body">

        <a href="/add-company" class="fixed-btn icon-plus"></a>

        <div class="dashboard-header">

            <button class="btn icon bordered square large icon-search dashboard-search mra"></button>

            <nav class="lg-text">
                <ul>
                    <li><a href="{{ route('dashboard') }}" class="active">Главная</a></li>
                    <li><a href="{{ route('profile.show') }}">Редактировать профиль</a></li>
                    <li><a href="#">Избранные</a></li>
                    <li><a href="#">Мои отзывы</a></li>
                </ul>
            </nav>

            <div class="dashboard-user-block rel toggle-dropdown">

                <div class="content icon-user">
                    <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                </div>

                <div class="d-dropdown">

                    <div class="user-info">
                        <div class="avatar">Т</div>
                        <div class="text">
                            <h6>Тест Тест</h6>
                            <p class="grey-text">{{ Auth::user()->phone_number }}</p>
                            <div class="label theme">Пользователь</div>
                        </div>
                    </div>

                    <ul>
                        <li><a href="{{ route('dashboard') }}" class="icon-user">Личный кабинет</a></li>
                        <li><a href="#" class="icon-archive">Мои компании</a></li>
                        <li><a href="#" class="icon-inbox">Заявки</a></li>
                    </ul>

                    <ul>
                        <li><a href="{{ route('profile.show') }}" class="icon-edit">Редактировать профиль</a></li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <li><a type="submit" class="icon-off red">Выйти из аккаунта</a></li>
                        </form>

                    </ul>

                </div>

            </div>

        </div>

        <div class="dashboard-content article-lg">
            @yield('content')
        </div>
    </div>
</section>
<script type="text/javascript" id="my-script-js-extra">
/* <![CDATA[ */
var dropParam = {"upload":"https:\/\/mykid.init.kz\/wp-admin\/admin-ajax.php?action=handle_dropped_media","delete":"https:\/\/mykid.init.kz\/wp-admin\/admin-ajax.php?action=handle_delete_media"};
/* ]]> */
</script>
<script type="text/javascript" src="https://mykid.init.kz/wp-content/themes/init/js/scripts/custom/uploader.js?ver=5.6" id="my-script-js"></script>
<script type="text/javascript" src="https://mykid.init.kz/wp-content/themes/init/js/scripts.js" id="init-scripts-js"></script>
<script type="text/javascript" src="https://mykid.init.kz/wp-includes/js/wp-embed.min.js?ver=5.6" id="wp-embed-js"></script>


<div id="wt-sky-root"></div>

    </body>
</html>
