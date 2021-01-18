{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html> --}}

<!doctype html>
<html>
<head>

    <title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/theme.css">
</head>

<body>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-content">
                <div class="site-branding">
                    <a href="https://mykid.init.kz/" class="custom-logo-link" rel="home" aria-current="page"><img src="%D0%93%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F%20%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0%20-%20MyKid.kz_files/logo.png" class="custom-logo" alt="MyKid.kz" width="218" height="62"></a>
                </div>
                <nav class="menu-menu-1-container">
                    <ul id="menu-menu-1" class="site-menu"><li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-17"><a href="https://mykid.init.kz/" aria-current="page">Главная</a></li>
                        <li id="menu-item-194" class="menu-item menu-item-type-post_type_archive menu-item-object-company menu-item-194"><a href="https://mykid.init.kz/company/">Все компании</a></li>
                        <li id="menu-item-21" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21"><a href="https://mykid.init.kz/blog">Блог</a></li>
                        <li id="menu-item-22" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22"><a href="#">Карта</a></li>
                        <li id="menu-item-23" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-23"><a href="#">Контакты</a></li>
                    </ul>
                </nav>
                <div class="btns">
                    <div class="line">
                        <a href="https://mykid.init.kz/add-company" class="btn icon-add">Добавить компанию</a>
                        <a href="https://mykid.init.kz/dashboard" class="btn bordered-theme icon-user">Личный кабинет</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

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
						<p class="grey-text">Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
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
				<a class="developer text" href="https://init.kz" target="_blank" rel="noopener noreferrer">Сайт разработала<br>Веб студия <img src="img/init.svg" alt="init logo"></a>
			</div>
		</div>



	</footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
