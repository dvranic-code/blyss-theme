<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blyss
 */

?>

<footer class="site-footer">
    <div class="container">
        <div class="row footer-row">

            <div class="col-md-4 order-md-3 footer-social">
                <a class="social-icon social-facebook" href="<?php echo get_option('facebook_url'); ?>"><i class="fab fa-facebook-square fa-3x"></i></a>
                <a class="social-icon social-viber" href="tel:<?php echo get_option('viber_number'); ?>"><i class="fab fa-viber fa-3x"></i></a>
            </div>

            <div class="col-md-4 order-md-1 footer-address">
                <p><?php echo get_option('company_name'); ?></p>
                <ul class="fa-ul company">
                    <li><span class="fa-li"><i class="fas fa-map-marked-alt"></i></span><?php echo get_option('address'); ?></li>
                    <li><span class="fa-li"><i class="fas fa-phone-square"></i></span><a href="tel:<?php echo get_option('viber_number'); ?>"><?php echo get_option('viber_number'); ?></a></li>
                    <li><span class="fa-li"><i class="fas fa-envelope"></i></span><a href="mailto://<?php echo get_option('email'); ?>"><?php echo get_option('email'); ?></a></li>

                </ul>
            </div>

            <div class="col-md-4 order-md-2 footer-logo">
                <a href="<?php echo bloginfo('url') ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/blyss_logo_footer.png" alt="Blyss Logo" class="img-responsive"></a>
                <p class="mt-3">&copy; <?php echo get_the_date('Y'); ?> blyss.rs</p>
            </div>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
