<?php 

if(!function_exists('sent_testimonials_shortcode')) :

	function sent_testimonials_shortcode($atts, $content = null) {
		
		ob_start();
		$testimonial_attss = shortcode_atts(array(
			'limit'	=> 3,
			'order_by'	=> 'ASC'
		), $atts);
		extract($testimonial_attss);

		$testimonials = new WP_Query( array(
			'post_type'		 => 'sent_testimonials',
			'posts_per_page' => $limit,
			'orderby'   => 'meta_value',
			'order' => $order_by
		));

		echo '<div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="true" data-slideshow="true"><div class="flexslider"><div class="slider-wrap">';
	
			while($testimonials->have_posts()) : $testimonials->the_post(); ?>
				<div class="slide">
					<div class="slider-inner-wrap">
						
					<!-- <div class="testi-image">
							<?php // the_post_thumbnail(); ?>
						</div> -->

						<div class="testi-content">
							<div class="testi-top">
								<?php the_content(); ?>
							</div>
							<div class="clearfix testi-bottom">
								<div class="col-sm-6 testi-bottom-left">
									<h5><?php the_title(); ?></h5>
									<h6><?php the_field('company'); ?></h6>
								</div>
								<div class="col-sm-6 testi-bottom-right">
									<!-- <i class="fa fa-star" aria-hidden="true"></i> -->
									<?php 
									$rating = get_field('rating');
									
									for ($i=1; $i <= $rating ; $i++) { ?>
										<img src="/wp-content/uploads/star.png" alt="Star">
									<?php
									}
									
									?>
								</div>
							</div>
							<!-- <div class="testi-meta"> <?php //the_title(); ?> <span></span> </div> -->
						</div>
					</div>

				</div>
			<?php endwhile;
			echo '</div></div></div>';

		$output = ob_get_clean();
		return $output; wp_reset_query();
	}

endif;
add_shortcode( 'sent_testimonialss', 'sent_testimonials_shortcode' );