<?php
function woo_testimonials( $atts = [] ) {
	
	// $total = $atts['total'] ? $atts['total'] : -1;
	$total = -1;
	
	$args = [
		'post_type'      => 'testimonial',
		'posts_per_page' => $total,
		'post_status'    => 'publish'
	];

	$testimonials = new WP_Query( $args );
	
	if ( $testimonials->have_posts() ) :
		ob_start();
		echo "<ul class='testimonials-container'>";
			while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
				<li id="testimonial-<?php the_ID(); ?>" class="testimonial-single">
					<div class="testimonial-single-inner">
						<div class="testimonial-content">
							<?php the_content(); ?>
						</div>
						<h5 class="testimonial-title">
							<?php the_title(); ?>
							<span><?php the_field( 'date' ) || the_field( 'date_no_day' ); ?></span>
						</h5>
					</div>
				</li>
			<?php
			endwhile;
		echo "</ul>";

	else:
		get_template_part( 'includes/no-results', 'index' );
	endif;

	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'testimonials', 'woo_testimonials' );