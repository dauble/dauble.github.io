---
layout: post
title: "Run WordPress Multi-Site On localhost"
date: 2017-11-17
image: "/assets/images/posts/common-code.jpg"
---
This is something I've wanted to write about for quite some time. Part of my building process involves three environments: local, staging and production. Most of the sites I've built are straight-forward "single sites" with a few bits of magic here and there. However, with my job, I manage several mutli-site websites.

For information on getting started with a WordPress multi-site, detailed instructions can be found in the <a href="https://codex.wordpress.org/Create_A_Network" target="_blank" rel="noopener">WordPress documentation</a>. For this demo, I'm going to assume you're taking over a multi-site and are needing to make changes locally and there is a main site and two sub-sites. Also, let's assume your local website will be "<strong>http://demo.app</strong>".
<h2>Modifying Tables</h2>
Once you've downloaded the database and imported it to the database you're planning on using, it'll be important to look for the following tables: <strong>wp_[site-id]_options</strong>, <strong>wp_blogs</strong>, <strong>wp_options</strong>, <strong>wp_site</strong> and <strong>wp_sitemeta</strong>.
<h3>wp_[site-id]_options</h3>
You will have several of these. These correspond with the Site ID in the Network tab. You will need to change the <strong><em>siteurl</em></strong> and <strong><em>home</em></strong> columns to "<strong>http://demo.app</strong>".
<h3>wp_blogs</h3>
This is a little easier. Change each row in the <em><strong>domain</strong></em> column to "<strong>demo.app</strong>".
<h3>wp_options</h3>
Like the <strong>wp_blogs </strong>table, this will also need the <em><strong>siteurl</strong></em><em> </em>and <em><strong>home</strong></em> columns updated to "<strong>http://demo.app</strong>".
<h3>wp_site</h3>
Like the <strong>wp_blogs</strong> table, each row in the <em><strong>domain</strong></em> column will need to be updated to "<strong>demo.app</strong>".
<h3>wp_sitemeta</h3>
Finally, I've only had issues with this once, however there is one last cell that needs to be updated. Look for the <em><strong>siteurl</strong></em> column and update the value to "<em><strong>http://demo.app</strong></em>".

And that's it! It's best to clear the cache on your local machine, but you'll now be able to log into the WordPress admin panel like you would normally!