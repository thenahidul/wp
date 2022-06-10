<?php

/**
 * Plugin Name: Cool Contacts
 * Plugin URI: https://github.com/thenahidul/cool-contact
 * Description: This plugin allows to add contact list in the backend. List can be sorted by different criteria as well.
 * Version: 1.0.0
 * Requires at least: 5.8
 * Tested up to: 5.7
 * Requires PHP version: 7.0
 * Author: TheNahidul
 * Author URI: https://www.linkedin.com/in/thenahidul
 * License: GPLv2 or later
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 * Text Domain: cool-contacts
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) || exit;

/**
 * including autload facility
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class Cool_Contacts
 */
final class Cool_Contacts {

	/**
	 * plugin @version
	 */
	const verson = '1.0.0';

	/**
	 * @var plugin $instance
	 */

	private static $instance;

	/**
	 * Plugin constructor.
	 */
	private function __construct () {
		$this->define_constants();

		register_activation_hook( __FILE__, [ $this, 'activate' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * defining usefull constants
	 *
	 * @return void
	 */
	public function define_constants () {
		define( "CC_VERSION", self::verson );
		define( "CC_PLUGIN", plugin_basename( __FILE__ ) );
		define( "CC_TEXTDOMAIN", 'cool-contact' );
		define( "CC_PLUGIN_FILE", __FILE__ );
		define( "CC_PLUGIN_PATH", __DIR__ );
		define( "CC_PLUGIN_URL", plugins_url( '', CC_PLUGIN_FILE ) );
		define( "CC_PLUGIN_ASSETS", CC_PLUGIN_URL . '/assets' );
	}

	/** Initializing a singleton instance
	 *
	 * @return Cool_Contacts
	 */
	public static function getInstance () {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Do stuff upon plugin activation
	 *
	 * @return void
	 */
	public function activate () {
		$installer = new \Cool\Contact\Installer();
		$installer->run();
	}

	public function init () {
		if ( is_admin() ) {
			new \Cool\Contact\Admin();
		}
		else {
			new \Cool\Contact\Frontend();
		}
	}

}

/**
 * Initilizing the main plugin \Cool_Contacts
 *
 * @return Cool_Contacts;
 */
function cool_contacts () {
	return Cool_Contacts::getInstance();
}

// the plugin kicks-off
cool_contacts();
