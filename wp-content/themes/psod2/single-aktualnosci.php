<?php
/**
 * Pojedynczy wpis CPT „aktualnosci" — URL /aktualnosci/{slug}/.
 *
 * Dynamiczny szablon (projekt .artykul-* z makiety wariant 1A): pasek powrotu,
 * meta „AKTUALNOŚCI • data", tytuł, zdjęcie wyróżniające (lub gradient-placeholder
 * gdy brak), treść wpisu przez the_content(), CTA powrotu do listy.
 *
 * Treść wpisów pochodzi z importu z produkcji polskaopieka.eu (patrz skrypt
 * importu) i jest edytowalna w wp-adminie.
 *
 * @package PSOD2
 */

get_header();

while ( have_posts() ) :
	the_post();
	$archive_url = get_post_type_archive_link( 'aktualnosci' );
	if ( ! $archive_url ) {
		$archive_url = home_url( '/aktualnosci/' );
	}
	?>

	<article class="artykul">

		<div class="wrap">
			<a class="artykul-back" href="<?php echo esc_url( $archive_url ); ?>"><span class="ar" aria-hidden="true">←</span> <span data-i18n="artykul.back">Wróć do aktualności</span></a>
		</div>

		<header class="artykul-head">
			<div class="wrap">
				<div class="artykul-meta">
					<span class="artykul-meta__cat" data-i18n="artykul.cat">Aktualności</span>
					<span class="artykul-meta__dot" aria-hidden="true"></span>
					<span class="artykul-meta__date"><?php echo esc_html( psod2_polish_date() ); ?></span>
				</div>
				<h1><?php the_title(); ?></h1>
			</div>
		</header>

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="wrap">
				<figure class="artykul-hero artykul-hero--img">
					<?php
					// sizes wymuszone na ~720px (szerokosc hero), zeby srcset wczytal
					// wariant o wlasciwej rozdzielczosci zamiast najmniejszego.
					the_post_thumbnail(
						'large',
						array(
							'alt'   => esc_attr( get_the_title() ),
							'sizes' => '(max-width: 760px) 100vw, 720px',
						)
					);
					?>
				</figure>
			</div>
		<?php else : ?>
			<div class="wrap">
				<div class="artykul-hero">
					<span class="artykul-hero__label" data-i18n="artykul.herolabel">Foto — do wpięcia po uzyskaniu licencji</span>
				</div>
			</div>
		<?php endif; ?>

		<div class="artykul-body">
			<?php the_content(); ?>
		</div>

		<div class="wrap artykul-cta">
			<a class="btn btn--secondary" href="<?php echo esc_url( $archive_url ); ?>"><span aria-hidden="true">←</span> <span data-i18n="artykul.ctaall">Wszystkie aktualności</span></a>
		</div>

	</article>

<?php endwhile; ?>

<?php
get_footer();
