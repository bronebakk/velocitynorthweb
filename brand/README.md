# Velocity North — brand assets

Logo files generated from the site's header wordmark. Text is **outlined to
vector paths** (Aldrich font baked in), so the SVGs render identically
everywhere without the font installed.

## Files

| File | Use |
|------|-----|
| `velocitynorth-logo.svg` | Primary wordmark, **light backgrounds** (master) |
| `velocitynorth-logo-dark.svg` | Wordmark for **dark backgrounds** (light text) |
| `velocitynorth-logo.png` / `-dark.png` | Wordmark @2x (1244×186), transparent — email signatures, social, decks |
| `velocitynorth-icon.svg` / `-dark.svg` | Compact `>_` mark (light / dark) |
| `velocitynorth-icon-512.png` / `-dark-512.png` | Icon 512×512, transparent |
| `favicon-180.png` | Apple touch icon (180×180) |
| `favicon-32.png` | Browser favicon (32×32) |

Prefer the **SVG** wherever it's accepted (web, modern tools). Use the **PNG**
where SVG isn't supported (email clients, some social platforms, favicons).

## Colors

| Token | Hex | Where |
|-------|-----|-------|
| Text (dark) | `#1A1411` | wordmark on light bg |
| Text (light) | `#F4F1EF` | wordmark on dark bg |
| Prompt `>` | `#9A8B85` (light bg) / `#886660` (dark bg) | the `>` glyph |
| Accent / cursor | `#D1402F` (light bg) / `#DB4434` (dark bg) | cursor block, brand red |

## Typeface

**Aldrich** (Google Fonts, OFL) — the same face used for headings and the site
title. Regenerate with `python3 ../scripts/genlogo.py` if the font is at
`/tmp/Aldrich-Regular.ttf` (see git history for the generator).
