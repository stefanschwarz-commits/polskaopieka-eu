<?php echo get_header(); ?>
<section id="publications" style="background-color: white; padding-top: 0;">
<div class="wrapper" style="background-color: #FBFBFB; padding: 4rem 0; margin-bottom: 2.875rem;">
<h2 class="section-heading text-center mb-5">Publikacje</h2>
    <div class="container">
        <div class="row gy-4">
        <?php
        $args = array(
            'post_type'      => 'publikacje', // typ postu "publikacje
            'posts_per_page' =>  2, // maksymalna liczba postów do wyświetlenia
        );
        
        $szkolenia_query = new WP_Query( $args );
        
        if ( $szkolenia_query->have_posts() ) {
            while ( $szkolenia_query->have_posts() ) {
                $szkolenia_query->the_post();
                // poniżej wyświetlamy tytuł publikacji, datę publikacji, treść oraz link do pdf
                ?>
            <div class="col-md-6">
                <div class="publication row align-items-center">
                <div class="col-md-6">
                    <img class="publication__img img-fluid w-100" src="<?php echo esc_url( get_field('zdjecie', $post->ID) ); ?>" alt="">
                </div>
                <div class="col-md-6">
                    <div class="publication__date mb-2 mt-3 mt-md-0"><?php the_time( 'F j, Y' ); ?></div>
                    <div class="publication__heading mb-3"><?php the_title(); ?></div>
                    <div class="publication__text mb-4"><?php echo wp_kses_post( get_field('opis', $post->ID) ); ?></div>
                    <a class="btn btn-primary" href="<?php echo esc_url( get_field('plik', $post->ID) ); ?>" target="_blank">Zobacz raport</a>
                </div>
                </div>
            </div>
                <?php
                            wp_reset_postdata();
            }

        } else {
            echo 'Brak publikacji.';
        }
        ?>
 </div>
    </div>
    </div>
        <div class="container">
        <div class="row gy-4 gy-md-6">
        <?php
        $args = array(
            'post_type'      => 'publikacje', // typ postu "publikacje
            'posts_per_page' =>  999, // maksymalna liczba postów do wyświetlenia
            'offset' =>          2,
        );
        
        $szkolenia_query = new WP_Query( $args );
        
        if ( $szkolenia_query->have_posts() ) {
            while ( $szkolenia_query->have_posts() ) {
                $szkolenia_query->the_post();
                // poniżej wyświetlamy tytuł publikacji, datę publikacji, treść oraz link do pdf
                ?>
            <div class="col-md-6">
                <div class="publication row align-items-center">
                <div class="col-md-6">
                    <img class="publication__img img-fluid w-100" src="<?php echo esc_url( get_field('zdjecie', $post->ID) ); ?>" alt="">
                </div>
                <div class="col-md-6">
                    <div class="publication__date mb-2 mt-3 mt-md-0"><?php the_time( 'F j, Y' ); ?></div>
                    <div class="publication__heading mb-3"><?php the_title(); ?></div>
                    <div class="publication__text mb-4"><?php echo wp_kses_post( get_field('opis', $post->ID) ); ?></div>
                    <a class="btn btn-primary" href="<?php echo esc_url( get_field('plik', $post->ID) ); ?>" target="_blank">Zobacz raport</a>
                </div>
                </div>
            </div>
                <?php
            }
            wp_reset_postdata();
        } else {
			// do przepisania - tu byl brak publikacji 			
            echo '';
        }
        ?>

</div>
</section>
<?php get_footer(); ?>