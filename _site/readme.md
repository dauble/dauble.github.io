# David Auble's Personal Website

[![pages-build-deployment](https://github.com/dauble/dauble.github.io/actions/workflows/pages/pages-build-deployment/badge.svg?branch=master)](https://github.com/dauble/dauble.github.io/actions/workflows/pages/pages-build-deployment) [![CodeQL](https://github.com/dauble/dauble.github.io/actions/workflows/github-code-scanning/codeql/badge.svg)](https://github.com/dauble/dauble.github.io/actions/workflows/github-code-scanning/codeql)

This is the source code for David Auble's personal website and blog, hosted at [davidauble.com](https://davidauble.com). The site showcases professional work, technical blog posts, and serves as a portfolio for web development services.

## 📋 Table of Contents

- [About](#about)
- [Technology Stack](#technology-stack)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Development](#development)
- [Deployment](#deployment)
- [Contributing](#contributing)
- [Security](#security)
- [License](#license)

## 🎯 About

This website is built using Jekyll, a static site generator, and is hosted on GitHub Pages. It features:

- **Professional Portfolio**: Showcasing web development services and experience
- **Technical Blog**: Articles about web development, WordPress, Jekyll, Git, and more
- **Responsive Design**: Mobile-friendly layout using Bootstrap grid system
- **SEO Optimized**: Using Jekyll SEO plugins for better search engine visibility
- **Performance**: Fast-loading static pages with optimized assets

## 🛠 Technology Stack

- **Static Site Generator**: [Jekyll 4.4.1](https://jekyllrb.com/)
- **Template Language**: Liquid
- **Styling**: SCSS/CSS
- **JavaScript**: Vanilla JS with jQuery
- **Icons**: Font Awesome
- **Hosting**: GitHub Pages
- **Domain**: Custom domain (davidauble.com)

### Jekyll Plugins

- `jekyll-feed`: Generates an Atom feed of your posts
- `jekyll-sitemap`: Automatically generates a sitemap.xml
- `jekyll-seo-tag`: Adds SEO metadata to pages

## 📦 Prerequisites

Before you begin, ensure you have the following installed:

- **Ruby** (version 2.7 or higher)
- **RubyGems**
- **GCC and Make** (for building native extensions)
- **Bundler** (Ruby dependency manager)

### Installing Ruby

#### macOS
```bash
# Using Homebrew
brew install ruby
```

#### Ubuntu/Debian
```bash
sudo apt-get install ruby-full build-essential zlib1g-dev
```

#### Windows
Download and install from [RubyInstaller](https://rubyinstaller.org/)

### Installing Bundler
```bash
gem install bundler
```

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/dauble/dauble.github.io.git
   cd dauble.github.io
   ```

2. **Install dependencies**
   ```bash
   bundle install
   ```
   
   This will install Jekyll and all required gems specified in the Gemfile.

## 💻 Usage

### Running the Development Server

Start the local development server with live reload:

```bash
bundle exec jekyll serve
```

The site will be available at: `http://localhost:4000`

### Using LiveReload

For automatic browser refresh when files are saved:

1. Install the [LiveReload Chrome extension](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei)
2. Enable the extension
3. Start the Jekyll server (LiveReload is enabled in `_config.yml`)
4. Make changes to your files and watch them update automatically

### Building the Site

To build the site for production without starting a server:

```bash
bundle exec jekyll build
```

The generated site will be in the `_site` directory.

## 📁 Project Structure

```
dauble.github.io/
├── _category/          # Category pages
├── _data/              # Data files (navigation, posts metadata)
│   ├── navigation.yml  # Site navigation structure
│   └── posts.json      # Posts metadata
├── _includes/          # Reusable HTML components
│   ├── footer.html     # Site footer
│   ├── header.html     # Site header
│   └── navigation.html # Navigation bar
├── _layouts/           # Page layouts
│   ├── blog.html       # Blog listing layout
│   ├── categories.html # Categories listing layout
│   ├── default.html    # Base layout
│   └── post.html       # Individual post layout
├── _posts/             # Blog posts (Markdown files)
│   └── YYYY-MM-DD-title.md
├── _sass/              # SCSS partials
├── _site/              # Generated static site (not committed)
├── assets/             # Static assets
│   ├── css/            # Compiled CSS
│   ├── fonts/          # Web fonts
│   ├── images/         # Images and graphics
│   └── scripts/        # JavaScript files
├── _config.yml         # Jekyll configuration
├── 404.html            # Custom 404 error page
├── blog.html           # Blog index page
├── categories.html     # Categories page
├── CNAME               # Custom domain configuration
├── Gemfile             # Ruby dependencies
├── index.html          # Homepage
└── README.md           # This file
```

### Key Files

- **_config.yml**: Main Jekyll configuration file. Contains site settings, plugins, and build options.
- **Gemfile**: Lists all Ruby gem dependencies for the project.
- **CNAME**: Specifies the custom domain for GitHub Pages.
- **.gitignore**: Files and directories excluded from version control.

## 🔧 Development

### Adding a New Blog Post

1. Create a new Markdown file in the `_posts` directory with the naming convention:
   ```
   YYYY-MM-DD-title-of-post.md
   ```

2. Add front matter at the top of the file:
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

3. Write your content in Markdown below the front matter.

4. Preview locally:
   ```bash
   bundle exec jekyll serve
   ```

### Working with Categories

Categories are defined in the front matter of each post. To add a new category page:

1. Create a new file in the `_category` directory
2. Use the category layout and specify the category name

### Customizing Styles

- SCSS files are located in the `_sass` directory
- Main CSS compilation is handled by Jekyll
- Changes are automatically compiled when running the development server

### Modifying Layouts

- Layouts are in the `_layouts` directory
- Includes (reusable components) are in the `_includes` directory
- Use Liquid template language for dynamic content

## 🚢 Deployment

This site is automatically deployed to GitHub Pages:

1. **Push to master branch**: Any push to the `master` branch triggers an automatic deployment
2. **GitHub Actions**: The deployment workflow is managed by GitHub Pages
3. **Live Site**: Changes appear at https://davidauble.com after a successful build

### Manual Deployment

The site deploys automatically, but you can verify the build locally:

```bash
bundle exec jekyll build
# Check the _site directory for the generated files
```

### Deployment Status

Check the deployment status using the badges at the top of this README or visit the [Actions tab](https://github.com/dauble/dauble.github.io/actions).

## 🤝 Contributing

Contributions are welcome! Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on the code of conduct and the process for submitting pull requests.

### Quick Guidelines

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 🔒 Security

Security is taken seriously. If you discover a security vulnerability, please review the [SECURITY.md](SECURITY.md) file for reporting procedures.

## 📄 License

This project represents David Auble's personal website and portfolio. While the code is publicly visible, all content, designs, and written materials are copyrighted. If you'd like to use any part of this project, please reach out for permission.

## 📞 Contact

- **Website**: [davidauble.com](https://davidauble.com)
- **Email**: info@davidauble.com
- **GitHub**: [@dauble](https://github.com/dauble)

## 🙏 Acknowledgments

- Built with [Jekyll](https://jekyllrb.com/)
- Hosted on [GitHub Pages](https://pages.github.com/)
- Icons by [Font Awesome](https://fontawesome.com/)

---

Made with ❤️ in Indianapolis
