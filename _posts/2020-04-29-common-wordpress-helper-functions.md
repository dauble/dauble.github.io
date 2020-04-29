---
layout: post
title: "Common WordPress Helper Functions"
date: 2020-04-20
image: /assets/images/posts/common-wordpress-functions.jpg
author: dauble
categories: [wordpress]
tags: [php]
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

## is_home()

## wp_reset_postdata()

## restore_current_blog()

## get_template_part()

## bloginfo()
 url, template_directory