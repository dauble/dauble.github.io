---
layout: post
title: "Get Page URL via JavaScript"
date: 2017-10-20
banner:
  image: "/assets/images/banners/new-code.jpg"
  opacity: .35
  background: "#000"
author: dauble
categories: [javascript]
tags: [javascript]
---
I come across this problem frequently and yet for some reason, can never remember how to get the URL of the current page via JavaScript.

At my job, we have several lead-generating sites that have opt-in forms to gather information. Each form has several hidden inputs that specify program names, information, thank you page URLs, etc. Sometimes, I have to change thank you URLs based on a selected value. I usually handle this in JavaScript, when I validate the form.

Since all of our sites are on HTTPS now and my local machine is not, I find it best to grab the protocol, domain and then follow with a trailing slash, that way I only have to specify the thank you page. I also don't have to change the code from HTTP to HTTPS based on the local, dev and production environments.

First, let's look at the location property of the window object:
<pre>location = {
  host: "stackoverflow.com",
  hostname: "stackoverflow.com",
  href: "http://stackoverflow.com/questions/2300771/jquery-domain-get-url",
  pathname: "/questions/2300771/jquery-domain-get-url",
  port: "",
  protocol: "http:"
}</pre>

We'll want to grab the "protocol" and "host" for the current page:
<pre>var $url = window.location.protocol + "//" + window.location.host + "/" + "thank-you/";
console.log("URL: " + $url);</pre>

And voila! Thanks to [this Stackoverflow post](https://stackoverflow.com/questions/2300771/jquery-domain-get-url){:target="_blank"} for helping with this solution.