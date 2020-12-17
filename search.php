<?php get_header(); ?>

<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog" tabindex=-1>
	
	<?php /* If posts found show search word title */ ?>
	<?php if ( have_posts() ) : ?>
	
		<h1 class="entry-title"><?php _e( 'Search results for: ', 'molde-theme' ); ?><span class="archive-title"><?php echo esc_attr(get_search_query()); ?></span></h1>
	
	<?php endif; ?>

	<?php /* Loop through post data */ ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
			
			<header class="entry-header">

				<h2 class="entry-title" itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" itemprop="url"><?php the_title(); ?></a></h2>

				<p class="entry-meta">
					<?php printf( __( 'Posted', 'molde-theme' ).' %1$s',
	         '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
	     		 ); ?>
				</p>

				<p class="entry-meta">

					<?php /* Show post categories */ ?>
	      	<?php printf( __( 'Categories', 'molde-theme' ).': %1$s', get_the_category_list(', ') ); ?>

				</p>

				<p class="entry-meta">

					<?php /* Show post tags */ ?>
	      	<span itemprop="keywords"><?php the_tags( __( 'Tags: ', 'molde-theme' ) ); ?></span>

	    	</p>

			</header>

			<section class="entry-content">

				<?php /* If post has feature image show it */ ?>
				<?php if ( has_post_thumbnail() ) { ?>
					<span itemprop="image" class="post-thumbnail"><?php the_post_thumbnail( 'medium_large' ); ?></span>
				<?php } ?>

				<?php /* Show post excerpt */ ?>
				<span itemprop="articleBody" class="post-excerpt"><?php the_excerpt(); ?></span>

			</section>
		
		</article>

	<?php endwhile; ?>

	<?php /* If no posts found show error messages */ ?>
	<?php else : ?>

		<article id="post-not-found">

			<header>
			
				<h2><?php _e( 'No search results found', 'molde-theme' ); ?></h2>
			
			</header>
			
			<section>
			
				<p><?php _e( 'Try searching with a new search word.', 'molde-theme' ); ?></p>

			</section>

			<section>

				<?php get_search_form(); ?>

			</section>

		</article>

	<?php endif; ?>

</main>

<?php /* Show pagination links */ ?>
<?php
	the_posts_pagination(
						array(
							'prev_text'          => '&#8592; ' . __( 'Newer posts', 'molde-theme' ) . '</span>',
							'next_text'          => __( 'Older posts', 'molde-theme' ) . ' &#8594;</span>',
							'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'molde-theme' ) . ' </span>',
						)
					);

	/* Show side bar */
	get_sidebar();

 	get_footer();
?>
