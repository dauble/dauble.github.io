# Cloudflare PageSpeed Optimization Guide

This document outlines the recommended Cloudflare configuration settings to maximize PageSpeed Insights scores for davidauble.com.

## Speed Settings

### Auto Minify
**Path:** Speed > Optimization > Content Optimization > Auto Minify

Enable minification for:
- [x] JavaScript
- [x] CSS
- [x] HTML

**Impact:** Reduces file sizes by removing unnecessary characters, improving load times.

---

### Brotli Compression
**Path:** Speed > Optimization > Content Optimization > Brotli

- [x] Enable Brotli compression

**Impact:** Provides better compression than gzip (typically 15-25% smaller), significantly reducing bandwidth and improving load times.

---

### Rocket Loader™
**Path:** Speed > Optimization > Content Optimization > Rocket Loader

- [ ] Enable (Optional - test carefully)

**Impact:** Asynchronously loads JavaScript to prevent render-blocking. **Note:** May cause issues with some scripts. Test thoroughly before enabling in production.

**Recommendation:** Start with this OFF and enable only if needed, as the site already has async Google Analytics.

---

### Early Hints
**Path:** Speed > Optimization > Content Optimization > Early Hints

- [x] Enable Early Hints

**Impact:** Sends HTTP 103 Early Hints to browsers before the full response, allowing browsers to preload critical resources like fonts and CSS earlier.

---

## Image Optimization

### Polish
**Path:** Speed > Optimization > Image Optimization > Polish

- [x] Enable Lossy compression

**Options:**
- Lossless (best quality, less compression)
- **Lossy (recommended)** - great quality with better compression
- WebP (automatic WebP conversion)

**Impact:** Automatically optimizes images served through Cloudflare. Since we've already created WebP versions locally, Lossy mode will provide additional optimization without quality loss.

---

### Mirage
**Path:** Speed > Optimization > Image Optimization > Mirage

- [x] Enable Mirage

**Impact:** Automatically resizes images based on device and network conditions, lazy-loads images outside viewport.

---

## Caching Configuration

### Browser Cache TTL
**Path:** Caching > Configuration > Browser Cache TTL

- Set to: **4 hours** (or higher)

**Impact:** Instructs browsers how long to cache static resources locally.

---

### Caching Level
**Path:** Caching > Configuration > Caching Level

- Set to: **Standard**

**Impact:** Determines which resources Cloudflare caches. Standard mode caches static files.

---

### Cache Rules (Recommended)
**Path:** Caching > Cache Rules

Create custom cache rules for different asset types:

#### Rule 1: Static Assets (High Priority)
- **When incoming requests match:**
  - File extension is one of: `css`, `js`, `jpg`, `jpeg`, `png`, `webp`, `gif`, `svg`, `woff`, `woff2`, `ttf`, `otf`, `eot`, `ico`
- **Then:**
  - Cache status: Eligible for cache
  - Edge TTL: 1 month
  - Browser TTL: 1 week

#### Rule 2: HTML Pages
- **When incoming requests match:**
  - File extension is one of: `html`, `htm`
- **Then:**
  - Cache status: Eligible for cache
  - Edge TTL: 2 hours
  - Browser TTL: 10 minutes

---

## Security & Performance Headers

### Transform Rules
**Path:** Rules > Transform Rules > HTTP Response Header Modification

Create a transform rule to add performance and security headers:

**Rule Name:** Add Performance Headers

**When incoming requests match:**
- All incoming requests

**Then modify response header:**

Add these headers:

```
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
X-XSS-Protection: 1; mode=block
Referrer-Policy: strict-origin-when-cross-origin
Permissions-Policy: geolocation=(), microphone=(), camera=()
```

**Impact:** Improves security score on PageSpeed Insights and protects against common vulnerabilities.

---

## Network Settings

### HTTP/2
**Path:** Network > HTTP/2

- [x] Enable HTTP/2

**Impact:** Allows multiplexing of requests, reducing latency.

---

### HTTP/3 (with QUIC)
**Path:** Network > HTTP/3 (with QUIC)

- [x] Enable HTTP/3

**Impact:** Next-generation protocol with improved performance, especially on lossy networks.

---

### 0-RTT Connection Resumption
**Path:** Network > 0-RTT Connection Resumption

- [x] Enable

**Impact:** Reduces connection time for returning visitors.

---

### WebSockets
**Path:** Network > WebSockets

- [x] Enable

**Impact:** Required if using WebSocket connections (recommended to keep enabled).

---

## Page Rules (Legacy - Optional)

If not using Cache Rules, create these Page Rules:

### Page Rule 1: Cache Everything
- **URL:** `davidauble.com/assets/*`
- **Settings:**
  - Cache Level: Cache Everything
  - Edge Cache TTL: 1 month
  - Browser Cache TTL: 7 days

### Page Rule 2: Bypass Cache for Dynamic Content
- **URL:** `davidauble.com/api/*` (if applicable)
- **Settings:**
  - Cache Level: Bypass

---

## DNS Settings

### Cloudflare Proxy
**Path:** DNS

Ensure your DNS records have the orange cloud icon enabled (proxied through Cloudflare) for:
- Root domain (@)
- www subdomain
- Any other public subdomains

**Impact:** Routes traffic through Cloudflare's network, enabling all optimization features.

---

## Additional Recommendations

### Enable Firewall Rules
Consider adding firewall rules to block bad bots and malicious traffic, which can improve server performance.

### Monitor Analytics
Use Cloudflare Analytics to:
- Track bandwidth savings from optimization
- Monitor cache hit ratio (aim for >95% for static assets)
- Identify slow-loading resources

### Purge Cache After Deployments
After deploying new code:
1. Go to Caching > Configuration
2. Click "Purge Everything" or selectively purge changed files
3. This ensures users get the latest content

---

## Expected Performance Gains

After implementing these optimizations, expect:

- **Mobile Performance Score:** 85-95+ (from ~65-75)
- **Desktop Performance Score:** 95-100 (from ~80-90)
- **Largest Contentful Paint (LCP):** <2.5s
- **First Input Delay (FID):** <100ms
- **Cumulative Layout Shift (CLS):** <0.1
- **Total Blocking Time (TBT):** <200ms
- **Bandwidth Savings:** 30-50% reduction

---

## Testing & Validation

After applying these settings:

1. **Clear your browser cache** completely
2. **Test with PageSpeed Insights:**
   - https://pagespeed.web.dev/
   - Test both mobile and desktop
   - Test from different geographic locations if possible

3. **Monitor Cloudflare Analytics:**
   - Cache hit ratio should be >95%
   - Bandwidth should decrease
   - Performance metrics should improve

4. **Check functionality:**
   - Test all interactive elements
   - Verify forms work correctly
   - Ensure JavaScript functions properly (especially if using Rocket Loader)

---

## Troubleshooting

### If Rocket Loader causes issues:
- Disable Rocket Loader
- Add `data-cfasync="false"` to specific scripts that should not be deferred

### If images don't load:
- Check Polish settings
- Verify Mirage is not blocking images
- Check browser console for errors

### If CSS/JS is broken:
- Disable Auto Minify temporarily
- Check if Brotli is causing issues (unlikely)
- Purge cache and test again

---

## Summary Checklist

Before going live with optimizations:

- [x] Auto Minify: JS, CSS, HTML enabled
- [x] Brotli compression enabled
- [x] Early Hints enabled
- [x] Polish set to Lossy
- [x] Mirage enabled
- [x] Cache Rules configured for static assets
- [x] Performance headers added via Transform Rules
- [x] HTTP/2 and HTTP/3 enabled
- [x] 0-RTT enabled
- [x] DNS records proxied through Cloudflare
- [ ] Test thoroughly before deploying
- [ ] Monitor analytics after deployment

---

## Support

For additional help:
- Cloudflare Documentation: https://developers.cloudflare.com/
- Cloudflare Community: https://community.cloudflare.com/
- PageSpeed Insights: https://developers.google.com/speed/docs/insights/v5/about
