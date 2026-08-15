/* ============================================================
   DWD — shared site behavior
   Nav scroll state · mobile nav · lazy blog loading · TOC
   ============================================================ */
(function () {
  "use strict";
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* ---- Animated gradient background canvas ---- */
  var canvas = document.getElementById("page-canvas");
  if (canvas) {
    var ctx = canvas.getContext("2d");

    var spots = [
      {
        // blue — upper-left
        cx: 0.12, cy: 0.08,
        rx: 0.60, ry: 0.55,
        color: "29,107,176", alpha: 0.22,
        dx: 0.00007, dy: 0.00005,
        drx: 0.00004, dry: 0.00003,
        phase: 0
      },
      {
        // lime — upper-right
        cx: 0.92, cy: 0.00,
        rx: 0.50, ry: 0.50,
        color: "153,204,51", alpha: 0.10,
        dx: -0.00006, dy: 0.00008,
        drx: 0.00003, dry: 0.00004,
        phase: 1.5
      },
      {
        // deep-navy — lower-right
        cx: 0.80, cy: 1.00,
        rx: 0.70, ry: 0.60,
        color: "0,51,102", alpha: 0.55,
        dx: -0.00005, dy: -0.00006,
        drx: 0.00005, dry: 0.00003,
        phase: 3.0
      }
    ];

    // Travel bounds for center position (fraction of viewport)
    var DRIFT = 0.12;
    // Pulse amplitude (fraction of base radius)
    var PULSE = 0.18;

    function resize() {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    }
    resize();
    window.addEventListener("resize", resize, { passive: true });

    var then = 0;
    function draw(now) {
      var dt = now - then;
      then = now;

      var W = canvas.width;
      var H = canvas.height;

      // Navy base fill
      ctx.fillStyle = "#000d18";
      ctx.fillRect(0, 0, W, H);

      for (var i = 0; i < spots.length; i++) {
        var s = spots[i];

        if (!reduce) {
          s.phase += dt * 0.0004;
          // Drift center — oscillate around original cx/cy
          s.cx += s.dx;
          s.cy += s.dy;
          // Bounce drift within range (keep roughly in quadrant)
          var ox = [0.12, 0.92, 0.80][i];
          var oy = [0.08, 0.00, 1.00][i];
          if (Math.abs(s.cx - ox) > DRIFT) s.dx *= -1;
          if (Math.abs(s.cy - oy) > DRIFT) s.dy *= -1;
          // Pulse radius
          s.rx += s.drx;
          s.ry += s.dry;
          var brx = [0.60, 0.50, 0.70][i];
          var bry = [0.55, 0.50, 0.60][i];
          if (Math.abs(s.rx - brx) > PULSE * brx) s.drx *= -1;
          if (Math.abs(s.ry - bry) > PULSE * bry) s.dry *= -1;
        }

        var px = s.cx * W;
        var py = s.cy * H;
        var rw = s.rx * W;
        var rh = s.ry * H;
        var r = Math.max(rw, rh);

        // Draw as ellipse via scale transform
        ctx.save();
        ctx.translate(px, py);
        ctx.scale(rw / r, rh / r);
        var grad = ctx.createRadialGradient(0, 0, 0, 0, 0, r);
        grad.addColorStop(0, "rgba(" + s.color + "," + s.alpha + ")");
        grad.addColorStop(1, "rgba(" + s.color + ",0)");
        ctx.fillStyle = grad;
        ctx.beginPath();
        ctx.arc(0, 0, r, 0, Math.PI * 2);
        ctx.fill();
        ctx.restore();
      }

      requestAnimationFrame(draw);
    }

    requestAnimationFrame(function (now) {
      then = now;
      requestAnimationFrame(draw);
    });
  }

  /* ---- Nav: frost on scroll ---- */
  var nav = document.querySelector("[data-nav]");
  if (nav) {
    var onScroll = function () {
      if (window.scrollY > 24) nav.classList.add("is-scrolled");
      else nav.classList.remove("is-scrolled");
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  /* ---- Mobile nav toggle ---- */
  var toggle = document.querySelector("[data-nav-toggle]");
  var drawer = document.querySelector("[data-nav-drawer]");
  if (toggle && drawer) {
    toggle.addEventListener("click", function () {
      var open = drawer.hasAttribute("hidden");
      if (open) drawer.removeAttribute("hidden");
      else drawer.setAttribute("hidden", "");
      toggle.setAttribute("aria-expanded", String(open));
    });
    drawer.addEventListener("click", function (e) {
      if (e.target.tagName === "A") {
        drawer.setAttribute("hidden", "");
        toggle.setAttribute("aria-expanded", "false");
      }
    });
  }

  /* ---- Blog category filter ---- */
  var filters = document.querySelectorAll(".filter[data-cat]");
  var cards = document.querySelectorAll("[data-post]");
  if (filters.length && cards.length) {
    filters.forEach(function (btn) {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
        var cat = btn.getAttribute("data-cat");
        filters.forEach(function (b) { b.setAttribute("aria-current", "false"); b.classList.remove("is-active"); });
        btn.setAttribute("aria-current", "true");
        btn.classList.add("is-active");
        cards.forEach(function (card) {
          if (cat === "all") {
            card.style.display = "";
          } else {
            var cardCat = card.getAttribute("data-category") || "";
            card.style.display = cardCat.toLowerCase() === cat.toLowerCase() ? "" : "none";
          }
        });
        updateCount();
      });
    });
    function updateCount() {
      var counter = document.querySelector("[data-feed-count]");
      if (!counter) return;
      var visible = [].filter.call(cards, function (c) { return c.style.display !== "none" && !c.hasAttribute("hidden"); }).length;
      var total = cards.length;
      counter.textContent = visible + " / " + total;
    }
  }

  /* ---- Lazy blog loading ---- */
  var feed = document.querySelector("[data-feed]");
  if (feed) {
    var batch = parseInt(feed.getAttribute("data-batch") || "3", 10);
    var sentinel = document.querySelector("[data-feed-sentinel]");
    var moreBtn = document.querySelector("[data-feed-more]");
    var counter = document.querySelector("[data-feed-count]");

    var reveal = function () {
      var hidden = feed.querySelectorAll("[data-post][hidden]");
      var n = Math.min(batch, hidden.length);
      for (var i = 0; i < n; i++) {
        hidden[i].removeAttribute("hidden");
      }
      var remaining = feed.querySelectorAll("[data-post][hidden]").length;
      if (counter) {
        var total = feed.querySelectorAll("[data-post]").length;
        counter.textContent = (total - remaining) + " / " + total;
      }
      if (remaining === 0) {
        if (moreBtn) moreBtn.setAttribute("hidden", "");
      }
    };

    if (moreBtn) moreBtn.addEventListener("click", reveal);

    if (counter) {
      var total0 = feed.querySelectorAll("[data-post]").length;
      var hidden0 = feed.querySelectorAll("[data-post][hidden]").length;
      counter.textContent = (total0 - hidden0) + " / " + total0;
    }
    if (moreBtn && feed.querySelectorAll("[data-post][hidden]").length === 0) {
      moreBtn.setAttribute("hidden", "");
    }
  }

  /* ---- Post: progress bar + TOC ---- */
  var bar = document.querySelector("[data-progress]");
  if (bar) {
    var updateBar = function () {
      var h = document.documentElement;
      var max = h.scrollHeight - h.clientHeight;
      var p = max > 0 ? h.scrollTop / max : 0;
      bar.style.transform = "scaleX(" + p + ")";
    };
    updateBar();
    window.addEventListener("scroll", updateBar, { passive: true });
  }

  /* ---- Auto-build TOC from .prose h2 headings ---- */
  var tocList = document.querySelector(".toc ul");
  var prose = document.querySelector(".prose");
  if (tocList && prose) {
    var headings = prose.querySelectorAll("h2");
    if (headings.length) {
      tocList.innerHTML = "";
      headings.forEach(function (h, i) {
        if (!h.id) h.id = "s" + i;
        var li = document.createElement("li");
        var a = document.createElement("a");
        a.href = "#" + h.id;
        a.textContent = h.textContent;
        if (i === 0) a.classList.add("active");
        li.appendChild(a);
        tocList.appendChild(li);
      });

      if ("IntersectionObserver" in window) {
        var tocLinks = [].slice.call(tocList.querySelectorAll("a"));
        var obs = new IntersectionObserver(function (entries) {
          entries.forEach(function (en) {
            if (en.isIntersecting) {
              var id = en.target.id;
              tocLinks.forEach(function (a) {
                a.classList.toggle("active", a.getAttribute("href") === "#" + id);
              });
            }
          });
        }, { rootMargin: "-20% 0px -70% 0px" });
        headings.forEach(function (h) { obs.observe(h); });
      }
    } else {
      var tocSide = document.querySelector(".toc");
      if (tocSide) tocSide.style.display = "none";
    }
  }

  /* ---- Current year ---- */
  document.querySelectorAll("[data-year]").forEach(function (el) {
    el.textContent = new Date().getFullYear();
  });

  /* ---- External links: open in new tab ---- */
  document.querySelectorAll("a[href]").forEach(function (a) {
    var href = a.getAttribute("href") || "";
    if (!href || href.charAt(0) === "#") return;
    if (/^(mailto:|tel:|javascript:)/i.test(href)) return;

    var url;
    try {
      url = new URL(href, window.location.href);
    } catch (err) {
      return;
    }

    if (url.origin !== window.location.origin) {
      a.setAttribute("target", "_blank");
      var rel = (a.getAttribute("rel") || "").split(/\s+/).filter(Boolean);
      if (rel.indexOf("noopener") === -1) rel.push("noopener");
      if (rel.indexOf("noreferrer") === -1) rel.push("noreferrer");
      a.setAttribute("rel", rel.join(" "));
    }
  });
})();
