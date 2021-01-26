<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package init
 */

?>

	</main>
	
	<?php get_sidebar(); ?>

	<footer id="colophon" class="site-footer bt">

		<div class="container">
			<div class="wrapper">
				<div class="footer-top p">
					<div class="article info">
						<div class="site-branding">
							<?php echo get_custom_logo() ? get_custom_logo() : "<a href='" . home_url() . "'>MyKid.<span>kz</span></a>"; ?>
						</div>
						<p class="grey-text">Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
					</div>
					<div class="article links">
						<h4>Полезные ссылки</h4>
						<?php					
							wp_nav_menu( array(
								'theme_location'    => 'footer',
								'container'         => '',
								'menu_class'        => 'site-menu styled with-arrows two'
							) );
						?>
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
				<a class="developer text" href="https://init.kz" target="_blank" rel="noopener noreferrer">Сайт разработала<br>Веб студия <img src="/wp-content/themes/init/img/init.svg" alt="init logo"></a>
			</div>
		</div>

		<?php wp_footer(); ?>

	</footer>

</body>
</html>
