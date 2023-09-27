---
layout: post
title: "Getting Jekyll Running on Windows 10 x64"
date: 2020-04-19
banner:
  image: /assets/images/banners/page-speed-insights.jpg
  opacity: .35
  background: "#000"
author: dauble
categories: [jekyll]
tags: [command line]
---

I use a Mac and a PC equally and want to be able to work on projects regardless of development environment. As mentioned [previously](/2020/04/10/2020-blog-update.html), I've converted my site over to Jekyll. It works well on both systems, but when I went to install it on my PC, I ran into the following issue:

>Unable to load the EventMachine C extension; To use the pure-ruby reactor, require 'em/pure_ruby'

Puzzled, I scoured Google and StackOverflow and came up empty. I thought [this post on StackOverflow](https://stackoverflow.com/questions/30682575/unable-to-load-the-eventmachine-c-extension-to-use-the-pure-ruby-reactor){:target="_blank"} would help get me there, but I ended up back at the same spot.

After a while, I finally started looking into different flags I could use to run with these commands. I finally figured out a solution - force the uninstall of `eventmachine` and reinstall it using the Ruby platform. Voila! All set!

Here's the final steps I used to fix this problem:

>bundle<br>
>gem uninstall eventmachine --force<br>
>gem install eventmachine --platform ruby

