<?php

namespace Cool\Contact\Traits;

// Traits
trait SingleInstance {
	
	private static $instance;
	
	/**
	 * Contacts constructor.
	 */
	private function __construct () {
	}
	
	public static function getInstance () {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
}