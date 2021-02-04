<!DOCTYPE html>
<html>

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
        <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }} " > -->
    </head>

<body>

    @include('layouts.initheader')

    <div class="notifications">

    </div>

    <main id="content" class="site-content">
            @yield('content')
    </main>


    <footer id="colophon" class="site-footer bt">

        <div class="container">
            <div class="wrapper">
                <div class="footer-top p">
                    <div class="article info">
                        <div class="site-branding">
                        </div>
                        <p class="grey-text">Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a
                            feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.
                        </p>
                    </div>
                    <div class="article links">
                        <h4>Полезные ссылки</h4>
                    </div>
                    <div class="article">
                        <h4>Контакты</h4>
                        <div class="contacts">
                            <p>г. Алматы, проспект Абая, 76/109 уг.<br> ул. Ауэзова, 5 этаж, 502 офис.</p>
                            <p>Телефон: <a href="tel:+77076538240">+7 (707) 653-82-40</a></p>
                            <p>Телефон: <a href="tel:+77785040883">+7 (778) 504-08-83</a></p>
                            <p>E-mail: <a href="mailto:info@mykid.kz">info@mykid.kz</a></p>
                            <div class="btns">
                                <div class="line">
                                    <a href="#" class="btn icon bordered icon-instagram"></a>
                                    <a href="#" class="btn icon bordered icon-vk"></a>

                                    <a href="#" class="btn icon bordered icon-twitter"></a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="footer-bottom df jcsb aic pt3 pb3 bt">

                <p class="grey-text mb0">© <?php echo date('Y'); ?> MyKid. Все права защищены</p>

                <a class="developer text" href="https://init.kz" target="_blank" rel="noopener noreferrer">Сайт

                    разработала<br>Веб студия <img src="img/init.svg" alt="init logo"></a>

            </div>

        </div>







    </footer>



    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>



</html>
