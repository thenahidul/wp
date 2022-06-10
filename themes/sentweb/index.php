<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sentweb
 */

get_header();

global $sent;

 ?>
<!-- Post content -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">

			<?php if( $sent['blog-page-sidebar'] == 1) : ?>
			<div class="row">
				<div class="col-md-9">
			<?php endif; ?>

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
							'prev_text'	=> '&larr; Newer',
							'next_text'	=> 'Older &rarr;',
							'screen_reader_text'=> ' '
						) );
					 ?>
				</div>

			<?php else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			<?php if( $sent['blog-page-sidebar'] == 1) : ?>
				</div><!-- .col-md-9 -->
				<?php get_sidebar(); ?>
			</div><!-- .row -->
			<?php endif; ?>
			
		</div><!-- .container -->
	</div><!-- .content-wrap -->
</section>
<!-- /End Page content -->
<?php get_footer();