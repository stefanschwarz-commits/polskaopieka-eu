<?php
/**
 * Pojedynczy wpis CPT „aktualnosci" — URL /aktualnosci/{slug}/.
 *
 * Dwa warianty układu (do wyboru przez ?wariant=1a / ?wariant=1b), zgodnie z
 * handoffem design_handoff_aktualnosc/:
 *   1A „Klasyczny redakcyjny" — wyśrodkowany, jedna kolumna (domyślny).
 *   1B „Magazynowy" — nagłówek do lewej + panel boczny (spis treści, udostępnij,
 *      powrót). Spis treści generowany z nagłówków H2 z atrybutem id.
 *
 * Treść przez the_content(); realne zdjęcie wyróżniające lub gradient-placeholder
 * (gdy brak — np. świadomie usunięte, bo brak licencji na fotografię).
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
	// Domyślny układ: 1B „magazynowy" (wybór Stefana). ?wariant=1a przełącza na klasyczny.
	$wariant  = ( isset( $_GET['wariant'] ) && '1a' === strtolower( sanitize_key( $_GET['wariant'] ) ) ) ? '1a' : '1b';
	$permalink = get_permalink();

	// Treść + spis treści. Nagłówkom H2 bez id nadajemy id (slug z tekstu), żeby
	// spis treści (wariant 1B) działał dla dowolnego wpisu, nie tylko tych z
	// ręcznie ustawionymi id.
	ob_start();
	the_content();
	$tresc = ob_get_clean();
	$toc = array();
	$tresc = preg_replace_callback(
		'/<h2([^>]*)>(.*?)<\/h2>/is',
		function ( $m ) use ( &$toc ) {
			$attrs = $m[1];
			$inner = $m[2];
			if ( preg_match( '/\bid="([^"]+)"/', $attrs, $idm ) ) {
				$id = $idm[1];
			} else {
				$id = sanitize_title( wp_strip_all_tags( $inner ) );
				if ( '' === $id ) {
					$id = 'sekcja-' . ( count( $toc ) + 1 );
				}
				$attrs .= ' id="' . esc_attr( $id ) . '"';
			}
			$toc[] = array(
				'id'   => $id,
				'text' => trim( wp_strip_all_tags( $inner ) ),
			);
			return '<h2' . $attrs . '>' . $inner . '</h2>';
		},
		$tresc
	);

	// Hero (zdjęcie lub placeholder).
	if ( has_post_thumbnail() ) {
		$hero = '<figure class="artykul-hero artykul-hero--img">'
			. get_the_post_thumbnail( get_the_ID(), 'large', array(
				'alt'   => esc_attr( get_the_title() ),
				'sizes' => '(max-width: 760px) 100vw, 720px',
			) )
			. '</figure>';
	} else {
		$hero = '<div class="artykul-hero"><span class="artykul-hero__label" data-i18n="artykul.herolabel">'
			. esc_html__( 'Foto — do wpięcia po uzyskaniu licencji', 'psod2' )
			. '</span></div>';
	}

	$back_link = '<a class="artykul-back" href="' . esc_url( $archive_url ) . '"><span class="ar" aria-hidden="true">←</span> <span data-i18n="artykul.back">' . esc_html__( 'Wróć do aktualności', 'psod2' ) . '</span></a>';
	?>

	<article class="artykul artykul--<?php echo esc_attr( $wariant ); ?>">

		<?php if ( '1b' === $wariant ) : ?>

			<!-- ============ WARIANT 1B — magazynowy ============ -->
			<div class="wrap"><?php echo $back_link; // phpcs:ignore ?></div>

			<header class="artykul-head artykul-head--left">
				<div class="wrap">
					<div class="artykul-meta">
						<span class="artykul-meta__cat" data-i18n="artykul.cat">Aktualności</span>
						<span class="artykul-meta__dot" aria-hidden="true"></span>
						<span class="artykul-meta__date"><?php echo esc_html( psod2_polish_date() ); ?></span>
					</div>
					<h1><?php the_title(); ?></h1>
				</div>
			</header>

			<div class="wrap"><?php echo $hero; // phpcs:ignore ?></div>

			<div class="wrap artykul-layout">
				<div class="artykul-layout__main artykul-body"><?php echo $tresc; // phpcs:ignore ?></div>
				<aside class="artykul-aside">
					<?php if ( $toc ) : ?>
						<div class="artykul-aside__box">
							<div class="artykul-aside__label" data-i18n="artykul.toc">W tym artykule</div>
							<nav class="artykul-toc">
								<?php foreach ( $toc as $t ) : ?>
									<a href="#<?php echo esc_attr( $t['id'] ); ?>"><?php echo esc_html( $t['text'] ); ?></a>
								<?php endforeach; ?>
							</nav>
						</div>
						<div class="artykul-aside__sep" aria-hidden="true"></div>
					<?php endif; ?>
					<div class="artykul-aside__box">
						<div class="artykul-aside__label" data-i18n="artykul.share">Udostępnij</div>
						<div class="artykul-share">
							<a href="<?php echo esc_url( 'https://www.linkedin.com/sharing/share-offsite/?url=' . rawurlencode( $permalink ) ); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a>
							<a href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( $permalink ) ); ?>" target="_blank" rel="noopener noreferrer">Facebook</a>
							<button type="button" class="artykul-share__copy js-copy-link" data-url="<?php echo esc_url( $permalink ); ?>" data-i18n="artykul.copy">Kopiuj link</button>
						</div>
					</div>
					<a class="btn btn--secondary artykul-aside__back" href="<?php echo esc_url( $archive_url ); ?>"><span aria-hidden="true">←</span> <span data-i18n="artykul.ctaall">Wszystkie aktualności</span></a>
				</aside>
			</div>

		<?php else : ?>

			<!-- ============ WARIANT 1A — klasyczny redakcyjny ============ -->
			<div class="wrap"><?php echo $back_link; // phpcs:ignore ?></div>

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

			<div class="wrap"><?php echo $hero; // phpcs:ignore ?></div>

			<div class="artykul-body"><?php echo $tresc; // phpcs:ignore ?></div>

			<div class="wrap artykul-cta">
				<a class="btn btn--secondary" href="<?php echo esc_url( $archive_url ); ?>"><span aria-hidden="true">←</span> <span data-i18n="artykul.ctaall">Wszystkie aktualności</span></a>
			</div>

		<?php endif; ?>

	</article>

<?php endwhile; ?>

<?php
get_footer();
