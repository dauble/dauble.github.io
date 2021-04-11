---
layout: post
title: "Chrome 63 Update: HTTPS Redirect on localhost"
date: 2017-12-09
image: /assets/images/posts/chrome-update.jpg
author: dauble
categories: [chrome]
tags: [update]
---
I ran into something frustrating yesterday and after extensive research, figured out the problem. With one of Chrome's latest updates, all of my sites on my local machine were consistently being redirected to HTTPS.

Each of my sites had an extension of ".app", and after reading through [this StackOverflow thread](https://stackoverflow.com/questions/25277457/google-chrome-redirecting-localhost-to-https/47714902#47714902){:target="_blank"}, I updated them to ".local" and magically, everything started working as expected.

I'm not entirely sure why or when this update occurred, but it seems to affect Chrome 63.

**Update (12/11/2017): **
I found [another article on StackOverflow](https://stackoverflow.com/questions/47735877/how-to-stop-chrome-from-redirecting-to-https){:target="_blank"} that helped outline the issue. Apparently Chrome v63 is no longer allowing certain top-level domains (TLDs) and will automatically forward those domains to HTTPS.