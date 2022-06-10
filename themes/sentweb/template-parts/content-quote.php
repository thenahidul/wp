<?php
/**
 * Template part for displaying posts - Standard
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sentweb
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('small-thumbs post-forat-quote'); ?>>

	<div class="entry clearfix">

		<div class="entry-image">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo get_theme_file_uri('/images/quote.png'); ?>" alt="Quote" class="image_fade">
			</a>
		</div>

		<div class="entry-c">

			<div class="entry-content">
				<h3 class="quote-content">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_content(); ?></a>
				</h3>		
				<?php the_title( '<h4 class="quote-author">- ', '</h4>'); ?>
			</div>

			<?php if ( 'post' === get_post_type() ) : ?>
				<?php echo get_sent_post_meta(); 
			endif; ?>

		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->