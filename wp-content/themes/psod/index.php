<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PSOD
 */




 
get_header();


?>
	<main id="primary" class="site-main">
<?php
$args=array('order'=> 'DESC', 'posts_per_page'=>'1',);
$query=new WP_Query($args);

if( $query->have_posts()): 

while( $query->have_posts()): $query->the_post();

{
?>

<div class="newest-news">
<div class=" container container-fluid-right">
	<div class="row py-6 py-md-0 gy-4 gy-md-0 align-items-center">
		<div class="col-md-7 col-xl-6">
		<div class="wrapper">
		<div class="newest-news__date mb-4"><?php echo esc_html( get_the_date() ); ?></div>
			<h5 class="newest-news__title mb-4"><?php the_title(); ?></h5>
			<p class="newest-news__excerpt mb-4 d-block"><?php the_excerpt(); ?></p>
			<a class="btn btn-arrow w-auto p-0" href="<?php echo esc_url( get_post_permalink() ); ?>">czytaj więcej <img class="ms-1" src="<?= get_template_directory_uri(); ?>/assets/arrow-right.svg" alt=""></a>
		</div>
		</div>
		<div class="col-md-5 col-xl-6">
		<img class="img-fluid newest-news__img w-100" src="<?php echo esc_url( wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ); ?>" alt="">
		</div>
		
	</div>
</div>
</div>

<?php
    }
	endwhile; 
	endif;
?>
	<div class="news" style="margin: 4rem 0;">
		<div class="container">
			<div class="row gy-4 gy-md-5">
			<?php

$args=array('order'=> 'DESC', 'offset' => -1,);

$query=new WP_Query($args);

if( $query->have_posts()): 

while( $query->have_posts()): $query->the_post();

{


?>
<div class="col-md-6 col-xl-4">
<a class="news" href="<?php echo esc_url( get_permalink() ); ?>" style="text-decoration: none;">
<img class="news__img img-fluid w-100" src="<?php echo esc_url( wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ); ?>" alt="">

<div class="wrapper mt-3 d-flex align-items-center">
<span class="news__date"><?php echo esc_html( get_the_date() ); ?></span>
</div>
<span class="news__title d-block"><?php echo esc_html( $post->post_title ); ?></span>
<p class="news__excerpt mb-4 d-block"><?php the_excerpt(); ?></p>
</a>
</div>

<?php
}

endwhile; 
endif;
?>
			</div>
		</div>
	</div>

	</main><!-- #main -->

<?php
get_footer();
