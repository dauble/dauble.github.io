---
layout: post
title: "How to Fix Common WordPress Errors"
date: 2017-08-16
image: /assets/images/posts/stop.jpg
---
WordPress sites are usually straight-forward and not too complicated to build. However, when you start building your own themes and really digging into the core, you're bound to run into a few issues. The most common issues are oftentimes the easiest to troubleshoot. This list should help you solve the most common WordPress errors.

1.**WP_DEBUG**
By enabling WP_DEBUG in your wp-config.php file, you're able to see what WordPress is doing behind the scenes. This is my go-to solution for most issues I encounter. Is the footer suddenly missing? Maybe you've forgotten to close a loop. Part of an included template missing? Maybe there's an error in the embedded template causing it to not display. To call this function, simply:

```<?php define('WP_DEBUG', true'); ?>```

2.**PHP memory**
Sometimes I get an error when parsing through large amounts of records, or when trying to upload larger files through a post, page or custom post type. Generally, increasing the memory WordPress is allowed to use solves this problem. Add this to your wp-config.php file.

```<?php define( 'WP_MEMORY_LIMIT', '64M' ); ?>```

3.**Permalinks**
Sometimes a simple change affects how WordPress handles pages. Did you create a new custom post type that's not displaying? What about changing a category? Sometimes, setting up a new environment or deploying to Staging/Production will break a site. In these situations, it's best to reset the permalinks. To do so, in the WordPress admin area, click on **Settings** -> **Permalinks**. Then, choose your URL structure and click Save Changes.

4.**error_reporting();**
Maybe your problem is a little more complicated and using plain PHP. If **WP_DEBUG** isn't helpful enough, then it's time to use native error handling, built in to PHP. You have a few options. By setting **error_reporting(0)**, you're disabling all errors. Setting it to **E_ALL**, you'll notice you'll see all errors and warnings. There are other options, but these are the ones I use most often. Check out [PHP's documentation](http://php.net/manual/en/function.error-reporting.php) for more options.

5.**Plugins**
The most basic and simplest step, disabling all plugins. It's trivial determining which plugin is causing your site to break, however sometimes a plugin isn't compatible with your version of WordPress or another plugin. By enabling them one-by-one, you'll be able to determine which plugin is the culprit.