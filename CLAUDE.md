# velocitynorth.ai — working notes

## Source of truth: the LIVE WordPress site, not this repo

The production site runs **GeneratePress + GP Premium** with all customization in
the **Code Snippets** plugin and page content in the **WordPress database**. The
custom `theme/` folder is the original (undeployed) approach — kept for history,
**not** what ships. Editing files in this repo does **not** change the live site.

Make changes on live via the REST API (or WP Admin), then mirror them back here.

## Keeping git in sync (important — work happens across many chats)

Because changes are made directly on live, and from different chat sessions, git
drifts. Do **not** rely on remembering what changed. Instead, re-pull live state:

```bash
python3 scripts/export-live.py        # read-only against live; rewrites live/
git add -A && git commit -m "Sync live config" && git push
```

`scripts/export-live.py` reads creds from `~/.config/wp-mcp/sites.json` (key
`velocitynorth`), clears `live/snippets` + `live/pages`, and re-exports every
snippet and published page. Because it clears first, **deletions on live
propagate** to git. Run it at the start and/or end of any session that touched
the site, so `git diff` shows exactly what changed in production.

## Layout

- `live/snippets/` — exported Code Snippets (`NN-name.php`, NN = snippet id). See `_manifest.txt` for active/inactive.
- `live/pages/`    — exported published page content (`slug.html`). See `_manifest.txt`.
- `live/README.md` — architecture + integration details (GTM, HubSpot, HTTPS).
- `scripts/export-live.py` — the sync command above.
- `theme/`         — legacy custom theme, **not deployed**.
- `prototypes/`    — design mockups.

## Credentials & secrets

- WordPress app passwords live in `~/.config/wp-mcp/sites.json` — **never** commit them.
- `.claude/` and `*.zip` are gitignored. If a secret ever lands in a tracked file, rotate it.
- REST calls: use `curl` (system Python's SSL can't negotiate TLS with the host).

## Key integrations on live

- **GTM** container `GTM-TK7F6GLG` (snippet #9).
- **HubSpot** portal `148224378` (EU); contact form posts to the Submissions API
  for form `ce7212bc-f62d-4a20-aa33-dbfb16616651` (custom-designed, in `pages/contact.html`).
- Operator: **Suya AB**, org. no. 559024-5717.
