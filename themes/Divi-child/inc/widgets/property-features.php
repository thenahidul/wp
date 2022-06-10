<?php

/**
 * Property_Features widget class
 *
 */

class WP_Widget_Property_Features extends WP_Widget {

	public function __construct () {
		parent::__construct(
			'property_features',
			__( 'Property Features', 'divi' ),
			array( 'description' => __( 'A Property Features Widget' ), 'divi' )
		);
	}

	public function widget ( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		woo_property_features('property-features-widget');

		echo $args['after_widget'];
	}

	public function form ( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'divi' );
		?>
		<p>
			<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<?php
	}

	public function update ( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}

// Register WP_Widget_Property_Features widget
add_action( 'widgets_init', 'register_property_features' );

function register_property_features () {
	register_widget( 'WP_Widget_Property_Features' );
}