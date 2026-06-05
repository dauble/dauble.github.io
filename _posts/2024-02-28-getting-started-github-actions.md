---
layout: post
title: "Getting Started with GitHub Actions"
date: 2024-02-28
image: /assets/images/posts/pexels-realtoughcandycom-11035544.jpg
author: dauble
categories: [github, development]
tags: [github]
---

GitHub Actions automates software workflows directly in your repository. You can run tests, build artifacts, deploy apps, and handle repetitive tasks whenever events happen in GitHub.

This quick guide covers the core concepts and a simple workflow you can adapt for your own projects.

## What is GitHub Actions?

GitHub Actions is GitHub's built-in CI/CD platform. Workflows are defined in YAML and triggered by repository events like pushes, pull requests, and issue activity.

## Setting up a Workflow

Create a `.github/workflows` directory at the root of your repository, then add a workflow file such as `test.yml`.

This example runs tests on pushes and pull requests to the `main` branch.

```yaml
# .github/workflows/test.yml

name: Run Tests

on:
  push:
    branches:
      - main
  pull_request:
    branches:
      - main

jobs:
  test:
    runs-on: ubuntu-latest

    steps:
      - name: Checkout repository
        uses: actions/checkout@v2

      - name: Set up Node.js
        uses: actions/setup-node@v3
        with:
          node-version: 14

      - name: Install dependencies
        run: npm install

      - name: Run tests
        run: npm test
```

This workflow defines a `test` job on Ubuntu, checks out code, sets up Node.js, installs dependencies, and runs tests. You can replace these steps with commands specific to your stack.

## Workflow Triggers

The `on` section controls when a workflow runs. In this example it triggers on:

- pushes to `main`
- pull requests targeting `main`

You can also trigger on schedules, tags, releases, and many other events.

## Actions Marketplace

The GitHub Marketplace includes many reusable actions for common tasks such as deployments, notifications, linting, and security checks.

For example, you can deploy to GitHub Pages after tests complete:

```yaml
- name: Deploy to GitHub Pages
  uses: JamesIves/github-pages-deploy-action@4.1.6
  with:
    branch: gh-pages
    folder: build
```

This action publishes the `build` directory to the `gh-pages` branch.

## Monitoring Workflow Runs

After pushing changes or opening pull requests, view run history in the repository's **Actions** tab. Each run includes per-step logs for debugging failed jobs.

## Conclusion

GitHub Actions can dramatically improve consistency and speed by automating repetitive work. Start with a small test workflow, then expand into build, release, and deployment pipelines as your process matures.

Once your first workflow is in place, you will have a reliable baseline you can iterate on with each project.

[Photo by RealToughCandy.com](https://www.pexels.com/photo/person-holding-a-black-and-white-paper-with-message-11035544/)

_This post was generated with the help of AI._
