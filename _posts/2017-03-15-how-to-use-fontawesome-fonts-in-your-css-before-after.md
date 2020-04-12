---
layout: post
title: "How To: Use FontAwesome Fonts in Your CSS :before & :after"
date: 2017-03-15
image: /assets/images/posts/code.webp
---
I've been a fan of [FontAwesome](http://fontawesome.io/){:target="_blank"} for a long time. I admire their work and appreciate everything they do for fonts, icons and making websites and web apps more user-friendly.

Often, I come across instances where I need to use their icons in my CSS and I am constantly forgetting how to use them in CSS. Below are the steps in case you're as forgetful as I am. (Don't forget to include the fonts in your header!)

1.  Find the font you want on their collection
2.  Copy the Unicode code (ie, f10d)
3.  Use the following CSS:

<pre>:before { font-family: "FontAwesome"; content: "\f10d"; }</pre>

You may need to adjust other properties, such as color and position, but this is the process. And, in case you're wanting to incorporate them into a design, follow these steps:

1.  Download the font collection from [GitHub](https://github.com/FortAwesome/Font-Awesome){:target="_blank"}
2.  Find the font you want to use on the [FontAwesome Cheatsheet](http://fontawesome.io/cheatsheet/){:target="_blank"}
3.  Copy the icon character you wish and paste it into your design
4.  Change the font to FontAwesome and voila!