<?php
/**
 * Template part for "Ponuda"
 */

if (is_category('akcija')) {
    $cat = 'akcija';
} else {
    $cat = 'ponuda';
}

$ponuda_args = [
	'post_type' => 'trailers',
	'category_name' => $cat,
	'posts_per_page' => -1,
	'order' => 'DESC',
];

$ponuda_query = new WP_Query($ponuda_args);

$i = 1;

if ($ponuda_query->have_posts()) {
	while($ponuda_query->have_posts()){
		$ponuda_query->the_post();
		$tr_payment_modal = get_field('tr_payment_modal');?>

		<div class="col-lg-4 col-md-6">
			<div class="blyss-item-card blyss-cat-card">
				<h2><?php the_title(); ?></h2>
				<?php if (has_post_thumbnail()) {
					the_post_thumbnail('', ['class'=>'img-responsive card-img']);
				} ?>
				<div class="card-data">
					<div class="spec">
						<div><i class="fas fa-weight-hanging"></i> <?php echo the_field('tr_load_capacity')." kg"; ?></div>
						<div><i class="fas fa-ruler"></i> <?php echo the_field('tr_dimension').' cm'; ?></div>
					</div> <!-- .spec -->
					<div class="prices">
                        <?php if ($cat == 'ponuda') { ?>
                            <div class="price">
                                <i class="fas fa-euro-sign"></i><?php the_field('tr_price_offer'); ?>
                            </div>
                            <div>
                                ili na <a href="" data-toggle="modal" data-target="#exampleModal_<?php echo $i; ?>">rate</a>
                            </div>
                        <?php } else { ?>
                            <div class="price price-sale">
                                <div class="old-price">
                                    <i class="fas fa-euro-sign"></i> <?php the_field('tr_price_offer'); ?>
                                </div>
                                <i class="fas fa-euro-sign"></i><?php (get_field('tr_price_sale') == '-' ) ? the_field('tr_price_offer') : the_field('tr_price_sale'); ?>
                            </div>
                        <?php } ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="btn btn-main btn-card">Više...</a>
				</div> <!-- .card-data -->
			</div> <!-- .blyss-cat-card -->

		</div> <!-- .col-md-6 -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal_<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

	<?php $i++;
	}
} else {
	echo "<div class='col-sm-12'><p>Nema podataka...</p></div>";
}

wp_reset_postdata();