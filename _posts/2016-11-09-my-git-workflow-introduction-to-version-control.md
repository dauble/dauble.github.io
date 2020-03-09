---
layout: post
title: "My Git Workflow: Introduction to Version Control"
date: 2016-11-09
image: "/assets/images/posts/workflow.png"
---
## Git: What is it?

Git is a free and open source distributed version control system designed to handle everything from small to massive projects with speed and efficiency. In layman’s terms, it’s a way to store versions of code that can be managed easily and effortlessly. Git stores revision history in forms of hashes; it does not store files, rather hashes of files to save space and improve speed.

## How do I get started?

Projects must be initialized by the following code:

> git init

This creates a hidden folder “.git” in your working directory. This must not be removed!

## What are some commands?

Whenever you want to make a change, there are a few commands that you’ll need to learn. They are:

> git pull

This grabs the latest versions of the files in the repository.

> git status

This gets the status of the files contained within your project and shows which files have been altered, or “unstaged.”

> git add .

This adds all modified, or “unstaged,” files to the current commit.

> git commit –am “This is a message about the code I’m committing”

This commits all changes to the repository with a descriptive message saying what’s been changed.

> git merge –no-ff “Fix merge conflicts”

Used in branching, this will merge your branch into another trunk.

> git push

This pushes the last commit into the repo for others to grab.

### That’s a ton. This looks like command line code...right?

Yes! Although you can use Git with a GUI program, it’s faster and easier to use it though a command line program, Git Bash. [**<u>https://git-scm.com/downloads</u>**](https://git-scm.com/downloads)

## Getting Started – Cloning a Repo

Getting started is simple. The first step is to clone the repository.

> git clone https://your_repo_url/your_project_name.git

This will copy all files in the repo to your local machine so you can make changes.

## The Git Workflow

### “Branching” – What is that?

Branching is a term that will clone the base “trunk” (or Master code version), allowing a developer to make changes. Once all changes have been made, the developer will then commit his code, then merge it into one of two branches: **Master** or **Development**.

### Why two branches?

Most projects have two environments: **Production** and **Staging**. The **Master** branch reflects code that has been reviewed and is ready to be pushed to **Production**, while code that is ready to be reviewed is merged into **Development**. Developers should **NEVER** work from the Master branch. Instead, they should check out the branch, pull the latest changes, and then check out a new branch. You can name your branch whatever you’d like, however it should follow a naming convention and describe what you’re going to be modifying. For example:

> **hotfix-branch-name**

This will describe a quick fix – like a spelling error, color change, link style, etc.

> **feature-branch-name**

This should be used to describe a new module, feature or other large addition to the code. An example would be adding a new section or adding a new site search.

### What does a typical branching workflow look like?

Simple! With branching, making an update couldn’t be easier.

> git checkout master git pull git checkout  -b feature-add-tracking-scripts _..make changes.._ git status git add . git commit – am “Added tracking scripts to site” git checkout dev git pull git merge –no-ff feature-add-tracking-scripts git push Once this new addition has been approved, simply: git checkout master git pull git merge –no-ff feature-add-tracking-scripts git push

### I got a merge conflict. What do I do?

These are fairly common when working with multiple branches. This just means there is newer code in the repository than what you have on your machine. Git is intelligent and will tell you which files have conflicts. In our new build lifecycle, most of the time conflicts will arise in the stylesheets or JavaScript files. Simply rebuild and you’re good!

## Next Steps

**_No more coding on the fly. No more working directly off the FTP server._** If changes are made on the fly or by working directly off the FTP server and are not stored in Git, they will be overwritten the next time a change is made using Git. It is important that once implemented, all changes be run through Git.