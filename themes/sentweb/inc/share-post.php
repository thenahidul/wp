<?php 

/**
 * Post sharing option
 */
function sent_share_this( $content ){
	global $post;
	if( is_single() ){
		
		$title = str_replace( ' ', '%20', get_the_title());
		$permalink = urlencode(get_permalink());
		
		$pinterestThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		
		// $twitter = 'https://twitter.com/intent/tweet?text=Hey! Read this: ' . $title . '&amp;url=' . $permalink . '&amp;via=nahidotg';
		$twitter = 'https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $permalink;
		$facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink;
		$google = 'https://plus.google.com/share?url=' . $permalink;
		$linkedIn = 'https://www.linkedin.com/shareArticle?mini=true&url='.$permalink.'&amp;title='.$title;
		$pinterest = 'https://pinterest.com/pin/create/button/?url='.$permalink.'&amp;media='.$pinterestThumbnail[0].'&amp;description='.$title;
		$emailthis = 'mailto:?Subject='.$title.'&amp;Body=Check out this article: '.$permalink.'';

		$content .= '<div class="si-share noborder clearfix">';
		$content .= '<span>Share this Post:</span>';
		$content .= '<div>';

		$content .= '<a href="'.$facebook.'" target="_blank" class="social-icon si-borderless si-facebook">
			<i class="icon-facebook"></i>
			<i class="icon-facebook"></i>
		</a>';
		$content .= '<a href="'.$twitter.'" target="_blank" class="social-icon si-borderless si-twitter">
			<i class="icon-twitter"></i>
			<i class="icon-twitter"></i>
		</a>';
		$content .= '<a href="'.$pinterest.'" target="_blank" class="social-icon si-borderless si-pinterest">
			<i class="icon-pinterest"></i>
			<i class="icon-pinterest"></i>
		</a>';
		$content .= '<a href="'.$google.'" target="_blank" class="social-icon si-borderless si-gplus">
			<i class="icon-gplus"></i>
			<i class="icon-gplus"></i>
		</a>';
		$content .= '<a href="'.$linkedIn.'" target="_blank" class="social-icon si-borderless si-linkedin">
			<i class="icon-linkedin"></i>
			<i class="icon-linkedin"></i>
		</a>';
		$content .= '<a href="'.$emailthis.'"  data-ssbp-title="'.$title.'" data-ssbp-url="'.$permalink.'" data-ssbp-site="Email" target="new" class="social-icon si-borderless si-email3">
			<i class="icon-email3"></i>
			<i class="icon-email3"></i>
		</a>';

		$content .= '</div></div><!-- si-share -->';
		
		return $content;
	
	} else {
		return $content;
	}
	
}
add_filter( 'the_content', 'sent_share_this' );

