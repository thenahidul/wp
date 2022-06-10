<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sentweb
 */

get_header(); ?>
<!-- Post content -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile; ?>

				<div class="pager nomargin">
					<?php 
						the_posts_pagination( array(
							'prev_text'	=> '&larr; Older',
							'next_text'	=> 'Newer &rarr;',
							'screen_reader_text'=> ' '
						) );
					 ?>
				</div>

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
		</div>
	</div>
</section>
<!-- /End Page content -->
<?php
get_sidebar();
get_footer();