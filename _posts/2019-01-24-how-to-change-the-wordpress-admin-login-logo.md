---
layout: post
title: "How to Change the WordPress Admin Login Logo"
date: 2019-01-24
image: /assets/images/posts/wp-walker.jpg
author: dauble
categories: [wordpress]
tags: [php]
---
Over the years I've had to search for tons of small snippets for WordPress to do simple tasks. This is another one of those little snippets. One of the final little touches I like to do before launching a website over to a client is to override the default WordPress logo with their logo on the WordPress login splash screen. It's a simple trick and can be done with the code below.

<pre>// load in admin styles
                function admin_style() {
                  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
                }
                add_action('admin_enqueue_scripts', 'admin_style');</pre>

Next, you'll need to simply overwrite the default WordPress styling:

<pre>body .login h1 a {
                  background-image: url('path/to/the-logo.png');
                }</pre>

I hope this helps!