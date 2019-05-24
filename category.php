<?php
/**
 * General category template
 */

get_header();
?>
<section class="page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1><?php single_cat_title(); ?></h1>
			</div>
		</div>
	</div>
</section> <!-- .page-title -->

<section class="blyss-category">
	<div class="container">
        <div class="row">
            <div class="col-sm-12 category-description">
                <?php echo category_description(); ?>
            </div>
        </div>
		<div class="row">
			<?php

			if(is_category('ponuda') || is_category('akcija') ){
				get_template_part('template-parts/category', 'ponuda');
			}
			if (is_category('iznajmljivanje')){
				get_template_part('template-parts/category', 'iznajmljivanje');
			}
			if (is_category('export')){
				get_template_part('template-parts/category', 'export');
			}
			if (is_category('delovi')){
				get_template_part('template-parts/category', 'delovi');
			}

			?>
		</div>
	</div>
</section>

<?php
get_footer();
