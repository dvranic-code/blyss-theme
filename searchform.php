<?php
/**
 * Search form
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="form-group d-flex">
		<label for="search-form"><span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span></label>
		<input type="search" class="form-control search-field" placeholder="Potraži..." value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" id="search-form">
		<button type="submit" class="btn btn-blyss btn-search"><i class="fas fa-search"></i></button>
	</div>
</form>