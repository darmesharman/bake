<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package init
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="public/css/app.css">
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="header-content">
				<div class="site-branding">
					<?php echo get_custom_logo() ? get_custom_logo() : "<a href='" . home_url() . "'>MyKid.<span>kz</span></a>"; ?>
				</div>

				<?php
                    wp_nav_menu(array(
                        'theme_location'    => 'primary',
                        'container'         => 'nav',
                        'menu_class'        => 'site-menu'
                    ));
                ?>

				<div class="btns">
					<div class="line">
						<a href="/add-company" class="btn icon-add">Добавить компанию</a>
						<?php
                            if (is_user_logged_in()) {
                                echo '<a href="/dashboard" class="btn bordered-theme icon-user">' . $user_info['user_name'] . '</a>';
                            } else {
                                echo '<a href="/dashboard" class="btn bordered-theme icon-user">Личный кабинет</a>';
                            }
                        ?>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="notifications"></div>

	<main id="content" class="site-content">

    
