<?php
/**
 * Template Name: Nasze priorytety
 * Podstrona „Nasze priorytety" — slug: nasze-priorytety.
 *
 * 4 priorytety jako naprzemienne wiersze zdjęcie/tekst + CTA „Dołącz do nas".
 * Odtworzenie prototypu design_handoff_nasze_priorytety/ — treść 1:1, tokeny psod2.
 * Dynamicznie z CPT „priorytet" (edytowalne w wp-adminie, menu „Priorytety") —
 * ten sam CPT zasila też kafle priorytetów na stronie głównej.
 *
 * UWAGA: link „Czytaj więcej" pochodzi z pola „Adres artykułu" w edytorze
 * priorytetu; dopóki redaktor go nie uzupełni, prowadzi do „#" (bez błędu).
 * Przycisk CTA → /kontakt/ (podstrona jeszcze nie istnieje — do zbudowania).
 *
 * @package PSOD2
 */

get_header();

$assets      = get_template_directory_uri() . '/assets';
$npri_desc   = 'Nasza działalność jest realizowana poprzez inicjowanie dialogu z przedstawicielami administracji publicznej, świata nauki, mediów, związkami zawodowymi a także samymi opiekunami.';
$npri_items  = psod2_get_priorytety();
?>

<!-- ======================= HERO TYTUŁOWY ======================= -->
<section class="npri-hero">
	<div class="wrap">
		<img class="npri-hero__mark" src="<?php echo esc_url( $assets . '/sygnet.svg' ); ?>" alt="" aria-hidden="true">
		<div class="npri-hero__over" data-i18n="npri.over">Polskie Stowarzyszenie Opieki Domowej</div>
		<h1 data-i18n="npri.h1">Nasze priorytety</h1>
	</div>
</section>

<!-- ======================= LISTA PRIORYTETÓW ======================= -->
<section class="npri-list">
	<div class="wrap">
		<?php foreach ( $npri_items as $i => $psod2_p ) : ?>
			<?php
			$psod2_link = get_post_meta( $psod2_p->ID, '_psod_prio_link', true );
			$psod2_link = trim( (string) $psod2_link );
			?>
			<div class="npri-row<?php echo ( 1 === $i % 2 ) ? ' npri-row--rev' : ''; ?>">
				<div class="npri-media">
					<?php if ( has_post_thumbnail( $psod2_p ) ) : ?>
						<?php echo get_the_post_thumbnail( $psod2_p, 'large', array( 'alt' => esc_attr( get_the_title( $psod2_p ) ), 'loading' => 'lazy' ) ); ?>
					<?php endif; ?>
				</div>
				<div class="npri-body">
					<div class="npri-num">
						<span class="npri-num__n"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></span>
						<span class="npri-num__line" aria-hidden="true"></span>
						<span class="npri-num__label" data-i18n="npri.label">Priorytet</span>
					</div>
					<h2><?php echo esc_html( get_the_title( $psod2_p ) ); ?></h2>
					<div class="npri-body__desc"><?php echo apply_filters( 'the_content', $psod2_p->post_content ? $psod2_p->post_content : $npri_desc ); // phpcs:ignore ?></div>
<?php if ( '' !== $psod2_link ) : ?>
						<a class="arrow-link" href="<?php echo esc_url( 0 === strpos( $psod2_link, '/' ) ? home_url( $psod2_link ) : $psod2_link ); ?>"><span data-i18n="npri.readmore">Czytaj więcej</span> <span class="arw" aria-hidden="true">→</span></a>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>

<!-- ======================= CTA „DOŁĄCZ DO NAS" ======================= -->
<section class="npri-cta">
	<div class="npri-cta__bg"><img src="<?php echo esc_url( $assets . '/photo-dolacz.jpg' ); ?>" alt="" aria-hidden="true"></div>
	<div class="npri-cta__scrim" aria-hidden="true"></div>
	<div class="npri-cta__card">
		<h2 data-i18n="npri.cta.h2">Dołącz do nas</h2>
		<p data-i18n="npri.cta.p">Dołącz do nas. Skontaktuj się z nami w sprawie członkostwa.</p>
		<a class="npri-cta__btn" href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>" data-i18n="npri.cta.btn">Więcej informacji</a>
	</div>
</section>

<?php
get_footer();
