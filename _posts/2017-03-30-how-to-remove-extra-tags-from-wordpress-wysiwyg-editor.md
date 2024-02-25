---
layout: post
title: "How To: Remove Extra Tags from WordPress WYSIWYG Editor"
date: 2017-03-30
image: /assets/images/posts/computer.jpg
author: dauble
categories: [wordpress, php]
tags: [php]
---
From time to time, I find WordPress' built-in WYSIWYG editor annoying. If you've dealt with it much, you know it adds formatting tags around every new line of text. Usually these don't bother me, as I want my text to be wrapped in paragraph tags or similar. However, for the times I want to extract ONLY the content and not the tags, here's an easy way to strip all tags from WordPress. Just a word of caution though, these will strip the tags from ALL of your templates.

Add any of these lines to your **functions.php** file.

The Excerpt:

<pre>remove_filter ('the_exceprt', 'wpautop');</pre>

The Content:

<pre>remove_filter ('the_content', 'wpautop');</pre>

All Paragraph tags:

<pre>remove_filter('term_description','wpautop');</pre>

Or, my personal favorite, use functions native to WordPress anywhere in your templates: The Excerpt:

`<?php echo get_the_excerpt(); ?>`

The Content:

`<?php echo get_the_content(); ?>`