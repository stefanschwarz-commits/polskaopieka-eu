<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package PSOD
 */

get_header();
?>
	<?php
            // Start the Loop.
    while ( have_posts() ) : the_post(); 

        ?>
	<div class="post-banner w-100 d-flex justify-content-end">
	<img class="post-banner__img w-100 h-100"src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="">
	<div class="container d-flex align-items-end justify-content-start justify-content-lg-center" style="z-index: 5;">
	<div class="col-lg-8">
	<div class="post-info">
	<span class="post-info__date"><?php echo get_the_date(); ?></span>
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

			<?php

// Check rows existexists.
if( have_rows('przypisy') ):
?>

<?php
	// Loop through rows.
	while( have_rows('przypisy') ) : the_row();

		// Load sub field value.
		$przypis = get_sub_field('przypis');
		?>
		<div class="note"><?php echo $przypis; ?></div>
		<?php

	// End loop.
	endwhile;

// No value.
	// Do something...
endif;
?>
			</div>
			
		</div>
		
		<?php

    endwhile;
	wp_reset_postdata();
?>

	</div>

	</main><!-- #main -->

<?php

get_footer();

?>
