<?php
/**
 * Archiwum CPT „aktualnosci" — lista wpisów pod /aktualnosci/.
 *
 * Dynamiczny szablon (projekt .aktual-* z makiety): hero, wyróżniony wpis
 * (najnowszy), siatka pozostałych z „Wczytaj więcej" (obsługa w js/psod.js),
 * blok newslettera. Wpisy z CPT aktualnosci (import z produkcji, edytowalne
 * w wp-adminie).
 *
 * @package PSOD2
 */

get_header();

// Wyroznione wpisy (meta _psod_wyrozniony) — do 2. Fallback: najnowszy.
$featured_ids   = psod2_featured_ids( 2 );
$featured_count = count( $featured_ids );

// Siatka „Wszystkie wpisy" — wszystkie POZA wyroznionymi, najnowsze pierwsze.
$grid_q = new WP_Query(
	array(
		'post_type'      => 'aktualnosci',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'post__not_in'   => $featured_ids,
		'no_found_rows'  => true,
	)
);
$grid_posts   = $grid_q->posts;
$grid_total   = count( $grid_posts );
$grid_initial = 12; // ile kart siatki widocznych od razu
$grid_step    = 6;  // ile dokladamy na klik „Wczytaj wiecej"
?>

<!-- ======================= WSTEP SEKCJI ======================= -->
<section class="aktual-hero">
	<div class="wrap">
		<nav class="aktual-crumb" aria-label="<?php esc_attr_e( 'Okruszki', 'psod2' ); ?>">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-i18n="aktual.crumb.home">Strona główna</a>
			<span aria-hidden="true">→</span>
			<span class="cur" data-i18n="aktual.crumb.cur">Aktualności</span>
		</nav>
		<div class="aktual-hero__inner">
			<div class="overline" data-i18n="aktual.overline">Aktualności</div>
			<h1 data-i18n="aktual.h1">Co u nas słychać</h1>
			<p data-i18n="aktual.lead">Stanowiska, komentarze i wydarzenia z życia branży opieki domowej. Śledzimy to, co dotyczy seniorów i opiekunów — i mówimy o tym otwarcie.</p>
		</div>
	</div>
</section>

<?php if ( $featured_count >= 2 ) : ?>
<!-- =============== WYROZNIONE WPISY (2 obok siebie) =============== -->
<section class="aktual-featured">
	<div class="wrap">
		<div class="aktual-feat2">
			<?php foreach ( $featured_ids as $fid ) : ?>
				<a class="aktual-feat2__card" href="<?php echo esc_url( get_permalink( $fid ) ); ?>">
					<div class="aktual-feat2__img">
						<?php if ( has_post_thumbnail( $fid ) ) : ?>
							<?php echo get_the_post_thumbnail( $fid, 'large', array( 'alt' => esc_attr( get_the_title( $fid ) ) ) ); ?>
						<?php else : ?>
							<span class="aktual-card__noimg" data-i18n="aktual.card.noimg">foto wpisu</span>
						<?php endif; ?>
					</div>
					<span class="tag" data-i18n="aktual.featured.tag">Wyróżnione</span>
					<h3><?php echo esc_html( get_the_title( $fid ) ); ?></h3>
					<div class="aktual-card__date"><?php echo esc_html( psod2_polish_date( $fid ) ); ?></div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php elseif ( 1 === $featured_count ) : $featured = $featured_ids[0]; ?>
<!-- ======================= WYROZNIONY WPIS ======================= -->
<section class="aktual-featured">
	<div class="wrap">
		<a class="aktual-featured__grid" href="<?php echo esc_url( get_permalink( $featured ) ); ?>">
			<div class="aktual-featured__img">
				<?php if ( has_post_thumbnail( $featured ) ) : ?>
					<?php echo get_the_post_thumbnail( $featured, 'large', array( 'alt' => esc_attr( get_the_title( $featured ) ) ) ); ?>
				<?php else : ?>
					<span class="aktual-featured__label" data-i18n="aktual.featured.label">foto wpisu</span>
				<?php endif; ?>
			</div>
			<div>
				<span class="tag" data-i18n="aktual.featured.tag">Wyróżnione</span>
				<h2><?php echo esc_html( get_the_title( $featured ) ); ?></h2>
				<div class="aktual-card__date"><?php echo esc_html( psod2_polish_date( $featured ) ); ?></div>
				<div class="aktual-featured__link">
					<span class="arrow-link"><span data-i18n="aktual.featured.cta">Czytaj dalej</span> <span class="arw" aria-hidden="true">→</span></span>
				</div>
			</div>
		</a>
	</div>
</section>
<?php endif; ?>

<!-- ======================= WSZYSTKIE WPISY ======================= -->
<section class="aktual-grid-section">
	<div class="wrap">
		<div class="aktual-grid-head">
			<h2 data-i18n="aktual.grid.h2">Wszystkie wpisy</h2>
			<?php $init_shown = min( $grid_initial, $grid_total ); ?>
			<span class="aktual-grid-head__counter" id="aktualCounter"><?php echo esc_html( $init_shown . ' z ' . $grid_total . ' wpisów' ); ?></span>
		</div>

		<div class="aktual-grid" id="aktualGrid" data-step="<?php echo esc_attr( $grid_step ); ?>">
			<?php
			foreach ( $grid_posts as $idx => $gp ) :
				$hidden = ( $idx >= $grid_initial ) ? ' hidden' : '';
				?>
				<a class="aktual-card" href="<?php echo esc_url( get_permalink( $gp ) ); ?>" data-idx="<?php echo esc_attr( $idx + 1 ); ?>"<?php echo $hidden; ?>>
					<div class="aktual-card__img">
						<?php if ( has_post_thumbnail( $gp ) ) : ?>
							<?php echo get_the_post_thumbnail( $gp, 'medium_large', array( 'alt' => esc_attr( get_the_title( $gp ) ), 'loading' => 'lazy' ) ); ?>
						<?php else : ?>
							<span class="aktual-card__noimg" data-i18n="aktual.card.noimg">foto wpisu</span>
						<?php endif; ?>
					</div>
					<h3><?php echo esc_html( get_the_title( $gp ) ); ?></h3>
					<div class="aktual-card__date"><?php echo esc_html( psod2_polish_date( $gp ) ); ?></div>
				</a>
			<?php endforeach; ?>
		</div>

		<?php if ( $grid_total > $grid_initial ) : ?>
			<div class="aktual-more" id="aktualMoreWrap">
				<button type="button" class="btn btn--secondary" id="aktualMoreBtn" data-i18n="aktual.more">Wczytaj więcej</button>
			</div>
		<?php endif; ?>
	</div>
</section>

<?php
/*
 * ======================= NEWSLETTER (ukryty) =======================
 * Ukryty do czasu podpięcia realnego dostawcy/zapisu (audyt przedpublikacyjny:
 * przycisk „Zapisz się" prowadził do „#" bez backendu). Po dodaniu integracji
 * — odkomentować i podpiąć formularz zamiast martwego linku.
 *
 * <section class="aktual-newsletter">
 *   ... Newsletter / „Bądźmy w kontakcie" / „Zapisz się" ...
 * </section>
 */
?>

<?php
wp_reset_postdata();
get_footer();
