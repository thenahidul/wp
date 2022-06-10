<?php
function woo_properties_grid( $atts ) {

	// ignore property
	$ignore = $atts['ignore'];


	// status
	$status   = $atts['status'];
	$tax_status = '';
	if ( $status ) {
		$tax_status = array(
			'taxonomy' => 'status',
			'field'    => 'term_id',
			'terms'    => $status
		);
	}

	// types
	$types   = $atts['types'];
	$tax_types = '';
	if ( $types ) {
		$tax_types = array(
			'taxonomy' => 'types',
			'field'    => 'term_id',
			'terms'    => $types
		);
	}

	// featured
	$featured      = $atts['featured'];
	$featured_meta = '';
	if ( $featured ) {
		$featured_meta = array(
			'key'     => 'featured',
			'value'   => 1,
			'compare' => '='
		);
	}

	$args = [
		'post_type'      => 'property',
		'posts_per_page' => $atts['total'],
		'post_status'    => 'publish',
		'tax_query'      => array( 'relation' => 'OR', $tax_status, $tax_types ),
		'meta_query'     => array( $featured_meta ),
		'post__not_in'   => array( $ignore )
	];

	//$css_class = 'properties-inner-page';
	$css_class = 'properties-inner-page-2';
	if(is_front_page()) {
		$css_class = 'properties-front-page';
	}

	$properties = new WP_Query( $args );
	if ( $properties->have_posts() ) :

		echo "<ul class='properties-grid-container {$css_class}'>";

		while ( $properties->have_posts() ) : $properties->the_post(); ?>
			<li id="property-<?php the_ID(); ?>" class="property-single">
				<div class="property-single-inner">
					<div class="property-single-top">
						<a href="<?php the_permalink(); ?>" class="property-thumb-container">
							<?php the_post_thumbnail( 'property-thumb', [ 'class' => 'property-thumb' ] ); ?>
						</a>
						<span>
							<?php // the_field( 'property_type' ); ?>
						</span>
						<!-- <p class="property-meta">
							<?php
							//the_terms( get_the_ID(), 'types', '<span class="property-term-types">', '', '</span>' );
							?>
							<?php
							//the_terms( get_the_ID(), 'status', '<span class="property-term-status">', '', '</span>' );
							?>
						</p> -->
					</div>
					<div class="property-single-bottom">
						<h2 class="property-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
					    <a class="property-button" href="<?php the_permalink(); ?>">View Details</a>
					</div>
				</div>
			</li>
		<?php
		endwhile;

		echo "</ul>";

	else:
		get_template_part( 'includes/no-results', 'index' );
	endif;

	wp_reset_postdata();
}