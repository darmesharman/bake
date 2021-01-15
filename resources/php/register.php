<?php
/**
 * Template Name: Register Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package init
 */

if( is_user_logged_in() ){
    wp_redirect( '/dashboard/' );
}

get_header();

?>  
    <section class="auth">
        <div class="wrapper">
            <div class="auth-wrapper">
                <form class="article large" id="register_form">
                    <h1><?php the_title(); ?></h1>
                    <p>Для регистрации введите, пожалуйста, следующие данные:</p>
                    <div class="form-group radio-toggler">
                        <input type="radio" id="register_user" name="role" value="user" checked>
                        <label for="register_user">Пользователь</label>
                        <input type="radio" id="register_company" name="role" value="company">
                        <label for="register_company">Компания</label>
                    </div>

                    <div class="grid-2">
                        <div class="line">
                            <div class="form-group">
                                <label for="register_name">Имя</label>
                                <input name="name" type="text" class="name-mask required" data-type="name" id="register_name" placeholder="Введите имя">
                            </div>
                            <div class="form-group">
                                <label for="register_suname">Фамилия</label>
                                <input name="surname" type="text" class="name-mask required" data-type="surname" id="register_suname" placeholder="Введите фамилию">
                            </div>
                            <div class="form-group full">
                                <label for="register_city">Город или область</label>
                                <div class="select-wrapper">
                                    <input name="city" type="text" id="register_city" placeholder="Выберите город или область" readonly disabled class="required" data-type="select">
                                    <ul class="select-dropdown"></ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="register_phone">Номер телефона</label>
                                <input name="phone" type="text" id="register_phone" class="phone-mask required" data-type="phone">
                            </div>
                            <div class="form-group">
                                <label for="register_email">Email</label>
                                <input name="email" type="text" id="register_email" placeholder="Введите email" class="required" data-type="email">
                            </div>
                            <div class="form-group">
                                <label for="register_password">Пароль</label>
                                <input name="password" type="password" id="register_password" placeholder="Введите пароль" class="required" data-type="password">
                            </div>
                            <div class="form-group">
                                <label for="register_password_confirm">Повторите пароль</label>
                                <input name="password_confirm" type="password" id="register_password_confirm" placeholder="Введите пароль повторно" class="required" data-type="confirm_pass">
                            </div>
                        </div>
                    </div>
                    <div class="form-group checkbox fit">
                        <input name="agree" type="checkbox" id="register_agree" class="required" data-type="checkbox">
                        <label for="register_agree"><span>Я согласен с <a href="/privacy">политикой конфидициальности</a></span></label>
                    </div>
                    <button class="btn full large square" id="register_confirm">Зарегистрироваться</button>
                    <p class="mb0">Если Вы уже зарегистрированны, то <a href="/login">авторизируйтесь</a></p>
                </form>

                <div class="form-group confirm-code">
                    <div class="loading" <?php bgi('loading.gif'); ?>></div>
                    <div class="confirm-code-wrapper article">
                        <h3>Верификация</h3>
                        <p class="grey-text">
                            Для защиты Вашего аккаунта мы отправили SMS с кодом на Ваш мобильный телефон. Это бесплатно.
                        </p>
                        <div class="code-input-wrapper">
                            <input type="text" class="code-input code-mask code" id="code">
                        </div>
                        <div class="code-timer">
                            <p class="grey-text">Запросить код повторно можно через <span id="code-timer"></span> секунд</p>
                            <a href="#" class="send-again dn">Отправить код повторно</a>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="slide white" <?php bgi('auth.jpg'); ?>>
                <img src="/wp-content/themes/init/img/wave.svg">
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
