<?php

/**
 * Recent_Properties widget class
 *
 */

class WP_Widget_Recent_Properties extends WP_Widget {

	public function __construct () {
		parent::__construct(
			'recent_properties',
			__('Recent Properties', 'divi'),
			array( 'description' => __( 'A Recent Properties Widget' ), 'divi' )
		);
	}

	public function widget ( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		$post_count = isset( $instance['post_count'] ) ? $instance['post_count'] : 3;

		$properties = new WP_Query(
			array(
				'post_type'           => 'property',
				'posts_per_page'      => $post_count,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				'post__not_in'        => array( get_the_ID() )
			)
		);

		if ( $properties->have_posts() ) : ?>
			<ul class="recent-properties-widget">
				<?php while ( $properties->have_posts() ) : $properties->the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumb' ); ?></a>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</li>
				<?php endwhile; ?>
			</ul>

			<?php
			wp_reset_postdata();
		endif;
		echo $args['after_widget'];
	}

	public function form ( $instance ) {
		$title      = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'divi' );
		$post_count = ! empty( $instance['post_count'] ) ? $instance['post_count'] : 3;
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_name( 'post_count' ); ?>"><?php _e( 'Total Properties to Show:' ); ?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'post_count' ); ?>" name="<?php echo $this->get_field_name( 'post_count' ); ?>" type="number" min="1" value="<?php echo esc_attr( $post_count ); ?>"/>
		</p>
		<?php
	}

	public function update ( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']      = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['post_count'] = ( ! empty( $new_instance['post_count'] ) ) ? $new_instance['post_count'] : 3;

		return $instance;
	}
}

// Register WP_Widget_Recent_Properties widget
add_action( 'widgets_init', 'register_recent_properties' );

function register_recent_properties () {
	register_widget( 'WP_Widget_Recent_Properties' );
}