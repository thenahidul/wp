<?php

namespace Cool\Contact;

use Cool\Contact\Admin\Menu;
use Cool\Contact\Admin\Contacts;

class Admin {
	
	/**
	 * Admin constructor.
	 */
	public function __construct () {
		new Menu();
		
		$this->dispatch_actions( Contacts::getInstance() );
	}
	
	/**
	 * fire the admin actions
	 *
	 * @param $contacts
	 */
	private function dispatch_actions ( $contacts ) {
		add_action( 'admin_init', [ $contacts, 'form_handle' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'assets' ] );
	}
	
	/**
	 * Enqueue admin scripts only for plugin page
	 *
	 * @param $page
	 */
	public function assets ( $page ) {
		if ( $page == 'toplevel_page_cool-contact' ) {
			wp_enqueue_style( 'cc_admin', CC_PLUGIN_ASSETS . '/admin/css/admin.css', null, CC_VERSION );
		}
	}
}