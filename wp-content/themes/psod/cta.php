



<section id="join-us" style="background-image: url(<?= get_template_directory_uri(); ?>/assets/cta-contact.jpg); background-size:cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col d-flex justify-content-center text-center">
                <div class="cta">
                    <div class="cta__heading"><?php echo esc_html( get_field("cta", "option")['cta']['naglowek'] ); ?></div>
                    <div class="cta__text py-4"><?php echo wp_kses_post( get_field("cta", "option")['cta']['tekst'] ); ?></div>
                    <a class="btn cta__btn" href="<?php echo esc_url( get_field("cta", "option")['cta']['czytaj_wiecej'] ); ?>">Więcej informacji</a>
                </div>
            </div>
        </div>
    </div>
</section>



