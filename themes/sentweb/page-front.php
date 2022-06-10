<?php 
/*
	Template Name: FrontPage
*/
get_header(); ?>

<?php get_template_part( 'template-parts/template-slider' ); ?>
<!-- Page content -->
<section id="content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

			<?php endwhile; wp_reset_query(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</section>
<!-- /End Page content -->

<?php get_footer(); ?>