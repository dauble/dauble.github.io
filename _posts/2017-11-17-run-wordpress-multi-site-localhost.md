---
layout: post
title: "Run WordPress Multi-Site On localhost"
date: 2017-11-17
image: "/assets/images/posts/common-code.jpg"
author: dauble
categories: [wordpress, mysql]
tags: [phpmyadmin, wamp, mamp]
---

This is something I have wanted to write about for quite some time. Part of my process involves three environments: local, staging, and production. Most of the sites I build are straightforward single-site setups with a few custom touches. At work, however, I manage several WordPress multisite networks.

If you need a primer, start with the [WordPress multisite documentation](https://codex.wordpress.org/Create_A_Network){:target="\_blank"}. For this walkthrough, assume you are taking over an existing multisite with one main site and two subsites, and your local domain is `http://demo.local`.

## Modifying Tables

After importing your database locally, update values in these tables:

- `wp_[site-id]_options`
- `wp_blogs`
- `wp_options`
- `wp_site`
- `wp_sitemeta`

### wp\_[site-id]\_options

You will likely have several of these tables, one per site ID in the Network admin. Update the `siteurl` and `home` values to `http://demo.local`.

### wp_blogs

Change each row in the `domain` column to `demo.local`.

### wp_options

Like `wp_blogs`, update the `siteurl` and `home` values to `http://demo.local`.

### wp_site

Like `wp_blogs`, update each row in the `domain` column to `demo.local`.

### wp_sitemeta

Finally, there is one more value that can cause issues. In `wp_sitemeta`, find the `siteurl` entry and set it to `http://demo.local`.

That is it. Clear your local browser cache, then log in to the WordPress admin as usual.
