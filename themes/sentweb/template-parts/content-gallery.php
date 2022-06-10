<?php
/**
 * Template part for displaying posts - Gallery
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sentweb
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('small-thumbs'); ?>>

	<div class="entry clearfix">
		<div class="entry-image">
			<div class="fslider" data-arrows="false" data-lightbox="gallery">
				<div class="flexslider">
					<div class="slider-wrap">
						<?php 
							$images = get_field('gallery');

						if($images) : ?>

							<?php foreach($images as $image) : ?>
								<div class="slide">
									<a href="<?php echo $image['url']; ?>" data-lightbox="gallery-item">
										<img class="image_fade" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>">
									</a>
								</div>
							<?php endforeach; ?>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="entry-c">

			<div class="entry-title">
				<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
				?>
			</div>

			<?php if ( 'post' === get_post_type() ) : ?>
				<?php echo get_sent_post_meta(); ?>
			<?php
			endif; ?>

			<div class="entry-content">
				<?php
					if(has_excerpt()) {
						the_excerpt();
					} else {
						echo sent_read_more(0, 50);
					}
					echo '<a href="'.get_the_permalink().'" class="more-link">Read More</a>';
				?>
			</div>

		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->