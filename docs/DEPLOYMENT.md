# Deployment Guide

This document explains how the site is deployed and how to manage deployments.

## 🚀 Automatic Deployment

This site uses **GitHub Pages** with automatic deployment configured.

### How It Works

1. **Push to master**: When changes are pushed to the `master` branch
2. **GitHub Actions**: Automatically triggers the `pages-build-deployment` workflow
3. **Jekyll Build**: GitHub builds the Jekyll site
4. **Deploy**: The built site is deployed to GitHub Pages
5. **Live**: Changes appear at https://davidauble.com

### Deployment Status

Check the deployment status:
- **Badge**: See the badge in README.md
- **Actions Tab**: Visit https://github.com/dauble/dauble.github.io/actions
- **Deployments**: Check https://github.com/dauble/dauble.github.io/deployments

## 🔍 Monitoring Deployments

### Successful Deployment

A successful deployment will:
1. Show a green checkmark in the Actions tab
2. Update the live site within 1-2 minutes
3. Send a success notification (if configured)

### Failed Deployment

If a deployment fails:
1. Check the Actions tab for error messages
2. Review the build logs
3. Common issues:
   - YAML syntax errors in `_config.yml`
   - Liquid template errors
   - Missing or broken links
   - Invalid front matter in posts

## 🛠 Manual Deployment Testing

Before pushing to master, test your changes locally:

```bash
# Build the site
bundle exec jekyll build

# Check for errors
bundle exec jekyll doctor

# Test the built site
cd _site
python -m http.server 8000
# Visit http://localhost:8000
```

## 🌐 Custom Domain Configuration

The site uses a custom domain: `davidauble.com`

### How It's Configured

1. **CNAME File**: Contains the domain name
   ```
   davidauble.com
   ```

2. **DNS Settings**: Domain registrar points to GitHub Pages
   - A records to GitHub Pages IPs
   - Or CNAME to `dauble.github.io`

3. **HTTPS**: Automatically provided by GitHub Pages

### Updating Domain

If you need to change the domain:

1. Update the `CNAME` file
2. Update DNS settings at your domain registrar
3. Update `url` in `_config.yml`

## 📊 Build Process

### Jekyll Build Steps

When GitHub builds the site:

1. **Install Dependencies**: Installs gems from Gemfile
2. **Process SCSS**: Compiles SCSS to CSS
3. **Process Liquid**: Renders templates with data
4. **Generate Pages**: Creates HTML from Markdown
5. **Copy Assets**: Moves images, JS, CSS to output
6. **Create Sitemap**: Generates sitemap.xml
7. **Create Feed**: Generates RSS/Atom feed

### What Gets Deployed

The `_site` directory contents:
- HTML pages
- CSS stylesheets (compiled and compressed)
- JavaScript files
- Images and other assets
- sitemap.xml
- feed.xml
- robots.txt (if present)

### What's Excluded

Files/folders not deployed (see `_config.yml` exclude list):
- Source SCSS files
- Markdown source files
- Gemfile and Gemfile.lock
- README and documentation
- Node modules
- Development files

## 🔐 Security

### GitHub Secrets

No secrets are required for basic deployment. If you add custom workflows:

1. Go to Settings > Secrets and variables > Actions
2. Add required secrets
3. Reference in workflows with `${{ secrets.SECRET_NAME }}`

### Access Control

Only users with write access to the repository can:
- Push to master (triggers deployment)
- Modify GitHub Actions workflows
- Change repository settings

## 🐛 Troubleshooting Deployments

### Site Not Updating

1. **Check deployment status** in Actions tab
2. **Verify push went to master branch**
3. **Clear browser cache** (hard refresh)
4. **Wait 1-2 minutes** for CDN to update

### Build Failing

1. **Review error logs** in Actions tab
2. **Test locally** with same Jekyll version:
   ```bash
   bundle exec jekyll build --verbose
   ```
3. **Check common issues**:
   - Invalid YAML
   - Liquid syntax errors
   - Missing dependencies
   - File permission issues

### Pages Not Rendering

1. **Check file naming**: Posts must be `YYYY-MM-DD-title.md`
2. **Verify front matter**: Required fields must be present
3. **Test permalink structure**: Matches `_config.yml` settings
4. **Review layouts**: Ensure layout files exist

### Custom Domain Issues

1. **Verify DNS settings**: Use `dig` or `nslookup`
   ```bash
   dig davidauble.com
   ```
2. **Check CNAME file**: Must contain only domain name
3. **Wait for DNS propagation**: Can take 24-48 hours
4. **Verify HTTPS**: May take a few minutes to provision

## 📈 Performance Monitoring

### After Deployment

Check these metrics:
- **Load Time**: Use browser DevTools
- **Lighthouse Score**: Run audit in Chrome
- **Broken Links**: Use link checker tools
- **HTML Validation**: W3C validator

### Optimization Tips

- Compress images before committing
- Minimize use of external resources
- Enable SASS compression (already configured)
- Use async/defer for non-critical JS

## 🔄 Rollback Procedure

If a deployment introduces issues:

### Option 1: Quick Fix
```bash
git revert <commit-hash>
git push origin master
```

### Option 2: Git Reset (if necessary)
```bash
# Locally
git reset --hard <good-commit-hash>

# Force push (use with caution)
git push origin master --force
```

**Note**: Force push is generally not recommended. Prefer using revert.

## 📚 Additional Resources

- [GitHub Pages Documentation](https://docs.github.com/en/pages)
- [Jekyll Deployment Docs](https://jekyllrb.com/docs/deployment/)
- [GitHub Actions for Pages](https://github.com/actions/deploy-pages)
- [Custom Domain Setup](https://docs.github.com/en/pages/configuring-a-custom-domain-for-your-github-pages-site)

---

For questions about deployment, open an issue with the "deployment" label.
