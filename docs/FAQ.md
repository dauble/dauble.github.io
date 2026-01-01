# Frequently Asked Questions (FAQ)

Common questions about this project and how to work with it.

## General Questions

### What is this project?

This is a personal website and blog built with Jekyll, a static site generator. It's hosted on GitHub Pages and serves as a portfolio and blogging platform for David Auble, an Indianapolis-based web developer.

### Why Jekyll?

Jekyll was chosen because it:
- Generates fast, secure static websites
- Integrates seamlessly with GitHub Pages
- Has a large community and ecosystem
- Supports Markdown for easy content creation
- Provides powerful templating with Liquid
- Is free and open source

### Can I use this code for my own website?

The code is publicly visible, but all content, designs, and written materials are copyrighted. If you'd like to use any part of this project for your own purposes, please contact the owner for permission. Consider using Jekyll themes or starting templates instead.

### How much does it cost to run this website?

- **Hosting**: Free (GitHub Pages)
- **Domain**: ~$15/year (davidauble.com)
- **SSL Certificate**: Free (provided by GitHub Pages)
- **Total**: ~$15/year

## Setup & Installation

### What operating systems are supported?

Jekyll works on:
- **macOS**: Full support
- **Linux**: Full support
- **Windows**: Supported (may require additional setup)

### Do I need to know Ruby?

Not really! You only need to:
- Install Ruby (one-time setup)
- Run `bundle install` to install dependencies
- Use `bundle exec jekyll serve` to run the site

You don't need to write Ruby code unless you want to create custom plugins.

### What if I don't have Ruby installed?

Follow the installation guides:
- **macOS**: `brew install ruby`
- **Ubuntu/Debian**: `sudo apt-get install ruby-full`
- **Windows**: Download from [RubyInstaller](https://rubyinstaller.org/)

See the [README.md](../README.md) for detailed instructions.

### Why does `jekyll serve` fail?

Common reasons:
1. **Port in use**: Add `--port 4001` to use a different port
2. **Dependencies missing**: Run `bundle install`
3. **Ruby version**: Ensure Ruby 2.7 or higher
4. **Gems outdated**: Run `bundle update`

### How do I install on Windows?

1. Install Ruby using [RubyInstaller](https://rubyinstaller.org/)
2. During installation, select "Add Ruby to PATH"
3. Open Command Prompt and run:
   ```bash
   gem install bundler
   bundle install
   bundle exec jekyll serve
   ```

## Content & Blogging

### How do I add a new blog post?

1. Create a file: `_posts/YYYY-MM-DD-title.md`
2. Add front matter:
   ```yaml
   ---
   layout: post
   title: "Post Title"
   date: YYYY-MM-DD
   image: /assets/images/posts/image.jpg
   author: dauble
   categories:
     - "category"
   ---
   ```
3. Write content in Markdown
4. Save and commit

See [DEVELOPMENT.md](../DEVELOPMENT.md) for more details.

### What format should I use for posts?

Use **Markdown** (.md files) with YAML front matter. Jekyll converts Markdown to HTML during the build process.

### Can I write posts in HTML?

Yes! You can use `.html` files in `_posts/`, but Markdown is recommended for easier writing and better maintainability.

### How do I add images to posts?

1. Place image in `assets/images/posts/`
2. Reference in front matter:
   ```yaml
   image: /assets/images/posts/my-image.jpg
   ```
3. Use in content:
   ```markdown
   ![Alt text](/assets/images/posts/my-image.jpg)
   ```

### What image formats are supported?

All common formats:
- **JPEG**: Best for photos
- **PNG**: Best for graphics with transparency
- **SVG**: Best for logos and icons
- **WebP**: Modern format (browser support required)

Optimize images before uploading to keep load times fast.

### How do I create a new category?

1. Add category to post front matter:
   ```yaml
   categories:
     - "new-category"
   ```
2. (Optional) Create category page in `_category/`

Categories are automatically generated from post front matter.

## Customization

### How do I change the site colors?

Edit SCSS variables in `_sass/_variables.scss`:
```scss
$primary-color: #your-color;
$secondary-color: #your-other-color;
```

### How do I modify the navigation menu?

Edit `_data/navigation.yml`:
```yaml
- name: Display Name
  link: /page-url
```

### Can I change the layout?

Yes! Edit files in `_layouts/` and `_includes/`. The main layout structure is:
- `default.html`: Base layout
- `post.html`: Blog post layout
- `blog.html`: Blog listing layout

### How do I add a new page?

1. Create HTML file in root: `about.html`
2. Add front matter:
   ```yaml
   ---
   layout: default
   title: About
   ---
   ```
3. Add content
4. Link from navigation or content

### Can I use a different Jekyll theme?

Yes, but it requires significant changes:
1. Remove existing `_layouts/`, `_includes/`, `_sass/`
2. Install theme gem
3. Configure in `_config.yml`
4. Customize as needed

This is a major change - back up first!

## Development

### What's the difference between `jekyll serve` and `jekyll build`?

- **`serve`**: Starts development server, watches for changes, rebuilds automatically
- **`build`**: Builds site once to `_site/` directory, exits

Use `serve` for development, `build` for production testing.

### Why are my changes not appearing?

1. **Hard refresh**: Ctrl+Shift+R (Windows/Linux) or Cmd+Shift+R (Mac)
2. **Clear cache**: Browser may cache old files
3. **Restart server**: Required for `_config.yml` changes
4. **Check terminal**: Look for build errors

### How do I see draft posts?

1. Create post without date in filename
2. Place in `_drafts/` directory
3. Run with drafts flag:
   ```bash
   bundle exec jekyll serve --drafts
   ```

### Can I use custom plugins?

GitHub Pages supports only [approved plugins](https://pages.github.com/versions/). For custom plugins:
- Build site locally
- Commit `_site/` directory, or
- Use different hosting

### How do I debug build errors?

1. Check terminal output for error messages
2. Run with verbose flag:
   ```bash
   bundle exec jekyll serve --verbose
   ```
3. Use Jekyll doctor:
   ```bash
   bundle exec jekyll doctor
   ```
4. Check common issues:
   - YAML syntax errors
   - Liquid tag errors
   - Missing layouts or includes
   - Invalid dates in post filenames

## Deployment

### How do I deploy changes?

Simply push to the `master` branch:
```bash
git add .
git commit -m "Your message"
git push origin master
```

GitHub Actions automatically builds and deploys.

### How long does deployment take?

- **Build**: 20-60 seconds
- **CDN propagation**: 1-2 minutes
- **Total**: Usually under 3 minutes

### Can I preview before deploying?

Yes! Always test locally:
```bash
bundle exec jekyll serve
```

Visit `http://localhost:4000` to preview changes.

### What if deployment fails?

1. Check [Actions tab](https://github.com/dauble/dauble.github.io/actions)
2. Review error logs
3. Fix issues locally
4. Push again

Common causes:
- YAML syntax errors
- Liquid template errors
- Missing files or layouts

### Can I deploy to a different host?

Yes! Jekyll sites can be hosted anywhere that serves static files:
- Netlify
- Vercel
- AWS S3
- Any web server

See [Jekyll deployment docs](https://jekyllrb.com/docs/deployment/) for details.

## Performance

### How can I improve site speed?

1. **Optimize images**: Compress before uploading
2. **Minimize assets**: Use compressed CSS/JS
3. **Lazy load**: Defer non-critical resources
4. **Use CDN**: Already enabled via GitHub Pages
5. **Cache headers**: Managed by GitHub Pages

### Why is my build slow?

Common causes:
- Many posts (100+)
- Large images
- Complex plugins
- Many includes

Solutions:
- Use incremental builds (Jekyll 4.x)
- Optimize assets
- Simplify templates

### How do I check performance?

1. **Lighthouse**: Chrome DevTools > Lighthouse
2. **PageSpeed Insights**: Google's tool
3. **WebPageTest**: Detailed analysis
4. **GTmetrix**: Performance monitoring

Target: Lighthouse score 90+

## Troubleshooting

### Port 4000 is already in use

```bash
# Find and kill process
lsof -ti:4000 | xargs kill -9

# Or use different port
bundle exec jekyll serve --port 4001
```

### "Bundler not found" error

```bash
gem install bundler
```

### "Permission denied" when installing gems

```bash
# On macOS/Linux, avoid sudo if possible
gem install bundler --user-install

# Or use rbenv/rvm for Ruby version management
```

### LiveReload not working

1. Install [LiveReload extension](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei)
2. Enable the extension
3. Verify `livereload: true` in `_config.yml`
4. Restart Jekyll server

### Site works locally but not on GitHub Pages

Possible issues:
1. Custom plugins not supported
2. `_config.yml` differences
3. Path issues (`baseurl` configuration)
4. Missing files in git

Check GitHub Actions logs for details.

## Security

### How secure is this site?

Very secure! Static sites have minimal attack surface:
- No server-side code
- No database
- No user input processing
- Automatic HTTPS
- CodeQL security scanning

### How do I report a security issue?

See [SECURITY.md](../SECURITY.md) for the security policy and reporting procedure.

### Should I update dependencies regularly?

Yes! Run periodically:
```bash
bundle update
```

This updates Jekyll and plugins to latest versions with security patches.

## Contributing

### How can I contribute?

See [CONTRIBUTING.md](../CONTRIBUTING.md) for detailed guidelines. Quick summary:
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test locally
5. Submit a pull request

### What kind of contributions are welcome?

- Bug fixes
- Documentation improvements
- Performance optimizations
- Typo corrections
- Feature suggestions (via issues)

### Will my pull request be accepted?

It depends on:
- Code quality
- Alignment with project goals
- Proper testing
- Clear documentation

Not all PRs can be accepted, but all are appreciated!

## Getting Help

### Where can I get help?

1. **Documentation**: Start with [README.md](../README.md)
2. **Issues**: Search existing issues on GitHub
3. **Jekyll Docs**: https://jekyllrb.com/docs/
4. **Jekyll Forum**: https://talk.jekyllrb.com/
5. **New Issue**: Open an issue with details

### How do I ask a good question?

Include:
- What you're trying to do
- What you've tried
- Error messages (full text)
- Your environment (OS, Ruby version, etc.)
- Steps to reproduce

### What information helps debugging?

```bash
# Ruby version
ruby --version

# Jekyll version
bundle exec jekyll --version

# Bundler version
bundle --version

# Build with verbose output
bundle exec jekyll serve --verbose
```

---

## Still have questions?

Open an issue on GitHub with the "question" label, and we'll help you out!
