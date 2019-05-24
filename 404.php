<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blyss
 */

get_header();
?>

<section class="page-title blyss-404">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>404 Stranica nije pronađena</h1>
            </div>
        </div>
    </div>
</section> <!-- .page-title -->

<section class="blyss-category blyss-404">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 text-center">
                <div><a href="javascript:history.back(1);"><i class="fas fa-caret-square-left fa-3x"></i></a></div>
                <div><a href="<?php bloginfo('url'); ?>"><i class="fas fa-home fa-3x"></i></a></div>
            </div>
            <div class="col-sm-6">
                <p class="lead">Stranica koju tražite nije pronađena. Vratite se nazad ili idite na našu početnu stranicu.</p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
