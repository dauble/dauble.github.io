#!/usr/bin/env python3
"""
publish-drafts.py

Reads _data/editorial-calendar.yml, finds posts whose scheduled date
matches today (or the date passed as a CLI argument), and moves matching
draft files from _drafts/ into _posts/ with the YYYY-MM-DD- filename prefix.

Usage:
    python3 scripts/publish-drafts.py              # uses today's date
    python3 scripts/publish-drafts.py 2026-06-09   # dry-run / manual override
"""

import sys
import os
import shutil
from datetime import date

try:
    import yaml
except ImportError:
    print("ERROR: PyYAML not installed. Run: pip install pyyaml", file=sys.stderr)
    sys.exit(1)

CALENDAR_PATH = "_data/editorial-calendar.yml"
POSTS_DIR = "_posts"


def main(target_date: str) -> int:
    if not os.path.exists(CALENDAR_PATH):
        print(f"ERROR: Calendar file not found at {CALENDAR_PATH}", file=sys.stderr)
        return 1

    with open(CALENDAR_PATH, "r", encoding="utf-8") as f:
        calendar = yaml.safe_load(f)

    posts = calendar.get("posts", [])
    if not posts:
        print("No posts found in calendar.")
        return 0

    published = []

    for entry in posts:
        # Calendar stores dates as strings "YYYY-MM-DD"
        scheduled = str(entry.get("date", "")).strip()
        draft_path = str(entry.get("draft", "")).strip()

        if scheduled != target_date:
            continue

        if not draft_path:
            print(f"WARNING: Entry for {scheduled} has no 'draft' path — skipping.",
                  file=sys.stderr)
            continue

        if not os.path.isfile(draft_path):
            print(f"WARNING: Draft not found: {draft_path} — skipping.", file=sys.stderr)
            continue

        # Build destination path: _posts/YYYY-MM-DD-<slug>.md
        slug = os.path.basename(draft_path)          # e.g. my-post.md
        dest_filename = f"{target_date}-{slug}"      # e.g. 2026-06-09-my-post.md
        dest_path = os.path.join(POSTS_DIR, dest_filename)

        if os.path.exists(dest_path):
            print(f"SKIP: Already exists at {dest_path}")
            continue

        shutil.move(draft_path, dest_path)
        print(f"PUBLISHED: {draft_path} -> {dest_path}")
        published.append(dest_path)

    if not published:
        print(f"No posts scheduled for {target_date}.")
    else:
        print(f"\n{len(published)} post(s) moved to {POSTS_DIR}/")

    return 0


if __name__ == "__main__":
    if len(sys.argv) > 1:
        run_date = sys.argv[1]
    else:
        run_date = date.today().isoformat()

    print(f"Running publish check for date: {run_date}")
    sys.exit(main(run_date))
