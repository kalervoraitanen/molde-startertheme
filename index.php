<?php get_header(); ?>

<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog" tabindex=-1>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php /* Loop through post data */ ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
			
			<header class="entry-header">

				<h2 class="entry-title" itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" itemprop="url"><?php the_title(); ?></a></h2>

				<p class="entry-meta">
					<?php printf( __( 'Posted', 'molde-theme' ).' %1$s',
	         '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_date('d/m/Y H:i') . '</time>',
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