<?php

namespace Cool\Contact\Admin;

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * Class ContactList
 *
 * @package Cool\Contact\Admin
 */
class ContactList extends \WP_List_Table {

	protected $search_str;
	protected $total_items;
	protected $per_page;

	/**
	 * ContactList constructor.
	 *
	 * @param array $args
	 */
	public function __construct ( $args = array() ) {
		parent::__construct( $args );
	}

	/**
	 * Set the items that'll appear in the list table
	 *
	 * @param $data
	 */
	public function set_data ( $data ) {
		$this->items = $data;
	}

	/**
	 * Prepare the items that'll appear in the list table
	 */
	public function prepare_items () {
		$this->_column_headers = [ $this->get_columns(), [], $this->get_sortable_columns() ];

		$this->ready_items();

		$this->set_pagination_args( [
			'total_items' => $this->total_items,
			'per_page'    => $this->per_page,
			//'total_pages' => ceil( $this->total_items / $this->per_page )
		] );
	}

	/**
	 * Set the columns that'll show in the list table
	 *
	 * @return array
	 */
	public function get_columns () {
		return [
			'cb'         => '<input type="checkbox">',
			'name'       => __( 'Name', CC_TEXTDOMAIN ),
			'address'    => __( 'Address', CC_TEXTDOMAIN ),
			'phone'      => __( 'Phone', CC_TEXTDOMAIN ),
			'created_at' => __( 'Date', CC_TEXTDOMAIN ),
			'created_by' => __( 'Author', CC_TEXTDOMAIN )
		];
	}

	/**
	 * Set the columns that'll be used for
	 * sorting data in the list table
	 *
	 * @return array|array[]
	 */
	protected function get_sortable_columns () {
		return [
			'name'       => [ 'name', true ],
			'address'    => [ 'address', true ],
			'phone'      => [ 'phone', true ],
			'created_at' => [ 'created_at', true ],
			'created_by' => [ 'created_by', true ]
		];
	}

	/**
	 * Ready the columns for the list table
	 */
	protected function ready_items () {
		$this->search_str  = isset( $_REQUEST['s'] ) ? $_REQUEST['s'] : '';
		$current_page      = $this->get_pagenum();
		$this->total_items = cc_contacts_count( $this->search_str );
		$this->per_page    = 4;
		$offset            = ( $current_page - 1 ) * $this->per_page;

		$orderby = isset( $_REQUEST['orderby'] ) ? $_REQUEST['orderby'] : 'id';
		$order   = isset( $_REQUEST['order'] ) ? $_REQUEST['order'] : 'ASC';

		$args = [
			'number'  => $this->per_page,
			'offset'  => $offset,
			'orderby' => $orderby,
			'order'   => $order
		];

		$this->items = cc_get_contacts( $args, $this->search_str );
	}

	/**
	 * Single columns - created_by
	 *
	 * @param $item
	 *
	 * @return string
	 */
	protected function column_created_by ( $item ) {
		$user = get_user_by( 'id', $item['created_by'] );
		return ucwords( $user->user_nicename );
	}

	/**
	 * Single columns - name
	 *
	 * @param $item
	 */
	protected function column_name ( $item ) {
		?>
		<strong>
			<a class="row-title" href="">
				<?php echo $item['name']; ?>
			</a>
		</strong>
		<div class="row-actions">
			<span class="edit">
				<a href="admin.php?page=cool-contact&action=edit&id=<?php echo esc_attr( $item['ID'] ) ?>" aria-label="Edit">Edit</a>
				|
			</span>
			<span class="trash">
				<a href="admin.php?page=cool-contact&action=delete&id=<?php echo esc_attr( $item['ID'] ) ?>" class="submitdelete">Trash</a>
				|
			</span>
			<span class="view">
				<a href="admin.php?page=cool-contact&action=view&id=<?php echo esc_attr( $item['ID'] ) ?>">View</a>
			</span>
		</div>
		<?php
	}

	/**
	 * Single columns - checkbox
	 *
	 * @param object $item
	 *
	 * @return string|void
	 */
	protected function column_cb ( $item ) {
		return "<input type='checkbox' value='{$item['ID']}'>";
	}

	/**
	 * All default columns
	 *
	 * @param object $item
	 * @param string $column_name
	 *
	 * @return mixed
	 */
	protected function column_default ( $item, $column_name ) {
		return $item[$column_name];
	}

}




//i@am@none!78
//
//
//scp root@107.155.116.10:/downloads/latest.zip /Applications/Ampps/www/curl
//
//scp -P 2222 root@107.155.116.10:/downloads/latest.zip /Applications/Ampps/www/curl


