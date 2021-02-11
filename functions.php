<?php

/**
* Molde functions and definitions
*/

function molde_setup() {
  load_theme_textdomain( 'molde-theme', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  add_theme_support( 'title-tag' );

  add_theme_support( 'post-thumbnails' );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'script',
      'style',
      'navigation-widgets',
    )
  );

  // Add theme support for Custom Logo.
  add_theme_support(
    'custom-logo',
    array(
      'width'      => 500,
      'height'     => 250,
      'flex-width' => true,
    )
  );

  // Add custom background color and image support
  add_theme_support( 'custom-background',
      array(
      'default-image' => '',    // Background image default
      'default-color' => '',    // Background color default (don't add the #)
      'wp-head-callback' => '_custom_background_cb',
      'admin-head-callback' => '',
      'admin-preview-callback' => ''
      )
  );

  // Add post format support
  add_theme_support( 'post-formats',
    array(
      'aside',             // Title less blurb
      'gallery',           // Gallery of images
      'link',              // Quick link to other site
      'image',             // An image
      'quote',             // A quick quote
      'status',            // A Facebook like status update
      'video',             // Video
      'audio',             // Audio
      'chat'               // Chat transcript
    )
  );  

  /* Register one menu by default */
  register_nav_menus(
    array(
      'main-nav' => __( 'Main menu', 'molde-theme' ), 
    )
  );

  // Add support for Block Styles.
  add_theme_support( 'wp-block-styles' );  

  add_action( 'widgets_init', 'molde_register_sidebars' );

  // Enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'molde_scripts_and_styles', 999 );
}
add_action( 'after_setup_theme', 'molde_setup' );


/* Register one sidebar by default */
function harmony_register_sidebars() {
  register_sidebar(
    array(
      'name'          => esc_html__( 'Sidebar', 'molde-theme' ),
      'id'            => 'sidebar-1',
      'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'molde-theme' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}

function molde_content_width() {
  // This variable is intended to be overruled from themes.
  $GLOBALS['content_width'] = apply_filters( 'molde_content_width', 768 );
}
add_action( 'after_setup_theme', 'molde_content_width', 0 );


// To embed Google Fonts uncomment the below lines.
/* function molde_fonts() {
  wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css2?family=Noto+Serif&family=Open+Sans:wght@300&family=Playball&display=swap');
}
add_action('wp_enqueue_scripts', 'molde_fonts'); */


// Detect if Javascript is in use. You can remove this if you use Modernizer. 
function molde_javascript_detection() {
  echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'molde_javascript_detection', 0 );


function filter_ptags_on_images($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
// Clean random code around images
add_filter( 'the_content', 'filter_ptags_on_images' );


// Modify the default excerpt Read More link
function molde_excerpt_more( $more ) {
    return '...<p><a class="read-more" href="'.get_the_permalink().'" rel="nofollow" itemprop="url">' . __( 'Continue reading', 'molde-theme' ) . ' <span class="screen-reader-text">' . get_the_title() . '</span></a></p>';
}
add_filter( 'excerpt_more', 'molde_excerpt_more' );


/**********************************
COMMENT LAYOUT
***********************************/
// A better and more semantic comment layout

function molde_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
    <article id="comment-<?php comment_ID(); ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
      <header class="comment-author">
        <?php printf(__( '<cite itemprop="author">%1$s</cite> %2$s', 'molde-theme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'molde-theme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-n-j H:i'); ?>" itemprop="datePublished dateModified dateCreated"><?php comment_date(); _e( ' at ', 'molde-theme' ); comment_time(); ?></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <section class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'molde-theme' ) ?></p>
        </section>
      <?php endif; ?>
      <section class="comment_content" itemprop="text">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
}


/*********************
SCRIPTS & ENQUEUEING
*********************/

function molde_scripts_and_styles() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

  if (!is_admin()) {

    // Uncomment the below wp_register_script to enable Modernizr. Modernizr is used to tell what
    // HTML, CSS and JavaScript features the user’s browser has to offer so you can use the info in your CSS.
    // If you enable this you can remove the 'nomanuscript_javascript_detection' function call since Modernizr
    // adds the 'js' class to HTML. You can download the latest Modernizr library from https://modernizr.com/
    //
    //wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/assets/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

    // Register main stylesheet
    wp_register_style( 'molde-stylesheet', get_stylesheet_directory_uri() . '/assets/css/style.min.css', array(), '', 'all' );

    // Adding scripts file in the footer
    wp_register_script( 'molde-js', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js', array( 'jquery' ), '', true );

    // Enqueue styles and scripts
    wp_enqueue_style( 'molde-stylesheet' );

    // Uncomment the below line to enable Modernizr
    //wp_enqueue_script( 'modernizr' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'molde-js' );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }      
  }
}

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/* DON'T DELETE THIS CLOSING TAG */ ?>
