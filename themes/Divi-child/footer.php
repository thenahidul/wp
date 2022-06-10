<?php
if ( et_theme_builder_overrides_layout( ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE ) || et_theme_builder_overrides_layout( ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE ) ) {
    // Skip rendering anything as this partial is being buffered anyway.
    // In addition, avoids get_sidebar() issues since that uses
    // locate_template() with require_once.
    return;
}

/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action( 'et_after_main_content' );

if ( 'on' === et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
				<?php get_sidebar( 'footer' ); ?>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<div class="et_pb_row clearfix">
							<div class="et_pb_column et_pb_column_2_5 et_pb_column_1 column_footer_credit">
								<?php
									echo et_core_fix_unclosed_html_tags( et_core_esc_previously( et_get_footer_credits() ) );
								?>
							</div>
							<div class="et_pb_column et_pb_column_3_5 et_pb_column_2 et_pb_css_mix_blend_mode_passthrough et-last-child column_footer_menu">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'footer-menu',
										'depth'          => '1',
										'menu_class'     => 'bottom-nav',
										'container'      => '',
										'fallback_cb'    => '',
									) );
								?>
							</div>
						</div>

					</div>
				</div> <!-- #et-footer-nav -->
			<?php endif; ?>

				<!-- <div id="footer-bottom">
					<div class="container clearfix">
						<?php
							// if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
							// 	//get_template_part( 'includes/social_icons', 'footer' );
							// }

							// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
							//echo et_core_fix_unclosed_html_tags( et_core_esc_previously( et_get_footer_credits() ) );
							// phpcs:enable
						?>
					</div>
				</div> -->
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>