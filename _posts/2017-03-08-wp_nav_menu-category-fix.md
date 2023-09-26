---
layout: post
title: "Solution: wp_nav_menu Not Appearing on Category Template"
date: 2017-03-08
banner:
  image: "/assets/images/banners/new-code.jpg"
  opacity: .35
  background: "#000"
author: dauble
categories: [wordpress]
tags: [php]
---
Today while working on a site I came across a problem that seemed weird to me. The **wp_nav_menu()** was working fine on all the pages except for my category page. When I took a detailed look, I found that it was caused by conflict of custom post type.  So how did I fix it?

Here is a quick fix. Copy and paste the following code right above the place where you have called the **wp_nav_menu()** function.

```
<?php
  if(is_category()) {
    $wp_query = NULL;
    $wp_query = new WP_Query(array('post_type' => 'post','page'));

    wp_nav_menu(array(
      'menu'=>'your_nav_menu',
      'fallback_cb' => 'false')
    );

    wp_reset_query();
  }
?>
```