# Development Guide

This guide provides detailed information for developers working on this Jekyll-based website.

## 📋 Table of Contents

- [Jekyll Configuration](#jekyll-configuration)
- [Theme and Styling](#theme-and-styling)
- [Content Management](#content-management)
- [Working with Collections](#working-with-collections)
- [Custom Liquid Filters](#custom-liquid-filters)
- [Asset Management](#asset-management)
- [Performance Optimization](#performance-optimization)
- [Troubleshooting](#troubleshooting)

## ⚙️ Jekyll Configuration

### Understanding _config.yml

The `_config.yml` file contains the main configuration for the Jekyll site. Key configurations include:

```yaml
# Site metadata
title: "Indianapolis Web Developer"
email: info@davidauble.com
description: >-
  Site description for SEO

# URL configuration
baseurl: "/"
url: "https://davidauble.com"

# GitHub integration
github_username: dauble

# Plugins
plugins:
  - jekyll-feed      # RSS/Atom feed generation
  - jekyll-sitemap   # Automatic sitemap.xml
  - jekyll-seo-tag   # SEO meta tags

# LiveReload for development
livereload: true

# Collections configuration
collections:
  posts:
    output: true
  categories:
    output: true

# Permalink structure
permalink: /:year/:month/:day/:title:output_ext

# SASS configuration
sass:
  sass_dir: _sass
  style: compressed  # Minifies CSS in production
```

### Modifying Configuration

**Important**: After changing `_config.yml`, you must restart the Jekyll server:

```bash
# Stop the current server (Ctrl+C)
# Then restart
bundle exec jekyll serve
```

Most other files (layouts, includes, posts) are watched automatically and don't require a restart.

## 🎨 Theme and Styling

### SCSS Architecture

The site uses SCSS for styling with the following structure:

```
_sass/
├── _variables.scss    # Color schemes, fonts, breakpoints
├── _mixins.scss       # Reusable SCSS functions
├── _base.scss         # Base HTML element styles
├── _layout.scss       # Layout and grid styles
├── _components.scss   # Component-specific styles
└── _utilities.scss    # Utility classes
```

### Adding Custom Styles

1. Edit existing SCSS files in `_sass/` directory
2. Or create a new partial and import it in the main stylesheet
3. Use existing variables for consistency:

```scss
// Example: Using existing variables
.custom-section {
  background-color: $primary-color;
  padding: $spacing-large;
  
  @include media-query($on-tablet) {
    padding: $spacing-small;
  }
}
```

### Responsive Design

The site uses a mobile-first approach with these breakpoints:

- **Mobile**: < 768px
- **Tablet**: 768px - 1024px
- **Desktop**: > 1024px

Example responsive styles:

```scss
.hero-background {
  font-size: 1rem;
  
  @media (min-width: 768px) {
    font-size: 1.25rem;
  }
  
  @media (min-width: 1024px) {
    font-size: 1.5rem;
  }
}
```

## 📝 Content Management

### Blog Posts

#### Creating a New Post

1. Create a file in `_posts/` with the format: `YYYY-MM-DD-title-slug.md`

2. Add required front matter:

```yaml
---
layout: post
title: "Your Post Title"
date: 2026-01-01
image: /assets/images/posts/featured-image.jpg
author: dauble
categories:
  - "web-development"
  - "tutorial"
---

Your content here in Markdown format...
```

#### Front Matter Fields

| Field | Required | Description |
|-------|----------|-------------|
| `layout` | Yes | Use `post` for blog posts |
| `title` | Yes | Post title (used in SEO) |
| `date` | Yes | Publication date (YYYY-MM-DD) |
| `image` | Yes | Featured image path |
| `author` | Yes | Author username |
| `categories` | No | Array of categories |

#### Content Guidelines

- Use Markdown syntax for formatting
- Include a clear introduction paragraph
- Use heading hierarchy (h2, h3, h4)
- Add code blocks with language specification:
  ````markdown
  ```javascript
  const example = "code";
  ```
  ````
- Optimize images before adding them (recommend < 200KB)
- Add alt text to images for accessibility

### Static Pages

Static pages (like the homepage) are in the root directory:

- `index.html` - Homepage
- `blog.html` - Blog listing page
- `categories.html` - Categories listing
- `404.html` - Error page

Each uses a layout from `_layouts/` and can include components from `_includes/`.

## 📚 Working with Collections

### Posts Collection

Posts are automatically collected from the `_posts/` directory. Access them in templates:

```liquid
{% for post in site.posts %}
  <h2>{{ post.title }}</h2>
  <p>{{ post.excerpt }}</p>
  <a href="{{ post.url }}">Read more</a>
{% endfor %}
```

### Filtering Posts

```liquid
{% assign featured_posts = site.posts | where: "featured", true %}
{% for post in featured_posts limit:3 %}
  <!-- Display featured post -->
{% endfor %}
```

### Categories Collection

Categories are defined in `_category/` directory. Each category has:

```yaml
---
layout: category
title: "Category Name"
category: category-slug
---
```

Access all posts in a category:

```liquid
{% assign category_posts = site.categories[page.category] %}
```

## 🔧 Custom Liquid Filters

### Available Filters

Jekyll includes many built-in filters. Commonly used in this project:

```liquid
<!-- Date formatting -->
{{ post.date | date: "%B %d, %Y" }}

<!-- String manipulation -->
{{ post.title | upcase }}
{{ post.content | strip_html | truncatewords: 50 }}

<!-- URL handling -->
{{ "/about" | relative_url }}
{{ post.url | absolute_url }}

<!-- Array operations -->
{{ site.posts | where: "featured", true | first }}
{{ site.categories | sort }}
```

### Creating Custom Filters

To add custom filters, create a plugin in `_plugins/` directory:

```ruby
# _plugins/custom_filters.rb
module Jekyll
  module CustomFilters
    def custom_filter(input)
      # Your custom logic
      input.upcase
    end
  end
end

Liquid::Template.register_filter(Jekyll::CustomFilters)
```

**Note**: Custom plugins don't work with GitHub Pages. Use only if self-hosting.

## 🖼 Asset Management

### Images

Store images in organized subdirectories:

```
assets/images/
├── posts/          # Blog post featured images
├── logos/          # Company and client logos
└── icons/          # Icons and small graphics
```

Best practices:
- Use descriptive filenames: `getting-started-github-actions.jpg`
- Optimize images (use tools like ImageOptim or TinyPNG)
- Provide multiple sizes for responsive images
- Use appropriate formats (JPEG for photos, PNG for graphics, SVG for icons)

### JavaScript

JavaScript files are in `assets/scripts/`:

- Keep scripts modular and well-commented
- Minimize dependencies
- Consider loading scripts asynchronously:

```html
<script src="/assets/scripts/main.js" async></script>
```

### Fonts

Web fonts are in `assets/fonts/`:

- Use WOFF2 format for best compression
- Include font-display: swap for better performance
- Subset fonts to include only needed characters

## ⚡ Performance Optimization

### Build Optimization

1. **Compress SASS**: Already configured in `_config.yml`
   ```yaml
   sass:
     style: compressed
   ```

2. **Minimize Images**: Before adding images to the repo
   ```bash
   # Using imagemagick
   convert input.jpg -quality 85 -strip output.jpg
   ```

3. **Limit Collections**: Only generate what's needed
   ```yaml
   collections:
     posts:
       output: true
   ```

### Page Speed

- Enable gzip compression (handled by GitHub Pages)
- Use lazy loading for images below the fold
- Minimize HTTP requests
- Use CDN for external libraries (Font Awesome, jQuery)

### SEO Optimization

The site uses `jekyll-seo-tag` plugin. Ensure each page has:

```yaml
---
title: "Page Title"
description: "Page description for search engines"
image: /path/to/social-share-image.jpg
---
```

## 🐛 Troubleshooting

### Common Issues

#### Jekyll Won't Start

**Error**: `Could not find gem 'jekyll'`

**Solution**:
```bash
bundle install
```

---

**Error**: `Port 4000 already in use`

**Solution**:
```bash
# Kill process on port 4000
lsof -ti:4000 | xargs kill -9

# Or use a different port
bundle exec jekyll serve --port 4001
```

#### Build Errors

**Error**: `Liquid syntax error`

**Solution**: Check for unclosed Liquid tags in templates:
```liquid
{% if condition %}
  <!-- content -->
{% endif %}  <!-- Don't forget to close! -->
```

---

**Error**: `Invalid date`

**Solution**: Ensure post filenames and front matter dates match format `YYYY-MM-DD`

#### Styling Not Updating

**Issue**: CSS changes not appearing

**Solutions**:
1. Hard refresh browser (Ctrl+Shift+R or Cmd+Shift+R)
2. Clear browser cache
3. Check SCSS syntax for errors
4. Verify SCSS file is imported in main stylesheet

#### LiveReload Not Working

**Solutions**:
1. Ensure LiveReload extension is installed and enabled
2. Check that `livereload: true` is in `_config.yml`
3. Restart Jekyll server
4. Try a different browser

### Debugging Tips

1. **Check Jekyll Output**: Watch the terminal for build errors
2. **Use Jekyll Doctor**: Check for issues
   ```bash
   bundle exec jekyll doctor
   ```
3. **Validate HTML**: Use W3C validator
4. **Check Browser Console**: Look for JavaScript errors
5. **Verbose Mode**: Get detailed build information
   ```bash
   bundle exec jekyll serve --verbose
   ```

### Getting Help

If you're stuck:

1. Check the [Jekyll Documentation](https://jekyllrb.com/docs/)
2. Search [Jekyll Talk Forum](https://talk.jekyllrb.com/)
3. Review [GitHub Pages Documentation](https://docs.github.com/en/pages)
4. Open an issue in this repository

## 📚 Additional Resources

- [Jekyll Documentation](https://jekyllrb.com/docs/)
- [Liquid Template Language](https://shopify.github.io/liquid/)
- [SASS Documentation](https://sass-lang.com/documentation)
- [GitHub Pages Documentation](https://docs.github.com/en/pages)
- [Markdown Guide](https://www.markdownguide.org/)

---

Happy coding! 🚀
