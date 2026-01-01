# Architecture Overview

This document provides a high-level overview of the website architecture and how different components work together.

## 🏗 System Architecture

```
┌─────────────────────────────────────────────────────────────┐
│                        GitHub Repository                     │
│  ┌─────────────────────────────────────────────────────┐   │
│  │  Source Files (Markdown, SCSS, Liquid Templates)    │   │
│  └─────────────────────────────────────────────────────┘   │
│                            ↓                                 │
│  ┌─────────────────────────────────────────────────────┐   │
│  │         GitHub Actions (pages-build-deployment)      │   │
│  │              - Installs Jekyll & Dependencies        │   │
│  │              - Processes Liquid Templates            │   │
│  │              - Compiles SCSS to CSS                  │   │
│  │              - Generates Static HTML                 │   │
│  └─────────────────────────────────────────────────────┘   │
│                            ↓                                 │
│  ┌─────────────────────────────────────────────────────┐   │
│  │           GitHub Pages Hosting (_site/)              │   │
│  │              - Static HTML, CSS, JS                  │   │
│  │              - Images and Assets                     │   │
│  │              - Sitemap & RSS Feed                    │   │
│  └─────────────────────────────────────────────────────┘   │
└─────────────────────────────────────────────────────────────┘
                            ↓
                     GitHub Pages CDN
                            ↓
                   Custom Domain (davidauble.com)
                            ↓
                        End Users
```

## 📦 Component Layers

### 1. Content Layer

**Purpose**: Store and organize content

**Components**:
- `_posts/`: Blog post content in Markdown
- `_category/`: Category definitions
- `_data/`: Structured data (navigation, metadata)
- Static pages: `index.html`, `blog.html`, etc.

**Technology**: Markdown, YAML front matter

### 2. Presentation Layer

**Purpose**: Define how content is displayed

**Components**:
- `_layouts/`: Page templates (default, post, blog)
- `_includes/`: Reusable components (header, footer, navigation)
- `_sass/`: SCSS stylesheets
- `assets/`: Images, fonts, JavaScript

**Technology**: Liquid templates, SCSS, JavaScript

### 3. Build Layer

**Purpose**: Transform source files into static website

**Components**:
- Jekyll static site generator
- Ruby gems and plugins
- SASS compiler
- Liquid template engine

**Technology**: Jekyll 4.4.1, Ruby

### 4. Deployment Layer

**Purpose**: Publish and serve the website

**Components**:
- GitHub Actions workflows
- GitHub Pages hosting
- CDN (Content Delivery Network)
- Custom domain DNS

**Technology**: GitHub Pages, GitHub Actions

## 🔄 Data Flow

### Page Generation Flow

1. **Content Creation**
   - Author writes Markdown post with front matter
   - Commits to `_posts/` directory

2. **Template Processing**
   - Jekyll reads post front matter
   - Selects appropriate layout from `_layouts/`
   - Includes components from `_includes/`

3. **Data Injection**
   - Liquid processes variables (e.g., `{{ page.title }}`)
   - Loops through collections (e.g., `{% for post in site.posts %}`)
   - Applies filters (e.g., `{{ post.date | date: "%B %d, %Y" }}`)

4. **Style Compilation**
   - SCSS files compiled to CSS
   - Variables and mixins processed
   - Output compressed for production

5. **HTML Generation**
   - Markdown converted to HTML
   - Templates rendered with content
   - Final HTML pages created in `_site/`

### Asset Pipeline

```
Source SCSS → SASS Compiler → Compressed CSS → _site/assets/css/
Images → Optimization (manual) → Copy → _site/assets/images/
JavaScript → Copy → _site/assets/scripts/
```

## 🧩 Key Patterns

### Template Inheritance

```
default.html (base layout)
    ↓
post.html (extends default)
    ↓
Individual post (uses post layout)
```

### Component Composition

```
Page Layout
  ├── {% include header.html %}
  ├── Main Content
  └── {% include footer.html %}
```

### Collection Processing

```yaml
# _config.yml
collections:
  posts:
    output: true  # Generates individual pages
```

```liquid
# In templates
{% for post in site.posts %}
  <!-- Access post data -->
{% endfor %}
```

## 🔐 Security Architecture

### Static Site Benefits

- **No Server-Side Code**: Eliminates server vulnerabilities
- **No Database**: No SQL injection risks
- **No User Input**: Minimal XSS attack surface
- **Automated Updates**: GitHub manages infrastructure

### Security Layers

1. **GitHub Repository**
   - Access controls and permissions
   - Branch protection rules
   - Required reviews (if configured)

2. **CodeQL Scanning**
   - Automated security analysis
   - Vulnerability detection
   - Regular security updates

3. **HTTPS**
   - Automatic SSL/TLS via GitHub Pages
   - Certificate managed by GitHub
   - Enforced HTTPS redirect

4. **Content Security**
   - Input sanitization in build process
   - No dynamic code execution
   - Static asset serving only

## ⚡ Performance Architecture

### Build-Time Optimization

- **SASS Compression**: CSS minified during build
- **Asset Compilation**: Preprocessed at build time
- **Static Generation**: No runtime processing

### Runtime Optimization

- **CDN Delivery**: GitHub Pages uses CDN
- **Browser Caching**: Static assets cached
- **Compressed Transfer**: Gzip/Brotli compression
- **Lazy Loading**: Images loaded as needed (where implemented)

### Performance Metrics

- **First Contentful Paint**: < 1s (target)
- **Time to Interactive**: < 2s (target)
- **Lighthouse Score**: 90+ (target)

## 🗂 File Organization

### Separation of Concerns

```
Content         → _posts/, _category/, _data/
Presentation    → _layouts/, _includes/, _sass/
Configuration   → _config.yml, Gemfile
Assets          → assets/images/, assets/scripts/
Output          → _site/ (generated, not committed)
Documentation   → README.md, docs/
```

### Naming Conventions

- **Posts**: `YYYY-MM-DD-title-slug.md`
- **Layouts**: `lowercase.html`
- **Includes**: `lowercase.html`
- **SCSS**: `_partialname.scss`
- **Data**: `lowercase.yml` or `.json`

## 🔌 Plugin Architecture

### Installed Plugins

1. **jekyll-feed**
   - Generates RSS/Atom feed
   - Automatic based on posts
   - Output: `feed.xml`

2. **jekyll-sitemap**
   - Creates XML sitemap
   - Automatic crawling
   - Output: `sitemap.xml`

3. **jekyll-seo-tag**
   - Adds meta tags
   - Open Graph tags
   - Twitter Card tags

### Plugin Limitations

GitHub Pages supports only [approved plugins](https://pages.github.com/versions/). Custom plugins require:
- Self-hosting, or
- Pre-building site locally

## 🌐 URL Structure

### Permalink Pattern

Configured in `_config.yml`:
```yaml
permalink: /:year/:month/:day/:title:output_ext
```

### URL Examples

- Homepage: `/`
- Blog listing: `/blog.html`
- Blog post: `/2024/02/28/getting-started-github-actions.html`
- Categories: `/categories.html`
- 404 error: `/404.html`

## 📊 Site Generation Process

### Build Sequence

1. Read `_config.yml`
2. Load plugins
3. Process data files (`_data/`)
4. Read collections (`_posts/`, `_category/`)
5. Process layouts and includes
6. Compile SCSS to CSS
7. Generate pages from templates
8. Copy static assets
9. Create sitemap and feed
10. Write to `_site/` directory

### Build Time

- **Local development**: 1-2 seconds (incremental)
- **Production build**: 5-10 seconds (full)
- **GitHub Pages**: 20-60 seconds (includes deployment)

## 🔍 Monitoring & Logging

### Available Metrics

- **Build Status**: GitHub Actions logs
- **Deployment Status**: GitHub Pages dashboard
- **Traffic**: GitHub Insights (if enabled)
- **Performance**: Browser DevTools, Lighthouse

### Error Tracking

- Build errors: GitHub Actions logs
- Runtime errors: Browser console
- Link errors: Manual checking or tools

## 🚀 Scalability Considerations

### Current Scale

- ~33 blog posts
- Multiple categories
- Images and assets
- Build time: < 10 seconds

### Scaling Strategies

If the site grows significantly:

1. **Pagination**: Limit posts per page
2. **Asset Optimization**: Compress images, use CDN
3. **Lazy Loading**: Defer non-critical resources
4. **Incremental Builds**: Jekyll 4.x feature
5. **Search**: Consider static search (e.g., Lunr.js)

## 📚 Technology Stack Summary

| Layer | Technology | Purpose |
|-------|-----------|---------|
| Content | Markdown, YAML | Write posts and data |
| Templates | Liquid | Dynamic templating |
| Styling | SCSS | Stylesheets |
| Build | Jekyll 4.4.1 | Static site generation |
| Hosting | GitHub Pages | Web hosting |
| CI/CD | GitHub Actions | Automated deployment |
| Security | CodeQL | Security scanning |
| SEO | jekyll-seo-tag | Search optimization |

## 🔗 Integration Points

### External Services

- **GitHub**: Version control and hosting
- **Font Awesome**: Icon library (CDN)
- **Google Fonts**: Web fonts (if used)
- **Social Media**: Share buttons, embeds

### Internal APIs

Jekyll provides Liquid objects:
- `site`: Site-wide data and configuration
- `page`: Current page data
- `post`: Post data in post context
- `content`: Rendered content

## 🛠 Development vs Production

### Development Mode

```bash
bundle exec jekyll serve
```

- Incremental builds
- LiveReload enabled
- Verbose errors
- Draft posts visible (if configured)

### Production Mode

```bash
bundle exec jekyll build
```

- Full site rebuild
- Optimized output
- Compressed assets
- No draft posts

## 📖 Further Reading

- [Jekyll Architecture](https://jekyllrb.com/docs/structure/)
- [Liquid Template Language](https://shopify.github.io/liquid/)
- [GitHub Pages Docs](https://docs.github.com/en/pages)
- [Static Site Generators Overview](https://www.staticgen.com/)

---

This architecture supports a fast, secure, and maintainable personal website and blog.
