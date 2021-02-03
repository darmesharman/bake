<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/fav.png') }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/theme.css">


        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
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

            <a href="https://mykid.init.kz/wp-login.php?action=logout&amp;_wpnonce=0e32d431d1" class="d-tab icon-off">Выйти</a>

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
                            <a href="/dashboard" class="active">
                                <h6>Главная</h6>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            </a>
                        </li>

                        <li>
                            <a href="/dashboard/edit-profile/">
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
                    <li><a href="/dashboard" class="active">Главная</a></li>
                    <li><a href="/dashboard/edit-profile">Редактировать профиль</a></li>
                    <li><a href="#">Избранные</a></li>
                    <li><a href="#">Мои отзывы</a></li>
                </ul>
            </nav>

            <div class="dashboard-user-block rel toggle-dropdown">

                <div class="content icon-user">
                    <span>Тест Тест</span>
                </div>

                <div class="d-dropdown">

                    <div class="user-info">
                        <div class="avatar">Т</div>
                        <div class="text">
                            <h6>Тест Тест</h6>
                            <p class="grey-text">+7 (747) 499-12-03</p>
                            <div class="label theme">Пользователь</div>
                        </div>
                    </div>

                    <ul>
                        <li><a href="/dashboard" class="icon-user">Личный кабинет</a></li>
                        <li><a href="#" class="icon-archive">Мои компании</a></li>
                        <li><a href="#" class="icon-inbox">Заявки</a></li>
                    </ul>

                    <ul>
                        <li><a href="/dashboard/edit-profile" class="icon-edit">Редактировать профиль</a></li>
                        <li><a href="https://mykid.init.kz/wp-login.php?action=logout&amp;_wpnonce=0e32d431d1" class="icon-off red">Выйти из аккаунта</a></li>
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
