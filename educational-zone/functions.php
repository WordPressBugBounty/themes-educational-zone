<?php
/**
 * Educational Zone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Educational Zone
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Educational_Zone_Loader.php' );

$educational_zone_loader = new \WPTRT\Autoload\Educational_Zone_Loader();

$educational_zone_loader->educational_zone_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$educational_zone_loader->educational_zone_register();

if ( ! function_exists( 'educational_zone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function educational_zone_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'woocommerce' );

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

        add_image_size('educational-zone-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','educational-zone' ),
	        'footer'=>esc_html__( 'Footer Menu','educational-zone' ),
	        'social'=>esc_html__( 'Social Menu','educational-zone' ),
	        'top'=>esc_html__( 'Top Menu','educational-zone' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
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
		add_theme_support( 'custom-background', apply_filters( 'educational_zone_custom_background_args', array(
			'default-color' => 'f7f7f7',
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
			'height'      => 40,
			'width'       => 40,
			'flex-width'  => true,
		) );

		add_editor_style( array( 'css/editor-style.css' ) );
		add_action('wp_ajax_educational_zone_dismissable_notice', 'educational_zone_dismissable_notice');

		add_theme_support( 'align-wide' );

		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'educational_zone_setup' );

if ( ! function_exists( 'educational_zone_file_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function educational_zone_file_setup() {

		require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

		/**
		 * Custom template tags for this theme.
		 */
		require get_template_directory() . '/inc/template-tags.php';

		/**
		 * Implement the Custom Header feature.
		 */
		require get_template_directory() . '/inc/custom-header.php';

		/**
		 * Functions which enhance the theme by hooking into WordPress.
		 */
		require get_template_directory() . '/inc/template-functions.php';

		/**
		 * Customizer additions.
		 */
		require get_template_directory() . '/inc/customizer.php';

		/* TGM. */
		require get_parent_theme_file_path( '/inc/tgm.php' );

		if ( ! defined( 'EDUCATIONAL_ZONE_CONTACT_SUPPORT' ) ) {
			define('EDUCATIONAL_ZONE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/educational-zone','educational-zone'));
		}
		if ( ! defined( 'EDUCATIONAL_ZONE_REVIEW' ) ) {
			define('EDUCATIONAL_ZONE_REVIEW',__('https://wordpress.org/support/theme/educational-zone/reviews/#new-post','educational-zone'));
		}
		if ( ! defined( 'EDUCATIONAL_ZONE_LIVE_DEMO' ) ) {
			define('EDUCATIONAL_ZONE_LIVE_DEMO',__('https://demo.themagnifico.net/education-wordpress-theme/','educational-zone'));
		}
		if ( ! defined( 'EDUCATIONAL_ZONE_GET_PREMIUM_PRO' ) ) {
			define('EDUCATIONAL_ZONE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/education-wordpress-theme','educational-zone'));
		}
		if ( ! defined( 'EDUCATIONAL_ZONE_PRO_DOC' ) ) {
			define('EDUCATIONAL_ZONE_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/educational-zone-pro-doc','educational-zone'));
		}
		if ( ! defined( 'EDUCATIONAL_ZONE_FREE_DOC' ) ) {
			define('EDUCATIONAL_ZONE_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/educational-zone-pro-doc','educational-zone'));
		}

	}
endif;
add_action( 'after_setup_theme', 'educational_zone_file_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function educational_zone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'educational_zone_content_width', 1170 );
}
add_action( 'after_setup_theme', 'educational_zone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function educational_zone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'educational-zone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'educational-zone' ),
        'before_widget' => '<section id="%1$s" class="widget card shadow-sm mb-4 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title card-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Shop Page Sidebar', 'educational-zone' ),
		'id'            => 'woocommerce-shop-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Single Product Page Sidebar', 'educational-zone' ),
		'id'            => 'woocommerce-single-product-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'educational-zone' ),
		'id'            => 'educational-zone-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'educational-zone' ),
		'id'            => 'educational-zone-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'educational-zone' ),
		'id'            => 'educational-zone-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'educational-zone' ),
		'id'            => 'educational-zone-footer4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'educational_zone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function educational_zone_scripts() {

    // load bootstrap css
    wp_enqueue_style( 'bootstrap-css',get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'educational-zone-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// fontawesome
	wp_enqueue_style( 'fontawesome-css',get_template_directory_uri().'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_style( 'educational-zone-style', get_stylesheet_uri() );
    require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'educational-zone-style',$educational_zone_theme_css );

	wp_style_add_data('educational-zone-basic-style', 'rtl', 'replace');

    // load bootstrap js

    wp_enqueue_script('jquery-js',get_template_directory_uri() . '/assets/js/jquery.js', array(), '', true );
    wp_enqueue_script('popper-js',get_template_directory_uri() . '/assets/js/popper.js', array(), '', true );
    wp_enqueue_script('bootstrap-js',get_template_directory_uri() . '/assets/js/bootstrap.js', array(), '', true );
    wp_enqueue_script('educational-zone-theme-js',get_template_directory_uri() . '/assets/js/theme-script.js', array(), '', true );

    wp_enqueue_script('educational-zone-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'educational_zone_scripts' );

/**
 * Enqueue theme color style.
 */
function educational_zone_theme_color() {

    $educational_zone_theme_color_css = '';
    $educational_zone_theme_color = get_theme_mod('educational_zone_theme_color');
    $educational_zone_preloader_bg_color = get_theme_mod('educational_zone_preloader_bg_color');
    $educational_zone_preloader_dot_1_color = get_theme_mod('educational_zone_preloader_dot_1_color');
    $educational_zone_preloader_dot_2_color = get_theme_mod('educational_zone_preloader_dot_2_color');
  	$educational_zone_preloader2_dot_color = get_theme_mod('educational_zone_preloader2_dot_color');
    $educational_zone_logo_max_height = get_theme_mod('educational_zone_logo_max_height');

  	if(get_theme_mod('educational_zone_logo_max_height') == '') {
		$educational_zone_logo_max_height = '24';
	}

	if(get_theme_mod('educational_zone_preloader_dot_1_color') == '') {
		$educational_zone_preloader_dot_1_color = '#fff';
	}
	if(get_theme_mod('educational_zone_preloader_dot_2_color') == '') {
		$educational_zone_preloader_dot_2_color = '#003e7d';
	}

	$educational_zone_theme_color_css = '
		.custom-logo-link img{
			max-height: '.esc_attr($educational_zone_logo_max_height).'px;
	 	}
		.socialmedia,.sticky .entry-title::before,#button,.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover,.wp-block-button__link,.woocommerce-account .woocommerce-MyAccount-navigation ul li,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.woocommerce .woocommerce-ordering select,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{
			background: '.esc_attr($educational_zone_theme_color).';
		}
		.card-body p a, .entry-content a, .entry-summary a, .comment-content a,.navbar-brand a,#colophon a:hover, #colophon a:focus,a:hover,.widget a:hover, .widget a:focus,.main-navigation .sub-menu > li > a:hover, .main-navigation .sub-menu > li > a:focus, .main-navigation .sub-menu > li > .menu-item-link-return:hover, .main-navigation .sub-menu > li > .menu-item-link-return:focus,.woocommerce-message::before, .woocommerce-info::before, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce ul.products li.product .price,.serv-box h4 a{
			color: '.esc_attr($educational_zone_theme_color).';
		}
		.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover,.woocommerce-message, .woocommerce-info,.wp-block-quote, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-pullquote{
			border-color: '.esc_attr($educational_zone_theme_color).';
		}
		.loading, .loading2{
			background-color: '.esc_attr($educational_zone_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($educational_zone_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($educational_zone_preloader_dot_2_color).';
		  }
		}
		.load hr {
			background-color: '.esc_attr($educational_zone_preloader2_dot_color).';
		}
	';
    wp_add_inline_style( 'educational-zone-style',$educational_zone_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'educational_zone_theme_color' );

/**
 * Enqueue S Header.
 */
function educational_zone_sticky_header() {

  $educational_zone_sticky_header = get_theme_mod('educational_zone_sticky_header');

  $educational_zone_custom_style= "";

  if($educational_zone_sticky_header != true){

    $educational_zone_custom_style .='.stick_header{';

      $educational_zone_custom_style .='position: static;';

    $educational_zone_custom_style .='}';
  }

  wp_add_inline_style( 'educational-zone-style',$educational_zone_custom_style );

}
add_action( 'wp_enqueue_scripts', 'educational_zone_sticky_header' );

/*radio button sanitization*/
function educational_zone_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function educational_zone_preloader1(){
	if(get_theme_mod('educational_zone_preloader_type', 'Preloader 1') == 'Preloader 1' ) {
		return true;
	}
	return false;
}

function educational_zone_preloader2(){
	if(get_theme_mod('educational_zone_preloader_type', 'Preloader 1') == 'Preloader 2' ) {
		return true;
	}
	return false;
}

//Float
function educational_zone_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function educational_zone_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

// checkbox sanitization
function educational_zone_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}

/* Excerpt Limit Begin */
function educational_zone_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function educational_zone_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function educational_zone_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'educational_zone_loop_columns');
if (!function_exists('educational_zone_loop_columns')) {
	function educational_zone_loop_columns() {
		$columns = get_theme_mod( 'educational_zone_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'educational_zone_shop_per_page', 9 );
function educational_zone_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'educational_zone_product_per_page', 9 );
	return $cols;
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function educational_zone_skip_link_focus_fix() {
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'educational_zone_skip_link_focus_fix' );


/**
 * Get CSS
 */

function educational_zone_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script('admin-notice-script','educational_zone',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('educational_zone_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'educational_zone_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_educational-zone-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'educational-zone-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'educational_zone_getpage_css' );

//Admin Notice For Getstart
function educational_zone_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function educational_zone_deprecated_hook_admin_notice() {

    $dismissed = get_user_meta(get_current_user_id(), 'educational_zone_dismissable_notice', true);
    if ( !$dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'educational-zone'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'educational-zone'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=educational-zone-info.php' )); ?>"><?php esc_html_e( 'Get started', 'educational-zone' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( EDUCATIONAL_ZONE_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'educational-zone' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( EDUCATIONAL_ZONE_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'educational-zone' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'educational_zone_deprecated_hook_admin_notice' );

function educational_zone_switch_theme() {
    delete_user_meta(get_current_user_id(), 'educational_zone_dismissable_notice');
}
add_action('after_switch_theme', 'educational_zone_switch_theme');
function educational_zone_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'educational_zone_dismissable_notice', true);
    die();
}

/**
 * Theme Info.
 */
function educational_zone_theme_info_load() {
	require get_theme_file_path( '/inc/theme-installation/theme-installation.php' );
}
add_action( 'init', 'educational_zone_theme_info_load' );