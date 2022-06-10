<?php

namespace Cool\Contact\Admin;

use Cool\Contact\Interfaces\PluginPage;

class Menu {
	
	/**
	 * @var mixed|string Check which page
	 */
	public $menu;
	
	/**
	 * Menu constructor.
	 */
	public function __construct () {
		$this->menu = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : '';
		
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
	}
	
	/**
	 * Admin menu page creator
	 *
	 * @return void
	 */
	public function admin_menu () {
		$parent_slug = 'cool-contact';
		$capability  = 'manage_options';
		
		add_menu_page(
			__( 'Cool Contact', CC_TEXTDOMAIN ),
			__( 'Cool Contact', CC_TEXTDOMAIN ),
			$capability,
			$parent_slug,
			[ $this, 'plugin_page' ],
			'dashicons-smiley',
			45
		);
		
		add_submenu_page(
			$parent_slug,
			__( 'All Contacts', CC_TEXTDOMAIN ),
			__( 'Contacts', CC_TEXTDOMAIN ),
			$capability,
			$parent_slug,
			[ $this, 'plugin_page' ]
		);
		
		add_submenu_page(
			$parent_slug,
			__( 'Add New Contact', CC_TEXTDOMAIN ),
			__( 'Add New', CC_TEXTDOMAIN ),
			$capability,
			$parent_slug . '&action=new',
			[ $this, 'plugin_page' ]
		);
		
		add_submenu_page(
			$parent_slug,
			__( 'Contact Settings', CC_TEXTDOMAIN ),
			__( 'Settings', CC_TEXTDOMAIN ),
			$capability,
			$parent_slug . '-settings',
			[ $this, 'plugin_page' ]
		);
		
		add_submenu_page(
			$parent_slug,
			__( 'Miscellaneous Settings', CC_TEXTDOMAIN ),
			__( 'Misc', CC_TEXTDOMAIN ),
			$capability,
			$parent_slug . '-miscellaneous',
			[ $this, 'plugin_page' ]
		);
	}
	
	/**
	 * Render plugin page
	 * check which page is loading
	 * pass associated class
	 *
	 * @return void
	 */
	public function plugin_page () {
		switch ( $this->menu ) {
			case 'cool-contact-settings':
				$this->detect_menu( new Settings() );
				break;
			
			case 'cool-contact-miscellaneous':
				$this->detect_menu( new Miscellaneous() );
				break;
			
			default:
				$this->detect_menu( Contacts::getInstance() );
		}
	}
	
	/**
	 * Check which menu is loading
	 * load associated page content
	 *
	 * @param PluginPage $contact
	 *
	 * @return void
	 */
	private function detect_menu ( PluginPage $contact ) {
		$contact->render();
	}
}