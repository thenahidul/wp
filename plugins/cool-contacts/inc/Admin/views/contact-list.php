<div class="wrap">
	<h1 class="wp-heading-inline">
		<?php _e( 'All Contacts', CC_TEXTDOMAIN ); ?>
		<a href="<?php echo admin_url( 'admin.php?page=cool-contact&action=new' ); ?>" class="page-title-action">
			<?php _e( 'Add New', CC_TEXTDOMAIN ) ?>
		</a>
	</h1>
	<form action="" method="get">
		<?php
		
		//cc_debug( cc_contacts_count() );
		//cc_debug( cc_get_contacts( [ 'number' => 10, 'orderby' => 'id' ] ) );
		
		//		$per_page = 4;
		//		$paged    = isset( $_REQUEST['paged'] ) ? $_REQUEST['paged'] : 1;
		//		$offset   = ( $paged - 1 ) * $per_page;
		//
		//		$search_str = isset( $_REQUEST['s'] ) ? $_REQUEST['s'] : '';
		//		$orderby    = isset( $_REQUEST['orderby'] ) ? $_REQUEST['orderby'] : 'id';
		//		$order      = isset( $_REQUEST['order'] ) ? $_REQUEST['order'] : 'ASC';
		//
		//		$contacts = cc_get_contacts( [ 'orderby' => $orderby, 'order' => $order, 'offset' => $offset ], $search_str );
		
		$table = new Cool\Contact\Admin\ContactList();
		//		$table->set_data( $contacts );
		$table->prepare_items();
		$table->search_box( 'Search Contact', 'search_id' );
		$table->display();
		?>
		<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>">
	</form>
</div>