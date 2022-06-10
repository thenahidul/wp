<?php


namespace Cool\Contact\Frontend\Shortcode;


class Button {
	public function __construct() {
		add_shortcode( 'button', [ $this, 'render' ] );
	}
	
	public function render() {
		return "<a href='#'>CLICK ME!</a>";
	}
}