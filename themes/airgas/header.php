<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
			<!--[if IE]>
				<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	    	<meta name="theme-color" content="#121212">
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<?php wp_head(); ?>

		<!-- Drop Google Analytics here -->
		<!-- end analytics -->

	</head>
	
	<!-- Uncomment this line if using the Off-Canvas Menu --> 
		
	<body <?php body_class(); ?>>
		<div class="navigation-bars" id="top">
			<div class="navigation-bar">
				<div class="logo" id="logo">
					<a href="#top"><img src="/wp-content/themes/airgas/assets/images/airgas-logo.png" alt="Airgas"></a>
				</div>
				<div class="row">
					<div class="nav-main">
						<?php joints_top_nav(); ?>
					</div>
				</div>
			</div>
			<div class="sticky-navigation-bar">
				<div class="row">
					<div class="logo" id="logo">
						<a href="#top"><img src="/wp-content/themes/airgas/assets/images/airgas-logo.png" alt="Airgas"></a>
					</div>
					<div class="sticky-nav-main">
						<?php joints_top_nav(); ?>
					</div>
				</div>
			</div>
			<div class="mobile-navigation-bar">
				<div class="logo" id="logo">
					<a href="#top"><img src="/wp-content/themes/airgas/assets/images/airgas-logo.png" alt="Airgas"></a>
				</div>
				<div class="mobile-nav-hamburger">
					<span class="fa fa-bars" id="toggleMobileNav"></span>
				</div>
			</div>
		</div>
		<div class="mobile-nav-main">
			<?php joints_top_nav(); ?>
		</div>