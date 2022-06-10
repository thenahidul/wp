<?php get_header(); ?>
<section id="content">
	<div class="">
		<div class="container clearfix">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="col_one_third bottommargin-sm center">
						<img data-animate="fadeInLeft" src="<?php echo get_sent_featured_image_src();?>" alt="<?php echo get_sent_featured_image_alt(); ?>">
					</div>
					<div class="col_two_third bottommargin-sm col_last">
						<div class="heading-block topmargin-lg">
							<?php the_title( '<h3>', '</h3>' ); ?>
						</div>
						<div class="industry-content">
							<?php the_content(); ?>
						</div>
						<div class="col_full nobottommargin">
							<a class="button button-3d button-black nomargin" id="register-form-submit" href="https://app.sentandsecure.com/account/login">Send a File Now</a> &nbsp; &nbsp; &nbsp;
							<a class="button button-3d button-black nomargin" id="register-form-submit" href="<?php echo get_site_url(); ?>#sent-industries">Other Industries</a>
						</div>
					</div>
				</article>
			<?php endwhile; wp_reset_query(); ?>
		</div>
	</div>
</section>
<?php get_footer();