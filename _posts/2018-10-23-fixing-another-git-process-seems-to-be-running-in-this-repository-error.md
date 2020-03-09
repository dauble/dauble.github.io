---
layout: post
title: "Fixing 'Another git process seems to be running in this repository' Error in Git"
date: 2018-10-23
image: /assets/images/posts/code.jpg
---
I sometimes come across a unique error when using Git and always have to look up how to fix the error. It's a simple error and can be replicated by stopping a Git command before it's finished. Git in turn generates a "index.lock" file, which prevents you from adding any additional files to the commit. The error message I usually receive in full is:

> Another git process seems to be running in this repository, e.g. an editor opened by 'git commit'. Please make sure all processes are terminated then try again. If it still fails, a git process may have crashed in this repository earlier: remove the file manually to continue.

The fix is simple: remove the "**git.lock**" file in the "/.git/" directory.

<pre class="EnlighterJSRAW" data-enlighter-language="null">rm -f .git/index.lock</pre>

[Credit: StackOverflow](https://stackoverflow.com/questions/38004148/another-git-process-seems-to-be-running-in-this-repository)