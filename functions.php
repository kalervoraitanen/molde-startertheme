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

  /* Add dropdown toggle button to all menu items with submenus */
  class Add_button_of_Sublevel_Walker extends Walker_Nav_Menu
  {
      function start_lvl( &$output, $depth = 0, $args = array() ) {
          $indent = str_repeat("\t", $depth);
          $output .= "\n$indent<button type='button' class='dropdown-toggle' aria-expanded='false' aria-label='" . esc_attr__('Open child menu', 'molde-theme') . "'>+</button><ul class='sub-menu'>\n";
      }
      function end_lvl( &$output, $depth = 0, $args = array() ) {
          $indent = str_repeat("\t", $depth);
          $output .= "$indent</ul>\n";
      }
  }


  // Add support for Block Styles.
  add_theme_support( 'wp-block-styles' );  

  add_action( 'widgets_init', 'molde_register_sidebars' );

  // Enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'molde_scripts_and_styles', 999 );
}
add_action( 'after_setup_theme', 'molde_setup' );


/* Register one sidebar by default */
function molde_register_sidebars() {
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

/**
 * Preconnects to Google Fonts to improve performance. Uncomment this function if you're using Google Fonts.
 */
/*
if ( ! function_exists( 'molde_preconnect_googlefonts' ) ) {

	function molde_preconnect_googlefonts() {
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
		<?php
	}
}
add_action( 'wp_head', 'molde_preconnect_googlefonts' );
*/

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
 ?>
    <article id="comment-<?php comment_ID(); ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
      <header class="comment-author">
        <?php printf(__( '<cite itemprop="author">%1$s</cite> %2$s', 'molde-theme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'molde-theme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('c'); ?>" itemprop="datePublished dateModified dateCreated"><?php comment_date(); _e( ' at ', 'molde-theme' ); comment_time(); ?></time>

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
    // If you enable this you can remove the 'molde_javascript_detection' function call since Modernizr
    // adds the 'js' class to HTML. You can download the latest Modernizr library from https://modernizr.com/
    //
    //wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/assets/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

    // Register main stylesheet
    wp_register_style( 'molde-stylesheet', get_stylesheet_directory_uri() . '/assets/css/style.min.css', array(), '', 'all' );

    // Register demo stylesheet. Uncomment one of the below lines to activate the demo style. Remember to uncomment just one style.
    // wp_register_style( 'demo1-stylesheet', get_stylesheet_directory_uri() . '/demos/demo1/style.css', array(), '', 'all' );    
    // wp_register_style( 'demo2-stylesheet', get_stylesheet_directory_uri() . '/demos/demo2/style.css', array(), '', 'all' ); 
    // wp_register_style( 'demo3-stylesheet', get_stylesheet_directory_uri() . '/demos/demo3/style.css', array(), '', 'all' );    
    // wp_register_style( 'demo4-stylesheet', get_stylesheet_directory_uri() . '/demos/demo4/style.css', array(), '', 'all' );    
    // wp_register_style( 'demo5-stylesheet', get_stylesheet_directory_uri() . '/demos/demo5/style.css', array(), '', 'all' );    
    
    // Adding scripts file in the footer
    wp_register_script( 'molde-js', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js', array(), '', true );

    // Or uncomment the below line to use jQuery in your scripts
    // wp_register_script( 'molde-js', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );

    // Register demo scripts file. Uncomment one of the below lines to activate the demo scripts file. Remember to uncomment just one file.
    // wp_register_script( 'demo1-js', get_stylesheet_directory_uri() . '/demos/demo1/scripts.js', array(), '', true );
    // wp_register_script( 'demo2-js', get_stylesheet_directory_uri() . '/demos/demo2/scripts.js', array(), '', true );
    // wp_register_script( 'demo3-js', get_stylesheet_directory_uri() . '/demos/demo3/scripts.js', array(), '', true );
    // wp_register_script( 'demo4-js', get_stylesheet_directory_uri() . '/demos/demo4/scripts.js', array(), '', true );
    // wp_register_script( 'demo5-js', get_stylesheet_directory_uri() . '/demos/demo5/scripts.js', array(), '', true );

    // Enqueue main stylesheet
    wp_enqueue_style( 'molde-stylesheet' );
    
    // Enqueue demo stylesheet. Uncomment one of the below lines to activate the demo style. Remember to uncomment just one style.
    // wp_enqueue_style( 'demo1-stylesheet' );
    // wp_enqueue_style( 'demo2-stylesheet' );
    // wp_enqueue_style( 'demo3-stylesheet' );
    // wp_enqueue_style( 'demo4-stylesheet' );
    // wp_enqueue_style( 'demo5-stylesheet' );

    // Uncomment the below line to enable Modernizr
    //wp_enqueue_script( 'modernizr' );

    // Uncomment the below line to enable jQuery
    // wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'molde-js' );

    // Register demo scripts file. Uncomment one of the below lines to activate the demo scripts file. Remember to uncomment just one file.
    // wp_enqueue_script( 'demo1-js' );
    // wp_enqueue_script( 'demo2-js' );
    // wp_enqueue_script( 'demo3-js' );
    // wp_enqueue_script( 'demo4-js' );
    // wp_enqueue_script( 'demo5-js' );

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
