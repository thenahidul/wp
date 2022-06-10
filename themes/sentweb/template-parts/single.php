<?php
/**
 * Template part for displaying posts - Standard
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sentweb
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post nobottommargin'); ?>>

	<div class="entry clearfix">

		<div class="entry-title">
			<?php the_title( '<h2>', '</h2>' ); ?>
		</div>

		<?php if ( 'post' === get_post_type() ) : ?>
			<?php echo get_sent_post_meta();
		endif; ?>

		<?php 
			if( get_field('video') ) {
				echo '<div class="entry-image bottommargin">';
				echo get_field('video');
				echo '</div>';
			}
			elseif( get_field('audio') ) {
				echo '<div class="entry-image bottommargin">';
				$audio_file = get_field('audio'); 
				echo str_replace('?visual=true', '?visual=false', $audio_file);
				echo '</div>';
			}
		?>

		<?php if( get_field('gallery') ) : ?>
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
											<img class="image_fade" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
										</a>
									</div>
								<?php endforeach; ?>

							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if(has_post_thumbnail() && !has_post_format(array('audio', 'video', 'gallery', 'quote')) ) : ?>
			<div class="entry-image bottommargin">
				<img class="image_fade" src="<?php echo get_sent_featured_image_src('full');?>" alt="<?php echo get_sent_featured_image_alt(); ?>">
			</div><!-- .entry-image end -->
		<?php endif; ?>

		<div class="entry-content notopmargin">
			<?php the_content(); ?>
		</div>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->