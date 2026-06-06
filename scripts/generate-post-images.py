#!/usr/bin/env python3
"""
generate-post-images.py

Generates a hero image for every scheduled draft post using the
Stability AI REST API (Stable Image Ultra), saves them to
assets/images/posts/, and patches the 'image:' field into each
draft's front matter.

Note: Claude (Anthropic) is a text model and cannot generate images.
Stability AI is used here as the best programmatic alternative.

Requirements:
    pip install requests

Get a key: https://platform.stability.ai/account/keys

Usage:
    export STABILITY_API_KEY="sk-..."
    python3 scripts/generate-post-images.py

    # Regenerate just one post:
    python3 scripts/generate-post-images.py enterprise-architecture-for-developers-what-it-is

Cost estimate: ~$0.008 per image (Ultra) = ~$0.15 for all 19
"""

import os
import re
import sys
import time
import requests
from pathlib import Path

# ─── Configuration ────────────────────────────────────────────────────────────

IMAGE_DIR  = Path("assets/images/posts")
DRAFTS_DIR = Path("_drafts")

# Stability AI - Stable Image Ultra
# Docs: https://platform.stability.ai/docs/api-reference#tag/Generate/paths/~1v2beta~1stable-image~1generate~1ultra/post
STABILITY_API_URL = "https://api.stability.ai/v2beta/stable-image/generate/ultra"
OUTPUT_FORMAT = "jpeg"  # jpeg | png | webp
ASPECT_RATIO  = "16:9"  # closest to 1792x1024 blog header proportion

STYLE_SUFFIX = (
    "Professional digital illustration. Modern flat design. Clean, minimal composition. "
    "Blue, teal, and navy color palette. Suitable for a technology blog article header. "
    "No text, no letters, no words in the image."
)

# ─── Per-post definitions ─────────────────────────────────────────────────────
# Key:   draft filename stem (without .md)
# Value: (image filename stem, DALL-E prompt)

POSTS: dict[str, tuple[str, str]] = {
    "enterprise-architecture-for-developers-what-it-is": (
        "ea-what-it-is",
        "An enterprise architect studying a large layered blueprint of interconnected "
        "software systems and data flows, geometric shapes representing microservices, "
        "APIs, and databases arranged in clean architectural layers. Isometric view."
    ),
    "developer-to-architect-24-month-skill-roadmap": (
        "developer-to-architect-roadmap",
        "An upward-winding career path road through a technology landscape, with "
        "milestone markers representing coding, system design, cross-team collaboration, "
        "and strategic planning. Isometric road map style."
    ),
    "how-to-think-in-systems-not-tickets": (
        "systems-thinking",
        "Abstract illustration of interconnected nodes and feedback loops forming a "
        "complex system diagram, glowing arrows showing cause and effect cycles, "
        "contrasted with a single isolated task ticket in the foreground. Dark background."
    ),
    "what-junior-developers-should-learn-first": (
        "junior-developer-learning-paths",
        "A junior developer standing at a crossroads where three illuminated paths "
        "branch forward: one representing design and code architecture, one representing "
        "cloud operations and deployment, and one representing security and privacy."
    ),
    "adobe-experience-manager-modern-dxp-stack": (
        "adobe-dxp-stack",
        "A modern digital experience platform dashboard showing content management "
        "interfaces, digital asset thumbnails, multi-channel publishing flow diagrams, "
        "and analytics charts. Enterprise software aesthetic. Deep red and blue gradient."
    ),
    "three-horizons-model-shipping-today-designing-for-three-years": (
        "three-horizons-model",
        "Three ascending horizons stretching into the distance, each layer populated "
        "with technology concepts at different scales: current products close-up, "
        "emerging platforms mid-distance, and transformational ideas on the far horizon. "
        "Atmospheric depth of field effect."
    ),
    "communication-skills-separate-senior-devs-from-architects": (
        "communication-skills-architecture",
        "A senior developer presenting a complex architecture diagram to a mixed "
        "audience of engineers and business executives. The diagram on the screen "
        "translates into clear business outcome charts as it reaches the audience."
    ),
    "architecture-tradeoffs-speed-safety-scale": (
        "architecture-tradeoffs-triangle",
        "A glowing equilateral triangle with speed, safety, and scale represented "
        "at each vertex as distinct geometric icons. Balance scales and trade-off "
        "arrows illustrate tension between the three forces. Dark tech background."
    ),
    "portfolio-projects-that-signal-architecture-thinking": (
        "architecture-portfolio",
        "A developer's portfolio displayed across clean screens: architecture diagrams, "
        "CI/CD pipeline visualizations, GitHub contribution graphs, and an OpenAPI "
        "contract document. Neat desk workspace. Top-down flat lay perspective."
    ),
    "decision-making-under-uncertainty-practical-framework": (
        "decision-making-uncertainty",
        "A structured decision tree emerging clearly from a field of fog and uncertainty, "
        "branching paths becoming visible and well-defined as they progress forward, "
        "representing clarity arising from a systematic framework."
    ),
    "q3-2026-movers-and-shakers-aws-cloudflare-github-adobe": (
        "q3-industry-briefing",
        "Major cloud and developer platform logos represented as glowing geometric "
        "nodes in an interconnected ecosystem map, with data flows and update pulses "
        "between them. Technology industry landscape. Dark background with neon accents."
    ),
    "how-to-present-technical-strategy-to-non-technical-stakeholders": (
        "presenting-tech-strategy",
        "A presenter at a whiteboard where complex technical architecture diagrams "
        "on the left side of the board smoothly transform into simple clear business "
        "outcome charts on the right side, with an executive audience listening."
    ),
    "writing-architecture-decision-records-teams-actually-use": (
        "architecture-decision-records",
        "Clean organized document pages showing structured sections of an architecture "
        "decision record: context, decision, alternatives, and consequences. Team "
        "collaboration icons and a version history timeline running alongside."
    ),
    "mentorship-patterns-that-accelerate-architecture-growth": (
        "architecture-mentorship",
        "A senior architect and junior developer side by side reviewing a system "
        "diagram together, knowledge flowing visually as glowing connections between "
        "them. Warm blue tones. Inclusive and collaborative atmosphere."
    ),
    "translating-business-strategy-into-technical-roadmaps": (
        "strategy-to-roadmap",
        "Business strategy documents on the left flowing through an elegant translation "
        "layer and emerging as a structured technical roadmap timeline on the right, "
        "with milestones, dependencies, and sequencing clearly visualized."
    ),
    "common-career-traps-for-high-potential-developers": (
        "career-traps-developers",
        "A developer navigating a maze with clearly marked pitfall traps: depth expert "
        "dead ends, permission-waiting corners, and solver bottlenecks. One bright "
        "open path leads forward and upward. Cautionary yet optimistic tone."
    ),
    "adobe-firefly-generative-ai-enterprise-architecture": (
        "adobe-firefly-enterprise-ai",
        "Generative AI sparks and creative elements flowing into an enterprise content "
        "management system, assets being created and organized into structured workflows. "
        "Firefly-inspired luminous particle effects. Deep blue and orange gradient."
    ),
    "how-to-earn-architecture-influence-without-architect-title": (
        "architecture-influence-network",
        "A developer at the center of an expanding organizational network graph, "
        "connections growing outward to other teams represented as nodes. The network "
        "brightens and strengthens over time. Organic growth visualization."
    ),
    "building-your-personal-architecture-playbook": (
        "personal-architecture-playbook",
        "An open professional notebook or playbook with architecture pattern diagrams, "
        "decision heuristics, and reference architecture sketches on clean pages. "
        "A pen resting beside it. Top-down flat lay. Clean white and blue aesthetic."
    ),
}

# ─── Helpers ──────────────────────────────────────────────────────────────────

FRONT_MATTER_RE = re.compile(r"^---\n(.*?)\n---\n", re.DOTALL)


def patch_front_matter(draft_path: Path, image_web_path: str) -> None:
    """Insert or replace the 'image:' key in the file's YAML front matter."""
    content = draft_path.read_text(encoding="utf-8")
    match = FRONT_MATTER_RE.match(content)
    if not match:
        print(f"  WARNING: No front matter found in {draft_path.name} — skipping patch.")
        return

    fm = match.group(1)
    image_line = f"image: {image_web_path}"

    if re.search(r"^image:", fm, re.MULTILINE):
        # Replace existing image line
        fm_updated = re.sub(r"^image:.*$", image_line, fm, flags=re.MULTILINE)
    else:
        # Insert after the 'date:' line, or at the end of front matter
        if re.search(r"^date:", fm, re.MULTILINE):
            fm_updated = re.sub(
                r"(^date:.*$)", rf"\1\n{image_line}", fm, flags=re.MULTILINE
            )
        else:
            fm_updated = fm + f"\n{image_line}"

    new_content = f"---\n{fm_updated}\n---\n" + content[match.end():]
    draft_path.write_text(new_content, encoding="utf-8")


def generate_image(prompt: str, api_key: str) -> bytes:
    """Call Stability AI Ultra and return raw image bytes."""
    response = requests.post(
        STABILITY_API_URL,
        headers={
            "Authorization": f"Bearer {api_key}",
            "Accept": "image/*",
        },
        files={"none": ""},   # multipart/form-data required by the API
        data={
            "prompt": prompt,
            "aspect_ratio": ASPECT_RATIO,
            "output_format": OUTPUT_FORMAT,
            "negative_prompt": "text, words, letters, watermark, logo, signature, low quality, blurry",
        },
        timeout=120,
    )
    if response.status_code != 200:
        raise RuntimeError(
            f"Stability AI error {response.status_code}: {response.text[:300]}"
        )
    return response.content


# ─── Main ─────────────────────────────────────────────────────────────────────

def main(filter_slug: str | None = None) -> int:
    api_key = os.environ.get("STABILITY_API_KEY")
    if not api_key:
        print("ERROR: STABILITY_API_KEY environment variable not set.")
        print("  Get a key: https://platform.stability.ai/account/keys")
        print("  export STABILITY_API_KEY='sk-...'")
        return 1

    targets = {
        slug: info
        for slug, info in POSTS.items()
        if filter_slug is None or slug == filter_slug
    }

    if not targets:
        print(f"No matching post found for slug: {filter_slug}")
        return 1

    print(f"Generating {len(targets)} image(s) via Stability AI Ultra...\n")
    errors = []

    for slug, (img_stem, prompt_core) in targets.items():
        draft_path  = DRAFTS_DIR / f"{slug}.md"
        image_path  = IMAGE_DIR / f"{img_stem}.jpg"
        image_web   = f"/assets/images/posts/{img_stem}.jpg"

        if not draft_path.exists():
            print(f"[SKIP]  {slug} — draft not found at {draft_path}")
            continue

        if image_path.exists():
            print(f"[SKIP]  {img_stem}.jpg already exists — patching front matter only")
            patch_front_matter(draft_path, image_web)
            continue

        full_prompt = f"{prompt_core} {STYLE_SUFFIX}"
        print(f"[GEN]   {img_stem}.jpg")
        print(f"        {prompt_core[:80]}...")

        try:
            image_bytes = generate_image(full_prompt, api_key)

            IMAGE_DIR.mkdir(parents=True, exist_ok=True)
            image_path.write_bytes(image_bytes)
            print(f"        Saved -> {image_path}")

            patch_front_matter(draft_path, image_web)
            print(f"        Front matter patched.\n")

        except Exception as exc:  # noqa: BLE001
            print(f"  ERROR generating {slug}: {exc}\n")
            errors.append(slug)

        # Stability AI Ultra: no strict rate limit but be polite under free tier
        if len(targets) > 1:
            time.sleep(2)

    print("─" * 60)
    print(f"Complete. {len(targets) - len(errors)}/{len(targets)} images generated.")
    if errors:
        print(f"Failed slugs: {', '.join(errors)}")
    return 1 if errors else 0


if __name__ == "__main__":
    slug_filter = sys.argv[1] if len(sys.argv) > 1 else None
    sys.exit(main(slug_filter))
