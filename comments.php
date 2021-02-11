<?php
/*
The comments page for Molde theme
*/

// Don't load comment form if commenting is not possible
if ( post_password_required() ) {
  return;
}

?>


<?php if ( have_comments() ) :
// A better and more semantic comment layout
 ?>
  <section id="commentlist">
     <p class="comments-title"><?php comments_number( __( '<span>No</span> Comments', 'molde-theme' ), __( '<span itemprop="commentCount">1</span> Comment', 'molde-theme' ), __( '<span itemprop="commentCount">%</span> Comments', 'molde-theme' ) );?></p>

    <?php
      wp_list_comments( array(
        'style'             => 'section',
        'short_ping'        => true,
        'avatar_size'       => 40,
        'callback'          => 'molde_comments',
        'type'              => 'all',
        'reply_text'        => __('Reply', 'molde-theme'),
        'page'              => '',
        'per_page'          => '',
        'reverse_top_level' => null,
        'reverse_children'  => ''
      ) );
    ?>
  </section>

  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav class="navigation comment-navigation" role="navigation">
      <div class="comment-nav-prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'molde-theme' ) ); ?></div>
      <div class="comment-nav-next"><?php next_comments_link( __( 'More Comments &rarr;', 'molde-theme' ) ); ?></div>
    </nav>
  <?php endif; ?>

  <?php if ( ! comments_open() ) : ?>
    <p class="no-comments"><?php _e( 'Comments are closed.' , 'molde-theme' ); ?></p>
  <?php endif; ?>

<?php endif; ?>

<?php
 
$comments_args = array(
    // Define Fields
    'fields' => array(
        // Author field
        'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name *', 'molde-theme' ) . '</label><input id="author" name="author" aria-required="true" placeholder="' . __( 'Name (required)', 'molde-theme' ) .'" required></p>',
        // Email Field
        'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email *', 'molde-theme' ) . '</label><input id="email" name="email" aria-required="true" placeholder="' . __( 'Email (required)', 'molde-theme' ) .'" required></p>',
        // URL Field
        'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'molde-theme' ) . '</label><input id="url" name="url" placeholder="' . __( 'Website', 'molde-theme' ) .'" required></p>',        
        // Cookies
        'cookies' => '<p class="cookie-notification"><input id="cookies" type="checkbox" required><label class="cookies-label" for="cookies">' .  __( 'Save my name, email, and website in this browser for the next time I comment.', 'molde-theme' ) . '</label></p>',
    ),
    // Change the title of send button
    'label_submit' => __( 'Send', 'molde-theme'),
    // Change the title of the reply section
    'title_reply' => __( 'Leave a Comment', 'molde-theme'),
    // Change the title of the reply section
    'title_reply_to' => __( 'Reply', 'molde-theme'),
        // Change the default h3 reply text to paragraph
    'title_reply_before' => '<p id="reply-title" class="comment-reply-title">',
    'title_reply_after' => '</p>',
    // Cancel Reply Text
    'cancel_reply_link' => '<span class="cancel-reply">' . __( 'Cancel Reply', 'molde-theme') . '</span>',
    // Change the 'Your email will not be published' text
    'comment_notes_before' => '<p>' . __( 'Your email address will not be published. Required fields are marked *', 'molde-theme') . '</p>',
    // Redefine your own textarea (the comment body).
    'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __( 'Comment *', 'molde-theme' ) . '</label><textarea id="comment" name="comment" aria-required="true" placeholder="' . __( 'Comment (required)', 'molde-theme' ) . '" required></textarea></p>',
    // Remove "Text or HTML to be displayed after the set of comment fields".
    'comment_notes_after' => '',
    // Submit Button ID
    'id_submit' => __( 'comment-submit', 'molde-theme' ),
);
comment_form( $comments_args );
?>

