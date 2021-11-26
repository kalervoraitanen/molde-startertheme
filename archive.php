<?php
/*
The archive page for Molde theme
*/
?>

<?php get_header(); ?>

<main id="main" class="site-main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog" tabindex=-1>

	<?php /* If archive is category show category title */ ?>
	<?php if (is_category()) { ?>

		<h1 class="entry-title">

			<?php _e( 'Posts Categorized:', 'molde-theme' ); ?> <span class="archive-title"><?php single_cat_title(); ?></span>

		</h1>

	<?php /* If archive is tag show tag title */ ?>	
	<?php } elseif (is_tag()) { ?>

		<h1 class="entry-title">

			<?php _e( 'Posts Tagged:', 'molde-theme' ); ?> <span class="archive-title"><?php single_tag_title(); ?></span>

		</h1>

	<?php /* If archive is author posts show author name */ ?>
	<?php } elseif (is_author()) {
		global $post;
		$author_id = $post->post_author;
	?>
		<h1 class="entry-title">

			<?php _e( 'Posts By:', 'molde-theme' ); ?> <span class="archive-title"><?php the_author_meta('display_name', $author_id); ?></span>

		</h1>

	<?php /* If archive is by date show date */ ?>
	<?php } elseif (is_day()) { ?>

		<h1 class="entry-title">

			<?php _e( 'Daily Archives:', 'molde-theme' ); ?> <span class="archive-title"><?php the_time('l, F j, Y'); ?></span>

		</h1>

	<?php /* If archive is by month show month */ ?>
	<?php } elseif (is_month()) { ?>

		<h1 class="entry-title">

			<?php _e( 'Monthly Archives:', 'molde-theme' ); ?> <span class="archive-title"><?php the_time('F Y'); ?></span>

		</h1>

	<?php /* If archive is by year show year */ ?>
	<?php } elseif (is_year()) { ?>

		<h1 class="entry-title">

			<?php _e( 'Yearly Archives:', 'molde-theme' ); ?> <span class="archive-title"><?php the_time('Y'); ?>

		</h1>
	<?php } ?>

	<?php /* Loop through post data */ ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
			
			<header class="entry-header">

				<h2 class="entry-title" itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" itemprop="url"><?php the_title(); ?></a></h2>

				<p class="entry-meta">
					<?php printf( __( 'Posted', 'molde-theme' ).' %1$s',
	         '<time class="updated entry-time" datetime="' . get_the_time('c') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'
	     		 ); ?>
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

			<footer class="entry-footer">

				<?php molde_categories_tags(); ?>

			</footer>
		
		</article>

	<?php /* If no posts found show error messages */ ?>	
	<?php endwhile; else : ?>

		<article class="post-not-found">

			<?php molde_posts_not_found(); ?>

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