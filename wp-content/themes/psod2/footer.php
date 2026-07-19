<?php
/**
 * Stopka motywu — dane kontaktowe, nawigacja skrócona, pasek rejestrowy.
 *
 * @package PSOD2
 */

$psod2_assets = get_template_directory_uri() . '/assets';
?>

<!-- ======================= FOOTER ======================= -->
<footer class="site-footer">
	<div class="cols">
		<div>
			<img src="<?php echo esc_url( $psod2_assets . '/footer-logo.svg' ); ?>" alt="<?php esc_attr_e( 'Polskie Stowarzyszenie Opieki Domowej', 'psod2' ); ?>">
			<p>Nowy Świat 54/56<br>00-363 Warszawa<br>www.polskaopieka.eu</p>
		</div>
		<div>
			<h4><?php esc_html_e( 'Na skróty', 'psod2' ); ?></h4>
			<a href="#wyzwania"><?php esc_html_e( 'Wyzwania cywilizacyjne', 'psod2' ); ?></a>
			<a href="#priorytety"><?php esc_html_e( 'Nasze priorytety', 'psod2' ); ?></a>
			<a href="#dzialalnosc"><?php esc_html_e( 'Nasza działalność', 'psod2' ); ?></a>
			<a href="#apel"><?php esc_html_e( 'Apel do rządu', 'psod2' ); ?></a>
			<a href="#publikacje"><?php esc_html_e( 'Publikacje', 'psod2' ); ?></a>
			<a href="#"><?php esc_html_e( 'Szkolenia', 'psod2' ); ?></a>
			<a href="#qa"><?php esc_html_e( 'Q&A', 'psod2' ); ?></a>
			<a href="#aktualnosci"><?php esc_html_e( 'Aktualności', 'psod2' ); ?></a>
		</div>
		<div>
			<h4><?php esc_html_e( 'Kontakt', 'psod2' ); ?></h4>
			<a href="mailto:kontakt@polskaopieka.eu">kontakt@polskaopieka.eu</a>
			<a href="tel:+48602194708">Ada Zaorska · +48 602 194 708</a>
			<a href="tel:+48795586620">Anna Grodecka · +48 795 586 620</a>
			<a href="#">LinkedIn</a>
		</div>
	</div>
	<div class="bar">
		<span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> Polskie Stowarzyszenie Opieki Domowej</span>
		<span>KRS 0000992066 · NIP 5252926975 · REGON 523338263</span>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
