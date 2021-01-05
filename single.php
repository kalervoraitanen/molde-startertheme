<?php get_header(); ?>

<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog" tabindex=-1>

	<?php /* Loop through post data */ ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

	  <header class="entry-header">

	    <h1 class="entry-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

	    <p class="entry-date">
	      <span class="screen-reader-text"><?php echo __( 'Posted', 'molde-theme' ) ?> </span>
	      <time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d h:i') ?>" itemprop="datePublished"><?php echo get_the_date('d/m/Y H:i') ?></time>
	    </p>

	  </header>

    <section class="entry-content cf" itemprop="articleBody">

    	<?php /* If post has feature image show it */ ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<span itemprop="image" class="feat-image"><?php the_post_thumbnail(); ?></span>
			<?php } ?>

			<?php /* Show post content */ ?>
      <?php
        the_content();
			?>

    </section>

    <footer class="article-footer">

    	<p class="article-categories">
				
				<?php /* Show post categories */ ?>
				<?php printf( __( 'Categories', 'molde-theme' ).': %1$s', get_the_category_list(', ') ); ?>
			
			</p>

			<?php /* Show post tags */ ?>
      <?php the_tags( '<p class="article-tags" itemprop="keywords">' . __( 'Tags: ', 'molde-theme' ) . ' ', ', ', '</p>' ); ?>

    </footer>

    <?php
    
		endif;
		
		?>

  </article>
  
	  <?php
	  // If comments are open or there is at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>
  
	<?php endwhile; ?>

	<?php /* If no posts found show error messages */ ?>
	<?php else : ?>

		<article class="post-not-found">

			<header class="article-header">
			
				<h1><?php _e( 'Post not found!', 'molde-theme' ); ?></h1>
			
			</header>

			<section class="entry-content">
			
				<p><?php _e( 'Something is missing. Try double checking things.', 'molde-theme' ); ?></p>
			
			</section>
			
			<footer class="article-footer">
			
				<p><?php _e( 'This is the error message in the single.php template.', 'molde-theme' ); ?></p>
			
			</footer>

	</article>

	<?php endif; ?>

</main>

<?php /* Show side bar */ ?>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
