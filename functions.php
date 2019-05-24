<?php
/**
 * Blyss functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blyss
 */

if ( ! function_exists( 'blyss_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blyss_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Blyss, use a find and replace
		 * to change 'blyss' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'blyss', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'blyss' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'blyss_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'blyss_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blyss_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'blyss_content_width', 640 );
}
add_action( 'after_setup_theme', 'blyss_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blyss_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blyss' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'blyss' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'blyss_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blyss_scripts() {
	wp_enqueue_style( 'blyss-style', get_stylesheet_uri() );
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome', get_stylesheet_directory_uri().'/assets/fontawesome/css/all.min.css');
	wp_enqueue_style('blyss-custom-style', get_stylesheet_directory_uri().'/assets/css/custom.css');

	wp_enqueue_script( 'blyss-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script('bootstrap-script', get_stylesheet_directory_uri().'/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);
	wp_enqueue_script('blyss-custom-script', get_stylesheet_directory_uri().'/assets/js/custom.js', array('jquery'), false, true);

	wp_enqueue_script( 'blyss-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blyss_scripts' );

function blyss_admin_scripts() {
    wp_enqueue_style('blyss-admin-style', get_stylesheet_directory_uri().'/assets/css/blyss-admin.css');
}
add_action('admin_enqueue_scripts', 'blyss_admin_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Hide Admin Bar on front end
 */
show_admin_bar(false);

/**
 * Add Custom THEME OPTION PAGE
 */

//Theme settings menu
function blyss_theme_settings() {
	?>
	<div class="wrap">
		<h1>Podešavanja Blyss teme</h1>
		<form action="options.php" method="post">
			<?php
				settings_fields('general-section');
				do_settings_sections('blyss-theme-option');
				submit_button('Save');
			?>
		</form>

	</div>

<?php
}

function add_theme_menu_item(){
	add_menu_page('Podesavanja Blyss teme', 'Blyss opcije', 'manage_options', 'blyss-theme-option', 'blyss_theme_settings', 'dashicons-admin-settings', 99);
}
add_action('admin_menu', 'add_theme_menu_item');

//add function for the each theme option
function blyss_company_name() {
    ?>
    <input type="text" class="admin-input" name="company_name" id="company_name" value="<?php echo get_option('company_name'); ?>">
    <?php
}

function blyss_company_address() {
    ?>
    <input type="text" class="admin-input" name="address" id="address" value="<?php echo get_option('address'); ?>">
    <?php
}

function blyss_email() {
    ?>
    <input type="text" class="admin-input" name="email" id="email" value="<?php echo get_option('email'); ?>">
    <?php
}

function blyss_phone() {
	?>
    <input class="admin-input" type="text" name="phone_number" id="phone_number" value="<?php echo get_option('phone_number'); ?>">
	<?php
}

function blyss_viber_number() {
	?>
    <input class="admin-input" type="text" name="viber_number" id="viber_number" value="<?php echo get_option('viber_number'); ?>">
	<?php
}

function blyss_facebook() {
    ?>
    <input class="admin-input" type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>">
<?php
}

function blyss_logo() {
    ?>
    <input type="file" class="admin-input" name="blyss_logo" >
	<?php echo get_option('blyss_logo'); ?>
<?php
}

function handle_blyss_logo_upload($option) {
    if (!empty($_FILES['blyss_logo'])) {
        $urls = wp_handle_upload($_FILES["blyss_logo"], ['test_form' => false]);

        $temp = $urls["url"];
	    var_dump($urls);
        return $temp;
    }

    return $option;
}


// display fields on the setting page
function display_theme_setting_fields(){

//    add_settings_section is used to display the section heading and description.
    add_settings_section('general-section', 'Podaci firme', null, 'blyss-theme-option');

//    add_settings_field is used to display the HTML code of the fields.
    add_settings_field('company_name', 'Upisi puno ime firme', 'blyss_company_name', 'blyss-theme-option', 'general-section');
	add_settings_field('address', 'Upisi adresu firme', 'blyss_company_address', 'blyss-theme-option', 'general-section');
	add_settings_field('email', 'Email adresa', 'blyss_email', 'blyss-theme-option', 'general-section');
	add_settings_field('phone_number', 'Telefon', 'blyss_phone', 'blyss-theme-option', 'general-section');
	add_settings_field('viber_number', 'Viber broj', 'blyss_viber_number', 'blyss-theme-option', 'general-section');
    add_settings_field('facebook_url', 'Facebook', 'blyss_facebook', 'blyss-theme-option', 'general-section');
    add_settings_field('blyss_logo', 'Upload logo', 'blyss_logo', 'blyss-theme-option', 'general-section');

//    register_setting is called to automate saving the values of the fields.
	register_setting('general-section', 'company_name');
	register_setting('general-section', 'address');
	register_setting('general-section', 'email');
	register_setting('general-section', 'phone_number');
	register_setting('general-section', 'viber_number');
    register_setting('general-section', 'facebook_url');
    register_setting('general-section', 'blyss_logo', 'handle_blyss_logo_upload');


}
add_action('admin_init', 'display_theme_setting_fields');

/**
 * CUSTOM POST TYPES
 */
require (get_stylesheet_directory().'/inc/cpt/custom-post-types.php');

function mg_news_pagination_rewrite() {
	add_rewrite_rule(get_option('category_base').'/page/?([0-9]{1,})/?$', 'index.php?pagename='.get_option('category_base').'&paged=$matches[1]', 'top');
}
add_action('init', 'mg_news_pagination_rewrite');

