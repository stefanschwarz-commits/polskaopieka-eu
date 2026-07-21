<?php
/**
 * Stopka motywu — dane kontaktowe, nawigacja skrócona, pasek rejestrowy.
 *
 * @package PSOD2
 */

$psod2_assets = get_template_directory_uri() . '/assets';
?>

</main><!-- #main -->

<!-- ======================= FOOTER ======================= -->
<footer class="site-footer">
	<div class="cols">
		<div>
			<img src="<?php echo esc_url( $psod2_assets . '/footer-logo.svg' ); ?>" alt="<?php esc_attr_e( 'Polskie Stowarzyszenie Opieki Domowej', 'psod2' ); ?>">
			<p>Nowy Świat 54/56<br>00-363 Warszawa<br>www.polskaopieka.eu</p>
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
			<a href="tel:+48602194708">Ada Zaorska · +48 602 194 708</a>
			<a href="tel:+48795586620">Anna Grodecka · +48 795 586 620</a>
			<a href="https://www.linkedin.com/company/polskie-stowarzyszenie-opieki-domowej/" target="_blank" rel="noopener noreferrer">LinkedIn</a>
		</div>
	</div>
	<div class="bar">
		<span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> Polskie Stowarzyszenie Opieki Domowej</span>
		<span><a href="<?php echo esc_url( home_url( '/polityka-prywatnosci/' ) ); ?>" data-i18n="footer.polityka"><?php esc_html_e( 'Polityka Prywatności', 'psod2' ); ?></a></span>
		<span>KRS 0000992066 · NIP 5252926975 · REGON 523338263</span>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
