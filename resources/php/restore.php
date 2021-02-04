<?php
/**
 * Template Name: Restore Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package init
 */

if( is_user_logged_in() ){
    wp_redirect( '/dashboard/' );
}

$email_restore = false;

if(isset($_GET['email']) && isset($_GET['key'])){
    $email = $_GET['email'];
    $key = $_GET['key'];

    global $wpdb;
    $check = $wpdb->get_var("SELECT `id` FROM `init_users_email_code` WHERE `email` = '$email' AND `hash_key` = '$key'");

    if($check != ''){
        $email_restore = true;
    }

}
get_header();

?>  
    <section class="auth">
        <div class="wrapper article">
            <div class="auth-wrapper">

                <?php if(!$email_restore){ ?>
                <form class="article toggle-parent" id="restore_form">
                    <h1><?php the_title(); ?></h1>
                    <div class="form-group radio-toggler toggle-blocks">
                        <input type="radio" id="restore_type_email" name="type" value="email" checked>
                        <label for="restore_type_email">Email</label>
                        <input type="radio" id="restore_type_phone" name="type" value="phone">
                        <label for="restore_type_phone">Номер</label>
                    </div>
                    <div class="form-group toggle email-form article">
                        <p class="grey-text">Укажите свой email, под которым вы зарегистрированы на сайте и на него будет отправлена информация о восстановлении пароля.</p>
                        <label for="restore_email">Email</label>
                        <input name="email" type="text" id="restore_email" placeholder="Введите email" class="required mb0" data-type="email">
                    </div>
                    <div class="form-group toggle phone-form dn article">
                        <p class="grey-text">Укажите свой номер телефона, под которым вы зарегистрированы на сайте и вам будет отправлен SMS код.</p>
                        <label for="restore_phone">Номер телефона</label>
                        <input name="phone" type="text" id="restore_phone" class="phone-mask required mb0" data-type="phone">
                    </div>
                    <button class="btn full large square" id="restore_confirm">Отправить</button>
                    <p class="mb0">Вспомнили пароль? <a href="/login">Авторизуйтесь</a></p>

                    <div class="message-block">
                        <div class="content article">
                            <img src="/wp-content/themes/init/img/email.png">
                            <h4>Мы отправили вам письмо</h4>
                            <p>Проверьте свой почтовый ящик и следуйте инструкциям в письме, чтобы сбросить пароль.</p>
                        </div>
                    </div>
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
                        <div class="code-timer-wrapper">
                            <p class="grey-text">Запросить код повторно можно через <span id="code-timer"></span> секунд</p>
                            <a href="#" class="send-again dn">Отправить код повторно</a>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <div class="fields-wrapper<?php echo !$email_restore ? ' dn' : ''; ?>">
                    <div class="message-block success">
                        <div class="content article">
                            <img src="/wp-content/themes/init/img/success.png">
                            <h4>Пароль изменен</h4>
                            <p class="grey-text">Вы будете перенаправлены на страницу входа через <span id="redirect-timer">3</span> секунды</p>
                        </div>
                    </div>

                    <form id="new-pass-form-wrapper">
                        <div class="new-pass-content article">
                            <h3>Новый пароль</h3>
                            <p class="grey-text">Введите новый пароль и подтвердите его</p>
                            <div class="form-group">
                                <label for="new_password">Новый пароль</label>
                                <input name="password" type="password" id="new_password" class="required" data-type="password" placeholder="Введите пароль">
                            </div>
                            <div class="form-group">
                                <label for="new_password_confirm">Подтвердите новый пароль</label>
                                <input name="password_confirm" type="password" id="new_password_confirm" class="required" data-type="confirm_pass" placeholder="Повторите пароль">
                            </div>
                            <button class="btn full large mb0 square" id="new_pass_confirm">Применить</button>
                            <?php if($email_restore){ ?>
                                <input name="key" type="hidden" id="restore_key" value="<?php echo $key; ?>">
                                <input type="hidden" name="type" id="restore_type" value="email">
                            <?php } ?>
                        </div>                   
                    </form>
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
