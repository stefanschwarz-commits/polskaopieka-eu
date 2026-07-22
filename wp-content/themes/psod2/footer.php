<?php
/**
 * Stopka motywu — dane organizacji, nawigacja skrócona, kontakt, pasek rejestrowy.
 *
 * @package PSOD2
 */
?>

</main><!-- #main -->

<!-- ======================= FOOTER ======================= -->
<footer class="site-footer">
	<div class="cols">
		<div>
			<h4><?php esc_html_e( 'Polskie Stowarzyszenie Opieki Domowej', 'psod2' ); ?></h4>
			<p class="addr">Nowy Świat 54/56<br>00-363 Warszawa</p>
			<p class="reg">KRS 0000992066<br>NIP 5252926975 &middot; REGON 523338263</p>
		</div>
		<div>
			<h4 data-i18n="footer.nakroty"><?php esc_html_e( 'Na skróty', 'psod2' ); ?></h4>
			<a href="<?php echo esc_url( psod2_anchor_url( 'wyzwania' ) ); ?>" data-i18n="nav.wyzwania"><?php esc_html_e( 'Wyzwania cywilizacyjne', 'psod2' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/nasze-priorytety/' ) ); ?>" data-i18n="nav.priorytety"><?php esc_html_e( 'Nasze priorytety', 'psod2' ); ?></a>
			<a href="<?php echo esc_url( psod2_anchor_url( 'dzialalnosc' ) ); ?>" data-i18n="nav.dzialalnosc"><?php esc_html_e( 'Nasza działalność', 'psod2' ); ?></a>
			<a href="<?php echo esc_url( psod2_anchor_url( 'apel' ) ); ?>" data-i18n="nav.apel"><?php esc_html_e( 'Apel do rządu', 'psod2' ); ?></a>
			<a href="<?php echo esc_url( psod2_anchor_url( 'publikacje' ) ); ?>" data-i18n="nav.publikacje"><?php esc_html_e( 'Publikacje', 'psod2' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/centrum-wiedzy/' ) ); ?>" data-i18n="nav.centrum"><?php esc_html_e( 'Centrum wiedzy', 'psod2' ); ?></a>
			<a href="<?php echo esc_url( psod2_anchor_url( 'qa' ) ); ?>" data-i18n="nav.qa"><?php esc_html_e( 'Q&A', 'psod2' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/aktualnosci/' ) ); ?>" data-i18n="nav.aktualnosci"><?php esc_html_e( 'Aktualności', 'psod2' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>" data-i18n="nav.kontakt"><?php esc_html_e( 'Kontakt', 'psod2' ); ?></a>
		</div>
		<div>
			<h4 data-i18n="footer.kontakt"><?php esc_html_e( 'Kontakt', 'psod2' ); ?></h4>
			<a href="mailto:kontakt@polskaopieka.eu">kontakt@polskaopieka.eu</a>
			<a class="li-pill" href="https://www.linkedin.com/company/polskie-stowarzyszenie-opieki-domowej/" target="_blank" rel="noopener noreferrer">
				<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.85 0-2.13 1.44-2.13 2.94v5.67H9.35V9h3.42v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28zM5.34 7.43a2.06 2.06 0 1 1 0-4.13 2.06 2.06 0 0 1 0 4.13zM7.12 20.45H3.55V9h3.57v11.45zM22.22 0H1.77C.79 0 0 .77 0 1.72v20.55C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.73V1.72C24 .77 23.2 0 22.22 0z"/></svg>
				<span><?php esc_html_e( 'LinkedIn', 'psod2' ); ?></span>
			</a>
		</div>
	</div>
	<div class="bar">
		<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Polskie Stowarzyszenie Opieki Domowej &middot; <a href="<?php echo esc_url( home_url( '/polityka-prywatnosci/' ) ); ?>" data-i18n="footer.polityka"><?php esc_html_e( 'Polityka Prywatności', 'psod2' ); ?></a></span>
		<span data-i18n="footer.tagline">Reprezentujemy sektor opieki domowej w Polsce.</span>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
