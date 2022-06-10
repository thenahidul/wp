<?php

function grandmere_setup() {
	/*
	* Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Twenty-One, use a find and replace
	 * to change 'grandmere' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'grandmere', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Let WordPress manage the document title.
	 * This theme does not use a hard-coded <title> tag in the document head,
	 * WordPress will provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	/**
	 * Add post-formats support.
	 */
	add_theme_support(
		'post-formats',
		array(
			'link',
			'aside',
			'gallery',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		)
	);
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1568, 9999 );
	
	register_nav_menus(
		array(
			'header' => esc_html__( 'Header menu', 'grandmere' ),
			'footer' => __( 'Footer menu', 'grandmere' ),
		)
	);
	
	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);
	
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	$logo_width  = 300;
	$logo_height = 100;
	
	add_theme_support(
		'custom-logo',
		array(
			'height'               => $logo_height,
			'width'                => $logo_width,
			'flex-width'           => true,
			'flex-height'          => true,
			'unlink-homepage-logo' => true,
		)
	);
	
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'd1e4dd',
		)
	);
}

add_action( 'after_setup_theme', 'grandmere_setup' );

/**
 * Register widget area.
 *
 * @return void
 * @link  https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @since Twenty Twenty-One 1.0
 *
 */
function grandmere_widgets_init() {
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'grandmere' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'grandmere' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'grandmere_widgets_init' );

/**
 * Enqueue scripts and styles.
 *
 * @return void
 * @since Twenty Twenty-One 1.0
 *
 */
function grandmere_scripts() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&family=Lora:400i' );
	wp_enqueue_style( 'allcss', get_theme_file_uri( 'assets/css/all.css' ) );
	wp_enqueue_style( 'home', get_theme_file_uri( 'assets/css/home.css' ) );
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'assets/css/bootstrap.min.css' ) );
	wp_enqueue_style( 'grand_mere', get_theme_file_uri( 'assets/css/grand_mere.css' ) );
	wp_enqueue_style( 'header', get_theme_file_uri( 'assets/css/header.css' ) );
	wp_enqueue_style( 'footer', get_theme_file_uri( 'assets/css/footer.css' ) );
	
	wp_enqueue_style( 'grandmere-stylesheet', get_stylesheet_uri() );
	
	//wp_deregister_script( 'jquery' );
	//wp_enqueue_script('jquery','//code.jquery.com/jquery-3.5.1.min.js',null,'3.5.1',true);
	//wp_enqueue_script( 'jquery', get_theme_file_uri( 'assets/js/jquery-3.4.1.min.js' ), null, '3.4.1', true );
	
	wp_enqueue_script( 'bootstrap', get_theme_file_uri( 'assets/js/bootstrap.min.js' ), [ 'jquery' ], '4.0', true );
	wp_enqueue_script( 'popper', get_theme_file_uri( 'assets/js/popper.min.js' ), [ 'jquery' ], '4.0', true );
	wp_enqueue_script( 'home', get_theme_file_uri( 'assets/js/home.js' ), [ 'jquery' ], '1.0', true );
	wp_enqueue_script( 'header', get_theme_file_uri( 'assets/js/header.js' ), [ 'jquery' ], '1.0', true );
	wp_enqueue_script( 'grand_mere', get_theme_file_uri( 'assets/js/grand_mere.js' ), [ 'jquery' ], '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'grandmere_scripts' );