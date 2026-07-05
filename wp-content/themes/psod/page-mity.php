<?php echo get_header(); ?>





<section id="myths">
    <div class="container">
    <h2 class="section-heading text-center mb-3">Mity na temat opieki domowej</h2>
    <p class="section-paragraph text-center w-75 mx-auto gray mb-0">Lorem ipsum dolor sit amet consectetur. Amet netus orci eget egestas feugiat lacus. Amet quis iaculis convallis aliquet. Dapibus sed hac nec augue parturient risus sapien.</p>
    <div class="myth-row row gy-4 gy-lg-0 nav nav-pills" id="pills-tab" role="tablist">
    <?php $alphas = range('a', 'z'); ?>

    <?php

    // Check rows existexists.
    if( have_rows("mity", "option") ):
        $alphas = range('a', 'z');
        $i = 0;
        // Loop through rows.
        while( have_rows("mity", "option") ) : the_row();

            // Load sub field value.
            $nazwa = get_sub_field('nazwa');
    ?>
    <div class="col-md-6 col-lg-3 d-flex">
            <div class="myth d-flex w-100 nav-link" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $alphas[$i]; ?>" type="button" role="tab" aria-controls="pills-<?php echo $alphas[$i]; ?> aria-selected="false">
                <img class="myth__fake" src="<?= get_template_directory_uri(); ?>/assets/fake.svg" alt="">
                <div class="myth__text text-center d-flex align-items-center">
                <?php echo $nazwa; ?>
                </div>
            </div>
        </div>
    <?php
        $i++;
        endwhile;
        $i=0;
    endif;
    ?>



    </div>
    </div>

</section>

<section id="myths-content">
<div class="container">
    <div class="row tab-content" id="pills-tabContent">
    <?php

// Check rows existexists.
if( have_rows("mity", "option") ):

    // Loop through rows.
    while( have_rows("mity", "option") ) : the_row();

        // Load sub field value.
        $images = get_sub_field('zdjecia');
        $txt = get_sub_field('opis');
        ?>
    <div class="row justify-content-between tab-pane fade" id="pills-<?php echo $alphas[$i]; ?>" role="tabpanel" aria-labelledby="pills-contact-tab">
         <div class="col-md-7">
        <?php echo $txt; ?>
        </div>
        <div class="col-md-4 order-md-first mt-4 mt-md-0">
        <?php foreach( $images as $image ): ?>
            <img class="w-100" src="<?= $image ?>">
        <?php endforeach; ?>    
    
        </div>
    </div>


        <?php
    $i++;
    // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;
?>
    </div>
</div>
</section>
<?php echo get_the_cta(); ?>
<?php

if(isset($_GET['fake'])) {
    $id = $_GET['fake'];
} else {
    $id = 1;
}

?>
<script>
    let currentID = <?php echo $id; ?>;

    if(currentID < 1 || currentID > 4) {
        currentID = 0;
    } else {
        currentID = currentID - 1;
    }

    const btns = document.querySelectorAll('.nav-link');
    const tabs = document.querySelectorAll('.tab-pane');


    btns[currentID].classList.add('active');
    btns[currentID].classList.add('show');
    tabs[currentID].classList.add('active');
    tabs[currentID].classList.add('show');

</script>



<?php echo get_footer(); ?>


