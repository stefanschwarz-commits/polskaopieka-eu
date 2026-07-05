<style>
      h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    padding: 1.5rem 0;
    margin: 0;
  }
</style>
<?php get_header(); ?>
<div id="scroll-top-btn">
    <img src="<?= get_template_directory_uri(); ?>/assets/scroll-top.svg" alt="">
</div>
<div class="custom-hero">
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
    <h1 class="my-0 py-0"> <?php the_title(); ?></h1>

        <div class="col-md-7">
        <p class="mt-1 mb-2">
        <?php echo wp_kses_post( get_field('podtytul') ); ?>
</p>
<a class="btn btn-arrow mx-auto w-auto p-0" style="color: white;" href="<?php echo esc_url( get_field('link_do_zobacz_oferte') ); ?>">zobacz ofertę <img class="ms-1" src="<?= get_template_directory_uri(); ?>/assets/arrow-right-white.svg" alt="strzałka"></a>
        </div>
    </div>
</div>
</div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <?php the_content(); ?>
        </div>
    </div>
</div>

<section id="see-also">
    <div class="container">
        <div class="row justify-content-center">
         <div class="col-md-8">
         <h2 class="section-heading" style="padding-bottom: 4rem;">Zobacz też</h2>
            <a href="/edukacja" class="see-also__btn d-flex justify-content-between align-items-center py-4">
            Edukacja
            <img class="ms-1 arrow" style="width: 40px; height: 24px;" src="<?= get_template_directory_uri(); ?>/assets/arrow-right.svg" alt="strzałka">
            </a>
            <a href="/reprezentowanie" class="see-also__btn d-flex justify-content-between align-items-center py-4">
            Reprezentowanie
            <img class="ms-1 arrow" style="width: 40px; height: 24px;" src="<?= get_template_directory_uri(); ?>/assets/arrow-right.svg" alt="strzałka">
            </a>
            <a href="/aktualnosci" class="see-also__btn d-flex justify-content-between align-items-center py-4">
            Aktualności
            <img class="ms-1 arrow" style="width: 40px; height: 24px;" src="<?= get_template_directory_uri(); ?>/assets/arrow-right.svg" alt="strzałka">
            </a>
         </div>   
        </div>
    </div>
</section>

<?php get_footer(); ?>





<script>



const btn = document.getElementById("scroll-top-btn");


function handleScroll() {
  if (window.scrollY > 2000) {

    btn.style.opacity = "1";
    btn.style.visibility = 'visible';
  } else {

    btn.style.opacity = "0";
    btn.style.visibility = 'hidden';
  }
}


function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}


window.addEventListener("scroll", handleScroll);

btn.addEventListener("click", scrollToTop);

</script>

