<?php
/**
 * Template part for displaying posts - Image
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sentweb
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('small-thumbs'); ?>>

	<div class="entry clearfix">
		<div class="entry-image">
			<a href="<?php echo get_sent_featured_image_src();?>" data-lightbox="image">
				<img class="image_fade" src="<?php echo get_sent_featured_image_src();?>" alt="<?php echo get_sent_featured_image_alt(); ?>">
			</a>
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
				<?php echo get_sent_post_meta();
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