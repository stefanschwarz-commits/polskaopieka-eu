<?php
/**
 * Fallback template (wymagany przez WordPress).
 *
 * Na tym etapie motyw obsługuje przede wszystkim stronę główną (front-page.php).
 * Pozostałe widoki (wpisy, archiwa, podstrony) zostaną dodane w kolejnych krokach —
 * na razie prosty, bezpieczny fallback z pętlą.
 *
 * @package PSOD2
 */

get_header();
?>

<main class="wrap" style="padding-top:88px;padding-bottom:88px">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			?>
			<article <?php post_class(); ?>>
				<h1 class="sec-head"><?php the_title(); ?></h1>
				<div class="entry-content"><?php the_content(); ?></div>
			</article>
			<?php
		}
	} else {
		echo '<p>' . esc_html__( 'Brak treści.', 'psod2' ) . '</p>';
	}
	?>
</main>

<?php
get_footer();
