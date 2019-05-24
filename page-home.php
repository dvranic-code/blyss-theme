<?php
/**
 * Template Name: Home page
 */
get_header();

// ACF Fields
$hero = get_field('hero_section');
$about = get_field('o_nama_section');
$cta = get_field('cta');
$slide_1 = $hero['hero_slide_1'];
$slide_2 = $hero['hero_slide_2'];
$slide_3 = $hero['hero_slide_3'];

?>

<div id="home">
	<section class="hero">
        <?php if ($slide_1) : ?>
            <img src="<?php echo $slide_1['url']; ?>" alt="<?php echo $slide_1['alt']; ?>" class="hero-slide">
        <?php endif; ?>
		<?php if ($slide_2) : ?>
            <img src="<?php echo $slide_2['url']; ?>" alt="<?php echo $slide_2['alt']; ?>" class="hero-slide">
		<?php endif; ?>
		<?php if ($slide_3) : ?>
            <img src="<?php echo $slide_3['url']; ?>" alt="<?php echo $slide_3['alt']; ?>" class="hero-slide">
		<?php endif; ?>
        <div class="slide-cover"></div>

		<div class="container">
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6 text-center">
					<h1><?php echo $hero['hero_title']; ?></h1>
					<p><?php echo $hero['hero_text']; ?></p>
					<div class="cta-area">
                        <!-- For now remove VIBER bubtton -->
<!--						<a href="tel:--><?php //echo get_option('viber_number'); ?><!--" class="btn btn-main btn-viber"><i class="fab fa-viber fa-2x"></i> --><?php //echo $hero['viber_button']; ?><!--</a>-->
						<a href="" class="btn btn-main" data-toggle="modal" data-target="#ctaContact"><?php echo $hero['contact_button']; ?></a>
					</div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</section> <!-- .hero -->

    <section class="offer">
        <div class="container">
            <div class="row">
				<?php
				//                Custom Query "ponuda"
				$offer_args = [
					'post_type' => 'trailers',
					'category_name' => 'ponuda',
					'posts_per_page' => 4,
					'order' => 'DESC',
                    'orderby' => 'rand'
				];
				$offer_query = new WP_Query($offer_args);

				//                The Loop
				if ($offer_query->have_posts()){
					while($offer_query->have_posts()){
						$offer_query->the_post(); ?>

                        <div class="col-md-6">
                            <div class="blyss-item-card blyss-tr-card">
                                <h2><?php the_title(); ?></h2>
								<?php if (has_post_thumbnail()) {
									the_post_thumbnail('', ['class'=>'img-responsive card-img']);
								} ?>
                                <div class="card-data">
                                    <div class="spec">
                                        <div><i class="fas fa-weight-hanging"></i> <?php echo the_field('tr_load_capacity')." kg"; ?></div>
                                        <div><i class="fas fa-ruler"></i> <?php echo the_field('tr_dimension').' cm'; ?></div>
                                    </div> <!-- .spec -->
                                    <a href="<?php the_permalink(); ?>" class="btn btn-main btn-card">Više...</a>
                                </div> <!-- .card-data -->
                            </div> <!-- .blyss-tr-card -->

                        </div> <!-- .col-md-6 -->

					<?php }
				}


				wp_reset_postdata();
				?>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </section> <!-- .offer -->

    <section class="cta">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-center">
                    <p><?php echo $cta['cta_text']; ?></p>
                </div>
                <div class="col-md-4">
                    <a href="" class="btn btn-main" data-toggle="modal" data-target="#ctaRegister"><?php echo $cta['cta_button']; ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <div class="row">
                <?php

                $services = new WP_Query(['post_type'=>'blyss_services', 'order'=>'ASC']);
                if ($services->have_posts()) {

                    while ($services->have_posts()) {
                        $services->the_post();?>

                        <div class="col-md-4">
                            <div class="blyss-card text-center">
                                <h2><?php the_title(); ?></h2>
	                            <?php the_content(); ?>
	                            <?php if (has_post_thumbnail()) {
		                            the_post_thumbnail();
	                            } ?>
                            </div> <!-- .blyss-card -->
                        </div>

                    <?php }

                }

                wp_reset_postdata();

                ?>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </section> <!-- services -->

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2><?php echo $about['about_title']; ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
					<?php echo $about['about_text']; ?>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo $about['about_picture']['url']; ?>" alt="<?php echo $about['about_picture']['alt']; ?>">
                </div>
            </div>
        </div>
    </section> <!-- o nama -->

    <!-- Modal -->
    <div class="modal fade" id="ctaRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Registracija</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-window-close fa-lg"></i></span></button>

                </div>
                <div class="modal-body">
                    <?php echo do_shortcode('[contact-form-7 id="149" title="Registracija"]'); ?>
                </div>
            </div>
        </div>
    </div> <!-- #ctaRegister -->

    <div class="modal fade" id="ctaContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Kontaktirajte nas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fas fa-window-close fa-lg"></i></span></button>

                </div>
                <div class="modal-body">
                    <p>Pošaljite nam poruku ili nas pozovite <br><i class="fas fa-phone-square"></i> <a href="tel:<?php echo get_option('viber_number'); ?>"><?php echo get_option('viber_number'); ?></a></p>
					<?php echo do_shortcode('[contact-form-7 id="82" title="Contact form 1"]'); ?>
                </div>
            </div>
        </div>
    </div> <!-- #ctaContact -->

</div> <!-- #home -->


<?php
get_footer();
