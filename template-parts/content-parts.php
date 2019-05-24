<?php

//ACF Fields
$part_img = get_field('part_img');
$part_img_2 = get_field('part_img_b');


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

	<section class="blyss-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="white-background">
                        <div class="row">
                            <div class="col-sm-3">
                                <?php if ($part_img) { ?>
                                    <img src="<?php echo $part_img['url']; ?>" alt="<?php  echo $part_img['alt']; ?>" class="mb-3">
	                            <?php } ?>
	                            <?php if ($part_img_2) { ?>
                                    <img src="<?php echo $part_img_2['url']; ?>" alt="<?php  echo $part_img_2['alt']; ?>" class="mb-3">
	                            <?php } ?>
                            </div>
                            <div class="col-sm-9">
                                <?php
                                the_field('part_description');
                                the_content();
                                the_field('part_price');
                                 ?>
                                <p>Sifra: <?php echo the_field('part_id'); ?></p>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-4 offset-lg-2">
					<?php previous_post_link(); ?>
                </div>
                <div class="col-6 col-lg-4 text-right">
		            <?php next_post_link(); ?>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </section>

</article>