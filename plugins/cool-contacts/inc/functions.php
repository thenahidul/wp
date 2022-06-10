<?php

/**
 * Database function - insert a new contacts
 *
 * @param array $args
 *
 * @return int|WP_Error
 */
function cc_insert_contact ( $args = [] ) {
	
	if ( ! isset( $args['name'] ) ) {
		return new \WP_Error( 'no-name', __( 'Please, provie a Name', CC_TEXTDOMAIN ) );
	}
	if ( ! isset( $args['address'] ) ) {
		return new \WP_Error( 'no-address', __( 'Please, provie a Address', CC_TEXTDOMAIN ) );
	}
	if ( ! isset( $args['phone'] ) ) {
		return new \WP_Error( 'no-phone', __( 'Please, provie a Phone', CC_TEXTDOMAIN ) );
	}
	
	global $wpdb;
	$table = $wpdb->prefix . 'cc_contacts';
	
	$defaults = [
		'name'       => '',
		'address'    => '',
		'phone'      => '',
		'created_by' => get_current_user_id(),
		'created_at' => current_time( 'mysql' )
	];
	
	$data   = wp_parse_args( $args, $defaults );
	$format = [ '%s', '%s', '%s', '%d', '%s' ];
	
	$result = $wpdb->insert( $table, $data, $format );
	if ( ! $result ) {
		return new \WP_Error( 'insert-failed', __( 'Failed to Add the contact', CC_TEXTDOMAIN ) );
	}
	
	return $wpdb->insert_id;
}

/**
 * Database function - select all contacts
 *
 * @param array  $args
 *
 * @param string $search
 *
 * @return array|object|null
 */
function cc_get_contacts ( $args = [], $search = '' ) {
	global $wpdb;
	$table = $wpdb->prefix . 'cc_contacts';
	
	$defaults = [
		'number'  => 10,
		'offset'  => 0,
		'orderby' => 'id',
		'order'   => 'ASC'
	];
	
	$args = wp_parse_args( $args, $defaults );
	//	cc_debug( $args );
	
	$stmt = $wpdb->prepare(
		"SELECT * FROM {$table} WHERE name LIKE %s ORDER BY %1s %2s LIMIT %d, %d",
		'%' . $wpdb->esc_like( $search ) . '%',
		$args['orderby'],
		$args['order'],
		$args['offset'],
		$args['number']
	);
	
	//	cc_debug( $args );
	//	%1s / %2s removes single quote
	//cc_debug( $stmt );
	
	return $wpdb->get_results( $stmt, ARRAY_A );
}

/**
 * Database function - total contacts count
 *
 * @param string $search
 *
 * @return int
 */
function cc_contacts_count ( $search = '' ) {
	global $wpdb;
	$table = $wpdb->prefix . 'cc_contacts';
	$sql   = "SELECT COUNT(*) FROM {$table} WHERE name LIKE '%{$search}%'";
	//cc_debug( $sql );
	return (int) $wpdb->get_var( $sql );
}

function cc_get_contact ( $id ) {
	global $wpdb;
	$table = $wpdb->prefix . 'cc_contacts';
	$stmt  = $wpdb->prepare( "SELECT * FROM {$table} WHERE ID = %d", $id );
	return $wpdb->get_row( $stmt, ARRAY_A );
}

/**
 * Helper function - Pretify print_r
 *
 * @param      $data
 * @param bool $die
 */
function cc_debug ( $data, $die = false ) {
	echo '<pre>';
	print_r( $data );
	echo '</pre>';
	
	$die ?? die;
}
