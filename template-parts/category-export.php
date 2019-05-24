<?php
/**
 * Template part for Category "Ponuda"
 */

$cat_args = [
	'post_type' => 'trailers',
	'category_name' => 'export',
	'posts_per_page' => -1,
	'order' => 'DESC',
];

$cat_query = new WP_Query($cat_args);

if ($cat_query->have_posts()) {
	while($cat_query->have_posts()){
		$cat_query->the_post();?>

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
						<div class="price" style="margin: auto;">
							<i class="fas fa-euro-sign"></i><?php the_field('tr_price_export'); ?>
						</div>
					</div>
					<a href="<?php the_permalink(); ?>" class="btn btn-main btn-card">Više...</a>
				</div> <!-- .card-data -->
			</div> <!-- .blyss-cat-card -->

		</div> <!-- .col-md-6 -->

	<?php }
} else {
	echo "<div class='col-sm-12'><p>Nema podataka...</p></div>";
}

wp_reset_postdata();