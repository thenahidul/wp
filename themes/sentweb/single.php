<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

		<?php if( $sent['blog-post-sidebar'] == 1) : ?>
		<div class="row">
			<div class="col-md-9">
		<?php endif; ?>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/single', get_post_type() ); ?>

			<div class="post-navigation post-navigation-single clearfix">
				<?php 
					the_post_navigation( array(
			            'prev_text'		=> __( '&lArr; %title' ),
			            'next_text'		=> __( '%title &rArr;' )
			        ));
		        ?>
			</div>
			<!-- Post Author Info
			============================================= -->
			<div class="line"></div>
			<div class="panel panel-default">
				<div class="panel-heading author-heading">
					<h3 class="panel-title">Posted by <span><?php the_author_posts_link(); ?></span></h3>
				</div>
				<div class="panel-body">
					<div class="author-image">
						<?php echo get_avatar(get_the_author_meta('ID'), 84); ?>
					</div>
					<?php the_author_meta('description'); ?>
				</div>
			</div><!-- Post Single - Author End -->
			
			<!-- Related Posts -->
			<?php if( $sent['related-post-opt'] == 1 ) : ?>
			<div class="line"></div>
			<div class="related-posts clearfix">
				<?php echo sent_related_posts(); ?>
			</div>
			<?php endif; ?>
			<!-- // end Related Posts -->
			
			<?php 
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<?php if( $sent['blog-post-sidebar'] == 1) : ?>
			</div><!-- .col-md-9 -->
			<?php get_sidebar(); ?>
		</div><!-- .row -->
		<?php endif; ?>
	</div>
</div>
</section>
<!-- /End Page content -->
<?php get_footer();