<?= get_header(); ?>

<section id="hero">
<div class="swiper slider-hero">
  <div class="swiper-wrapper">

  <?php

        // Loop through rows.
        while( have_rows('slider') ) : the_row();

            // Load sub field value.
            $img = get_sub_field('zdjecie');
            $heading = get_sub_field('tytul');
            $text = get_sub_field('tekst');

            // Do something...
        ?>
        <div class="swiper-slide" style="position: relative;">
        <div class="background" style="z-index: -1; filter: saturate(0); position: absolute; width: 100%; height: 100%; background-image: url('<?php echo $img; ?>'); background-size: cover; background-position: center;"></div>
        <div class="container text-center">
        <h4 class="fw-bold"><?php echo $heading; ?></h4>
        <p class="pt-2"><?php echo $text ?>​</p>
        </div>
        </div>
        <?php
        // End loop.
        endwhile;
?>

  </div>
  
  <div class="swiper-pagination"></div>
  
</div>
</section>
<section id="news">
    <h2 class="section-heading text-center mb-5">Aktualności</h2>
    <div class="container">
        <div class="row gy-3 gy-md-0">
        
        
        <?php

        $args=array('post_type'=> 'aktualnosci','order'=> 'DESC', 'posts_per_page'=>'9');

        $query=new WP_Query($args);

        if( $query->have_posts()): 

        while( $query->have_posts()): $query->the_post();

        {

        $flaga = get_field('flaga');

        ?>
        <div class="col-md-4">
        <a class="post" href="<?php echo get_permalink(); ?>" style="text-decoration: none;">
        <div class="post__img-wrapper">
        <img class="post__img h-100 w-100" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="">
        </div>

        <div class="wrapper mt-3 d-flex align-items-center">
        <span class="post__date me-3"><?php echo get_the_date(); ?></span>
        <div class="post__flag post__flag--<?php echo strtolower($flaga); ?> d-inline-block"><?php echo $flaga; ?></div>

        </div>
        <span class="post__title mb-4 d-block"><?php echo $post->post_title; ?></span>

        </a>
        </div>

    <?php
    }
    endwhile; 
    endif;
    wp_reset_postdata();
    ?>

<a href="/aktualnosci" class="btn btn-primary mt-5 w-auto mx-auto">Więcej aktualności</a>
        </div>
    </div>
</section>

<section id="publikacje-single">
	<h2 class="section-heading text-center mb-5"><?php echo get_field('stanowisko')['tytul'] ?? "" ;?></h2>
		<?php 
		$publikacja = get_field('stanowisko')['podlinkowana_publikacja'];
		?>
	    <div class="container">
			<div class="row gy-4 gy-md-0">
				<div class="col-md-12">
					<div class="publication row align-items-center">
					<div class="col-md-4">
						<img class="publication__img img-fluid w-100" src="<?php echo get_field('zdjecie', $publikacja->ID) ?? "#" ?>" alt="">
					</div>
					<div class="col-md-8">
						<div class="publication__date mb-2 mt-3 mt-md-0">
						    <?php
							if ( !empty($publikacja->post_date) ) {
								$timestamp = strtotime($publikacja->post_date);
								echo date_i18n( 'j F, Y', $timestamp );
							}
							?>
						</div>
						<h3 class="publication__heading mb-3"><?php echo $publikacja->post_title ?? "" ;?></h3>
						<div class="publication__text mb-4"><?php echo get_field('stanowisko')['opis'] ?? "" ?></div>
						<a class="btn btn-primary" href="<?php echo get_field('plik', $publikacja->ID) ?? "#" ?>" target="_blank">Zobacz stanowisko</a>
					</div>
							    <a class="btn btn-arrow mx-auto w-auto mt-5" href="/publikacje">więcej publikacji <img class="ms-1" src="<?= get_template_directory_uri(); ?>/assets/arrow-right.svg" alt=""></a>

					</div>
            	</div>
			</div>
		</div>

</section>

<section id="challenges">
<h2 class="section-heading text-center mb-5">Wyzwania cywilizacyjne</h2>
    <div class="container">
        <div class="row gy-4 gy-lg-0">
        <?php

        // Check rows existexists.
        if( have_rows('wyzwania_cywilizacyjne') ):

            // Loop through rows.
            while( have_rows('wyzwania_cywilizacyjne') ) : the_row();

                // Load sub field value.
                $text = get_sub_field('tekst');
                $img = get_sub_field('zdjecie');
                $link = get_sub_field('link');
                // Do something...
            ?>
            <a href="<?php echo $link; ?>" class="col-6 col-md-4 col-lg-3 d-block">
            <div class="challenge d-block">
            <img class="challenge__img w-100 h-100" src="<?php echo $img; ?>" alt="">
            <span class="challenge__text"><?php echo $text; ?></span>
            </div>
            </a>
            <?php
            // End loop.
            endwhile;
        endif;
        ?>
                </div>
    </div>
</section>
<section id="about">
    <div class="container">
        <div class="row flex-column">
        <img src="<?= get_template_directory_uri(); ?>/assets/sygnet.svg" alt="psod" width="32px" height="32px">
        <h2 class="section-heading text-center mb-3 mt-4"><?php echo get_field('o_nas')['naglowek']; ?></h2>
        <p class="text-center mx-auto"><?php echo get_field('o_nas')['tekst']; ?></p>
        <a class="btn btn-arrow mx-auto w-auto" href="<?php echo get_field('o_nas')['link_do_czytaj_dalej']; ?>">czytaj więcej <img class="ms-1" src="<?= get_template_directory_uri(); ?>/assets/arrow-right.svg" alt=""></a>
        </div>
    </div>
</section>
<section id="priorities">
    <div class="container">
    <h2 class="section-heading text-center mb-3">Nasze priorytety</h2>
        <p class="section-paragraph text-center w-75 mx-auto gray"><?php echo get_field('nasze_priorytety')['podtytul']; ?></p>
        <div class="row gy-4 gy-lg-0">
        <?php 
        $rows = get_field('nasze_priorytety')['priorytety'];
        if( $rows ) {

            foreach( $rows as $row ) {
                $image = $row['zdjecie'];
                $text = $row['tekst'];
                $link = $row['link'];
                ?>
               
                <div class="col-md-6 col-lg-4">
                <a href="<?php echo $link; ?>" class="priority d-block">
                <div class="priority__gradient"></div>
                <div class="priority__img" style="background-image: url('<?php echo $image; ?>');"></div>
                <span class="priority__heading">
                <?php echo $text; ?>
                    </span>
                </a>
                </div>

                <?php
            }

        }
        ?>
        <a href="/nasze-priorytety" class="btn btn-primary mt-5 w-auto mx-auto">WIĘCEJ</a>
        </div>
    </div>
</section>
<section id="activity">
    <div class="container">
    <h2 class="section-heading text-center mb-3">Nasza działalność</h2>
    <p class="section-paragraph text-center w-75 mx-auto gray mb-0"><?php echo get_field('nasza_dzialalnosc')['podtytul']; ?></p>
        <div class="row py-5 gy-4 gy-lg-0">
            <div class="col-md-6 col-lg-4">
                <a class="single-activity text-center py-4 d-block text-decoration-none" href="/edukacja">
                <svg class="single-activity__icon" width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M51.75 49.3093L36 58.1687L20.25 49.3093V39.949L15.75 37.449V51.9409L36 63.3316L56.25 51.9409V37.449L51.75 39.949V49.3093Z" fill="#BB16A3"/>
                    <path d="M36 6.46558L4.5 22.7989V26.699L36 44.1985L63 29.199V41.6251H67.5V22.7989L36 6.46558ZM58.5 26.5512L54 29.0511L36 39.0516L18 29.0511L13.5 26.5512L10.3811 24.8184L36 11.5345L61.6189 24.8184L58.5 26.5512Z" fill="#BB16A3"/>
                    </svg>
                    <div class="single-activity__text mt-3">Edukacja</div>
    </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a class="single-activity text-center py-4 d-block text-decoration-none" href="/doradztwo">
                <svg class="single-activity__icon" width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_852_11975)">
<path d="M24.6731 24.0847C21.0944 26.8313 19 30.1974 19 34.8043C19 42.8663 25.197 46.144 33.1399 48.8017C39.6862 51.0165 44.0497 52.6995 44.0497 57.3065C44.0497 61.2933 40.1218 63.862 34.9727 63.862C30.2591 63.862 26.7682 62.4445 24.5861 61.027L22.6656 66.0768C25.6333 67.7598 29.8229 69 34.798 69C43.7004 69 50.8576 64.2158 50.8576 56.4201C50.8576 53.4079 49.3742 50.3957 47.6283 48.9782C52.2542 45.8778 54 41.9799 54 38.6132C54 30.994 47.803 27.7163 38.8129 24.6158C30.6954 21.7809 28.1647 19.4777 28.1647 15.4026C28.1647 10.7957 32.4412 8.13803 37.9404 8.13803C43.4395 8.13803 47.3667 10.2639 49.5488 11.7703L51.5563 6.63229C48.2393 4.24019 43.1771 3 37.8527 3C29.7352 3 21.2691 6.98684 21.2691 16.2C21.2691 19.9206 23.1896 22.8445 24.6731 24.0847ZM28.5133 26.9196C30.6954 28.2488 34.0994 29.489 38.5506 31.172C45.4455 33.7414 47.8023 36.399 47.8023 39.6768C47.8023 42.2462 46.5804 44.461 43.8743 46.4096C40.9066 44.7266 36.5424 43.2201 33.0515 41.9799C27.3784 39.8541 25.2833 37.1074 25.2833 33.7407C25.2833 30.994 26.5051 28.5136 28.5126 26.9189L28.5133 26.9196Z" fill="#BB16A3"/>
</g>
<defs>
<clipPath id="clip0_852_11975">
<rect width="35" height="66" fill="white" transform="matrix(-1 0 0 -1 54 69)"/>
</clipPath>
</defs>
</svg>

                    <div class="single-activity__text mt-3">Doradztwo</div>
    </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a class="single-activity text-center py-4 d-block text-decoration-none" href="/reprezentowanie">
                <svg class="single-activity__icon" width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M34.8411 2.01904L2.25 17.7111V25.8749H69.75V17.6678L34.8411 2.01904ZM65.25 21.3749H6.75V20.5388L34.9089 6.98085L65.25 20.5821V21.3749ZM2.25 69.7499H69.75V55.125H2.25V69.7499ZM6.75 59.625H65.25V65.25H6.75V59.625ZM10.125 29.2499H14.625V51.75H10.125V29.2499ZM57.375 29.2499H61.875V51.75H57.375V29.2499ZM25.875 29.2499H30.375V51.75H25.875V29.2499ZM41.625 29.2499H46.125V51.75H41.625V29.2499Z" fill="#BB16A3"/>
</svg>

                    <div class="single-activity__text mt-3">Reprezentowanie</div>
    </a>
            </div>
    </div>
    </div>
</section>
<section id="myths">
    <div class="container">
    <h2 class="section-heading text-center mb-3">Mity na temat opieki domowej</h2>
    <p class="section-paragraph text-center w-75 mx-auto gray mb-0"><?php echo get_field('mity')['podtytul']; ?></p>
    <div class="myth-row row gy-4 gy-lg-0">
    <?php

    // Check rows existexists.
    if( have_rows("mity", "option") ):
        $mythID = 1;
        // Loop through rows.
        while( have_rows("mity", "option") ) : the_row();

            // Load sub field value.
            $nazwa = get_sub_field('nazwa');
    ?>
        <div class="col-md-6 col-lg-3 d-flex">
            <a href="/mity?fake=<?php echo $mythID; ?>" class="myth d-flex w-100 text-decoration-none">
                <img class="myth__fake" src="<?= get_template_directory_uri(); ?>/assets/fake.svg" alt="fake">
                <div class="myth__text text-center d-flex align-items-center">
                <?php echo $nazwa; ?>
                </div>
            </a>
        </div>
    <?php
    $mythID++;
        endwhile;
    endif;
    ?>
    </div>
    </div>
</section>
<section id="standards">
<div class="container">
<h2 class="section-heading text-center mb-5">Filary opieki domowej</h2>
<div class="wrapper">
  <div class="nav flex-row nav-pills me-3 justify-content-center mb-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <?php
    $rows = get_field('standardy_opieki_domowej')['standard'];
    if( $rows ) {
        $alphas = range('a', 'z');
        $i = 0;
        foreach( $rows as $row ) {
            $heading = $row['naglowek'];
            ?>
           <button class="nav-link<?php if($i == 0) {echo ' active';} ?>"  data-bs-toggle="pill" data-bs-target="#pills-<?php echo $alphas[$i]; ?>" type="button" role="tab"><?php echo $heading; ?></button>


            <?php
            $i++;
        }

    }
    ?>
  </div>
  <div class="tab-content" id="v-pills-tabContent">
    <?php
    if( $rows ) {
        $i = 0;
        foreach( $rows as $row ) {
            $heading = $row['naglowek'];
            $icon = $row['ikona'];
            $text = $row['tekst'];
            ?>
               <div class="tab-pane fade<?php if($i == 0) {echo ' show active';} ?>" id="pills-<?php echo $alphas[$i]; ?>" role="tabpanel" aria-selected="<?php if($i == 0) {echo ' true';} else {echo ' false';} ?>">
        <div class="row align-items-center gy-4 gy-md-0">
            <div class="col-md-5 d-flex justify-content-center d-md-block">
            <img src="<?php echo $icon; ?>" alt="ikona">
            </div>
            <div class="col-md-7">
                <?php echo $text; ?>
                </div>
        </div>
    </div>


            <?php
            $i++;
        }

    }
    ?>
  </div>
</div>
</div>
</section>
<section id="service-providers">
    <div class="container">
    <h2 class="section-heading text-center mb-5">Rekomendowani usługodawcy</h2>
        <div class="row gy-4 gx-md-5 justify-content-center">
        <?php

        // Check rows existexists.
        if( have_rows("rekomendowani_uslugodawcy", "option") ):

            // Loop through rows.
            while( have_rows("rekomendowani_uslugodawcy", "option") ) : the_row();

                // Load sub field value.
                $logo = get_sub_field('logotyp');
                // Do something...
            ?>
                <div class="col-6 col-md-3 d-flex justify-content-center align-items-center">
                    <img class="img-fluid p-4" src="<?php echo $logo ?>" alt="usługodawca">
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
<section id="publications">
	<h2 class="section-heading text-center mb-5"><?php echo get_field('publikacja')['tytul'] ?? "" ;?></h2>
		<?php 
		$publikacja = get_field('publikacja')['podlinkowana_publikacja'];
		?>
	    <div class="container">
			<div class="row gy-4 gy-md-0">
				<div class="col-md-12">
					<div class="publication row align-items-center">
					<div class="col-md-4">
						<img class="publication__img img-fluid w-100" src="<?php echo get_field('zdjecie', $publikacja->ID) ?? "#" ?>" alt="">
					</div>
					<div class="col-md-8">
						<div class="publication__date mb-2 mt-3 mt-md-0">
						    <?php
							if ( !empty($publikacja->post_date) ) {
								$timestamp = strtotime($publikacja->post_date);
								echo date_i18n( 'j F, Y', $timestamp );
							}
							?>
						</div>
						<h3 class="publication__heading mb-3"><?php echo $publikacja->post_title ?? "" ;?></h3>
						<div class="publication__text mb-4"><?php echo get_field('publikacja')['opis'] ?? "" ?></div>
						<a class="btn btn-primary" href="<?php echo get_field('plik', $publikacja->ID) ?? "#" ?>" target="_blank">Zobacz raport</a>
					</div>
							    <a class="btn btn-arrow mx-auto w-auto mt-5" href="/publikacje">więcej publikacji <img class="ms-1" src="<?= get_template_directory_uri(); ?>/assets/arrow-right.svg" alt=""></a>

					</div>
            	</div>
			</div>
		</div>
   
</section>
<section id="courses">
    <div class="container">
    <h2 class="section-heading text-center mb-3">Oferta szkoleniowa</h2>
    <p class="section-paragraph text-center w-75 mx-auto gray mb-0 mb-5"><?php echo get_field('oferta_szkoleniowa')['podtytul']; ?></p>
        <div class="row gy-4 gy-md-0">
        <?php
        $args = array(
            'post_type'      => 'szkolenia', // typ postu "szkolenia"
            'posts_per_page' => 4, // maksymalna liczba postów do wyświetlenia
            'orderby'        => 'date', // sortowanie wg daty publikacji
            'order'          => 'DESC', // kolejność sortowania, od najnowszych do najstarszych
        );
        
        $szkolenia_query = new WP_Query( $args );
        
        if ( $szkolenia_query->have_posts() ) {
            while ( $szkolenia_query->have_posts() ) {
                $szkolenia_query->the_post();
                // poniżej wyświetlamy tytuł szkolenia, datę publikacji, treść oraz link do strony szkolenia
                ?>
                <div class="col-6 col-md-4 col-xl-3">
                <a class="course d-block" href="<?php echo get_permalink(); ?>">
               <div class="course__img-wrapper">
               <img class="course__img img-fluid w-100" style="object-fit: cover;" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="">
               </div>
                <div class="course__text mt-4 mb-2">szkolenie</div>
                <h6 class="course__title"><?php the_title(); ?></h6>
                </a>
                </div>
                <?php
            }
            wp_reset_postdata();
        } else {
            echo 'Brak szkoleń.';
        }
        ?>
        </div>
    </div>
</section>

<section id="newsletter" class="p-0">
<div class="container container-fluid-left">
	<div class="row align-items-center justify-content-md-between gy-4 gy-md-0">
		<div class="col-md-6 col-lg-5 col-xl-6">
        <img class="img-fluid" src="<?= get_template_directory_uri(); ?>/assets/newsletter-img.jpg" alt="">
		</div>
		<div class="col-md-5 col-lg-6 col-xl-5">
        <div class="newsletter">
        <div class="newsletter__heading">Bądź na bieżąco</div>
        <div class="newsletter__subheading mb-4">Otrzymuj powiadomienia o ważnych terminach i zdarzeniach.</div>
        <?php echo do_shortcode('[contact-form-7 id="148" title="Newsletter"]'); ?>
        </div>
		</div>         
        </div>
    </div>
</section>
<section id="faq">
    <div class="container">
    <h2 class="section-heading text-center mb-5">Pytania i odpowiedzi</h2>
        <div class="row">
        <div class="accordion accordion-flush">
        <?php

        // Check rows existexists.
        if( have_rows('q&a') ):
            $alphas = range('a', 'z');
            $i = 0;
            // Loop through rows.
            while( have_rows('q&a') ) : the_row();

                // Load sub field value.
                $question = get_sub_field('pytanie');
                $answ = get_sub_field('odpowiedz');
                // Do something...
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-pytanie-<?php echo $alphas[$i]; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pytanie-<?php echo $alphas[$i]; ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                    <?php echo $question ?>
                    </button>
                    </h2>
                    <div id="pytanie-<?php echo $alphas[$i]; ?>" class="accordion-collapse collapse" aria-labelledby="heading-pytanie-<?php echo $alphas[$i]; ?>" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"><?php echo $answ; ?></div>
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
<?php echo get_the_cta(); ?>

<script>
    const swiper = new Swiper(".swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  draggable: true,
  autoplay: {
    delay: 15000,
  },
  speed: 750,
  effect: "fade",
  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

</script>

<?= get_footer(); ?>




