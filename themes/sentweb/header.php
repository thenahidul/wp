<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sentweb
 */
?>
<?php 

	// theme options
	global $sent;
	$logo_standard	= $sent['sent-logo-standard'];
	$logo_retina	= $sent['sent-logo-retina'];
	$header_bg = $sent['sent-header-bg'];

 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="author" content="SENT"/>	
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="SENT Icon" href="<?php echo get_theme_file_uri(); ?>/favicon.png" type="image/png">
	<meta name="google-site-verification" content="ovVkAvCZj25LwD7ZsbWPOOIH1b7JA_6BnlzZBAmhaMo" />
	
<!-- Start of sentandsecure Zendesk Widget script -->
<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=6525cd1f-ddf1-40e2-a3c8-6123b6454d4f"> </script>
<!-- End of sentandsecure Zendesk Widget script -->
	
	<?php wp_head(); ?>
</head>
<body <?php body_class('stretched'); ?>">
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
		<!-- Header
		============================================= -->
		<!-- 		<header id="header" class="transparent-header floating-header dark "> -->
		<header id="header" class="transparent-header dark ">
			<div id="header-wrap">
				<div class="container clearfix">
					<div id="primary-menu-trigger"><i class="icon-reorder"></i>
					</div>
					<div class="col-md-3">
						<!-- Logo
						============================================= -->
						<div id="logo">
							<a href="<?php echo get_site_url(); ?>" class="standard-logo"><img src="<?php echo $logo_standard['url'] ?>" alt="<?php bloginfo('name') ?>">
							</a>
							<a href="<?php echo get_site_url(); ?>" class="retina-logo"><img src="<?php echo $logo_retina['url'] ?>" alt="<?php bloginfo('name') ?>">
							</a>
						</div>
						<!-- #logo end -->
						<a href="https://app.sentandsecure.com/Login" class="login-link-icon"><i class="fas fa-user"></i></a>
					</div>
					
					<div class="col-md-9">
						<!-- Primary Navigation
						============================================= -->
						<nav id="primary-menu">
							<?php 
								wp_nav_menu( array(
									'theme_location'  => 'prmary_menu',
									'menu'            => '',
									'container'       => false,
									'menu_class'      => '',
									'menu_id'         => ''
								) );
							?>
						</nav>
						<!-- #primary-menu end -->
					</div>
				</div>
			</div>
		</header>
		<!-- #header end -->
		
		<?php if( !is_front_page() && !is_page( 1106 ) ) : ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<!-- Page Title -->
				<section id="page-title" class="page-title-parallax page-title-dark page-title-video" style="background-image: url(<?php echo $header_bg['url'];?>);">
					<div class="video-wrap hidden">
						<img src="<?php echo $header_bg['url'];?>" alt="<?php bloginfo('name'); ?>">
					</div>
					<div class="container clearfix ">
						<div class="emphasis-title " style="text-align:center; ">
							<?php 
								$subtitle = get_post_meta( $post->ID, '_page_subtitle_value_key', true );
								if($subtitle) {
									echo '<h1 class="entry-title">'.$subtitle.'</h1>';
								} else {
									if( is_blog() ) {
										echo '<h1 class="entry-title">';
										single_post_title();
										echo '</h1>';
									} elseif (is_single()) {
										echo '<h1 class="entry-title">&nbsp;</h1>';
									} else {
										the_title( '<h1 class="entry-title">', '</h1>' );
									}
									
								}
							 ?>
						</div>
					</div>
				</section>
				<!-- #page-title end -->
			<?php endif; ?>