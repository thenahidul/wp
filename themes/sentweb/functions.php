<?php
/**
 * sentweb functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sentweb
 */


@ini_set( 'upload_max_size' , '100M' );
@ini_set( 'post_max_size', '100M');
@ini_set( 'max_execution_time', '300' );

if ( ! function_exists( 'sentweb_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sentweb_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sentweb, use a find and replace
		 * to change 'sentweb' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sentweb', get_template_directory() . '/languages' );

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
			'prmary_menu' => esc_html__( 'Primary', 'sentweb' ),
			'footer_menu' => esc_html__( 'Footer', 'sentweb' ),
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
		add_theme_support( 'custom-background', apply_filters( 'sentweb_custom_background_args', array(
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

		/**
		 * Add support for post formats
		 *
		 */
		$formats = array('image', 'video', 'audio', 'gallery', 'quote');
		add_theme_support( 'post-formats', $formats );
	}
endif;
add_action( 'after_setup_theme', 'sentweb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sentweb_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sentweb_content_width', 640 );
}
add_action( 'after_setup_theme', 'sentweb_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sentweb_widgets_init() {

	// sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sentweb' ),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'Add widgets here.', 'sentweb' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// footer sidebar - left
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Left Sidebar', 'sentweb' ),
		'id'            => 'foter-sidebar-left',
		'description'   => esc_html__( 'Add Footer Left widgets here.', 'sentweb' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// footer sidebar - middle
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Middle Sidebar', 'sentweb' ),
		'id'            => 'foter-sidebar-middle',
		'description'   => esc_html__( 'Add Footer Middle widgets here.', 'sentweb' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	// footer sidebar - right
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right Sidebar', 'sentweb' ),
		'id'            => 'foter-sidebar-right',
		'description'   => esc_html__( 'Add Footer Right widgets here.', 'sentweb' ),
		'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );



}
add_action( 'widgets_init', 'sentweb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sentweb_scripts() {

if( !is_admin() ) {
		//wp_deregister_script('jquery');
		//wp_register_script('jquery', get_theme_file_uri( '/js/jquery.js' ), false);
		//wp_enqueue_script('jquery');
	}
    
    wp_enqueue_script( 'jquery-migrate' );

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic' );


	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/css/bootstrap.css' ), array(), '3.3.5' );
	
	wp_enqueue_style( 'sentweb-style', get_stylesheet_uri() );

	wp_enqueue_style( 'dark', get_theme_file_uri( '/css/dark.css' ), array(), '' );
	wp_enqueue_style( 'fonticons', get_theme_file_uri( '/css/font-icons.css' ), array(), '' );
	wp_enqueue_style( 'animate', get_theme_file_uri( '/css/animate.css' ), array(), '' );
	wp_enqueue_style( 'magnificpopup', get_theme_file_uri( '/css/magnific-popup.css' ), array(), '' );

	wp_enqueue_style( 'ept-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
	
	wp_enqueue_style( 'responsive', get_theme_file_uri( '/css/responsive.css' ), array(), '' );

	// Load the Internet Explorer specific scripts
    wp_enqueue_script( 'ie9css3-mediaqueries-js','https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js', array(), '', false);
    wp_script_add_data( 'ie9css3-mediaqueries-js', 'conditional', 'lt IE 9' );

    wp_enqueue_style( 'colorscss', get_theme_file_uri( '/css/colors.css' ), array(), '' );

	wp_enqueue_script( 'plugins', get_theme_file_uri( '/js/plugins.js' ), array('jquery'), '', false );

	wp_enqueue_script( 'functions', get_theme_file_uri( '/js/functions.js' ), array('jquery'), '', true );

	if( is_front_page() ) {
		wp_enqueue_script( 'front-page', get_theme_file_uri( '/js/front-page.js' ), array('jquery'), '', true );
	}
	if( !is_front_page() ) {
		wp_enqueue_script( 'notfront-page', get_theme_file_uri( '/js/not-frontpage.js' ), array('jquery'), '', true );
	}

	wp_enqueue_script( 'sentweb-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'customjs', get_theme_file_uri( '/js/custom.js' ), array('jquery'), time(), true );
}
add_action( 'wp_enqueue_scripts', 'sentweb_scripts' );

/**
 * Enqueue scripts and styles - ADMIN
 */
function sent_admin_scripts() {

	wp_enqueue_script( 'adminjs', get_theme_file_uri( '/js/wordpress-dashboard.js' ), array('jquery'), '', true );
}
add_action( 'admin_enqueue_scripts', 'sent_admin_scripts' );


/**
 * Implement the Custom Post types
 */
require get_template_directory() . '/inc/template-custom-posttype.php';


/**
 * Implement the Metabox feature
 */
require get_template_directory() . '/metabox/page-meta.php';


/**
 * Implement the Shortcode feature
 */
require get_template_directory() . '/shortecodes/general-shortcode.php';
require get_template_directory() . '/shortecodes/testimonials-shortcode.php';


/**
 * Implement the Theme Options
 */
// Redux Framework
if( ! class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/lib/ReduxFramework/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/lib/ReduxFramework/ReduxCore/framework.php' );
}
if( ! isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/theme-options.php' ) ) {
	require_once( dirname( __FILE__ ) . '/theme-options.php' );
}

// Check if blog page
function is_blog() {
    return ( is_archive() || is_author() || is_category() || is_home() || is_tag()) && 'post' == get_post_type();

    // return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

// related posts
require get_template_directory() . '/inc/related-posts.php';

// share post option
require get_template_directory() . '/inc/share-post.php';

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