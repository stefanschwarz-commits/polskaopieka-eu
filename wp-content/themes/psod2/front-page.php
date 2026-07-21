<?php
/**
 * Strona główna (front page) — PSOD 2026.
 *
 * ETAP: treść statyczna (1:1 z obecnej strony, wg projektu Claude Design).
 * KOLEJNY KROK: zamiana tekstów/obrazów na pola ACF, aby były edytowalne w panelu.
 *
 * Sekcje ukryte na życzenie PSOD (do włączenia w przyszłości): Rekomendowani
 * usługodawcy, Oferta szkoleniowa, Newsletter — nie ma ich tutaj celowo.
 *
 * @package PSOD2
 */

get_header();

$assets = get_template_directory_uri() . '/assets';
// Dokument stanowiska (na razie plik w motywie; docelowo pole ACF „plik”).
$stanowisko_pdf = $assets . '/stanowisko-PSOD-KIDO.pdf';
?>

<!-- ======================= HERO ======================= -->
<section class="hero">
	<img class="hero__img" src="<?php echo esc_url( $assets . '/photo-opieka-01.jpeg' ); ?>" alt="">
	<div class="hero__veil"></div>
	<div class="hero__inner">
		<div class="hero__over" data-i18n="hero.over">O starości, trosce i opiece</div>
		<h1>
			<span data-i18n-html="hero.h1.line1">Każdy z nas będzie kiedyś potrzebował <em>opieki</em>.</span>
			<span data-i18n="hero.h1.line2">Albo będzie ją komuś zapewniał.</span>
		</h1>
		<div class="hero__rule"></div>
	</div>
</section>

<!-- ======================= DEMOGRAFIA (suwak roku urodzenia) ======================= -->
<?php // Dane: assets/dane-demografia-pl.json (Eurostat EUROPOP2025 + EU-SILC). Logika: js/psod.js sekcja 1. ?>
<section class="demo" id="gra">
	<div class="wrap">
		<div class="sec-head">
			<h2 data-i18n="demo.h2">Zobacz, jak może wyglądać Polska w roku Twoich 80. urodzin</h2>
		</div>
		<p class="demo__q" data-i18n="demo.q">W którym roku się urodziłaś, urodziłeś?</p>
		<div class="demo__year" id="demoYear">1980</div>
		<input class="demo__range" id="demoRange" type="range" min="1940" max="2012" step="1" value="1980" aria-label="Rok urodzenia">
		<div class="demo__ends"><span>1940</span><span>2012</span></div>
		<div class="demo__facts" id="demoFacts"></div>
	</div>
</section>

<!-- ======================= WYZWANIA CYWILIZACYJNE ======================= -->
<section class="challenges" id="wyzwania">
	<div class="wrap wrap--wide">
		<div class="sec-head">
			<h2 data-i18n="wyzwania.h2">Wyzwania cywilizacyjne</h2>
			<p data-i18n="wyzwania.p">Społeczeństwa się starzeją. Według szacunków WHO do 2030 roku jedna na sześć osób na świecie będzie miała co najmniej 60 lat. W 2021 roku 65 lat lub więcej miało już 21% ludności Europy.</p>
		</div>
		<div class="grid">
			<div class="tile"><img class="tile__img" src="<?php echo esc_url( $assets . '/wyz-starzenie.jpg' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><div class="tile__accent"></div><h3 data-i18n="wyzwania.tile.starzenie">Starzenie się społeczeństw</h3></div></div>
			<div class="tile"><img class="tile__img" src="<?php echo esc_url( $assets . '/wyz-demencja.jpg' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><div class="tile__accent"></div><h3 data-i18n="wyzwania.tile.demencja">Choroby demencyjne</h3></div></div>
			<div class="tile"><img class="tile__img" src="<?php echo esc_url( $assets . '/wyz-personel.jpg' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><div class="tile__accent"></div><h3 data-i18n="wyzwania.tile.personel">Brak personelu opiekuńczego</h3></div></div>
			<div class="tile"><img class="tile__img" src="<?php echo esc_url( $assets . '/wyz-koszty.jpg' ); ?>" alt=""><div class="tile__veil"></div><div class="tile__body"><div class="tile__accent"></div><h3 data-i18n="wyzwania.tile.koszty">Rosnące koszty opieki</h3></div></div>
		</div>
	</div>
</section>

<!-- ======================= APEL DO RZĄDU ======================= -->
<section class="appeal" id="apel">
	<div class="wrap wrap--wide">
		<div class="grid">
			<a class="appeal__doc" href="<?php echo esc_url( home_url( '/stanowisko/' ) ); ?>" aria-label="<?php esc_attr_e( 'Otwórz pełną treść stanowiska', 'psod2' ); ?>">
				<img src="<?php echo esc_url( $assets . '/stanowisko-crisp.png' ); ?>" alt="Wspólne stanowisko PSOD i KIDO z 15 czerwca 2026 roku">
				<span class="appeal__doc__hint" data-i18n="apel.hint">Otwórz pełną treść →</span>
			</a>
			<div>
				<h2 data-i18n="apel.h2">Apel do rządu</h2>
				<div class="appeal__date">15 czerwca 2026</div>
				<h3 data-i18n="apel.h3">PSOD i KIDO apelują o wznowienie prac nad wykazem zawodów deficytowych</h3>
				<p data-i18n="apel.p">Co najmniej pół miliona osób w Polsce wymaga opieki długoterminowej, a już dziś brakuje około 20 tys. opiekunów. Do 2035 roku realizacja usług opiekuńczych będzie wymagała zatrudnienia około 100 tys. osób.</p>
				<p data-i18n="apel.p2">Mimo to Ministerstwo Rodziny, Pracy i Polityki Społecznej zawiesiło prace nad rozporządzeniem, które miało uznać kluczowe zawody opiekuńcze za deficytowe i usprawnić zatrudnianie wykwalifikowanych pracowników, także spoza UE.</p>
				<p data-i18n="apel.p3">PSOD i KIDO apelują o wyjaśnienie powodów tej decyzji, wznowienie prac oraz pozostawienie zawodów opiekuńczych w wykazie. Rosnące bezrobocie nie rozwiąże strukturalnego braku osób przygotowanych do opieki nad seniorami, chorymi i osobami niesamodzielnymi.</p>
				<a class="btn btn--primary" href="<?php echo esc_url( $stanowisko_pdf ); ?>" download rel="noopener" data-i18n="apel.cta">Pobierz stanowisko</a>
			</div>
		</div>
	</div>
</section>

<!-- ======================= AKTUALNOŚCI ======================= -->
<?php
// Dynamicznie: 5 najnowszych wpisow CPT „aktualnosci" (import z produkcji,
// edytowalne w wp-adminie). Pierwszy = wyrozniony, pozostale 4 = karty.
$psod2_news = new WP_Query(
	array(
		'post_type'      => 'aktualnosci',
		'post_status'    => 'publish',
		'posts_per_page' => 5,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'no_found_rows'  => true,
	)
);
$psod2_news_all  = $psod2_news->posts;
$psod2_news_feat = ! empty( $psod2_news_all ) ? array_shift( $psod2_news_all ) : null;
if ( $psod2_news_feat ) :
	?>
<section class="news" id="aktualnosci">
	<div class="wrap wrap--wide">
		<div class="news__head"><h2 data-i18n="aktualnosci.h2">Aktualności</h2></div>
		<a class="news__feat" href="<?php echo esc_url( get_permalink( $psod2_news_feat ) ); ?>">
			<div class="news__featimg">
				<?php if ( has_post_thumbnail( $psod2_news_feat ) ) : ?>
					<?php echo get_the_post_thumbnail( $psod2_news_feat, 'large', array( 'alt' => esc_attr( get_the_title( $psod2_news_feat ) ) ) ); ?>
				<?php endif; ?>
			</div>
			<div>
				<h3><?php echo esc_html( get_the_title( $psod2_news_feat ) ); ?></h3>
				<div class="date"><?php echo esc_html( psod2_polish_date( $psod2_news_feat ) ); ?></div>
				<?php
				$psod2_feat_excerpt = has_excerpt( $psod2_news_feat )
					? wp_trim_words( get_the_excerpt( $psod2_news_feat ), 30 )
					: wp_trim_words( wp_strip_all_tags( get_the_content( null, false, $psod2_news_feat ) ), 30 );
				?>
				<p><?php echo esc_html( $psod2_feat_excerpt ); ?></p>
				<span class="news__more" data-i18n="aktualnosci.feat.more">Czytaj dalej</span>
			</div>
		</a>
		<div class="news__grid">
			<?php foreach ( $psod2_news_all as $psod2_nc ) : ?>
				<a class="newscard" href="<?php echo esc_url( get_permalink( $psod2_nc ) ); ?>">
					<div class="newscard__foto">
						<?php if ( has_post_thumbnail( $psod2_nc ) ) : ?>
							<?php echo get_the_post_thumbnail( $psod2_nc, 'medium_large', array( 'alt' => esc_attr( get_the_title( $psod2_nc ) ), 'loading' => 'lazy' ) ); ?>
						<?php endif; ?>
					</div>
					<div>
						<h3><?php echo esc_html( get_the_title( $psod2_nc ) ); ?></h3>
						<div class="date"><?php echo esc_html( psod2_polish_date( $psod2_nc ) ); ?></div>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="news__all">
			<a class="arrow-link" href="<?php echo esc_url( home_url( '/aktualnosci/' ) ); ?>"><span data-i18n="aktualnosci.all">Wszystkie aktualności</span> <span class="arw" aria-hidden="true">→</span></a>
		</div>
	</div>
</section>
	<?php
endif;
wp_reset_postdata();
?>

<!-- ======================= CYTAT-PIECZĘĆ ======================= -->
<section class="seal">
	<div class="seal__mark" aria-hidden="true">„</div>
	<div class="wrap">
		<div class="seal__orn" aria-hidden="true"><span class="ln"></span><span class="dia"></span><span class="ln"></span></div>
		<blockquote data-i18n-html="seal.quote">Każdy ma prawo do przystępnych cenowo i&nbsp;dobrej jakości usług opieki długoterminowej, <em>w&nbsp;szczególności opieki&nbsp;w&nbsp;domu</em>.</blockquote>
		<div class="seal__src" data-i18n="seal.src">18. zasada Europejskiego Filaru Praw Socjalnych</div>
	</div>
</section>

<!-- ======================= FILARY (zakładki) ======================= -->
<?php // Filary z CPT „filar" (edytowalne w wp-adminie, menu „Filary"); dane → JS przez psod2_frontpage_data(), render w js/psod.js. ?>
<section class="pillars">
	<div class="wrap wrap--wide">
		<div class="sec-head"><h2 data-i18n="pillars.h2">Filary opieki domowej</h2></div>
		<div class="pillars__cols">
			<div class="pillars__tabs" role="tablist" aria-label="Filary opieki domowej" id="pillarTabs"></div>
			<div class="pillars__panel" role="tabpanel" id="pillarPanel"></div>
		</div>
	</div>
</section>

<!-- ======================= O NAS ======================= -->
<section class="about">
	<div class="wrap">
		<img class="about__mark" src="<?php echo esc_url( $assets . '/sygnet.svg' ); ?>" alt="">
		<h2 data-i18n="about.h2">Polskie Stowarzyszenie Opieki Domowej</h2>
		<p data-i18n-html="about.p1"><b>jest organizacją pracodawców</b> zrzeszającą polskie firmy świadczące profesjonalne usługi opieki domowej.</p>
		<a class="about__toggle" href="<?php echo esc_url( home_url( '/o-nas/' ) ); ?>"><span data-i18n="about.more">czytaj więcej</span> <span>→</span></a>
	</div>
</section>

<!-- ======================= PRIORYTETY ======================= -->
<?php $psod2_prio_list = psod2_get_priorytety(); ?>
<?php if ( $psod2_prio_list ) : ?>
<section class="priorities" id="priorytety">
	<div class="wrap wrap--wide">
		<div class="sec-head">
			<h2 data-i18n="priorytety.h2">Nasze priorytety</h2>
			<p data-i18n="priorytety.p">Przyszłość opieki domowej zaczyna się dziś. Oto kluczowe obszary działań Polskiego Stowarzyszenia Opieki Domowej.</p>
		</div>
		<div class="grid">
			<?php foreach ( $psod2_prio_list as $psod2_p ) : ?>
				<a class="tile" href="<?php echo esc_url( home_url( '/nasze-priorytety/' ) ); ?>">
					<?php if ( has_post_thumbnail( $psod2_p ) ) : ?>
						<?php echo get_the_post_thumbnail( $psod2_p, 'medium_large', array( 'class' => 'tile__img', 'alt' => '' ) ); ?>
					<?php endif; ?>
					<div class="tile__veil"></div>
					<div class="tile__body"><h3><?php echo esc_html( get_the_title( $psod2_p ) ); ?></h3></div>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="priorities__cta"><a class="btn btn--primary btn--uppercase" href="<?php echo esc_url( home_url( '/nasze-priorytety/' ) ); ?>" data-i18n="priorytety.cta">Więcej</a></div>
	</div>
</section>
<?php endif; ?>

<!-- ======================= DZIAŁALNOŚĆ ======================= -->
<section class="activity" id="dzialalnosc">
	<div class="wrap">
		<div class="sec-head">
			<h2 data-i18n="dzialalnosc.h2">Nasza działalność</h2>
			<p data-i18n="dzialalnosc.p">Polskie Stowarzyszenie Opieki Domowej działa na styku wielu dziedzin w celu zapewnienia maksymalnych korzyści swoim członkom. Przede wszystkim chcemy wpływać na ukształtowanie przyjaznego środowiska politycznego, społecznego i prawnego, które będzie wspierało legalne i efektywne świadczenie usług opieki domowej.</p>
		</div>
		<p class="lead2" data-i18n="dzialalnosc.lead2">W tym celu podejmujemy następujące działania:</p>
		<div class="grid">
			<div class="acttile"><span class="ico"><img src="<?php echo esc_url( $assets . '/ico-edukacja.svg' ); ?>" alt=""></span><span data-i18n="dzialalnosc.act.edukacja">Edukacja</span></div>
			<div class="acttile"><span class="ico"><img src="<?php echo esc_url( $assets . '/ico-doradztwo.svg' ); ?>" alt=""></span><span data-i18n="dzialalnosc.act.doradztwo">Doradztwo</span></div>
			<div class="acttile"><span class="ico"><img src="<?php echo esc_url( $assets . '/ico-reprezentowanie.svg' ); ?>" alt=""></span><span data-i18n="dzialalnosc.act.reprezentowanie">Reprezentowanie</span></div>
		</div>
	</div>
</section>

<!-- ======================= MITY (gra) ======================= -->
<?php // Twierdzenia i fakty z CPT „mit" (edytowalne w wp-adminie, menu „Mity"); dane → JS przez psod2_frontpage_data(). Mit #2 ma celowy placeholder faktu (brak w oryginale). ?>
<section class="myths">
	<div class="wrap">
		<div class="overline overline--care" data-i18n="myths.overline">Sprawdź się — zabawa edukacyjna</div>
		<h2 data-i18n="myths.h2">Prawda czy mit?</h2>
		<p class="myths__intro" data-i18n="myths.intro">Wokół opieki domowej narosło wiele stereotypów. Przeczytaj twierdzenie, zaufaj intuicji — a potem odkryj, czy to prawda, czy mit.</p>
		<div class="myths__card">
			<div class="myths__dots" id="mythDots"></div>
			<div class="myth__inner" id="mythInner"></div>
			<div class="myths__foot">
				<span class="count" id="mythCount"></span>
				<a class="arrow-link arrow-link--muted" href="#" id="mythNext"><span data-i18n="myths.next">Następne twierdzenie</span> <span class="arw">→</span></a>
			</div>
		</div>
	</div>
</section>

<!-- ======================= PUBLIKACJE ======================= -->
<section class="pubs" id="publikacje">
	<div class="wrap wrap--wide">
		<div class="grid">
			<div class="pubs__cover"><img src="<?php echo esc_url( $assets . '/report-cover.jpg' ); ?>" alt="Okładka raportu „Wyzwania branży opieki domowej 2024”"></div>
			<div>
				<div class="pubs__meta">Polskie Stowarzyszenie Opieki Domowej · 13 marca 2024</div>
				<h3 data-i18n="pubs.title">Raport „Senioralna opieka domowa — wczoraj, dziś i jutro”</h3>
				<p data-i18n="pubs.p1">W niniejszym opracowaniu przyglądamy się usługom opieki długoterminowej, świadczonym przez cudzoziemców w prywatnych gospodarstwach domowych. Zgodnie z definicją Światowej Organizacji Zdrowia, opieka długoterminowa obejmuje zarówno wsparcie o charakterze społecznym (pomoc w codziennych czynnościach, towarzyszenie), jak i usługi medyczne dedykowane osobom, które przez dłuższy okres są zależne od innych. Opieka ta może być realizowana w placówkach stacjonarnych, takich jak domy opieki, ale także w prywatnych mieszkaniach i domach podopiecznych, co stanowi esencję opieki domowej.</p>
				<p data-i18n="pubs.p2">Raport koncentruje się na opiece domowej nad osobami starszymi (60+), z naciskiem na rolę pracowników cudzoziemskich. Sektor opieki nad seniorami będzie odgrywał coraz większą rolę w nadchodzących latach, a zapotrzebowanie na zagranicznych opiekunów będzie rosło. Mimo zmieniającej się dynamiki na rynku pracy w Europie, przewiduje się, że migracje opiekuńcze pozostaną istotnym zjawiskiem. Chociaż sytuacja w Polsce ulega poprawie, a różnice w zarobkach się zmniejszają, nie należy spodziewać się gwałtownego zahamowania trendu zatrudniania cudzoziemców do opieki nad osobami starszymi.</p>
				<p data-i18n="pubs.p3">Jednocześnie, z biegiem czasu możemy obserwować zmiany w kierunkach migracji opiekuńczych. Na przykład, malejące zainteresowanie migracją z Polski do Niemiec jest efektem poprawiającej się sytuacji gospodarczej w Polsce. Zmniejszająca się różnica w zarobkach sprawia, że część personelu opiekuńczego może uznać, że strategia mobilności staje się mniej atrakcyjna finansowo.</p>
				<a class="btn btn--primary" href="<?php echo esc_url( $assets . '/raport-senioralna-opieka-domowa-2024.pdf' ); ?>" download rel="noopener" data-i18n="pubs.cta">Zobacz raport</a>
			</div>
		</div>
	</div>
</section>

<!-- ======================= Q&A ======================= -->
<?php
// Dynamicznie z CPT „faq" (edytowalne w wp-adminie, menu „Q&A"). Pytanie = tytuł,
// odpowiedź = treść. Kolejność wg pola „Kolejność" (menu_order). Pierwszy otwarty.
$psod2_faq = new WP_Query(
	array(
		'post_type'      => 'faq',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'no_found_rows'  => true,
	)
);
if ( $psod2_faq->have_posts() ) :
	?>
<section class="faq" id="qa">
	<div class="wrap">
		<div class="faq__head"><h2 data-i18n="qa.h2">Pytania i odpowiedzi</h2></div>
		<div class="faq__list">
			<?php
			$psod2_faq_first = true;
			while ( $psod2_faq->have_posts() ) :
				$psod2_faq->the_post();
				?>
				<details<?php echo $psod2_faq_first ? ' open' : ''; ?>>
					<summary><?php the_title(); ?></summary>
					<div><?php the_content(); ?></div>
				</details>
				<?php
				$psod2_faq_first = false;
			endwhile;
			?>
		</div>
	</div>
</section>
	<?php
endif;
wp_reset_postdata();
?>

<!-- ======================= DOŁĄCZ ======================= -->
<section class="join" id="dolacz">
	<img class="join__img" src="<?php echo esc_url( $assets . '/photo-dolacz.jpg' ); ?>" alt="">
	<div class="join__veil"></div>
	<div class="join__box">
		<h2 data-i18n="join.h2">Zadbajmy o to razem.</h2>
		<p data-i18n="join.p">PSOD zrzesza firmy opieki domowej, by wspólnie reprezentować branżę wobec decydentów i mediów — w Polsce i w Unii Europejskiej. Im więcej pracodawców z nami działa, tym skuteczniej chronimy interesy opiekunów i seniorów oraz budujemy standardy godnej opieki.</p>
		<div class="join__cta">
			<a class="fill" href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>" data-i18n="join.cta1">Dołącz do PSOD</a>
			<?php $psod2_wesprzyj = get_page_by_path( 'wesprzyj' ); ?>
				<?php if ( $psod2_wesprzyj ) : ?>
					<a class="ghost" href="<?php echo esc_url( get_permalink( $psod2_wesprzyj ) ); ?>" data-i18n="join.cta2">Wesprzyj nasze działania</a>
				<?php endif; ?>
		</div>
	</div>
</section>

<?php
get_footer();
