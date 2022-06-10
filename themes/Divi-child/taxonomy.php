<?php get_header(); ?>
	<div id="main-content">
		<div class="container">
			<div id="content-area" class="clearfix">
				<div id="left-area">
					<?php
					$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
					// woo_debug($term);
					echo "<h1 class='entry-title main_title property-tax-title'>" . $term->name . "</h1>";
					$term_id = $term->term_id;

					echo do_shortcode("[properties status={$term_id} types={$term_id}]");
					?>
				</div> <!-- #left-area -->

				<?php //get_sidebar(); ?>
			</div> <!-- #content-area -->
		</div> <!-- .container -->
	</div> <!-- #main-content -->

<?php

get_footer();
