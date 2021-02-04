<header id="masthead" class="site-header">
    <div class="container">
        <div class="header-content">
            <div class="site-branding">
                <a href="/" class="custom-logo-link" rel="home" aria-current="page">
                    <img src="%D0%93%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F%20%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0%20-%20MyKid.kz_files/logo.png"
                        class="custom-logo" alt="MyKid.kz" width="218" height="62">
                </a>
            </div>
            <nav class="menu-menu-1-container">
                <ul id="menu-menu-1" class="site-menu">
                    <li id="menu-item-17"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-2 menu-item-17 {{ Request::is('/') ? "current_page_item" : " "}}">
                        <a href="/" aria-current="page">Главная</a></li>
                    <li id="menu-item-194"
                        class="menu-item menu-item-type-post_type_archive menu-item-object-company menu-item-194 {{ Request::is('companies') ? "current_page_item" : " "}}"><a
                            href="{{ route('companies.index') }}">Все компании</a></li>
                    <li id="menu-item-21"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21 {{ Request::is('/blogs') ? "current_page_item" : " "}}"><a
                            href="{{ route('blogs.index') }}">Блог</a></li>
                    <li id="menu-item-22"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22"><a
                            href="#">Карта</a></li>
                    <li id="menu-item-23"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-23"><a
                            href="#">Контакты</a></li>
                </ul>
            </nav>
            <div class="btns">
                <div class="line">
                    <a href="{{ route('companies.create') }}" class="btn icon-add">Добавить
                        компанию</a>
                    <!-- <a href=" route('dashboard') }}" class="btn bordered-theme icon-user">
                        @if (Auth::user())
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        @else
                            Личный кабинет
                        @endif

                    </a> -->
                </div>
            </div>
        </div>
    </div>
</header>
