<?php
/**
 * Custom template tags for this theme
 *
 */


/**********************************
PRINT CATEGORIES AND TAGS
***********************************/

if ( ! function_exists( 'molde_categories_tags' ) ) :

	function molde_categories_tags() {

		echo '<p class="entry-meta">';

			/* Show post categories */ 
	  	printf( __( 'Categories', 'molde-theme' ).': %1$s', get_the_category_list(', ') );

		echo '</p>

		<p class="entry-meta">';

			/* Show post tags */
	  echo '<span itemprop="keywords">';
	  	the_tags( __( 'Tags: ', 'molde-theme' ) );
	  echo '</span>

		</p>';
	}
endif;

/**********************************
POSTS NOT FOUND
***********************************/

if ( ! function_exists( 'molde_posts_not_found' ) ) :
	function molde_posts_not_found() {
	  echo '
	    <header class="article-header">
	      <h1>';
	      _e( 'Post not found!', 'molde-theme' );
	      echo '</h1>
	    </header>
	    <section class="entry-content">   
	      <p>';
	      _e( 'Something is missing. Try double checking things.', 'molde-theme' );
	      echo '</p>    
	    </section>';
	}
endif;