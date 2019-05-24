<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blyss
 */

?>

<section class="page-title blyss-404">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Ništa nije pronađeno</h1>
            </div>
        </div>
    </div>
</section> <!-- .page-title -->

<section class="blyss-category blyss-404">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p>Za zadanu ključnu reč ništa nije pronađeno. Probajte drugačiju ključnu reč.</p>
            </div>
            <div class="col-sm-6">
		        <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</section>
