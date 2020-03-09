---
layout: post
title: "Why Click Events Don't Work in Safari"
date: 2018-01-29
image: "/assets/images/posts/cup-of-coffee-laptop-office-macbook-89786.jpg"
---
Over the last few months I've been working on a weather dashboard with the goal of developing it into my first mobile app. One of the features I've added has been a pull-out menu, which displays additional information that won't fit on the primary screen. It's been working in all the browsers except Safari mobile. I'm pulling a lot of data asynchronously, so several items don't appear in the DOM when the page is loaded. Because of this, I was having to target click events in the following way:

<pre class="EnlighterJSRAW" data-enlighter-language="js">$(document).on('click', '.js-menu-cog', function() {
                   $('.js-menu').fadeIn('fast').addClass('active');
                });</pre>

It was working in all browsers yet again, Safari was being problematic. Finally, I remember reading an article years ago about Safari not reading elements as buttons unless they had the cursor: pointer CSS property applied. Once I added the cursor: pointer style to my button, it started working!