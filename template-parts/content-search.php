<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blyss
 */

if (get_post_type() == 'trailers') { ?>
    <div class="col-lg-4 col-md-6">
        <div class="blyss-item-card blyss-cat-card">
			<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
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
        </div> <!-- .blyss-cat-card -->

    </div> <!-- .col-md-6 -->
<?php } elseif (get_post_type() == 'parts') { ?>
    <?php $part_img = get_field('part_img'); ?>
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
 <?php } else { ?>
    <div class="col-lg-4 col-md-6">
        <div class="blyss-item-card blyss-cat-card">
			<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php if (has_post_thumbnail()) {
				the_post_thumbnail('', ['class'=>'img-responsive card-img']);
			} ?>
            <div class="card-data">
                <a href="<?php the_permalink(); ?>" class="btn btn-main btn-card">Više...</a>
            </div> <!-- .card-data -->
        </div> <!-- .blyss-cat-card -->

    </div> <!-- .col-md-6 -->
<?php }

