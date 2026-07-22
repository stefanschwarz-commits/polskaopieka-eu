<?php
/**
 * Ogólny szablon Strony — dla zwykłych stron WP bez dedykowanego
 * page-{slug}.php (np. Polityka Prywatności). Wcześniej takie strony spadały
 * do ubogiego index.php; teraz mają spójny z motywem układ i typografię.
 *
 * @package PSOD2
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="staticpage">
		<div class="wrap">
			<header class="staticpage__head">
				<h1><?php the_title(); ?></h1>
			</header>
			<div class="staticpage__body">
				<?php the_content(); ?>
			</div>
		</div>
	</section>
	<?php
endwhile;

get_footer();
