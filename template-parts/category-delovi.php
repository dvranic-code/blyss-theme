<?php
/**
 * Template part for "Ponuda"
 */

$cat_args = [
	'post_type' => 'parts',
	'posts_per_page' => -1,
	'order' => 'DESC',
];

$cat_query = new WP_Query($cat_args); ?>



	<?php if ($cat_query->have_posts()) {
		while($cat_query->have_posts()){
			$cat_query->the_post();
			$part_img = get_field('part_img');?>

            <div class="col-lg-4 col-md-6">
                <div class="blyss-item-card blyss-cat-card">
                    <h3><?php the_title(); ?></h3>
					<?php if ($part_img) { ?>
                        <img src="<?php echo $part_img['url']; ?>" alt="<?php  echo $part_img['alt']; ?>" class="img-responsive card-img">
					<?php } ?>
                    <div class="card-data">
                        <?php the_field('part_price'); ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-main btn-card">Više...</a>
                    </div> <!-- .card-data -->
                </div> <!-- .blyss-cat-card -->

            </div> <!-- .col-md-6 -->

		<?php }

	} else {
		echo "<div class='col-sm-12'><p>Nema podataka...</p></div>";
	}

	wp_reset_postdata();?>





