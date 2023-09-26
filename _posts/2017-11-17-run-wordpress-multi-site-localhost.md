---
layout: post
title: "Run WordPress Multi-Site On localhost"
date: 2017-11-17
image: "/assets/images/banners/common-code.jpg"
author: dauble
categories: [wordpress, mysql]
tags: [phpmyadmin, wamp, mamp]
---
This is something I've wanted to write about for quite some time. Part of my building process involves three environments: local, staging and production. Most of the sites I've built are straight-forward "single sites" with a few bits of magic here and there. However, with my job, I manage several mutli-site websites.

For information on getting started with a WordPress multi-site, detailed instructions can be found in the [WordPress documentation](https://codex.wordpress.org/Create_A_Network){:target="_blank"}. For this demo, I'm going to assume you're taking over a multi-site and are needing to make changes locally and there is a main site and two sub-sites. Also, let's assume your local website will be "**http://demo.local**".

## Modifying Tables

Once you've downloaded the database and imported it to the database you're planning on using, it'll be important to look for the following tables: **wp_[site-id]_options**, **wp_blogs**, **wp_options**, **wp_site** and **wp_sitemeta**.

### wp_[site-id]_options

You will have several of these. These correspond with the Site ID in the Network tab. You will need to change the **_siteurl_** and **_home_** columns to "**http://demo.local**".

### wp_blogs

This is a little easier. Change each row in the _**domain**_ column to "**demo.local**".

### wp_options

Like the **wp_blogs** table, this will also need the _**siteurl**_and _**home**_ columns updated to "**http://demo.local**".

### wp_site

Like the **wp_blogs** table, each row in the _**domain**_ column will need to be updated to "**demo.local**".

### wp_sitemeta

Finally, I've only had issues with this once, however there is one last cell that needs to be updated. Look for the _**siteurl**_ column and update the value to "_**http://demo.local**_".

And that's it! It's best to clear the cache on your local machine, but you'll now be able to log into the WordPress admin panel like you would normally!