---
layout: post
title: "Custom Pagination in WordPress"
date: 2018-02-14
banner:
    image: "/assets/images/banners/blog-banner-compressor.jpg"
    opacity: .35
    background: "#000"
author: dauble
categories: [wordpress, pagination]
tags: [php]
---
A while ago I was having troubles with the built-in pagination in WordPress and started looking for alternative solutions. I didn't want to use a plugin, since I wanted it to work across the board -- work with blog posts, search results, taxonomies, etc. I stumbled upon this [custom method from WPBeginner](http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/){:target="_blank"} and gave it a shot. It worked brilliantly. After a few months though, I started noticing a problem -- it wasn't pulling the correct number of total pages, resulting in paged pages with zero results. I ended up looking into the code and have modified it for my needs. Feel free to use this -- simply drop this into your **functions.php **file, then call it in your code with:

`<?php wpbeginner_numeric_posts_nav(); ?>`

  Here's the code:

```
function wpbeginner_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->posts->max_num_pages );

    if ( $paged >= 1 )
        $links[] = $paged;

    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('&laquo; Previous Page', $max) );

    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('Next Page &raquo;', $max) );

    echo '</ul></div>' . "\n";
  }
  ```