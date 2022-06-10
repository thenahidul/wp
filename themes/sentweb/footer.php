<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sentweb
 */

?>
<?php if( !is_front_page() ) : ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php endif; ?>
	<!-- Footer
		============================================= -->
	<footer id="footer" class="dark">
		<!-- Copyrights
			============================================= -->
		<div id="copyrights">
			<div class="container clearfix">
				<div class="col_one_third widget-column">
					<?php dynamic_sidebar( 'foter-sidebar-left' ); ?>
				</div>
				<div class="col_one_third widget-column">
					<?php dynamic_sidebar( 'foter-sidebar-middle' ); ?>
					<div class="clear"></div>
				</div>
				<div class="col_one_third widget-column col_last">
					<?php dynamic_sidebar( 'foter-sidebar-right' ); ?>
				</div>
			</div>
		</div>
		<!-- #copyrights end -->
	</footer>
	<!-- #footer end -->
	</div>
	<!-- #wrapper end -->
	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-94024100-1', 'auto');
	  ga('send', 'pageview');
	</script>
	<?php wp_footer(); ?>
</body>
</html>