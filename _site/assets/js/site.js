/* ============================================================
   DWD — shared site behavior
   Nav scroll state · mobile nav · lazy blog loading · TOC
   ============================================================ */
(function () {
  "use strict";
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

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
})();
