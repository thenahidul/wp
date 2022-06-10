<?php

namespace Cool\Contact\Admin;

use Cool\Contact\Traits\FormError;
use Cool\Contact\Interfaces\PluginPage;
use Cool\Contact\Traits\SingleInstance;

/**
 * Class Contacts
 *
 * @package Cool\Contact\Admin
 */
class Contacts implements PluginPage {
	
	use SingleInstance;
	use FormError;
	
	public $errors = [];
	
	/**
	 * plugin page
	 * render a page depending on the request type
	 */
	
	public function render () {
		$action = isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : 'list';
		$id     = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;
		switch ( $action ) {
			case 'new':
				$template = __DIR__ . '/views/contact-new.php';
				break;
			
			case 'edit':
				$contact  = cc_get_contact( $id );
				$template = __DIR__ . '/views/contact-edit.php';
				break;
			
			case 'view':
				$template = __DIR__ . '/views/contact-view.php';
				break;
			
			default:
				$template = __DIR__ . '/views/contact-list.php';
		}
		if ( file_exists( $template ) ) {
			include $template;
		}
	}
	
	/**
	 * handle the form submission
	 */
	public function form_handle () {
		if ( ! isset( $_REQUEST['submit_contact'] ) ) {
			return;
		}
		if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'new-contact' ) ) {
			wp_die( 'Are you cheating, man?' );
		}
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Are you cheating, man?' );
		}
		
		$name    = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
		$address = isset( $_POST['address'] ) ? sanitize_textarea_field( $_POST['address'] ) : '';
		$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
		
		if ( empty( $name ) ) {
			$this->errors['name'] = __( 'Please, provide a name', CC_TEXTDOMAIN );
		}
		if ( empty( $address ) ) {
			$this->errors['address'] = __( 'Please, provide a address', CC_TEXTDOMAIN );
		}
		if ( empty( $phone ) ) {
			$this->errors['phone'] = __( 'Please, provide a phone', CC_TEXTDOMAIN );
		}
		
		if ( ! empty( $this->errors ) ) {
			return;
		}
		
		//  one way
		//	unset( $_POST['_wpnonce'] );
		//	unset( $_POST['_wp_http_referer'] );
		//	unset( $_POST['submit_contact'] );
		//	cc_insert_contact( $_POST );
		
		// another way
		$result = cc_insert_contact( [
			'name'    => $name,
			'address' => $address,
			'phone'   => $phone,
		] );
		
		if ( is_wp_error( $result ) ) {
			wp_die( $result->get_error_message() );
		}
		
		$location = admin_url( 'admin.php?page=cool-contact&added=true' );
		wp_redirect( $location );
	}
	
}