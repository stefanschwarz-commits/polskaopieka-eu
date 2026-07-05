<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PSOD
 */

?>

	<footer id="footer" class="site-footer py-5">
		<div class="container">
		<div class="row justify-content-between align-items-end gy-4 gy-md-0">
		<div class="col-md-4 text-center text-md-start">
		<span><a href="<?php echo home_url(); ?>"><img class="custom-logo" src="<?= get_template_directory_uri(); ?>/assets/footer-logo.svg" alt="logo stopka"></a></span>
		</div>
		<div class="col-md-8 d-flex justify-content-center justify-content-md-end">
		<nav id="footer-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer',
					'menu_class' => 'd-flex flex-column flex-md-row text-center text-md-end',
					'add_li_class'  => 'mt-2 mt-md-0 mx-md-3',
				)
			);
			?>
		</nav>
		</div>
		<hr class="my-5">
		
			<div class="copy d-md-flex justify-content-center justify-content-md-between align-items-center text-center">

				<div class="d-flex flex-row me-3 justify-content-center mb-2 mb-md-0 justify-content-md-between">
				<div class="me-3 me-md-5">©<?php echo date("Y"); ?>  |   All right reserved</div>
				<div class="me-3 me-md-5"><a href="<?php echo esc_url( get_field("stopka", "option")['polityka_prywatnosci_link'] ); ?>" target="_blank">Polityka prywatności</a></div>
				</div>
				<div>
				designed by &nbsp;<a class="text-decoration-underline" href="https://www.mocio.co/" target="_blank">mocio.co</a>
		</div>
				</div>


	
		
		</div>

		</div>

		</div>
	</footer>
</div>


<?php wp_footer(); ?>
</div>   
</body>
</html>
