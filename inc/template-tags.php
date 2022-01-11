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
		// Get Categories for posts.
		$categories_list = get_the_category_list( ', ' );

		/* Show post categories if categories found */ 
		if ( $categories_list ) {
			echo '<p class="entry-meta">';

			echo __( 'Categories', 'molde-theme' ) . ': ' . $categories_list;

			echo '</p>';
		}

		// Get Tags for posts.
		$tags_list = get_the_tag_list( '', ', ' );

		/* Show post tags if tags found */ 
		if ( $tags_list && ! is_wp_error( $tags_list ) ) {
			echo '<p class="entry-meta">';

			echo __( 'Tags', 'molde-theme' ) . ': ' . $tags_list;

			echo '</p>';	    
		}

		/* Show comment count */
		echo '<p class="post-comments">';

		echo '<span class="comment-count" itemprop="commentCount">' . esc_html( get_comments_number() ) . ' </span>' . esc_html( 'Comments', 'molde-theme' );

		echo '</p>';
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