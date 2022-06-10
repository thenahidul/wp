<?php /*

  This file is part of a child theme called Divi-child.
  Functions in this file will be loaded before the parent theme's functions.
  For more information, please read
  https://developer.wordpress.org/themes/advanced-topics/child-themes/

*/

// this code loads the parent's stylesheet (leave it in place unless you know what you're doing)

function your_theme_enqueue_styles() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style,
		get_template_directory_uri() . '/style.css' );

	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);
	
	wp_enqueue_script('mainjs', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );
}

add_action( 'wp_enqueue_scripts', 'your_theme_enqueue_styles' );

/*  Add your own functions below this line.
    ======================================== */

add_action( 'after_setup_theme', function () {
	add_image_size( 'property-thumb', 400, 200, true );
} );

/*
*
* Custom post types
**/
require_once __DIR__ . '/inc/cpt/properties.php';
require_once __DIR__ . '/inc/cpt/agents.php';
require_once __DIR__ . '/inc/cpt/testimonials.php';

/**
 * Custom Widgets
 */
require_once __DIR__ . '/inc/widgets/recent-properties.php';
require_once __DIR__ . '/inc/widgets/property-agents.php';
require_once __DIR__ . '/inc/widgets/property-features.php';

/**
 * Shortcodes
 */
require_once __DIR__ . '/inc/shortcodes/testimonials.php';

/*
 * Create Shortcode for Advance search form
 *
 * @return form
 */
function woo_advance_search__form() {
	ob_start();
	include_once __DIR__ . '/inc/templates/advance-search-form.php';

	return ob_get_clean();
}

add_shortcode( 'advance_search_form', 'woo_advance_search__form' );

/**
 * Shortcode for Properties
 *
 * @param $atts
 * @param $content
 *
 * @return false|string
 */
function woo_properties( $atts, $content = '' ) {

	$atts = shortcode_atts(
		[
			'total'    => 6,
			'status'   => '',
			'types'    => '',
			'featured' => false,
			'ignore'   => ''
		],
		$atts
	);

	ob_start();
	include_once __DIR__ . '/inc/templates/properties.php';
	woo_properties_grid( $atts );

	return ob_get_clean();
}

add_shortcode( 'properties', 'woo_properties' );

/*
* Add custom class to body if it's a properties page
*/
function woo_properties_body_class( $classes ) {
	if ( is_tax( 'status' ) || is_tax( 'types' ) || is_post_type_archive( 'property' ) || is_page( '718' ) || is_page( '41' ) || is_page( '760' ) || is_page( '762' ) ) {
		$classes[] = 'et_full_width_page et_full_width_page_2';
		$classes[] = 'hide-sidebar';
		$classes[] = 'has-et_section_search_innerpage';
	}

	// if ( is_post_type_archive( 'property' ) ) {
	// 	$classes[] = 'et_full_width_page et_full_width_page_2';
	// }

	return $classes;
}

add_filter( 'body_class', 'woo_properties_body_class' );

/**
 * add advance search shortocde
 */
function woo_advance_search_form_to_before_main_content() {
	if ( is_tax( 'status' ) || is_post_type_archive( 'property' ) || is_page( '718' ) || is_page( '41' ) || is_page( '760' ) || is_page( '762' ) || is_singular( 'property' ) ) :
		?>
		<div class="et_section_regular et_section_search_innerpage">
			<div class="et_pb_row">
				<div class="et_pb_code_inner">
					<?php echo do_shortcode( "[advance_search_form]" ); ?>
				</div>
			</div>
		</div>
	<?php
	endif;
}

// add_action( 'et_before_main_content', 'woo_advance_search_form_to_before_main_content' );

/**
 * load css & js for property single page
 */
function woo_property_assets() {
	if ( is_singular( 'property' ) ) {
		wp_enqueue_style( 'owlcarousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', null, wp_get_theme()->get( 'Version' ) );

		wp_enqueue_script( 'owlcarousel', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
		wp_enqueue_script( 'woo-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array(
			'jquery',
			'owlcarousel'
		), time(), true );
	}
}

add_action( 'wp_enqueue_scripts', 'woo_property_assets' );

/**
 * Property gallery slider
 */
function woo_property_gallery_slider( $id ) {
	$images = acf_photo_gallery( 'gallery', $id );

	if ( count( $images ) > 1 ): ?>
		<div class="owl-carousel property-slider">
			<?php foreach ( $images as $image ) : ?>
				<div class="item">
					<img src="<?php echo esc_attr( $image['full_image_url'] ) ?>" alt="<?php echo esc_attr( $image['title'] ); ?>">
				</div>
			<?php endforeach; ?>
		</div>
	<?php
	else:
		?>
		<div class="property-featured">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
	<?php
	endif;
}

/**
 *  ACF field helper functions
 *  Creates li tag if value exists
 */
function woo_the_field( $key, $text = '' ) {

	$currency =  '';

	if($key == 'annual_rent' || $key == 'sale_price') {
		$currency = '&#36;';
	}

	if ( get_field( $key ) ) { ?>
		<li>
			<span><?php _e( $text ) ?></span>
			<span>
				<?php
				echo $currency;
				the_field( $key );
				?>
			</span>
		</li>
	<?php }
}

function woo_the_field_format( $key, $text = '' ) {
	if ( get_field( $key ) ) { ?>
		<li>
			<span><?php _e( $text ) ?></span>
			<ul>
				<?php
				$str_arr = explode( ',', get_field( $key ) );
				foreach ( $str_arr as $str ) { ?>
					<li>
						<span><?php _e( $str ); ?></span>
					</li>
				<?php } ?>
			</ul>
		</li>
		<?php
	}
}

/**
 *  ACF field helper functions
 *  Repeater field - file
 */
function woo_the_field_file() {
	if ( have_rows( 'attachments' ) ):
		while ( have_rows( 'attachments' ) ) : the_row(); ?>
			<li>
				<?php $file = get_sub_field( 'upload' ); ?>
				<a href="<?php echo esc_url($file['url']); ?>" target="_blank">
					<?php
						// $file_name = str_replace('-', ' ', $file['name']);
						$file_name = preg_replace( '/[0-9]*$|-/', ' ', $file['name'] );
					?>
					<span>
						<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icon-file.svg'; ?>" alt="<?php echo $file_name ?>">
					</span>
					<span>
						<?php echo ucwords( $file_name ); ?>
					</span>
				</a>
			</li>
		<?php
		endwhile;
	endif;
}

/**
 *  ACF field helper functions
 *  Repeater field - Avaialble Space
 */
function woo_the_field_available_space() {
	if ( have_rows( 'available_space' ) ): ?>
		<div class="et_pb_module et_pb_accordion">
			<?php
			$i = 1;
			while ( have_rows( 'available_space' ) ) : the_row(); ?>
				<div class="et_pb_toggle et_pb_module et_pb_accordion_item <?php echo $i == 1 ? 'et_pb_toggle_close' : 'et_pb_toggle_close' ?> ">
					<h5 class="et_pb_toggle_title">
						<?php
							if(get_sub_field('unit')) {
								_e('Unit: '); the_sub_field( 'unit' );
							}
							?>
					</h5>
					<div class="et_pb_toggle_content clearfix">
						<ul class="property-info-list property-info-list-flex">
							<?php
								if(get_sub_field('space_available')) {
									echo "<li><span>Space Available:</span><span>";
									the_sub_field('space_available');
									echo "</span></li>";
								}
								if(get_sub_field('occupancy')) {
									echo "<li><span>Occupancy: </span><span>";
									the_sub_field('occupancy');
									echo "</span></li>";
								}
								if(get_sub_field('lease_length')) {
									echo "<li><span>Lease Length: </span><span>";
									the_sub_field('lease_length');
									echo "</span></li>";
								}
								if(get_sub_field('annual_rent')) {
									echo "<li><span>Annual Rent: </span><span>&#36;";
									the_sub_field('annual_rent');
									echo "</span></li>";
								}
							?>
						</ul>
					</div>
				</div>
			<?php
			$i++;
			endwhile;
			?>
		</div>
		<?php
	endif;
}

/**
 * Get Agents List with name
 */
function woo_property_agents($css_class = '') {
	$agents = new WP_Query(
		array(
			'post_type'           => 'agent',
			'posts_per_page'      => -1,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		)
	);
	if ( $agents->have_posts() ) : ?>
		<ul class="<?php echo $css_class; ?>">
			<?php while ( $agents->have_posts() ) : $agents->the_post(); ?>
				<li>
					<h4>
						<a href="mailto:<?php the_field('agent_email'); ?>" target="_blank"><?php the_title(); ?></a>
					</h4>
				</li>
			<?php endwhile; ?>
		</ul>

		<?php
		wp_reset_postdata();
	endif;
}

/**
 * Property features - types & status
 */
function woo_property_features($css_class) {
	$terms = get_terms( array(
		'taxonomy' => 'types',
		'hide_empty' => false,
	) );

	// woo_debug($terms);
}

/*
Overriding the post_meta to change the date format
*/

if ( ! function_exists( 'et_pb_postinfo_meta' ) ) :
	/**
	 * Return post meta.
	 *
	 * @param string[] $postinfo post info e.g date, author, categories.
	 * @param string   $date_format date format.
	 * @param string   $comment_zero text to display for 0 comments.
	 * @param string   $comment_one text to display for 1 comments.
	 * @param string   $comment_more text to display for more comments.
	 */
	function et_pb_postinfo_meta( $postinfo, $date_format, $comment_zero, $comment_one, $comment_more ) {
		$postinfo_meta = array();

		if ( in_array( 'author', $postinfo, true ) ) {
			$postinfo_meta[] = ' ' . esc_html__( 'by', 'et_builder' ) . ' <span class="author vcard">' . et_pb_get_the_author_posts_link() . '</span>';
		}

		// if ( in_array( 'date', $postinfo, true ) ) {
		// 	$postinfo_meta[] = '<span class="published">' . esc_html( get_the_time( wp_unslash( $date_format ) ) ) . '</span>';
		// }

		if ( in_array( 'date', $postinfo, true ) ) {
			$postinfo_meta[] = '<span class="published">' . esc_html( get_the_time( wp_unslash( 'Y' ) ) ) . '</span>';
		}

		if ( in_array( 'categories', $postinfo, true ) ) {
			$categories_list = get_the_category_list( ', ' );

			// do not output anything if no categories retrieved.
			if ( '' !== $categories_list ) {
				$postinfo_meta[] = $categories_list;
			}
		}

		if ( in_array( 'comments', $postinfo, true ) ) {
			$postinfo_meta[] = et_pb_get_comments_popup_link( $comment_zero, $comment_one, $comment_more );
		}

		return implode( ' | ', array_filter( $postinfo_meta ) );
	}
endif;

/**
 * helper function - pretty debug
 */
function woo_debug( $data ) {
	echo "<pre>";
	print_r( $data );
	echo "</pre>";
}