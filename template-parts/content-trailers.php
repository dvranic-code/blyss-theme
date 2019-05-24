<?php

//ACF Fields
$tr_manufacture = get_field('tr_manufacture');
$tr_model = get_field('tr_model');
$tr_construction = get_field('tr_construction');
$tr_dimension = get_field('tr_dimension');
$tr_load_capacity = get_field('tr_load_capacity');
$tr_max_weight = get_field('tr_max_weight');
$tr_weight = get_field('tr_weight');
$tr_no_axes = get_field('tr_no_axes');
$tr_no_wheels = get_field('tr_no_wheels');
$tr_tyre = get_field('tr_tyre');
$tr_payment_modal = get_field('tr_payment_modal');

$from_link = $_SERVER['HTTP_REFERER'];

if ( strpos( $from_link, '/category/akcija' ) !== false ) {
	$akcija_link = true;
} else {
	$akcija_link = false;
}

if ( strpos( $from_link, '/category/export' ) !== false ) {
	$export_link = true;
} else {
	$export_link = false;
}



//Pictures
for($i=1; $i<13; $i++){
	${"tr_img_$i"} = get_field('tr_img_'.$i);
}

?>

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section> <!-- .single-title -->

<article class="blyss-article">

    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-7 blyss-gallery">

                    <!-- Full width pictures -->
                    <div class="fullwidth-img">

                        <?php if ($tr_img_1) { ?>
                        <div class="blyss-slide">
                            <img src="<?php echo $tr_img_1['url']; ?>" alt="<?php echo $tr_img_1['alt']; ?>">
                        </div>
                        <?php } else { ?>
                        <div class="blyss-slide">
                            <?php if (has_post_thumbnail()){the_post_thumbnail();} ?>
                        </div>
                        <?php }?>

                        <?php for($i=2; $i<13; $i++) {
                            if (${"tr_img_$i"}) { ?>
                                <div class="blyss-slide">
                                    <img src="<?php echo ${"tr_img_$i"}['url']; ?>" alt="<?php echo ${"tr_img_$i"}['alt']; ?>">
                                </div>
                            <?php }
                        } ?>

                        <!-- Next and previous button -->
                        <a class="blyss-btn-prev" onclick="blyssPlusSlides(-1)">&#10094;</a>
                        <a class="blyss-btn-next" onclick="blyssPlusSlides(1)">&#10095;</a>
                    </div> <!-- .fullwidth-img -->

                    <!-- Thumbnail images -->
                    <div class="tumb-img">
                        <div class="blyss-thumbnail">
                            <?php if ($tr_img_1) { ?>
                                <img class="thumb cursor" onclick="blyssCurrentSlide(1)" src="<?php echo $tr_img_1['url']; ?>" alt="<?php echo $tr_img_1['alt']; ?>">
                            <?php } else {
                                if (has_post_thumbnail()){the_post_thumbnail('', ['class'=>'thumb cursor', 'onclick'=>'blyssCurrentSlide(1)']);}
                            } ?>
                        </div>

                        <?php for($i=2; $i<13; $i++) {
                            if (${"tr_img_$i"}) { ?>
                                <div class="blyss-thumbnail">
		                            <img class="thumb cursor" onclick="blyssCurrentSlide(<?php echo $i; ?>)" src="<?php echo ${"tr_img_$i"}['url']; ?>" alt="<?php echo ${"tr_img_$i"}['alt']; ?>">
                                </div>
                            <?php }
                        } ?>

                    </div> <!-- .row -->

                </div> <!-- .blyss-gallery -->

                <div class="col-md-5 blyss-characteristics">
                    <h2>Karakteristike</h2>
                    <ul class="fa-ul">
                        <li><span class="fa-li desc-icon"><i class="far fa-circle"></i></span>proizvođač: <span class="blue-text"><?php echo $tr_manufacture; ?></span></li>
                        <li><span class="fa-li desc-icon"><i class="far fa-circle"></i></span>model: <span class="blue-text"><?php echo $tr_model; ?></span></li>
                        <li><span class="fa-li desc-icon"><i class="far fa-circle"></i></span>šasija: <span class="blue-text"><?php echo $tr_construction; ?></span></li>
                        <li><span class="fa-li desc-icon"><i class="fas fa-ruler"></i></span> <span class="blue-text"><?php echo $tr_dimension; ?> cm</span></li>
                        <li><span class="fa-li desc-icon"><i class="fas fa-weight-hanging"></i></span> max nosivost: <span class="blue-text"><?php echo $tr_load_capacity; ?> kg</span></li>
                        <li><span class="fa-li desc-icon"><i class="fas fa-weight-hanging"></i></span> dozvoljena masa: <span class="blue-text"><?php echo $tr_max_weight; ?> kg</span></li>
                        <li><span class="fa-li desc-icon"><i class="fas fa-weight-hanging"></i></span> prazna prikolica: <span class="blue-text"><?php echo $tr_weight; ?> kg</span></li>
                        <li><span class="fa-li desc-icon"><i class="far fa-circle"></i></span> broj osovina: <span class="blue-text"><?php echo $tr_no_axes; ?></span></li>
                        <li><span class="fa-li desc-icon"><i class="far fa-circle"></i></span> broj točkova: <span class="blue-text"><?php echo $tr_no_wheels; ?></span></li>
                        <li><span class="fa-li desc-icon"><i class="far fa-circle"></i></span>dimenzije: <span class="blue-text"><?php echo $tr_tyre; ?></span></li>
                    </ul>
                    <?php
                    if ($akcija_link) { ?>
                        <h2 style="margin-top: 1rem;">Cena: <span style="color: #B92D00; font-size: 1.7rem;"><i class="fas fa-euro-sign"></i><?php (get_field('tr_price_sale') == '-' ) ? the_field('tr_price_offer') : the_field('tr_price_sale'); ?></span> <span class="old-price"><i class="fas fa-euro-sign"></i> <?php the_field('tr_price_offer'); ?></span></h2>
                    <?php } elseif ($export_link) { ?>
                        <h2 style="margin-top: 1rem;">Cena: <span style="color: #3C3C3C; font-size: 1.7rem;"><i class="fas fa-euro-sign"></i><?php the_field('tr_price_export'); ?></span></h2>
                    <?php } else { ?>
                        <h2 style="margin-top: 1rem;">Cena: <span style="color: #3C3C3C; font-size: 1.7rem;"><i class="fas fa-euro-sign"></i><?php the_field('tr_price_offer'); ?></span></h2>
                        <p>ili na <a href="" data-toggle="modal" data-target="#paymentModal">rate</a></p>
                    <?php } ?>

                </div> <!-- DESCRIPTION OF TRAILERS -->

            </div> <!-- .row -->
        </div> <!-- .container -->
    </section>

    <section class="blyss-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-background">
	                    <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php the_title(); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<?php if (has_post_thumbnail()) {
						the_post_thumbnail('', ['class'=>'img-responsive card-img', 'style'=>'height: auto; width:100%']);
					} ?>
                    <p class="mt-3"><?php echo ($tr_payment_modal == '') ? 'Prodaja prikolice na rate uz ličnu kartu.' : $tr_payment_modal; ?></p>
                    <ul style="margin: 0;">
                        <li>učešće od <span class="blue-text">&#128;<?php the_field('tr_start_payment'); ?></li>
                        <li>na 12 meseci <span class="blue-text">&#128;<?php the_field('tr_payment_12'); ?></span></li>
                        <li>ili na 24 meseca <span class="blue-text">&#128;<?php the_field('tr_payment_24'); ?></span></li>
                    </ul>
                </div>
                <div class="modal-footer" style="flex-wrap: wrap">
                    <div class="d-flex" style="flex-wrap: wrap">
                        <a href="tel:<?php echo get_option('viber_number'); ?>" class="btn btn-primary mr-2"><?php echo get_option('viber_number'); ?></a>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div>

</article>