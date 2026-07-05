<?php get_header(); ?>

<section id="cele" style="margin-bottom: 2.25rem;">
    <div class="container">
    <h2 class="section-heading section-heading--page text-center">Wyzwania cywilizacyjne</h2>

        <?php
    

        if( have_rows('wyzwania') ):
            $counter = 0;

            while( have_rows('wyzwania') ) : the_row();

                $img_url = get_sub_field('zdjecie');
                $heading = get_sub_field('naglowek');
                $text = get_sub_field('tekst');
                $link = get_sub_field('link');

        ?>
        <div class="row justify-content-between" id="<?php echo  str_replace(' ', '-', strtolower($heading)); ?>">
        <div class="col-md-6">
        <img class="img-fluid w-100" style="height: 100%; max-height: 306px; object-fit: cover;" src="<?php echo $img_url; ?>" alt="">
        </div>
        <div class="col-md-6 <?php if($counter % 2 !== 0) {echo 'order-md-first';} ?>">
        <h3 class="cel__heading mb-3 mt-4 mt-md-0 <?php if($counter % 2 == 0) {echo 'ms-lg-5';} ?>">
        <?php echo $heading; ?>
        </h3>
        <p class="cel__text <?php if($counter % 2 == 0) {echo 'ms-lg-5';} ?>">
        <?php echo $text; ?>
        </p>
        <a class="btn btn-arrow mx-auto w-auto mt-3 p-0 <?php if($counter % 2 == 0) {echo 'ms-lg-5';} ?>" href="<?php echo $link; ?>">Czytaj więcej <img class="ms-1" src="<?= get_template_directory_uri(); ?>/assets/arrow-right.svg" alt=""></a>
        </div>
        </div>   


        <?php

            $counter++;
            endwhile;

        endif;
        ?>

    </div>
</section>
<?php echo get_the_cta(); ?>

<?php get_footer(); ?>