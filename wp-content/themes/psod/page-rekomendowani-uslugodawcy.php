<?php get_header(); ?>


<section id="providers" style="padding-bottom: 5.625rem; ">
    <div class="container">
    <h2 class="section-heading text-center mb-3">Rekomendowani usługodawcy</h2>
        <p class="section-paragraph section-paragraph--page text-center w-75 mx-auto gray">W ramach PSOD chcemy wspierać i promować polskich pracodawców świadczących usługi opieki w Polsce i za granicą, a także reprezentować ich interesy wobec instytucji krajowych i zagranicznych, decydentów oraz mediów.</p>
        <div class="row gy-4 gy-md-5">

        <?php

        // Check rows existexists.
        if( have_rows("rekomendowani_uslugodawcy", "option") ):

            // Loop through rows.
            while( have_rows("rekomendowani_uslugodawcy", "option") ) : the_row();

                // Load sub field value.
                $logo = get_sub_field('logotyp');
                $name = get_sub_field('nazwa');
                $address = get_sub_field('adres');
                $link = get_sub_field('link');
                // Do something...
            ?>
                <div class="col-md-6">
                    <div class="provider">
                    <img class="img-fluid" src="<?php echo esc_url( $logo ); ?>" alt="usługodawca">
                        <div class="provider__name mt-4"><?php echo esc_html( $name ); ?></div>
                        <div class="provider__address"><?php echo wp_kses_post( $address ); ?></div>
                        <a class="provider__link" href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['title']); ?></a>
                    </div>
                    </div>
            <?php
            // End loop.
            endwhile;

        // No value.
        endif;
        ?>








         
        </div>
    </div>
</section>


<?php echo get_the_cta(); ?>
<?php get_footer(); ?>