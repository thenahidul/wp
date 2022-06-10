<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

$show_navigation = get_post_meta( get_the_ID(), '_et_pb_project_nav', true );

?>

	<div id="main-content">

		<?php if ( ! $is_page_builder_used ) : ?>

		<div class="container">
			<div id="content-area" class="clearfix">
				<div id="left-area">

					<?php endif; ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php if ( ! $is_page_builder_used ) : ?>

								<div class="et_main_title">
									<h1 class="entry-title"><?php the_title(); ?></h1>
									<span class="et_project_categories"><?php echo get_the_term_list( get_the_ID(), 'project_category', '', ', ' ); ?></span>
								</div>

								<div class="property-meta-wrap">
									<p class="property-meta property-meta-single">
										<?php
										the_terms( get_the_ID(), 'status', '<span class="property-term-status">', '', '</span>' );
										?>
									</p>
								</div>

								<?php woo_property_gallery_slider(get_the_ID()); ?>

								<?php $page_layout = get_post_meta( get_the_ID(), '_et_pb_page_layout', true ); ?>

							<?php endif; ?>

							<div class="entry-content">
								<div class="property-details-wrap">

									<div class="property-section property-description">
										<h3><?php _e( 'Information' ); ?></h3>
										<?php the_content(); ?>
									</div>

									<div class="property-section property-details">
										<h3><?php _e( 'Details' ); ?></h3>
										<ul class="property-info-list property-info-list-flex">
											<li>
												<span><?php _e('Property Type: ') ?></span>
												<span><?php the_terms( get_the_ID(), 'types', '', '', '' ); ?></span>
											</li>
											<?php
												woo_the_field('secondary_type', 'Secondary Type: ');
												woo_the_field('sale_price', 'Sale Price: ');
												woo_the_field('building_size_square_footage', 'Building Size (Sq Ft): ');
												woo_the_field('year_built', 'Year Built: ');
												woo_the_field('stories', 'Stories: ');
												woo_the_field('Parking', 'parking: ');
												woo_the_field('total_space_available', 'Total Space Available: ');
												woo_the_field('max_contingent_space', 'Max Contingent Space: ');
												woo_the_field('annual_rent', 'Annual Rent: ');
												woo_the_field('electric', 'Electric: ');
												woo_the_field('gas', 'Gas: ');
												woo_the_field('hvac', 'HVAC: ');
												woo_the_field('transportation', 'Transportation: ');
											?>
										</ul>
										<ul class="property-info-list">
											<?php woo_the_field('amenities', 'Amenities: '); ?>
										</ul>
										<ul class="property-info-list">
											<?php woo_the_field('other', 'Other: '); ?>
										</ul>
									</div>

									<div class="property-section property-plans">
										<h3><?php _e( 'Floor Plans' ); ?></h3>
										<ul class="property-info-list property-info-list-flex">
											<?php woo_the_field_file(); ?>
										</ul>
									</div>

									<?php if ( have_rows( 'available_space' ) ): ?>
									<div class="property-section property-spaces">
										<h3><?php _e( 'Available Spaces' ); ?></h3>
										<div class="property-spaces-inner">
											<?php woo_the_field_available_space(); ?>
										</div>
									</div>
									<?php endif; ?>

									<div class="property-section property-map">
										<h3><?php _e( 'Map Location' ); ?></h3>
										<div class="property-map-inner">
											<?php the_field('map_location'); ?>
										</div>
									</div>

									<div class="property-section property-contacts">
										<h3><?php _e( 'Contact Info' ); ?></h3>
											<?php woo_property_agents('property-info-list'); ?>
									</div>

								</div><!-- .property-details-wrap -->
							</div> <!-- .entry-content -->

							<?php if ( ! $is_page_builder_used ) : ?>

								<?php
								if ( ! in_array( $page_layout, array( 'et_full_width_page', 'et_no_sidebar' ) ) ) {
									//	et_pb_portfolio_meta_box();
								}
								?>

							<?php endif; ?>

							<?php if ( ! $is_page_builder_used || ( $is_page_builder_used && 'on' === $show_navigation ) ) : ?>

								<!--								<div class="nav-single clearfix">-->
								<!--									<span class="nav-previous">--><?php //previous_post_link( '%link', '<span class="meta-nav">' . et_get_safe_localization( _x( '&larr;', 'Previous post link', 'Divi' ) ) . '</span> %title' ); ?><!--</span>-->
								<!--									<span class="nav-next">--><?php //next_post_link( '%link', '%title <span class="meta-nav">' . et_get_safe_localization( _x( '&rarr;', 'Next post link', 'Divi' ) ) . '</span>' ); ?><!--</span>-->
								<!--								</div>-->
								<!-- .nav-single -->

							<?php endif; ?>

						</article> <!-- .et_pb_post -->

						<?php
						if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_postcomments', 'on' ) ) {
							// comments_template( '', true );
						}
						?>
					<?php endwhile; ?>

					<?php if ( ! $is_page_builder_used ) : ?>

				</div> <!-- #left-area -->

				<?php
				if ( in_array( $page_layout, array( 'et_full_width_page', 'et_no_sidebar' ) ) ) {
					//et_pb_portfolio_meta_box();
				}
				?>

				<?php get_sidebar(); ?>

				<div class="clear related-properties-container">
					<h2><?php _e( 'Similar Properties' ); ?></h2>
					<?php
						$current_property = get_the_ID();
						$term_types = get_the_terms($current_property, 'types');
						$type = $term_types[0]->term_id;

						$term_status = get_the_terms($current_property, 'status');
						$status = $term_status[0]->term_id;
						// woo_debug($term_status);
						echo do_shortcode( "[properties total='3' ignore={$current_property} status={$status} types={$type}]" );
					?>
				</div>
			</div> <!-- #content-area -->
		</div> <!-- .container -->

	<?php endif; ?>

	</div> <!-- #main-content -->

<?php

get_footer();
