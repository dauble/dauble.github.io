---
layout: post
title: "Private Email Address via Git Config"
date: 2022-11-26
image: /assets/images/posts/git-1.jpg
author: dauble
categories:
  - "git"
---

I'm constantly learning new things and most recently learned a little tidbit about a feature about Git, allowing for private email addresses during commits. Let's take a look.

The scenario is that I went to make a commit to a repo on a new computer. I hadn't set up my personal settings or configured my Git user.name or user.email settings yet, and Git warned me about it. My GitHub profile is set to private, and details about my repos are also private. When I was notified to update these settings, without thinking I entered my name and email address and saved the information to the global config. Live went on.

When I went to commit code later in the day, however, I was notified by Git that my personal email would be exposed, as it was tied to the commit history, thus violating my privacy settings, and ultimately refusing my commit. So what to do? I tried resetting my Git config but that didn't work. I didn't feel like uninstallling and reinstalling Git entirely from my system, so looked online for another solution. Enter, Tower.

For those of you who don't know about [Tower](https://www.git-tower.com/){:target="_blank"}, I want to start off and explain it's a fantastic tool for learning how to use Git and working with Git. It features a streamlined GUI for using version control and works flawlessly. I have zero complaints about the software, and have personally used it. The thing I like about Tower the most, though, is their "Git FAQ" section on their site. It provides clean, clear instructions on so many Git commands. I've stumbled across it numerous times. With the help of this [Tower article](https://www.git-tower.com/learn/git/faq/change-author-name-email){:target="_blank"}, I was able to run the following command to change the email address of my previous commit:

>git commit --amend --author="John Doe <john@doe.org>"

Now, the interesting point and back to the initial problem with Git. GitHub offers private no-reply email addresses for users wishing to keep their commits private. On the folling article on [GitHub's documentation](https://docs.github.com/en/account-and-profile/setting-up-and-managing-your-personal-account-on-github/managing-email-preferences/setting-your-commit-email-address){:target="_blank}, in Step 6, GitHub explains how to set up a private email forwarding address. Simply add your GitHub username and "@users.noreply.github.com" and emails will be forwarded to your private email address. Pretty neat, huh?

Once I changed my global Git config email address to the one above, I was able to push my commit and finish my work.

Header image credit: [Hostinger](https://www.hostinger.com/tutorials/basic-git-commands){:target="_blank"}