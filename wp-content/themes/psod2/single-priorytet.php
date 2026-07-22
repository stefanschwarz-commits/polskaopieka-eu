<?php
/**
 * single-priorytet.php — podstrona pojedynczego priorytetu PSOD (/artykuly/<slug>/).
 *
 * Stanowisko rzecznicze (nie aktualność): breadcrumb, oznaczenie „Stanowisko PSOD",
 * numer „Priorytet 0X" (wg menu_order), H1, lead + sekcje H2 (treść z edytora),
 * sekcja „Pozostałe priorytety" (3 pozostałe kafle), link do strony zbiorczej oraz
 * CTA → /kontakt/. Bez daty publikacji; opcjonalnie data ostatniej modyfikacji.
 *
 * Treść (lead + sekcje H2 + listy + wyróżnione bloki) jest w edytorze (post_content),
 * krótki opis karty w zajawce (excerpt), meta title/description w meta boxie priorytetu.
 *
 * @package PSOD2
 */

get_header();

while ( have_posts() ) :
	the_post();
	$psod2_id       = get_the_ID();
	$psod2_num      = str_pad( psod2_priorytet_index( $psod2_id ), 2, '0', STR_PAD_LEFT );
	$psod2_all      = psod2_get_priorytety();
	$psod2_mod_iso  = get_the_modified_date( 'c', $psod2_id );
	$psod2_mod_disp = get_the_modified_date( 'j F Y', $psod2_id );
	?>

	<article class="prio">

		<!-- ======================= NAGŁÓWEK ======================= -->
		<div class="prio-head">
			<div class="wrap">
				<nav class="breadcrumb" aria-label="Ścieżka nawigacyjna">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Strona główna</a>
					<span class="breadcrumb__sep" aria-hidden="true">/</span>
					<a href="<?php echo esc_url( home_url( '/nasze-priorytety/' ) ); ?>">Nasze priorytety</a>
					<span class="breadcrumb__sep" aria-hidden="true">/</span>
					<span aria-current="page"><?php the_title(); ?></span>
				</nav>

				<div class="prio-eyebrow">
					<span class="prio-badge">Stanowisko PSOD</span>
					<span class="prio-num"><span class="prio-num__line" aria-hidden="true"></span>Priorytet <?php echo esc_html( $psod2_num ); ?></span>
				</div>

				<h1><?php the_title(); ?></h1>

				<?php if ( $psod2_mod_disp ) : ?>
					<p class="prio-updated">Ostatnia aktualizacja: <time datetime="<?php echo esc_attr( $psod2_mod_iso ); ?>"><?php echo esc_html( $psod2_mod_disp ); ?></time></p>
				<?php endif; ?>
			</div>
		</div>

		<!-- ======================= TREŚĆ (lead + sekcje H2) ======================= -->
		<div class="artykul-body prio-body">
			<?php the_content(); ?>
		</div>

		<!-- ======================= POZOSTAŁE PRIORYTETY ======================= -->
		<section class="prio-related" aria-label="Pozostałe priorytety">
			<div class="wrap wrap--wide">
				<div class="sec-head"><h2>Pozostałe priorytety</h2></div>
				<div class="grid">
					<?php
					foreach ( $psod2_all as $psod2_p ) :
						if ( (int) $psod2_p->ID === (int) $psod2_id ) {
							continue;
						}
						?>
						<a class="tile" href="<?php echo esc_url( get_permalink( $psod2_p->ID ) ); ?>">
							<?php if ( has_post_thumbnail( $psod2_p->ID ) ) : ?>
								<?php echo get_the_post_thumbnail( $psod2_p->ID, 'medium_large', array( 'class' => 'tile__img', 'alt' => '', 'loading' => 'lazy' ) ); ?>
							<?php endif; ?>
							<div class="tile__veil"></div>
							<div class="tile__body"><h3><?php echo esc_html( get_the_title( $psod2_p->ID ) ); ?></h3></div>
						</a>
					<?php endforeach; ?>
				</div>
				<div class="prio-related__all">
					<a class="arrow-link" href="<?php echo esc_url( home_url( '/nasze-priorytety/' ) ); ?>"><span>Zobacz wszystkie priorytety</span> <span class="arw" aria-hidden="true">→</span></a>
				</div>
			</div>
		</section>

		<!-- ======================= CTA KONTAKT ======================= -->
		<section class="prio-cta">
			<div class="wrap">
				<div class="prio-cta__card">
					<h2>Masz pytania o naszą agendę rzeczniczą?</h2>
					<p>Skontaktuj się z Polskim Stowarzyszeniem Opieki Domowej — odpowiemy na pytania o nasze stanowiska i możliwości współpracy.</p>
					<a class="btn btn--primary" href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>">Skontaktuj się z nami</a>
				</div>
			</div>
		</section>

	</article>

	<?php
endwhile;

get_footer();
