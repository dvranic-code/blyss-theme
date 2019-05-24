<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blyss
 */

get_header();
?>

<?php if ( have_posts() ) : ?>

    <section class="page-title blyss-404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1><?php
	                    /* translators: %s: search query. */
	                    printf( esc_html__( 'Rezultat pretrage za: %s', 'blyss' ), '<span>' . get_search_query() . '</span>' );
	                    ?></h1>
                </div>
            </div>
        </div>
    </section> <!-- .page-title -->

    <section class="blyss-category">
        <div class="container">
            <div class="row">

                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();

                    /**
                     * Run the loop for the search to output the results.
                     * If you want to overload this in a child theme then include a file
                     * called content-search.php and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', 'search' );

                endwhile;

                the_posts_navigation(); ?>

            </div>
        </div>
    </section>

<?php else :

    get_template_part( 'template-parts/content', 'none' );

endif;
?>



<?php
//get_sidebar();
get_footer();
