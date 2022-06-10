<div class="wrap">
	<h1 class="wp-heading-inline">
		<?php _e( 'New Contact', CC_TEXTDOMAIN ); ?>
	</h1>
	
	<?php if ( $this->errors ) {
		//cc_debug( $this->errors );
	} ?>
	
	<form action="" method="POST">
		<table class="form-table">
			<tr class="<?php echo $this->has_error( 'name' ) ? 'form-invalid' : '' ?>">
				<th scope="row">
					<label for="name"><?php _e( 'Name', CC_TEXTDOMAIN ); ?></label>
				</th>
				<td>
					<input name="name" type="text" id="name" value="<?php echo esc_attr( $_POST['name'] ?? '' ); ?>" class="regular-text">
					<?php
					if ( $this->has_error( 'name' ) ) { ?>
						<p class="description error"><?php echo $this->get_error( 'name' ); ?></p>
					<?php }
					?>
				</td>
			</tr>
			<tr class="<?php echo $this->has_error( 'address' ) ? 'form-invalid' : '' ?>">
				<th scope="row">
					<label for="address"><?php _e( 'Address', CC_TEXTDOMAIN ); ?></label>
				</th>
				<td>
					<textarea name="address" id="address" class="regular-text"><?php echo esc_attr( $_POST['address'] ?? '' ); ?></textarea>
					<?php
					if ( $this->has_error( 'address' ) ) { ?>
						<p class="description error"><?php echo $this->get_error( 'address' ); ?></p>
					<?php }
					?>
				</td>
			</tr>
			<tr class="<?php echo $this->has_error( 'phone' ) ? 'form-invalid' : '' ?>">
				<th scope="row">
					<label for="phone"><?php _e( 'Phone', CC_TEXTDOMAIN ); ?></label>
				</th>
				<td>
					<input name="phone" type="text" id="phone" value="<?php echo esc_attr( $_POST['phone'] ?? '' ); ?>" class="regular-text">
					<?php
					if ( $this->has_error( 'phone' ) ) { ?>
						<p class="description error"><?php echo $this->get_error( 'phone' ); ?></p>
					<?php }
					?>
				</td>
			</tr>
		</table>
		<?php
		wp_nonce_field( 'new-contact' );
		submit_button( __( 'Add Contact', CC_TEXTDOMAIN ), 'primary', 'submit_contact' );
		?>
	</form>
</div>