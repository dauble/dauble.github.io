---
layout: post
title: "Common WordPress Helper Functions"
date: 2020-04-29
banner:
  image: /assets/images/banners/common-wordpress-functions.jpg
  opacity: .35
  background: "#000"
author: dauble
categories: [wordpress]
tags: [php, development]
---

I've used WordPress almost daily for the past six years and thought it'd be time to share some of my more commonly used functions WordPress has built in to the framework. Below is a list of the functions I use frequently on most of the sites I build.

## wp_is_mobile()
>wp_is_mobile()

This function detects if someone is using a mobile device or not. Extremely handy for when you want certain features (such as tracking scripts, chat applications, etc) to not appear when users are using mobile devices.

## is_user_logged_in()
>is_user_logged_in()

As it sounds, this checks to see if the current user is logged in or not. Handy little script for turning off tracking scripts or other non-essential parts when users are logged in. This can also be used to protect content areas that require membership roles to view.

## is_page_template()
>is_page_template('template-sample.php')

## is_front_page()
>is_front_page()

This function simply checks to see if the current page is set as the Front Page in WordPress. This page is set under Settings -> Reading.

## is_home()
>is_home()

This function simply checks to see if the current page is set as the Posts Page in WordPress. This page is set under Settings -> Reading.

## wp_reset_postdata()
>wp_reset_postdata()

When using custom loops, this resets the Posts loop so the rest of the page will render properly.

## restore_current_blog()
>restore_current_blog(1)

When working with a multisite setup, this allows you to change which blog to grab content. Pass in the Site ID as an arugment to load that site's content.

## get_template_part()
>get_template_part('included-template.php')

This functions like an include for WordPress. Simple pass in the PHP template filename as an argument.

## bloginfo()
>bloginfo('url')

One of the more useful functions, this enables you to grab various info about the WordPress site. Some arguments I use frequently are `url` and `template_directory`. These return the site's URL and theme path.

For more information on these functions and more, visit the [WordPress Developer reference](https://developer.wordpress.org/reference/functions/){:target="_blank"}.