---
layout: post
title: "Stop WordPress from adding 10px padding to Images"
date: 2018-09-11
image: /assets/images/posts/new-code.jpg
---
For quite some time now I've been struggling with WordPress adding an additional 10px of padding to images that are uploaded via the content editor. After a small amount of digging, I've discovered the following override:

<pre class="EnlighterJSRAW" data-enlighter-language="php">function remove_caption_padding( $width ) {
                  return $width - 10;
                }
                add_filter( 'img_caption_shortcode_width', 'remove_caption_padding' );</pre>

Add this to your functions.php file and instantly remove the 10px padding.