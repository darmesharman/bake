
<div class="dashboard-content article-lg">
    <nav class="breadcrumbs mb0"><p id="breadcrumbs"><span><span><a href="https://mykid.init.kz/">Главная страница</a> — <span class="breadcrumb_last" aria-current="page">Личный кабинет</span></span></span></p></nav>
        <h1><span class="fw-300 nc">Добро пожаловать,</span> <span class="fw-400 nc">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></h1>

        <a href="{{ route('companies.create') }}" class="company-block">
            <div class="main">
                <div class="preview icon-add empty">Добавить компанию</div>
                <div class="bottom">
                    <div class="empty icon-inbox">
                    </div>
                    <div class="empty icon-notif">
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="empty icon-chat">
                </div>
                <div class="empty icon-users">
                </div>
            </div>
        </a>
</div>

