<?php
/*
The header for Molde theme
*/
?>

<!doctype html>

<html <?php language_attributes(); ?> class="no-js">

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<?php // Force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // Or, set /favicon.ico for IE10 win ?>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" >
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>

		<?php // Drop Google Analytics Here ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<a class="skip-link screen-reader-text" href="#main" tabindex="-1"><?php _e( 'Skip to main content', 'molde-theme' ); ?></a>

		<header class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

			<?php /* If we're on the front page show site title as h1 */ ?>
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-logo site-title" itemprop="headline"><a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url"><?php bloginfo('name'); ?></a></h1>
			<?php /* Else show the site title as paragraph */ ?>
			<?php else : ?>
				<p class="site-logo site-title" itemprop="headline"><a href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url"><?php bloginfo('name'); ?></a></p>
			<?php endif; ?>

			<p class="site-description" itemprop="alternativeHeadline"><?php bloginfo('description'); ?></p>

			<?php /* Show main navigation */ ?>
			<nav class="main-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php wp_nav_menu(array(
					         'container' => false,                           // Remove nav container
					         'container_class' => '',              				   // Class of container (should you choose to use it)
					         'menu' => __( 'The Main Menu', 'molde-theme' ), // Nav name
					         'menu_class' => '',            							   // Adding custom nav class
					         'theme_location' => 'main-nav',                 // Where it's located in the theme
					         'before' => '',                                 // Before the menu
    			               'after' => '',                            // After the menu
    			               'link_before' => '',                      // Before each link
    			               'link_after' => '',                       // After each link
    			               'depth' => 0,                             // Limit the depth of the nav
					         'fallback_cb' => ''                             // Fallback function (if there is one)
				)); ?>

				<?php /* Search button to show search from. You can implement this with Javascript. */ ?>
				<button class="search-toggle" aria-expanded="false" aria-haspopup="true">

					<span class="screen-reader-text"><?php _e('Toggle search', 'molde-theme'); ?></span><span class="search-icon">&#9906;</span>

				</button>

				<?php /* Show search form */ ?>
				<?php get_search_form(); ?>					

			</nav>

		</header>