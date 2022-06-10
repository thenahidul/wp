<div class="et_pb_contact advance-search-form-container">
	<form class="et_pb_contact_form clearfix" method="post" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<p class="et_pb_contact_field et_pb_contact_field_half">
			<label for="keyword" class="et_pb_contact_form_label">Keyword (s)</label>
			<input type="text" class="input custom-form-control" name="keyword" id="keyword" value="" placeholder="Keyword (s)">
		</p>
		<p class="et_pb_contact_field  et_pb_contact_field_half" data-type="select">
			<label for="lease_or_sale" class="et_pb_contact_form_label">Lease or Sale</label>
			<select id="lease_or_sale" class="et_pb_contact_select input custom-form-control" name="lease_or_sale">
				<option value="">Lease or Sale</option>
				<option value="Any">Any</option>
				<option value="Lease">Lease</option>
				<option value="Sale">Sale</option>
			</select>
		</p>
		<p class="et_pb_contact_field et_pb_contact_field_half" data-type="select">
			<label for="annual_rent" class="et_pb_contact_form_label">Annual Rent</label>
			<select id="annual_rent" class="et_pb_contact_select input custom-form-control" name="annual_rent">
				<option value="">Annual Rent</option>
				<option value="any">Any</option>
				<option value="$1-$5/sf">$1-$5/sf</option>
				<option value="$5-$10/sf">$5-$10/sf</option>
				<option value="$10-$15/sf">$10-$15/sf</option>
				<option value="$15-$20/sf">$15-$20/sf</option>
				<option value="$20-$25/sf">$20-$25/sf</option>
				<option value="$30+/sf">$30+/sf</option>
			</select>
		</p>
		<p class="et_pb_contact_field  et_pb_contact_field_half">
			<label for="city" class="et_pb_contact_form_label">City</label>
			<input type="text" id="city" class="input custom-form-control" value="" name="city" placeholder="City">
		</p>
		<p class="et_pb_contact_field et_pb_contact_field_half" data-type="select">
			<label for="state" class="et_pb_contact_form_label">State</label>
			<select id="state" class="et_pb_contact_select input custom-form-control" name="state">
				<option value="">State</option>
				<option value="any">Any</option>
				<option value="MA">MA</option>
				<option value="NH">NH</option>
				<option value="other">Other</option>
			</select>
		</p>
		<input type="hidden" value="" name="">
		<p class="et_contact_bottom_container et_pb_contact_field_half">
			<button type="submit" name="et_builder_submit_button" class="et_pb_contact_submit custom-form-btn">
				SEARCH
			</button>
		</p>
	</form>
</div>