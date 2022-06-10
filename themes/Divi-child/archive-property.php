<?php get_header(); ?>
	<div id="main-content">
		<div class="container">
			<div id="content-area" class="clearfix">
				<div id="left-area" class="property-archive-page">
					<?php
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					echo "<h1 class='entry-title main_title property-tax-title'>" . $term->name . "</h1>";
					$term_id = $term->term_id;
					echo do_shortcode("[properties total=-1]");
					?>
				</div> <!-- #left-area -->
				
				<?php // get_sidebar(); ?>
			</div> <!-- #content-area -->
		</div> <!-- .container -->
	</div> <!-- #main-content -->

<?php

get_footer();
