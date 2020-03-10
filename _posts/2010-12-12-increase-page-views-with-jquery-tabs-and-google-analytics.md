---
layout: post
title: Increase Page Views with jQuery Tabs and Google Analytics
date: 2010-12-12
image: "/assets/images/posts/computer.jpg"
---
If you're not in e-commerce, I'm sure most of you have seen a decrease in website traffic, due to the holidays.  By now, most web developers use <a href="http://www.google.com/analytics">Google Analytics</a> to monitor traffic, keywords and other metrics.  With a combination of Analytics and Webmaster Tools, I've been able to increase my web traffic significantly.

One thing I noticed however, was when I started implementing <a href="http://jqueryui.com/demos/tabs/">jQuery Tabs</a> into a website, I noticed that my overall traffic was decreasing slightly, and I began to wonder which pages were being viewed most.  Turns out, with the help of a coworker and <a href="http://code.google.com/apis/analytics/docs/tracking/asyncTracking.html">asynchronous code from Google</a>, we've been able to track "tab views".

I present.. the code:

<pre>
$(document).ready(function () {
  if ($("#tabs").length != 0){
    $("#tabs").bind("tabsselect",function(event,ui) {
      _gaq.push(['_trackPageview', window.location.pathname + '/' + ui.tab.innerHTML]);
    });
  }
});
</pre>

With this code, it will check to see if you have tabs, and if you've selected a tab, it feeds another page view into Google.

The output you will see in Google will be similar to: www.yourpage.com/about, with individual records for each tab title on the current page.