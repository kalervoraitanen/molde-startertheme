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

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

		<?php // Drop Google Analytics Here ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php wp_body_open(); ?>

		<header class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
			
			<?php /* Use the "Skip to main content" link as first element on the page */ ?>
			<a class="skip-link screen-reader-text" href="#main" tabindex="-1"><?php _e( 'Skip to main content', 'molde-theme' ); ?></a>

			<?php /* If we're on the front page show site title as h1 */ ?>
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-logo site-title" itemprop="headline"><a href="<?php echo esc_url( home_url() ); ?>" rel="nofollow" itemprop="url"><?php bloginfo('name'); ?></a></h1>
			<?php /* Else show the site title as paragraph */ ?>
			<?php else : ?>
				<p class="site-logo site-title" itemprop="headline"><a href="<?php echo esc_url( home_url() ); ?>" rel="nofollow" itemprop="url"><?php bloginfo('name'); ?></a></p>
			<?php endif; ?>

			<p class="site-description" itemprop="alternativeHeadline"><?php bloginfo('description'); ?></p>

			<button class="nav-button" aria-controls="primary-menu-list" aria-expanded="false" aria-haspopup="true">Menu</button>

			<?php /* Show main navigation */ ?>
			<nav class="main-nav" role="navigation" aria-label="<?php _e( 'Primary menu', 'molde-theme' ); ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php
				$header_menu_defaults = array(
					'theme_location'  => 'main-nav',
					'menu'            =>  __( 'The Main Menu', 'molde-theme' ),
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'         => new Add_button_of_Sublevel_Walker
				);
				wp_nav_menu( $header_menu_defaults );
				?>

				<?php /* Search button to show search from. You can implement this with Javascript. */ ?>
				<button class="search-toggle" aria-expanded="false" aria-haspopup="true">

					<span class="screen-reader-text"><?php _e('Toggle search', 'molde-theme'); ?></span><span class="search-icon">&#9906;</span>

				</button>

				<?php /* Show search form */ ?>
				<?php get_search_form(); ?>					

			</nav>

		</header>