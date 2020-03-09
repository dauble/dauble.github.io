---
layout: post
title: "Custom Pagination in WordPress"
date: 2018-02-14
image: "/assets/images/posts/blog-banner-compressor.jpg"
---
A while ago I was having troubles with the built-in pagination in WordPress and started looking for alternative solutions. I didn't want to use a plugin, since I wanted it to work across the board -- work with blog posts, search results, taxonomies, etc. I stumbled upon this [custom method from WPBeginner](http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/) and gave it a shot. It worked brilliantly. After a few months though, I started noticing a problem -- it wasn't pulling the correct number of total pages, resulting in paged pages with zero results. I ended up looking into the code and have modified it for my needs. Feel free to use this -- simply drop this into your **functions.php **file, then call it in your code with:

<pre class="EnlighterJSRAW" data-enlighter-language="php"><?php wpbeginner_numeric_posts_nav(); ?></pre>

  Here's the code:

<pre class="EnlighterJSRAW" data-enlighter-language="php">function wpbeginner_numeric_posts_nav() {

                    if( is_singular() )
                        return;

                    global $wp_query;

                    /** Stop execution if there's only 1 page */
                    if( $wp_query->max_num_pages <= 1 )
                        return;

                    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
                    $max   = intval( $wp_query->posts->max_num_pages );

                    /** Add current page to the array */
                    if ( $paged >= 1 )
                        $links[] = $paged;

                    /** Add the pages around the current page to the array */
                    if ( $paged >= 3 ) {
                        $links[] = $paged - 1;
                        $links[] = $paged - 2;
                    }

                    if ( ( $paged + 2 ) <= $max ) {
                        $links[] = $paged + 2;
                        $links[] = $paged + 1;
                    }

                    echo '<div class="navigation"><ul>' . "\n";

                    /** Previous Post Link */
                    if ( get_previous_posts_link() )
                        printf( '<li>%s</li>' . "\n", get_previous_posts_link('&laquo; Previous Page', $max) );

                    /** Link to first page, plus ellipses if necessary */
                    if ( ! in_array( 1, $links ) ) {
                        $class = 1 == $paged ? ' class="active"' : '';

                        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

                        if ( ! in_array( 2, $links ) )
                            echo '<li>…</li>';
                    }

                    /** Link to current page, plus 2 pages in either direction if necessary */
                    sort( $links );
                    foreach ( (array) $links as $link ) {
                        $class = $paged == $link ? ' class="active"' : '';
                        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
                    }

                    /** Link to last page, plus ellipses if necessary */
                    if ( ! in_array( $max, $links ) ) {
                        if ( ! in_array( $max - 1, $links ) )
                            echo '<li>…</li>' . "\n";

                        $class = $paged == $max ? ' class="active"' : '';
                        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
                    }

                    /** Next Post Link */
                    if ( get_next_posts_link() )
                        printf( '<li>%s</li>' . "\n", get_next_posts_link('Next Page &raquo;', $max) );

                    echo '</ul></div>' . "\n";
                  }</pre>