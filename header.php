<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blyss
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Raleway:300,400,500" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="d-flex fixed-top site-header">
    <div class="container">
        <div class="row">
            <div class="d-flex flex-row align-items-center col-sm-12 hd-up-row">
                <div class="mr-auto">
                    <a href="<?php bloginfo('url'); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blyss_logo_big.png" alt="Blyss Logo" class="img-fluid img-responsive">
                    </a>
                </div>
                <div class="d-none d-lg-block hd-information">
                    <p><?php echo get_option('company_name'); ?><br>
	                    <?php echo get_option('address'); ?><br>
                        <a href="tel:<?php echo get_option('viber_number'); ?>"><?php echo get_option('viber_number'); ?></a><br>
                        <a href="mailto://office@blyss.rs"><?php echo get_option('email'); ?></a>
                    </p>
                </div>
                <div class="d-lg-none">
                    <div class="burger-menu">
                        <div class="bar-1"></div>
                        <div class="bar-2"></div>
                        <div class="bar-3"></div>
                    </div>
                </div>
            </div> <!-- .hd-up-row -->
            <div class="col-sm-12 hd-down-row">
                <div class="hd-search"><?php get_search_form(); ?></div>
                <div class="menu-container">
                    <?php
                    $main_nav_args = [
                        'menu' => 'Glavni meni',
                        'menu_class' => 'main-nav-menu',
                        'theme_location' => 'menu-1'
                    ];
                    wp_nav_menu($main_nav_args);
                    ?>
                </div> <!-- .menu-container -->


            </div> <!-- .hd-down-row -->
        </div>
    </div>
</header>
