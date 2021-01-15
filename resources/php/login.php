
    <section class="auth">
        <div class="wrapper">
            <div class="slide white" <?php bgi('auth.jpg'); ?>>
                <img src="img/wave.svg">
                <ul>
                    <li class="icon-dashboard">
                        <div class="text">
                            <h5>Заголовок</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic ullam qui unde?</p>
                        </div>
                    </li>
                    <li class="icon-internet">
                        <div class="text">
                            <h5>Заголовок</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic ullam qui unde?</p>
                        </div>
                    </li>
                    <li class="icon-analytics">
                        <div class="text">
                            <h5>Заголовок</h5>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic ullam qui unde?</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="auth-wrapper">
                <form class="article" id="login_form">
                    <h1><?php the_title(); ?></h1>
                    <?php
                        if (isset($_GET['restore']) && $_GET['restore'] == 'success') {
                            ?>
                        <div class="message success">
                            <div class="text">
                                <h6>Ваш пароль был изменён</h6>
                                <p>Вы можете авторизоваться использую новый пароль</p>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    <div class="form-group">
                        <label for="login_phone">Номер телефона</label>
                        <input name="phone" type="text" id="login_phone" class="phone-mask required" data-type="phone">
                    </div>
                    <div class="form-group">
                        <label for="login_password">Пароль</label>
                        <input name="password" type="password" id="login_password" class="required" data-type="password" placeholder="Введите пароль">
                    </div>
                    <div class="df jcsb aic">
                        <div class="form-group checkbox fit">
                            <input name="remember" type="checkbox" id="login_remember">
                            <label for="login_remember">Запомнить меня</label>
                        </div>
                        <a href="/restore">Забыли пароль?</a>
                    </div>
                    <button class="btn full large square" id="login_confirm">Войти</button>
                    <p>Если у Вас еще нет аккаунта - <a href="/register">зарегистрируйтесь</a></p>
                </form>
            </div>
        </div>
    </section>
    <?php /*
    <section>

        <div class="container">
            <?php
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

            endwhile;
            ?>
        </div>

    </section>
    */ ?>

<?php
get_footer();
