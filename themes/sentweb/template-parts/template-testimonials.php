<div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
	<div class="flexslider">
		<div class="slider-wrap">
			<?php 
				$sent_testimonial = new WP_Query(array(
					'post_type'	=> 'sent_testimonials',
					'posts_per_page'=> 3,
					'orderby'   => 'meta_value',
        			'order' => 'ASC',
				));
			?>
			<!-- single slide -->
			<?php if($sent_testimonial->have_posts()) : ?>
				<?php while($sent_testimonial->have_posts()) : $sent_testimonial->the_post(); ?>
					<div class="slide">
						<div class="testi-image">
							<?php the_post_thumbnail(); ?>
							</a>
						</div>
						<div class="testi-content">
							<?php the_content(); ?>
							<div class="testi-meta"> <?php the_title(); ?> <span></span> </div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php else : ?>
				<div class="container">
					<div class="slider-caption slider-caption-center">
						<h2 class="text-center" style="color: #fff;">No Item Found</h2>
					</div>
				</div>
			<?php endif; wp_reset_query();  ?>
		</div><!-- /end slider-wrap -->
	</div>
</div>	