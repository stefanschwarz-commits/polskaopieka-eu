<?php
/**
 * Template Name: Centrum wiedzy — odpowiedź
 *
 * Wspólny szablon pięciu odpowiedzi Centrum wiedzy (/centrum-wiedzy/<slug>/).
 * Treść z JEDNEGO modelu psod2_kb_articles() wg slugu strony — SSR, dostępna bez JS.
 * Cytowania {Sx} → dostępne odwołania liczbowe, numerowane per-strona (kolejność użycia).
 * SEO/JSON-LD (BreadcrumbList + WebPage) w functions.php.
 *
 * @package PSOD2
 */

get_header();

$psod2_slug = get_post_field( 'post_name', get_queried_object_id() );
$psod2_art  = psod2_kb_get_article( $psod2_slug );

if ( ! $psod2_art ) {
	echo '<div class="filary-wrap"><p>Nie znaleziono odpowiedzi.</p><p><a href="' . esc_url( home_url( '/centrum-wiedzy/' ) ) . '">Wróć do Centrum wiedzy</a></p></div>';
	get_footer();
	return;
}

$psod2_sources  = psod2_kb_sources();
$psod2_articles = psod2_kb_articles();
$psod2_cm       = psod2_kb_citation_map( $psod2_art );
$psod2_map      = $psod2_cm['map'];
$psod2_order    = $psod2_cm['order'];
$psod2_first    = array(); // wspólny tracker kotwic cyt-N (short answer + body)
?>

<article class="kb-answer">

	<!-- ======================= NAGŁÓWEK ======================= -->
	<div class="prio-head">
		<div class="wrap">
			<nav class="breadcrumb" aria-label="Ścieżka nawigacyjna">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Strona główna</a>
				<span class="breadcrumb__sep" aria-hidden="true">/</span>
				<a href="<?php echo esc_url( home_url( '/centrum-wiedzy/' ) ); ?>">Centrum wiedzy</a>
				<span class="breadcrumb__sep" aria-hidden="true">/</span>
				<span aria-current="page"><?php echo esc_html( $psod2_art['title'] ); ?></span>
			</nav>

			<div class="prio-eyebrow">
				<span class="prio-badge"><?php echo esc_html( $psod2_art['eyebrow'] ); ?></span>
				<span class="kb-cat"><?php echo esc_html( $psod2_art['category'] ); ?></span>
			</div>

			<h1><?php echo esc_html( $psod2_art['title'] ); ?></h1>
		</div>
	</div>

	<div class="filary-wrap kb-answer__body">

		<!-- ======================= ODPOWIEDŹ W SKRÓCIE ======================= -->
		<section class="kb-short" aria-labelledby="kb-short-h">
			<h2 id="kb-short-h">Odpowiedź w skrócie</h2>
			<?php echo psod2_kb_p( $psod2_art['shortAnswer'], $psod2_map, $psod2_sources, $psod2_first ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped w psod2_kb_p ?>
		</section>

		<!-- ======================= PEŁNA TREŚĆ ======================= -->
		<div class="kb-prose">
			<?php psod2_kb_render_body( $psod2_art, $psod2_map, $psod2_sources, $psod2_first ); ?>
		</div>

		<!-- Zastrzeżenie (przed źródłami) -->
		<p class="kb-disclaimer">Treść ma charakter ogólnoinformacyjny. Nie zastępuje indywidualnej porady medycznej ani prawnej.</p>

		<!-- ======================= ŹRÓDŁA ======================= -->
		<?php psod2_kb_render_sources_section( $psod2_order, $psod2_sources ); ?>

		<!-- Ostatnia aktualizacja -->
		<p class="kb-updated">Ostatnia aktualizacja: <time datetime="<?php echo esc_attr( $psod2_art['dateModified'] ); ?>"><?php echo esc_html( psod2_kb_fmt_date( $psod2_art['dateModified'] ) ); ?></time></p>

		<!-- ======================= POWIĄZANE PYTANIA ======================= -->
		<?php if ( ! empty( $psod2_art['related'] ) ) : ?>
			<section class="kb-related" aria-labelledby="kb-related-h">
				<h2 id="kb-related-h">Powiązane pytania</h2>
				<ul class="kb-related__list">
					<?php
					foreach ( $psod2_art['related'] as $rel ) :
						if ( isset( $rel['kb'] ) && isset( $psod2_articles[ $rel['kb'] ] ) ) :
							$rl = $psod2_articles[ $rel['kb'] ];
							?>
							<li><a href="<?php echo esc_url( psod2_kb_article_url( $rel['kb'] ) ); ?>"><span aria-hidden="true">→</span> <?php echo esc_html( $rl['title'] ); ?></a></li>
						<?php elseif ( isset( $rel['url'] ) ) : ?>
							<li><a href="<?php echo esc_url( home_url( $rel['url'] ) ); ?>"><span aria-hidden="true">→</span> <?php echo esc_html( $rel['label'] ); ?></a></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</section>
		<?php endif; ?>

		<p class="kb-back"><a href="<?php echo esc_url( home_url( '/centrum-wiedzy/' ) ); ?>"><span aria-hidden="true">←</span> Wróć do Centrum wiedzy</a></p>

	</div>
</article>

<?php
get_footer();
