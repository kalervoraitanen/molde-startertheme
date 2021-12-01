# Molde
A lightweight WordPress Development Theme

Molde is designed to give a strong semantic and lightweight foundation to a theme.
It is highly Search Engine optimized especially for blogs and it scores by default 90 in SEO in Google's Lighthouse audit.
It is meant to be used as a starter theme which you can use to develop your own theme.

With a Mobile-First approach Molde serves up only the minimum to small devices and progressively enhances for larger viewports.

Molde is translation ready and accessibility ready. It scores 100 in Accessibility in Google's Lighthouse audit.

And what's best it is totally free. You can do what ever you want with it, even money! However you are forbidden to hold me liable for anything, or claim that what you do with this is made by me.

Designed by Kalervo Raitanen
http://www.kalervoraitanen.com

License: WTFPL
License URI: http://sam.zoy.org/wtfpl/

# Activating a demo
Molde comes with demo themes to showcase what can be done with just CSS and a touch of Vanilla Javascript. All the demos are also WTFPL licensed so you can use them anyway you want. However you are forbidden to hold me liable for anything if you choose to use them.

Activating a demo is very simple. Below are the instructions how to do it:

1. Install WordPress to a local or remote server. Instructions can be found here: https://wordpress.org/support/article/how-to-install-wordpress/

2. Install Theme Unit Test data to your WordPress. Instructions can be found here: https://codex.wordpress.org/Theme_Unit_Test

3. Uncomment the below lines in Molde Starter Theme <strong>functions.php</strong> file to activate the demo. Remember to uncomment only one demo stylesheet and script. Change the "demo1" in the lines to a corresponding demo for example "demo2". All demos can be found in the <strong>demos</strong> folder.
- <code>wp_register_style( 'demo1-stylesheet', get_stylesheet_directory_uri() . '/demos/demo1/style.css', array(), '', 'all' );</code>
- <code>wp_register_script( 'demo1-js', get_stylesheet_directory_uri() . '/demos/demo1/scripts.js', array(), '', true );</code>
- <code>wp_enqueue_style( 'demo1-stylesheet' );</code>
- <code>wp_enqueue_script( 'demo1-js' );</code>

4. That's it, you're all set! Open your site in the browser to see the demo.