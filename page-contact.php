<?php
/**
 * Template Name: Contact
 */
get_header();

if (have_posts()){
	while(have_posts()){
		the_post();

//        ACF Var
		$con_icon = get_field('con_icon');
		$google_map = get_field('google_map');


		?>

		<section class="page-title">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>
		</section> <!-- .page-title -->

		<section class="blyss-category contact-details">
			<div class="container">
				<div class="row">
					<div class="white-background">
                        <div class="col-md-5 work-hour">
                            <?php if ($con_icon) { ?>
                                <img src="<?php echo $con_icon['url']; ?>" alt="<?php echo $con_icon['alt']; ?>">
                            <?php } ?>
                            <p><?php the_field('dani_1'); ?></p>
                            <p><i class="far fa-clock"></i> <?php the_field('vreme_1'); ?></p>
                            <p><?php the_field('dani_2'); ?></p>
                            <p><i class="far fa-clock"></i> <?php the_field('vreme_2'); ?></p>
                        </div>
                        <div class="col-md-7 work-addresses">
                            <h2><?php the_field('company_name'); ?></h2>
                            <section class="row">
                                <div class="col-sm-12">
                                    <h3>Adresa</h3>
                                </div>
                                <div class="col-lg-4">
                                    <h4 style="margin-top: 0;"><i class="fas fa-map-marker-alt"></i> <?php the_field('title_1_1'); ?></h4>
                                    <?php the_field('text_1_1'); ?>
                                </div>
                                <div class="col-lg-4">
                                    <h4><i class="fas fa-map-marker-alt"></i> <?php the_field('title_2_1'); ?></h4>
		                            <?php the_field('text_2_1'); ?>
                                </div>
                                <div class="col-lg-4">
                                    <h4><i class="fas fa-map-marker-alt"></i> <?php the_field('title_3_1'); ?></h4>
		                            <?php the_field('text_3_1'); ?>
                                </div>
                            </section> <!-- Adresa -->

                            <section class="row">
                                <div class="col-sm-12">
                                    <h3>Telefoni</h3>
                                </div>
                                <div class="col-lg-6">
                                    <p><i class="fas fa-phone-square"></i> <a href="tel:<?php echo get_option('phone_number'); ?>"><?php echo get_option('phone_number'); ?></a></p>
                                </div>
                                <div class="col-lg-6">
                                    <p><i class="fab fa-viber"></i> <a href="tel:<?php echo get_option('viber_number'); ?>"><?php echo get_option('viber_number'); ?></a></p>
                                </div>
                            </section> <!-- Telefoni -->

                            <section class="row">
                                <div class="col-sm-12">
                                    <h3>e-mail</h3>
                                    <p><i class="fas fa-envelope"></i> <a href="mailto://office@blyss.rs"><?php echo get_option('email'); ?></a></p>
                                </div>
                            </section> <!-- email -->

                            <section class="row">
                                <div class="col-sm-12">
                                    <h3>Podaci</h3>
                                </div>
                                <div class="col-lg-6">
                                    <p><span class="blue-text">PIB: </span> <?php the_field('pib'); ?></p>
                                    <p><span class="blue-text">Račun: </span> <?php the_field('racun'); ?></p>
                                </div>
                                <div class="col-lg-6">
                                    <p><span class="blue-text">MB: </span> <?php the_field('mb'); ?></p>
                                </div>
                            </section> <!-- Podaci -->

                        </div>
                    </div>
				</div>
			</div> <!-- .container -->
		</section> <!-- .blyss-category .contact-details -->

        <section class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
	                    <?php echo do_shortcode( '[contact-form-7 id="82" title="Contact form 1"]' ); ?>
                    </div>
                </div>

            </div>
        </section> <!-- .contact form -->

        <section class="contact-map">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d691.6515697532077!2d19.6604526292271!3d46.098824898694595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47436754fd82284d%3A0x8b6ba74424b87cdf!2sBlyss+Trailers+d.o.o.!5e0!3m2!1sen!2srs!4v1554930674870!5m2!1sen!2srs" width="1200" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section> <!-- .contact-map -->

		<?php
	}
}
get_footer();
