<?php
/* Template Name: Example Template */ 

get_header();
?>
	<?php
            // Start the Loop.
    while ( have_posts() ) : the_post(); 

        ?>
	<div class="post-banner w-100 d-flex justify-content-end">
	<img class="post-banner__img w-100 h-100"src="<?php echo esc_url( wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ); ?>" alt="">
	<div class="container d-flex align-items-end justify-content-start justify-content-lg-center" style="z-index: 5;">
	<div class="col-lg-8">
	<div class="post-info">
	<span class="post-info__date"><?php echo esc_html( get_the_date() ); ?></span>
	<h2 class="post-info__title"><?php the_title(); ?></h2>
	</div>
	</div>
	</div>
	</div>
	<main id="primary" class="site-main">

	<div class="container">
		


		
		<div class="row justify-content-center">
			<div class="col-lg-8">
			<div class="article-content"><?php the_content(); ?></div>
			</div>
		</div>
		<?php

    endwhile;
	wp_reset_postdata();
?>

	</div>

<section id="related">
	<div class="container">
	<h2 class="section-heading mb-5">Może Ci się spodobać</h2>
		<div class="row gy-4 gy-lg-0">


					<?php
					$args = array(
						'post_type' => 'aktualnosci',
						'orderby' => 'rand',
						'posts_per_page' => 3,
					  );
					  
					  $random_posts = new WP_Query( $args );
					  
					  if ( $random_posts->have_posts() ) {
						while ( $random_posts->have_posts() ) {
						  $random_posts->the_post();
						?>
						<div class="col-md-6 col-lg-4 single-related">
						<div class="single-related__img-wrapper mb-3">
						<img class="single-related__img img-fluid w-100" src="<?php echo esc_url( wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ); ?>" alt="zdjecie postu">
						</div>
						<div class="single-related__date mb-2"><?php echo esc_html( get_the_date() ); ?></div>
						<h3 class="single-related__heading"><?php the_title(); ?></h3>
						<a class="btn btn-arrow mx-auto w-auto p-0" href="<?php echo esc_url( get_post_permalink() ); ?>">czytaj więcej <img class="ms-1" src="<?= get_template_directory_uri(); ?>/assets/arrow-right.svg" alt="strzałka"></a>
						</div>
						<?php
						}
						wp_reset_postdata();
					  } else {
						// obsługa braku postów
					  }
					  ?>
					

		</div>
	</div>
</section>


	</main><!-- #main -->

<?php

get_footer();

?>
