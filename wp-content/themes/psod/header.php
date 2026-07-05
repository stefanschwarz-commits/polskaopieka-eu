<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PSOD
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<style>
	#service-providers{
			display: none;
	}

	</style>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="header" class="site-header sticky-top">
		<div class="container d-flex justify-content-between align-items-center position-relative">
		<?php
			the_custom_logo();
			?>
			<div class="d-flex align-items-center">
			<?php $array = trp_custom_language_switcher();  ?>
			<?php $currentLang =   substr(get_locale(), 0, 2); ?>

<!-- IMPORTANT! You need to have data-no-translation on the wrapper with the links or TranslatePress will automatically translate them in a secondary language. -->    
<ul data-no-translation class="change-lang p-0 mb-0 me-2 me-md-5 d-flex">
    <?php foreach ($array as $name => $item){ ?>
            <li> 

                <a href="<?php echo $item['current_page_url']?>" class="<?php echo ($item['short_language_name'] == $currentLang ? "active" : ""); ?>"> 
                    <span><?php echo $item['short_language_name'] ?>
                    </span>
                </a>
            </li>
    <?php } ?>
</ul>
<button class="hamburger btn" style="right: 0;" type="button">
			<img class="menu-open" src="<?= get_template_directory_uri(); ?>/assets/menu_hamburger.svg" alt="menu open">
			<img class="menu-close" src="<?= get_template_directory_uri(); ?>/assets/hamburger_close.svg" alt="menu close">
			</button>
			</div>


		</div>

	</header>
<div class="site-nav-container">
<div class="container container-fluid-right align-items-center">
<div class="col-md-6">
<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container' => 'ul',
 				)
			);
			?>
		</nav>
</div>
<div class="col-md-6">
	<div class="nav-img-container">
	<img id="nav-img" class="img-fluid d-none d-md-block" src="<?= get_template_directory_uri(); ?>/assets/nav-img.png" alt="starsza osoba na balkonie" alt="">
	</div>
</div>
</div>
</div>
