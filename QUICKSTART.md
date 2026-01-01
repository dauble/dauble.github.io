# Quick Start Guide

Get up and running with this Jekyll website in minutes!

## 🚀 For New Contributors

### Prerequisites Check

Before starting, verify you have these installed:

```bash
# Check Ruby version (need 2.7+)
ruby --version

# Check if Bundler is installed
bundle --version

# If Bundler is not installed:
gem install bundler
```

### 5-Minute Setup

1. **Clone and navigate**
   ```bash
   git clone https://github.com/dauble/dauble.github.io.git
   cd dauble.github.io
   ```

2. **Install dependencies**
   ```bash
   bundle install
   ```

3. **Start the server**
   ```bash
   bundle exec jekyll serve
   ```

4. **Open your browser**
   
   Navigate to: `http://localhost:4000`

That's it! 🎉 You're now running the site locally.

## 📝 Making Your First Change

### Edit an Existing Page

1. Open any file in the `_posts/` directory
2. Make your change
3. Save the file
4. Refresh your browser - the changes appear automatically!

### Add a New Blog Post

1. Create a new file in `_posts/`:
   ```bash
   touch _posts/2026-01-15-my-awesome-post.md
   ```

2. Add the front matter:
   ```yaml
   ---
   layout: post
   title: "My Awesome Post"
   date: 2026-01-15
   image: /assets/images/posts/default.jpg
   author: dauble
   categories:
     - "tutorial"
   ---
   
   Your content here!
   ```

3. View at: `http://localhost:4000/2026/01/15/my-awesome-post.html`

## 🎨 Customize Styles

1. Open `_sass/` directory
2. Edit any `.scss` file
3. Save and refresh - styles update automatically!

## 🔧 Common Commands

| Command | Purpose |
|---------|---------|
| `bundle exec jekyll serve` | Start development server |
| `bundle exec jekyll build` | Build site to `_site/` directory |
| `bundle exec jekyll serve --livereload` | Start server with live reload |
| `bundle exec jekyll serve --port 4001` | Use different port |
| `bundle exec jekyll doctor` | Check for issues |

## 📚 Need More Help?

- **Full documentation**: See [README.md](README.md)
- **Development details**: See [DEVELOPMENT.md](DEVELOPMENT.md)
- **Contributing**: See [CONTRIBUTING.md](CONTRIBUTING.md)
- **Jekyll docs**: https://jekyllrb.com/docs/

## ❓ Troubleshooting

### Port 4000 in use?

```bash
bundle exec jekyll serve --port 4001
```

### Changes not showing?

1. Hard refresh: `Ctrl+Shift+R` (Windows/Linux) or `Cmd+Shift+R` (Mac)
2. Or restart the server

### Modified _config.yml?

Restart the server:
```bash
# Press Ctrl+C to stop
bundle exec jekyll serve
```

## 🤝 Ready to Contribute?

1. Create a branch: `git checkout -b feature/my-feature`
2. Make your changes
3. Test locally
4. Push: `git push origin feature/my-feature`
5. Open a Pull Request on GitHub

For detailed contribution guidelines, see [CONTRIBUTING.md](CONTRIBUTING.md).

---

**Happy coding!** 🚀 If you have questions, open an issue on GitHub.
