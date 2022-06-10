<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sentweb
 */

get_header(); ?>
<!-- Page content -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="error-404 not-found">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found!', 'sentweb' ); ?> Back to <a href="<?php echo get_site_url(); ?>">Home</a></h1>
			</div><!-- .error-404 -->
		</div>
	</div>
</section>
<!-- /End Page content -->
<?php get_footer();