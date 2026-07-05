<?php get_header(); ?>

<section id="contact-with-us">
    <div class="container">
    <h2 class="section-heading text-center mb-5">Skontaktuj się z nami</h2>
        <div class="row gy-4">
        <?php




  


        // Check rows existexists.
        if( have_rows('osoba') ):
            $arrayLength = sizeof(get_field('osoba'));
            $i = 1;
            // Loop through rows.
            while( have_rows('osoba') ) : the_row();

                // Load sub field value.
                $img = get_sub_field('zdjecie');
                $name = get_sub_field('imie_i_nazwisko');
                $position = get_sub_field('stanowisko');
                $mail = get_sub_field('e-mail');
                $tel = get_sub_field('nr_telefonu');
                // Do something...
        ?>
            <div class="col-md-6 col-lg-4">
               <div class="staff text-center">
                <div class="wrapper position-relative d-inline-block">
                <img class="img-fluid" src="<?php echo esc_url( $img ); ?>" alt="">
                <?php
                    if($i == $arrayLength) {
                        ?>
                        <img class="staff__square" src="<?= get_template_directory_uri(); ?>/assets/pattern_kwadraciki.svg" alt="decoration">
                    <?php
                    }
                    ?>
                </div>


                    <h4 class="staff__name mt-3 mb-2"><?php echo esc_html( $name ); ?></h4>
                    <div class="staff__position">
                    <?php echo esc_html( $position ); ?>
                    </div>
                    <a class="staff__mail d-block" href="mailto:<?php echo esc_attr( $mail ); ?>"><?php echo esc_html( $mail ); ?></a>
                    <a class="staff__tel d-block" href="tel:<?php echo esc_attr( $tel ); ?>">tel: <?php echo esc_html( $tel ); ?></a>
               </div> 
            </div>
        <?php
            $i++;
            endwhile;
        endif;

        ?>
        </div>
    </div>
</section>
<section id="contact-info">
<div class="container">

<?php $dane = get_field('dane_firmy'); ?>

    <div class="row justify-content-lg-end align-items-center gy-4 gy-lg-0 py-md-5 py-xl-0">
    <div class="col-md-6 col-lg-5">
    <h5 class="mb-3"> <?php echo esc_html( $dane['nazwa'] ); ?>
</h5>

<?php echo wp_kses_post( $dane['adres'] ); ?>

<?php echo wp_kses_post( $dane['rejestr'] ); ?>

<?php echo wp_kses_post( $dane['bank'] ); ?>

</div>
<div class="col-md-6 col-lg-6">
<img class="img-fluid" src="<?php echo esc_url( $dane['zdjecie'] ); ?>" alt="">
</div>
    </div>
</div>
</section>
<section id="contact-form" class="contact">
<div class="container">
<h2 class="section-heading text-center mb-5">Napisz do nas</h2>
<div class="contact">
<div class="row justify-content-center">
    <div class="col-md-8">
    <?php echo do_shortcode('[contact-form-7 id="71" title="Napisz do nas"]'); ?>
    <span class="administrator">
<?php echo wp_kses_post( get_field('akceptacja') ); ?>
</span>
    </div>
</div>   
</div>    

</div>
</section>


<style>
    #contact-info a {
        color: white;
    }
</style>

<?php get_footer(); ?>