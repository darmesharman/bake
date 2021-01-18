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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/fav.png') }}" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/theme.css">
</head>

<body>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="header-content">
				<div class="site-branding">
				    <a href="/">MyKid.<span>kz</span></a>
				</div>

				<div class="btns">
					<div class="line">
						<a href="/add-company" class="btn icon-add">Добавить компанию</a>
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
				<a class="developer text" href="https://init.kz" target="_blank" rel="noopener noreferrer">Сайт разработала<br>Веб студия <img src="img/fav.png" alt="init logo"></a>
			</div>
		</div>



	</footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
