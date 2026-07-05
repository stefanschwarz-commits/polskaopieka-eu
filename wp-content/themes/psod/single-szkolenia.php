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
	<div class="container d-flex align-items-end" style="z-index: 5;">
	<div class="post-info">
	<span class="post-info__date"><?php echo get_the_date(); ?></span>
	<h2 class="post-info__title"><?php the_title(); ?></h2>
	</div>
	</div>
	</div>
	<main id="primary" class="site-main">

	<div class="container">
		


		

<?php
    endwhile;
?>

<section id="szkolenie">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" style="font-size: 1rem;">
            <div class="row gy-4 gy-md-0">
            <div class="col-md-7 szkolenie-info">
            <div class="mb-3">
            <span class="fw-bold">Termin: </span><?php echo get_field('termin'); ?>
            </div>
            <div class="mb-3">
            <span class="fw-bold">Czas trwania: </span><?php echo get_field('czas_trwania'); ?>
            </div>
            <div class="mb-3">
            <span class="fw-bold">Miejsce: </span><?php echo get_field('miejsce'); ?>
            </div>
            <div class="mb-3">
            <span class="fw-bold">Prowadzący: </span><?php echo get_field('prowadzacy'); ?>
            </div>
            <div class="mb-3 szkolenie__koszt">
            <span class="fw-bold">Koszt: </span><?php echo get_field('koszt_1'); ?>
            </div>
            <a class="btn btn-primary mt-3" style="font-weight: 500;" href="#contact-form">Rejestracja</a>
            </div>
            <div class="col-md-5">
            <img class="img-fluid h-100 w-100" style="object-fit: cover; filter: saturate(0);" src="<?php echo get_field('zdjecie'); ?>" alt="zdjecie ze szkolenia">
            </div>
            </div>
            <h5 class="mt-5 mb-3">Tematyka:</h5>
            <?php echo get_field('tematyka'); ?>
            <h5 class="mt-5 mb-3">Dla kogo?</h5>
            <?php echo get_field('dla_kogo'); ?>
            <h5 class="mt-5 mb-3">Program</h5>
            <?php echo get_field('program'); ?>
            <h5 class="mt-5 mb-3">Zadaj pytanie Prowadzącemu</h5>
            <?php echo get_field('zadaj_pytanie_prowadzacemu'); ?>
            <h5 class="mt-5 mb-3">Koszt</h5>
            <?php echo get_field('koszt'); ?>
            <h5 class="mt-5 mb-3">Lokalizacja</h5>
            <?php echo get_field('lokalizacja')['lokalizacja-opis']; ?>
            <?php 
            $location = get_field('lokalizacja')['lokalizacja-mapa'];
            if( $location ): ?>
                <div class="acf-map" data-zoom="16">
                    <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
                </div>
            <?php endif; ?>
            <h5 class="mt-5 mb-3">Kontakt</h5>
            <?php echo get_field('kontakt'); ?>
            <h5 class="mt-5 mb-3">Pozostałe informacje</h5>
            <?php echo get_field('pozostale_informacje'); ?>
            <h5 class="mt-5 mb-3">Regulamin</h5>
            <?php echo get_field('regulamin'); ?>
            </div>
        </div>
    </div>
</section>
<section id="contact-form">
<div class="container">
<h2 class="section-heading text-center mb-5">Zapisz się na kurs</h2>
<div class="contact course--contact">
<div class="row justify-content-center">
    <div class="col-md-8">
    <?php echo do_shortcode('[contact-form-7 id="77" title="Zapisz się na kurs"]'); ?>
    <? echo get_field("przetwarzanie_danych_formularz", "option");  ?>
    </div>
</div>   
</div>    

</div>

</section>
	</div>
    <?php echo get_the_cta(); ?>
	</main><!-- #main -->

<?php

get_footer();

?>


<style type="text/css">
.acf-map {
    width: 100%;
    height: 27rem;
    margin: 1rem 0;
}

.acf-map img {
   max-width: inherit !important;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_attr( defined( 'PSOD_GOOGLE_MAPS_API_KEY' ) ? PSOD_GOOGLE_MAPS_API_KEY : '' ); ?>"></script>
<script type="text/javascript">
(function( $ ) {

/**
 * initMap
 *
 * Renders a Google Map onto the selected jQuery element
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @return  object The map instance.
 */
function initMap( $el ) {

    // Find marker elements within map.
    var $markers = $el.find('.marker');

    // Create gerenic map.
    var mapArgs = {
        zoom        : $el.data('zoom') || 16,
        mapTypeId   : google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map( $el[0], mapArgs );

    // Add markers.
    map.markers = [];
    $markers.each(function(){
        initMarker( $(this), map );
    });

    // Center map based on markers.
    centerMap( map );

    // Return map instance.
    return map;
}

/**
 * initMarker
 *
 * Creates a marker for the given jQuery element and map.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   jQuery $el The jQuery element.
 * @param   object The map instance.
 * @return  object The marker instance.
 */
function initMarker( $marker, map ) {

    // Get position from marker.
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = {
        lat: parseFloat( lat ),
        lng: parseFloat( lng )
    };

    // Create marker instance.
    var marker = new google.maps.Marker({
        position : latLng,
        map: map
    });

    // Append to reference for later use.
    map.markers.push( marker );

    // If marker contains HTML, add it to an infoWindow.
    if( $marker.html() ){

        // Create info window.
        var infowindow = new google.maps.InfoWindow({
            content: $marker.html()
        });

        // Show info window when marker is clicked.
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open( map, marker );
        });
    }
}

/**
 * centerMap
 *
 * Centers the map showing all markers in view.
 *
 * @date    22/10/19
 * @since   5.8.6
 *
 * @param   object The map instance.
 * @return  void
 */
function centerMap( map ) {

    // Create map boundaries from all map markers.
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function( marker ){
        bounds.extend({
            lat: marker.position.lat(),
            lng: marker.position.lng()
        });
    });

    // Case: Single marker.
    if( map.markers.length == 1 ){
        map.setCenter( bounds.getCenter() );

    // Case: Multiple markers.
    } else{
        map.fitBounds( bounds );
    }
}

// Render maps on page load.
$(document).ready(function(){
    $('.acf-map').each(function(){
        var map = initMap( $(this) );
    });
});

})(jQuery);
</script>