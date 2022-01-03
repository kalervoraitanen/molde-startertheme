Theme name: Molde Starter Theme - Demo4
---------------------------------------

This demo theme is designed especially for blogs. It is also WTFPL licensed so you can use it anyway you want. However you are forbidden to hold me liable for anything if you choose to use it.

Activating the demo is very simple. Below are the instructions how to do it:

1. Install WordPress to a local or remote server. Instructions can be found here: https://wordpress.org/support/article/how-to-install-wordpress/

2. Install Theme Unit Test data to your WordPress. Instructions can be found here: https://codex.wordpress.org/Theme_Unit_Test

3. Uncomment the below lines in Molde Starter Theme functions.php file to activate the demo.
- wp_register_style( 'demo4-stylesheet', get_stylesheet_directory_uri() . '/demos/demo4/style.css', array(), '', 'all' );
- wp_register_script( 'demo4-js', get_stylesheet_directory_uri() . '/demos/demo4/scripts.js', array(), '', true );
- wp_enqueue_style( 'demo4-stylesheet' );
- wp_enqueue_script( 'demo4-js' );

4. That's it, you're all set! Open your site in the browser to see the demo. 