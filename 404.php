<?php get_header(); ?>

	<main id="main" role="main">
		
		<article id="post-not-found">

			<header class="article-header">

				<h1 itemprop="headline"><?php _e( '404 - Post not found', 'molde-theme' ); ?></h1>

			</header>

			<section class="cf entry-content" itemprop="articleBody">

				<p><?php _e( 'The post you were trying to look for was not found. Please check the address or use the search.', 'molde-theme' ); ?></p>

				<?php get_search_form(); // Show search form ?>
				
			</section>

		</article>

	</main>

<?php get_sidebar(); // Show sidebar ?>

<?php get_footer(); ?>
