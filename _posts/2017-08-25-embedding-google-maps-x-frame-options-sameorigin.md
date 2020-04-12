---
layout: post
title: "Embedding Google Maps: 'X-Frame-Options' to 'sameorigin'"
date: 2017-08-25
image: /assets/images/posts/blog-map.webp
---
This past week, I came across something odd. I was building a real-estate website for a client and the client requested a Google Maps embed of specific property. Simple, right? Not entirely. I was able to locate the address and embed an iframe dynamically by using the following code:

```
<iframe width="100%" height="350" frameborder="0" style="border:0" src="http://maps.google.com/?q=<?php echo $address; ?>&output=embed" allowfullscreen></iframe>
```

However, when I'd refresh my browser, I kept getting two console errors:

<pre>Refused to display 'https://www.google.com/maps?q=The+Address' in a frame because it set 'X-Frame-Options' to 'sameorigin'.</pre>

and
<pre>Failed to load resource: net::ERR_BLOCKED_BY_RESPONSE</pre>

Hmm.. After some digging though, I found out all I had to do was append `&output=embed` at the end of the address and it'd magically work. So, the final embed now looks like this:

```
<iframe width="100%" height="350" frameborder="0" style="border:0" src="http://maps.google.com/?q=<?php echo $address; ?>&output=embed" allowfullscreen> </iframe>
```