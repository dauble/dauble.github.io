---
layout: post
title: "Using PHP to Determine Server Protocol"
date: 2018-11-05
image: /assets/images/posts/new-code.jpg
---
For various projects I build, I always have three environments: local, staging and production. On my staging and production environments, I have HTTPS enabled, but to keep things simple, I never set up HTTPS on my local environment. A lot of sites I build require forms that redirect the user to a thank you page, once the data is sent and processed to Salesforce. The redirect though requires an absolute path, so I cannot use something like "/contact/thank-you/". To accomplish this, I use this simple line in PHP to display the appropriate protocol, regardless of dev environment.

<pre>$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                $page_url = $protocol . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];</pre>

Then, in the form's retURL hidden input, I echo out the page URL:

`<input type="text" name="00NC00000067ygp" id="00NC00000067ygp" value="<?php echo $page_url; ?>">`