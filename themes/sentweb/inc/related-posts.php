<?php 

function sent_related_posts() {

		global $post;

		$categories = get_the_category($post->ID);

		if ($categories) {

			$category_ids = array();

			foreach($categories as $individual_category) {
				$category_ids[] = $individual_category->term_id;
			}

			$args=array(
				'category__in' 		 => $category_ids,
				'post__not_in' 		 => array($post->ID),
				'posts_per_page'	 => 4,
				'ignore_sticky_posts'=>1
			);

			$rpost_query = new wp_query( $args );

			if( $rpost_query->have_posts() ) : ?>

				<?php ob_start();
					$i = 1;

					echo '<h4>Related Posts:</h4>
					<div class="related-posts clearfix">';

						while( $rpost_query->have_posts() ) : $rpost_query->the_post(); ?>

							<div class="col_half nobottommargin <?php if($i % 2 == 0) {echo 'col_last';} ?> ">
								<div class="mpost clearfix">
									<div class="entry-image">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( ); ?></a>
									</div>
									<div class="entry-c">
										<div class="entry-title">
											<a href="<?php the_permalink(); ?>"><?php the_title( '<h4>', '</h4>' ); ?></a>
										</div>
										<?php echo get_sent_post_meta(); ?>
										<div class="entry-content relate-post-exceprt"><?php echo sent_read_more(0, 12); ?></div>
									</div>
								</div>

							</div>
						<?php $i++; endwhile; wp_reset_query();
					echo '</div>';
			else :
				echo '<div class="entry-title no-post-title">No Related Post found!</div>';
			endif; 
		}
		return ob_get_clean();
}