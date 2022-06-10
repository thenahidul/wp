<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/images/GrandMere_Favicon.png">
	
	<meta property='og:locale' content='en_us'/>
	<meta property='og:title' content='Grand Mere'/>
	<meta property='og:description'
	      content="Grand Mère is an independent, family owned enterprise that hails from Alsace, the famed French region along the German border. We've been making pasta using the same family recipes for three generations!"/>
	<meta property='og:url' content='https://grandmereusa.com/en-us'/>
	<meta property='og:site_name' content='Grand Mere'/>
	<meta property="og:image" content='<?php echo get_template_directory_uri(); ?>/assets/images/GrandMere_Logo.svg'/>
	<meta property='og:type' content='website'/>
	<?php wp_head(); ?>
</head>

<body class="grand_mere_body cp-united_states lp-english">
	<div class="page-wrapper">
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-md p-0">
					<div id="large_screen">
						<nav class="navbar navbar-expand-lg navbar-dark main_navbar">
							<div class="container-fluid" id="navbarNav">
								
								<ul class="navbar-nav flex-fill w-100 flex-nowrap justify-content-around">
									<li class="nav-item">
										<a href="/en-us" class="nav-link uppercase">
											Home
										</a>
									</li>
									
									<li class="nav-item">
										<a href="/en-us/our-history" class="nav-link uppercase">
											Our History
										</a>
									</li>
									
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle uppercase" href="/en-us/our-pasta"
										   id="our_pasta_dropdown" aria-haspopup="true" aria-expanded="false">
											Our Pasta
										</a>
										<div class="dropdown-menu list_items" aria-labelledby="our_pasta_dropdown">
											<a class="dropdown-item" href="/en-us/our-pasta/7497266">
												Classic
											</a>
											<a class="dropdown-item" href="/en-us/our-pasta/7497341">
												Whole Grain
											</a>
											<a class="dropdown-item" href="/en-us/our-pasta/7497419">
												Bi-Color
											</a>
										</div>
									</li>
								</ul>
								
								<ul class="navbar-nav flex-fill flex-column justify-content-center">
									<li>
										<a href="/en-us/">
											<img class="main_nav_logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/GrandMere_Logo.svg"
											     alt="Grand Mère">
										</a>
									</li>
								</ul>
								
								<ul class="navbar-nav flex-fill w-100 justify-content-around">
									
									<li class="nav-item">
										<a href="/en-us/in-the-news" class="nav-link uppercase">
											In The News
										</a>
									</li>
									
									<li class="nav-item">
										<a href="/en-us/where-to-buy" class="nav-link uppercase">
											Where To buy
										</a>
									</li>
									
									<li class="nav-item">
										<a href="/en-us/contact-us" class="nav-link uppercase">
											Contact us
										</a>
									</li>
								</ul>
							
							</div>
						</nav>
					
					</div>
					<div id="small_screen">
						<nav class="navbar navbar-expand-xl navbar-light w-100 bg-transparent mobile_navbar_header">
							<button id="mobile_menu_button" class="navbar-toggler mobile_menu_icon ml-auto"
							        type="button">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="mobile_navbar" id="navbarCollapse">
								<ul class="navbar-nav">
									<li class="nav-item">
										<a href="/en-us" class="nav-link uppercase">
											Home
										</a>
									</li>
									
									<li class="nav-item">
										<a href="/en-us/our-history" class="nav-link uppercase">
											Our History
										
										</a>
									</li>
									
									<li class="nav-item">
										<a class="nav-link uppercase" href="/en-us/our-pasta">
											Our Pasta
										</a>
									</li>
									<div class="dropdown_menu" aria-labelledby="navbarDropdown">
										<li class="nav-item">
											<a class="nav-link sub-link" href="/en-us/our-pasta/7497266">
												Classic
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link sub-link" href="/en-us/our-pasta/7497341">
												Whole Grain
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link sub-link" href="/en-us/our-pasta/7497419">
												Bi-Color
											</a>
										</li>
									</div>
									</li>
									
									<li class="nav-item">
										<a href="/en-us/in-the-news" class="nav-link uppercase">
											In The News
										
										</a>
									</li>
									
									<li class="nav-item">
										<a href="/en-us/where-to-buy" class="nav-link uppercase">
											Where To buy
										
										</a>
									</li>
									
									<li class="nav-item">
										<a href="/en-us/contact-us" class="nav-link uppercase">
											Contact us
										
										</a>
									</li>
								</ul>
							</div>
						</nav>
						<div class="container-fluid d-flex justify-content-center blue_bar">
							<a href="/en-us/">
								<img class="logo img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/GrandMere_Logo.svg"
								     alt="Grand Mère">
							</a>
						</div>
					
					</div>
				
				</div>
			</div>
		</div>