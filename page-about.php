<?php
/**
 * Template Name: About
 */
get_header();

if (have_posts()){
    while(have_posts()){
        the_post();

//        ACF Var
        $general_picture = get_field('general_picture');

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

<section class="blyss-category">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php the_field('general_text_1'); ?>
            </div>
            <div class="col-md-6">
		        <?php the_field('general_text_2'); ?>
            </div>
        </div>
    </div>
</section>

<img src="<?php echo $general_picture['url']; ?>" alt="<?php echo $general_picture['alt']; ?>" class="img-fluid">

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3><?php the_field('title_1'); ?></h3>
                <?php the_field('text_1'); ?>
            </div>
            <div class="col-md-4">
                <h3><?php the_field('title_2'); ?></h3>
		        <?php the_field('text_2'); ?>
            </div>
            <div class="col-md-4">
                <h3><?php the_field('title_3'); ?></h3>
		        <?php the_field('text_3'); ?>
            </div>
        </div>
    </div>
</section>

<section class="blyss-category">
	<div class="container">
		<div class="row">
            <div class="col-sm-12">
	            <?php the_content(); ?>
            </div>
		</div>
	</div>
</section>



<?php
    }
}
get_footer();
