<?php

namespace Cool\Contact;

class Installer {
	
	/**
	 * invoke the actions
	 */
	public function run () {
		$this->add_version();
		$this->create_tables();
	}
	
	/**
	 * Add options to database track the plugin
	 */
	protected function add_version () {
		update_option( 'cc_version', CC_VERSION );
		add_option( 'cc_installed', time() );
	}
	
	/**
	 * Create necessary tables upon plugin activation
	 */
	protected function create_tables () {
		global $wpdb;
		$table           = $wpdb->prefix . 'cc_contacts';
		$charset_collate = $wpdb->get_charset_collate();
		
		$sql = "CREATE TABLE IF NOT EXISTS `{$table}` (
				`ID` INT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				`name` VARCHAR(100) NOT NULL,
				`address` VARCHAR(255) NULL,
				`phone` VARCHAR(12) NULL,
				`created_by` BIGINT UNSIGNED NOT NULL,
				`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (`ID`)
				) {$charset_collate}";
		
		if ( ! function_exists( 'dbDelta' ) ) {
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		}
		dbDelta( $sql );
	}
	
}