#!/usr/bin/env python3
"""Sync this repo's live/ mirror with what actually runs on velocitynorth.ai.

WHY THIS EXISTS
---------------
The live WordPress site (Code Snippets + page content) is the SOURCE OF TRUTH.
Changes are made directly on live via the REST API — and that can happen in any
chat/session. Git can therefore drift out of sync. This script removes the need
to remember what changed: it pulls the CURRENT live state and writes it into
live/, so git reflects production no matter who/what made the change.

USAGE
-----
    python3 scripts/export-live.py
    git add -A && git commit -m "Sync live config" && git push

It is READ-ONLY against production — nothing is written to the live site.
Credentials are read from ~/.config/wp-mcp/sites.json (key: velocitynorth);
no secrets live in this repo.

The script CLEARS live/snippets and live/pages before re-writing, so deletions
on live propagate to git (a removed snippet/page disappears here too).
"""
import json
import os
import re
import shutil
import subprocess
import sys

SITE_KEY = "velocitynorth"
ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
CONF = os.path.expanduser("~/.config/wp-mcp/sites.json")
UA = "Mozilla/5.0 (export-live.py; velocitynorthweb repo sync)"


def load_creds():
    try:
        s = json.load(open(CONF))["sites"][SITE_KEY]
    except (OSError, KeyError) as e:
        sys.exit(f"Could not read creds for '{SITE_KEY}' in {CONF}: {e}")
    if "REPLACE_ME" in (s.get("username", ""), s.get("appPassword", "")):
        sys.exit(f"Credentials for '{SITE_KEY}' are not filled in ({CONF}).")
    return s["url"].rstrip("/"), s["username"], s["appPassword"]


_cb = 0


def api(url, user, pw, path):
    # Options (incl. credentials) are fed to curl via stdin config (-K -), so the
    # app password never appears in the process argument list. curl is used rather
    # than urllib because the system Python's SSL can't negotiate TLS with the host.
    # A unique cache-buster is appended because Kinsta/Cloudflare edge-cache the REST
    # responses — without it a freshly-created/edited snippet or page can be missed.
    global _cb
    _cb += 1
    sep = "&" if "?" in path else "?"
    path = f"{path}{sep}_cb={os.getpid()}{_cb}"
    config = f'url = "{url}{path}"\nuser = "{user}:{pw}"\nheader = "User-Agent: {UA}"\n'
    r = subprocess.run(
        ["curl", "-sS", "--fail", "-K", "-"], input=config, capture_output=True, text=True
    )
    if r.returncode != 0:
        sys.exit(f"curl failed for {path}: {r.stderr.strip()}")
    return json.loads(r.stdout)


def slug(s):
    return re.sub(r"[^a-z0-9]+", "-", (s or "").lower()).strip("-") or "untitled"


def reset_dir(p):
    if os.path.isdir(p):
        shutil.rmtree(p)
    os.makedirs(p)


def main():
    url, user, pw = load_creds()
    snip_dir = os.path.join(ROOT, "live", "snippets")
    page_dir = os.path.join(ROOT, "live", "pages")
    reset_dir(snip_dir)
    reset_dir(page_dir)

    snippets = api(url, user, pw, "/wp-json/code-snippets/v1/snippets")
    smanifest = []
    for s in snippets:
        fn = f"{s['id']:02d}-{slug(s['name'])}.php"
        header = (
            f"<?php\n/**\n * Code Snippet #{s['id']} — {s['name']}\n"
            f" * {s.get('desc', '')}\n"
            f" * scope: {s['scope']} | active: {s['active']} | priority: {s['priority']}\n"
            f" *\n * SOURCE OF TRUTH = WordPress DB (Code Snippets plugin on velocitynorth.ai).\n"
            f" * This file is an exported backup — editing it does NOT change the live site.\n */\n\n"
        )
        open(os.path.join(snip_dir, fn), "w").write(header + s.get("code", "") + "\n")
        smanifest.append((s["id"], s["active"], s["name"], fn))

    pages = api(url, user, pw, "/wp-json/wp/v2/pages?per_page=100&status=publish&context=edit")
    pmanifest = []
    for p in pages:
        fn = f"{slug(p['slug'] or 'home')}.html"
        open(os.path.join(page_dir, fn), "w").write(p["content"]["raw"] + "\n")
        pmanifest.append((p["id"], p["slug"], p["title"]["rendered"], fn))

    with open(os.path.join(snip_dir, "_manifest.txt"), "w") as f:
        f.write("id | active | name | file\n")
        for i, a, n, fn in sorted(smanifest):
            f.write(f"{i} | {'on ' if a else 'off'} | {n} | {fn}\n")
    with open(os.path.join(page_dir, "_manifest.txt"), "w") as f:
        f.write("id | slug | title | file\n")
        for i, sl, t, fn in sorted(pmanifest, key=lambda x: x[0]):
            f.write(f"{i} | {sl} | {t} | {fn}\n")

    active = sum(1 for s in snippets if s["active"])
    print(f"Exported {len(snippets)} snippets ({active} active) and {len(pages)} pages into live/.")
    print("Next: git add -A && git commit -m 'Sync live config' && git push")


if __name__ == "__main__":
    main()
