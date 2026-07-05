<?php

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_name = 'testimonial-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$text             = get_field( 'testimonial' ) ?: 'Wpisz cytat';
$author           = get_field( 'author_name' ) ?: 'Wpisz dane autora';
$author_info      = get_field( 'author_info' ) ?: 'Wpisz dane autora';


?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">
    <blockquote class="testimonial-blockquote d-md-flex p-4" style="border: 1px solid #BB16A3; align-items:start; margin: 4rem 0;">
        <img src="<?= get_template_directory_uri(); ?>/blocks/cytat/cytat_img.svg" alt="">
        <div class="ms-md-3 mt-3 mt-md-0">
        <span class="testimonial-text" style="font-style: italic;"><?php echo esc_html( $text ); ?></span>
        <span class="testimonial-author" style="font-style: italic; margin-top: 1rem; display: block;">- mówi <b><?php echo esc_html( $author ); ?></b>, <?php echo esc_html( $author_info ); ?></span>
        </div>

    </blockquote>
</div>