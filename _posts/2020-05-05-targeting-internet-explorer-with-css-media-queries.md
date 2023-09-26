---
layout: post
title: "Targeting Internet Explorer with CSS Media Queries"
date: 2020-05-05
banner:
  image: /assets/images/banners/ie-11-background.jpg
  opacity: .35
  background: "#000"
author: dauble
categories: [css]
tags: [ie, internet explorer, css]
---

I've been using CSS Grid and Flexbox for a little while now for different parts of websites. They work in all modern browsers and it saves me time from having to put together cheap hacks. One of the caveats to using Grid though is that older browsers such as IE10 and 11 don't fully support it.

On a recent build I had a section with four small boxes and a title. Normally I'd use Bootstrap's `.col-md-3` class, but since I am moving away from Bootstrap alltogether, I was faced with another challenge.

Typically I support browsers back two versions, so I'm still supporting IE10/11. Although many of Grid/Flexbox's capabilities work, there are some legacy specs that need to be used for them to work properly.

The most useful though is an IE-only media query, so it doesn't break other styles. Take a look:

>@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
>  /* IE specific queries here */
>}

And that's it! When using this media query, it is important to note you can't simply but styles in the brackets. You must define the class and then styles. Below is a sample of my implemenation.

>@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
>  .callout__container {
>    margin: 0 1em;
>
>    &:first-of-type {
>      margin: 0 1em 0 0;
>    }
>
>    &:last-of-type {
>      margin: 0 0 0 1em;
>    }
>  }
>}

I hope this helps!