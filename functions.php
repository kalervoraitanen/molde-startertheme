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

  add_theme_support( 'menus' );

  add_theme_support(
    'html5',
    array(
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'script',
      'style',
    )
  );

  /* Register one menu by default */
  register_nav_menus(
    array(
      'main-nav' => __( 'Main menu', 'molde-theme' ), 
    )
  );

  add_action( 'widgets_init', 'molde_register_sidebars' );

  // Enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'molde_scripts_and_styles', 999 );

}

add_action( 'after_setup_theme', 'molde_setup' );

/* Register one sidebar by default */
function molde_register_sidebars() {
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => __( 'Sidebar', 'molde-theme' ),
    'description' => __( 'The primary sidebar.', 'molde-theme' ),
  ));
}


// Remove some options like background image from Theme Customizer. You can remove these if you choose to use them.
function molde_theme_customizer($wp_customize) {
  $wp_customize->remove_section('colors');
  $wp_customize->remove_section('background_image');
  $wp_customize->remove_section('static_front_page');
  $wp_customize->remove_section('nav');
  $wp_customize->remove_control('blogdescription');
}
add_action( 'customize_register', 'molde_theme_customizer' );

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
    return '...<p><a class="read-more" href="'.get_the_permalink().'" rel="nofollow" itemprop="url">' . __( 'Continue reading', 'molde-theme' ) . '</a></p>';
}
add_filter( 'excerpt_more', 'molde_excerpt_more' );


/************* COMMENT LAYOUT *********************/
// A better and more semantic comment layout
function molde_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
    <article id="comment-<?php comment_ID(); ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
      <header class="comment-author">
        <?php
          $bgauthemail = get_comment_author_email();
        ?>
        <?php printf(__( '<cite itemprop="author">%1$s</cite> %2$s', 'molde-theme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'molde-theme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-n-j H:i'); ?>" itemprop="datePublished dateModified dateCreated"><?php comment_time('j/n/Y H:i'); ?></time>

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
  }
}

/* DON'T DELETE THIS CLOSING TAG */ ?>
