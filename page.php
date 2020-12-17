<?php get_header(); ?>

<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog" tabindex=-1>

	<?php /* Loop through post data */ ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

	  <header class="entry-header">

	    <h1 class="entry-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

	  </header>

    <section class="entry-content cf" itemprop="articleBody">

      <?php
      	/* Show post content */
        the_content();
			?>

    </section>

  </article>

	<?php /* If no posts found show error messages */ ?>
	<?php endwhile; ?>

	<?php else : ?>

		<article class="post-not-found">

			<header class="article-header">
			
				<h1><?php _e( 'Post not found!', 'molde-theme' ); ?></h1>
			
			</header>

			<section class="entry-content">
			
				<p><?php _e( 'Something is missing. Try double checking things.', 'molde-theme' ); ?></p>
			
			</section>
			
			<footer class="article-footer">
			
				<p><?php _e( 'This is the error message in the page.php template.', 'molde-theme' ); ?></p>
			
			</footer>

	</article>

	<?php endif; ?>

</main>

<?php /* Show side bar */ ?>
<?php get_sidebar(); ?>

<?php get_footer(); ?>