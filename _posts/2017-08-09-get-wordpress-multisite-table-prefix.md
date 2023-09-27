---
layout: post
title: "Get WordPress Multisite Table Prefix"
date: 2017-08-09
banner:
  image: "/assets/images/banners/blog-banner.jpg"
  opacity: .35
  background: "#000"
author: dauble
categories: [wordpress, php]
tags: [mysql, php]
---
A while ago I wrote my first plugin for WordPress. It requires the creation of a table, encrypting some data, saving it to a WP table, then finally pushing clean data to Salesforce. Somewhat straightforward, but I learned a lot.

In starting to integrate the plugin to all our sites, I noticed an issue: none of the data was being displayed in my admin panel. After making sure the data was being sent properly, I checked phpMyAdmin to see if the data was actually saved to the database. Sure enough, it was there. Hmm..

Then it dawned on me. When dealing with a single WordPress site, the database structure ALWAYS follows what you've set up in the wp-config.php file. With Multisite though, WordPress adds the site ID between the table prefix and the table name.

Since my plugin can be accessed from any of the microsites, it wasn't important that each microsite had it's own table. I then looked at the WordPress documentation and noticed this gem:

<pre>$wpdb->base_prefix;</pre>

This will grab the table prefix outlined in the wp-config.php file, not just the current site's table prefix. Once I changed this, voila! My entries started appearing.