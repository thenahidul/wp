<?php /*
	
@package sentweb
*/
if( post_password_required() ){
	return;
}
require 'inc/comments-walker.php';
?>

<div id="comments" class="clearfix">
	
	<?php 
		if( have_comments() ):
		//We have comments
	?>
	
		<h3 class="comments-title">
			<?php
				
				// printf(
				// 	esc_html( _nx( '1 comment', '%1$s comments', get_comments_number(), 'sentweb' ) ),
				// 	number_format_i18n( get_comments_number() )
				// );

			comments_popup_link( '', '<span>1</span> Comment', '<span>%</span> Comments', 'comments-class', '' );
			?>
		</h3>
		
		
		
		<ol class="commentlist clearfix">
			
			<?php 
				
				$args = array(
					'walker'			=> new WP_Bootstrap_Comments_Walker(),
					'max_depth' 		=> 2,
					'style'				=> 'ul',
					'callback'			=> null,
					'end-callback'		=> null,
					'type'				=> 'all',
					'reply_text'		=> '<i class="icon-reply"></i>',
					'page'				=> '',
					'per_page'			=> '',
					'avatar_size'		=> 64,
					'reverse_top_level' => null,
					'reverse_children'	=> '',
					'format'			=> 'html5',
					'short_ping'		=> false,
					'echo'				=> true
				);
				
				wp_list_comments( $args );
			?>
			
		</ol>
		
		
		
		<?php 
			if( !comments_open() && get_comments_number() ):
		?>
			 
			 <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sentweb' ); ?></p>
			 
		<?php
			endif;
		?>
		
	<?php	
		endif;
	?>

	<?php 
		
		$fields = array(
			
			'author' =>
				'<div class="col_one_third">
					<label for="author">' . __( 'Name', 'domainreference' ) . '</label> 
					<span class="required">*</span> 
					<input id="author" name="author" type="text" class="sm-form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" />
				</div>',
				
			'email' =>
				'<div class="col_one_third">
					<label for="email">' . __( 'Email', 'domainreference' ) . '</label> 
					<span class="required">*</span>
					<input id="email" name="email" class="sm-form-control" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" />
				</div>',
				
			'url' =>
				'<div class="col_one_third col_last">
					<label for="url">' . __( 'Website', 'domainreference' ) . '</label>
					<input id="url" name="url" class="sm-form-control" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />
				</div><div class="clear"></div>'
				
		);
		
		$args = array(
			'title_reply'  => __('Leave a <span>Comment</span>'),
			'class_submit' => 'button button-3d nomargin',
			'label_submit' => __( 'Submit Comment' ),
			'comment_field' =>
				'<div class="col_full">
				<label for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
				<span class="required">*</span>
				<textarea id="comment" class="sm-form-control" name="comment" cols="58" rows="7" required="required"></textarea></div>',
			'fields' => apply_filters( 'comment_form_default_fields', $fields )
			
		);
		
		comment_form( $args ); 
		
	?>
	
</div><!-- .comments-area -->