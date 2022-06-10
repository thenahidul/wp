<?php

namespace Cool\Contact\Traits;

/**
 * Trait FormError
 *
 * @package Cool\Contact\Traits
 */
trait FormError {
	/**
	 * holds the errors
	 *
	 * @var array
	 */
	public $errors = [];
	
	/**
	 * check if an error exists
	 *
	 * @param $key
	 *
	 * @return bool
	 */
	public function has_error ( $key ) {
		return isset( $this->errors[$key] );
	}
	
	/**
	 * return the error if it exists
	 *
	 * @param $key
	 *
	 * @return bool|mixed
	 */
	public function get_error ( $key ) {
		return isset( $this->errors[$key] ) ? $this->errors[$key] : false;
	}
}