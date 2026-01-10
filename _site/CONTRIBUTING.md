# Contributing to David Auble's Website

Thank you for your interest in contributing to this project! This document provides guidelines and instructions for contributing.

## 📋 Table of Contents

- [Code of Conduct](#code-of-conduct)
- [How Can I Contribute?](#how-can-i-contribute)
- [Development Process](#development-process)
- [Style Guidelines](#style-guidelines)
- [Commit Message Guidelines](#commit-message-guidelines)
- [Pull Request Process](#pull-request-process)

## 📜 Code of Conduct

This project adheres to a Code of Conduct that all contributors are expected to follow. Please read [CODE_OF_CONDUCT.md](CODE_OF_CONDUCT.md) before contributing.

## 🤔 How Can I Contribute?

### Reporting Bugs

If you find a bug, please create an issue with the following information:

- **Clear title and description**
- **Steps to reproduce** the issue
- **Expected behavior** vs **actual behavior**
- **Screenshots** if applicable
- **Environment details** (browser, OS, Ruby version, etc.)

### Suggesting Enhancements

Enhancement suggestions are welcome! Please create an issue with:

- **Clear description** of the enhancement
- **Use case** explaining why this would be useful
- **Possible implementation** if you have ideas

### Fixing Typos and Documentation

Small fixes like typos and documentation improvements can be submitted directly as pull requests.

### Contributing Blog Content

This is a personal blog, so new blog posts should come from the repository owner. However, you can:

- Suggest topics via issues
- Report errors in existing posts
- Improve post formatting or code examples

## 💻 Development Process

### Setting Up Your Development Environment

1. **Fork the repository** on GitHub

2. **Clone your fork** locally:
   ```bash
   git clone https://github.com/YOUR-USERNAME/dauble.github.io.git
   cd dauble.github.io
   ```

3. **Add upstream remote**:
   ```bash
   git remote add upstream https://github.com/dauble/dauble.github.io.git
   ```

4. **Install dependencies**:
   ```bash
   bundle install
   ```

5. **Create a branch** for your changes:
   ```bash
   git checkout -b feature/your-feature-name
   ```

### Running the Development Server

Start Jekyll with live reload:

```bash
bundle exec jekyll serve
```

Visit `http://localhost:4000` to see your changes.

### Making Changes

1. Make your changes in your feature branch
2. Test thoroughly in your local environment
3. Ensure the site builds without errors:
   ```bash
   bundle exec jekyll build
   ```
4. Commit your changes (see commit guidelines below)

### Staying Up to Date

Keep your fork synchronized with the upstream repository:

```bash
git fetch upstream
git checkout master
git merge upstream/master
```

## 🎨 Style Guidelines

### HTML/Liquid Templates

- Use consistent indentation (2 spaces)
- Keep Liquid tags readable with proper spacing
- Comment complex logic
- Use semantic HTML5 elements
- Ensure accessibility (alt tags, ARIA labels, etc.)

**Example:**
```liquid
{% if page.title %}
  <h1>{{ page.title }}</h1>
{% endif %}
```

### CSS/SCSS

- Follow existing SCSS structure in `_sass` directory
- Use BEM (Block Element Modifier) naming convention where applicable
- Keep selectors specific but not overly nested (max 3 levels)
- Comment complex styles
- Use variables for colors, fonts, and repeated values

**Example:**
```scss
.hero-background {
  background-size: cover;
  
  &__contain {
    padding: 2rem;
    
    &__title {
      font-size: 2.5rem;
      color: $primary-color;
    }
  }
}
```

### JavaScript

- Use ES6+ features when appropriate
- Keep functions small and focused
- Comment non-obvious code
- Follow consistent naming conventions (camelCase for variables/functions)
- Avoid global variables when possible

### Markdown (Blog Posts)

- Use proper heading hierarchy (h1 for title, h2 for sections, etc.)
- Add blank lines between elements for readability
- Use code blocks with language specification:
  ````markdown
  ```javascript
  const example = "code";
  ```
  ````
- Optimize images before including them
- Use descriptive link text (avoid "click here")

### Front Matter

Required fields for blog posts:

```yaml
---
layout: post
title: "Your Post Title"
date: YYYY-MM-DD
image: /assets/images/posts/your-image.jpg
author: dauble
categories:
  - "category1"
  - "category2"
---
```

## 📝 Commit Message Guidelines

Write clear, concise commit messages that explain **what** changed and **why**.

### Format

```
<type>: <short summary>

<optional detailed description>

<optional footer>
```

### Types

- **feat**: A new feature
- **fix**: A bug fix
- **docs**: Documentation changes
- **style**: Code style changes (formatting, missing semicolons, etc.)
- **refactor**: Code refactoring without changing functionality
- **test**: Adding or updating tests
- **chore**: Maintenance tasks, dependency updates, etc.

### Examples

```
feat: add dark mode toggle to navigation

Implements a dark mode toggle button in the navigation bar that saves
the user's preference to localStorage.
```

```
fix: correct image path in latest blog post

The featured image was using an incorrect path, causing it to not display.
Updated to use the correct /assets/images/posts/ path.
```

```
docs: update installation instructions in README

Added missing steps for installing Ruby on Windows and clarified
the bundle install process.
```

## 🔄 Pull Request Process

### Before Submitting

1. **Test thoroughly**: Ensure your changes work as expected
2. **Build successfully**: Run `bundle exec jekyll build` without errors
3. **Update documentation**: If you changed functionality, update relevant docs
4. **Follow style guidelines**: Ensure your code matches the project style
5. **One feature per PR**: Keep pull requests focused on a single change

### Submitting Your Pull Request

1. **Push your branch** to your fork:
   ```bash
   git push origin feature/your-feature-name
   ```

2. **Open a pull request** on GitHub with:
   - **Clear title** describing the change
   - **Description** explaining what changed and why
   - **Screenshots** if the change affects visual elements
   - **Testing notes** explaining how you tested the changes
   - **Related issues** (e.g., "Fixes #123")

3. **Respond to feedback**: Be open to discussion and make requested changes

### Pull Request Template

```markdown
## Description
Brief description of what this PR does.

## Type of Change
- [ ] Bug fix
- [ ] New feature
- [ ] Documentation update
- [ ] Code refactoring
- [ ] Other (please describe)

## Testing
Describe how you tested these changes.

## Screenshots (if applicable)
Add screenshots to help explain your changes.

## Checklist
- [ ] My code follows the style guidelines
- [ ] I have tested my changes locally
- [ ] The site builds without errors
- [ ] I have updated documentation if needed
- [ ] My commit messages are clear and descriptive
```

## ⚠️ Important Notes

### What Gets Reviewed

- Code quality and adherence to style guidelines
- Functionality and correctness
- Documentation completeness
- Commit message quality
- Test coverage (if applicable)

### Response Time

This is a personal project maintained by one person. Please be patient:

- Issues will be reviewed within a few days
- Pull requests may take a week or more to review
- Complex changes may require more discussion

### Acceptance Criteria

Not all contributions can be accepted. Changes must:

- Align with the project's goals and vision
- Maintain code quality and consistency
- Not break existing functionality
- Be properly documented
- Pass all checks and builds

## 🆘 Getting Help

If you need help or have questions:

1. **Check existing issues** to see if your question was already answered
2. **Review the documentation** in README.md
3. **Open a new issue** with the "question" label
4. **Be specific** about what you're trying to do and what problems you're facing

## 🙏 Thank You!

Your contributions help make this project better. Whether you're fixing a typo, reporting a bug, or proposing a major feature, your effort is appreciated!

---

*This contributing guide is adapted from best practices in open source projects.*
