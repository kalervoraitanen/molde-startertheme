<?php get_header(); ?>

<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog" tabindex=-1>

	<?php /* Loop through post data */ ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php
			 /*
			 * This function will bring in the needed template file depending on what the post
			 * format is. The different post formats are located in the post-formats folder.
				*/
			get_template_part( 'post-formats/format', get_post_format() );
		?>

		<?php wp_link_pages(); ?>
	  
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

			<?php molde_posts_not_found(); ?>

		</article>

	<?php endif; ?>

</main>

<?php /* Show side bar */ ?>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
