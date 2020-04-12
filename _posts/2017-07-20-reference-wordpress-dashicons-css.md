---
layout: post
title: "Reference WordPress Dashicons in CSS"
date: 2017-07-20
image: "/assets/images/bg-tools.jpg"
---
Recently I had an issue where I needed to remove a mega menu plugin in order to improve a site's PageSpeed score. In breaking it down, I realized the plugin was referencing the WordPress Dashicons, something I would need to add in when rebuilding the navigation menu.

I looked online and finally found the solution: load the dashicons from the functions.php file.

<pre>
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );

function load_dashicons_front_end() {
  wp_enqueue_style( 'dashicons' );
}
</pre>

Then, in your CSS, simply reference them as a new font:

<pre>.item { content: '\f140'; display: inline-block; font-family: dashicons; }</pre>

I found this snippet from [WP Sites](https://wpsites.net/web-design/adding-dashicons-in-wordpress/){:target="_blank"}. For the complete Dashicon library, look at the [WordPress Dashicon Developer Resource](https://developer.wordpress.org/resource/dashicons/){:target="_blank"}.