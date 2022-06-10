<?php
/**
 * Template part for displaying posts - Audio
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sentweb
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('small-thumbs post-format-audio'); ?>>

	<div class="entry clearfix">
		<div class="entry-image">
			<?php  
				$audio_file = get_field('audio'); 
				if(isset($audio_file)) {
					echo str_replace('?visual=true', '?visual=false', $audio_file);
				}
			?>
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