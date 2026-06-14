# Handoff: Velocity North — design system & site implementation

## Overview
This bundle is the unified design system + per-screen build brief for **velocitynorth.ai** — a performance-marketing agency whose differentiator is the "truth gap": ad platforms under-report conversions (consent walls, Safari ITP, iOS ATT), so Velocity North reconciles every conversion **server-side** (via Digtective/Digger) and optimises on real profitability. Tone: direct, technical, no fluff. Visual motif: a developer-terminal language (`>` prompts, `//` comment eyebrows, a blinking red cursor, `.exe` window chrome) on a warm light page, with selected "data" moments rendered as dark console insets.

## About the design files
The file in this bundle —

- `Velocity North — Design System.dc.html`

— is a **design reference created in HTML**: a rendered, navigable styleguide + implementation brief showing the intended tokens, components (with states), per-screen layouts, accessibility rules, and build order. **It is not production code to copy wholesale.** Open it in a browser to *see* every spec rendered; read the embedded CSS blocks for paste-ready values.

The implementation target is **NOT React/Vue**. This site runs:

> **WordPress + GeneratePress + GP Premium**, no custom theme, no build step. All styling is injected as **CSS via the Code Snippets plugin** (`wp_head`); all custom HTML via snippet hooks / shortcodes / `wp:html` blocks. SVG upload is blocked → **inline SVG only**. SEO/schema is owned by **Rank Math** — enhance its JSON-LD graph via filters, **never emit competing/duplicate schema**. Forms post to the **HubSpot Submissions API** (custom, not an iframe). GTM `GTM-TK7F6GLG`, HubSpot portal `148224378` are live.

So the task is: **recreate these designs as CSS rules + small HTML fragments + shortcode/CPT output inside the existing GeneratePress + Code-Snippets environment** — matching the tokens and component specs below exactly.

## Fidelity
**High-fidelity.** Final colors, type, spacing, radii, and component states are all specified. Recreate pixel-accurately using the values in this README and the rendered HTML doc. The HTML doc's own markup is inline-styled for previewing — in the real site, express the same result as reusable CSS classes (`.vn-*`) in Code Snippet #7, not inline styles.

## Design tokens
Paste into Code Snippet #7 (`wp_head`):

```css
:root{
  --bg:#FBFAF8; --bg-alt:#F4F1EF; --card:#FFFFFF;
  --text:#1A1411; --text-body:#2A211E; --muted:#6E5B55; --dim:#9A8B85;
  --primary:#D1402F; --primary-strong:#B5362A;
  --verified:#11854A; --verified-fill:#2FBE71;
  --border:rgba(0,0,0,.10); --border-accent:rgba(209,64,47,.32);
  --grid:rgba(0,0,0,.035);
  --console-bg:#141210; --console-head:#0A0A0A; --console-text:#C9C2BC;
  --console-salmon:#F0ADA2; --console-salmon-dim:#BA8077;
  --sh-1:0 1px 2px rgba(0,0,0,.05);
  --sh-card:0 10px 30px rgba(26,20,17,.08);
  --sh-console:0 24px 60px rgba(0,0,0,.28);
  --dur:160ms; --ease:cubic-bezier(.2,.6,.2,1);
}
```

**Contrast / AA gating (important):**
- `--text` 16.1:1, `--text-body` 13.2:1, `--muted` 5.4:1 on `--bg` → all pass AA for body text.
- `--dim` (3.2:1), `--primary` (4.1:1), `--verified` (4.3:1) on `--bg` are **AA-Large only** → use only for text ≥24px / ≥19px bold, or for non-text/UI.
- Red text links at body size → use `--primary-strong` (5.1:1). CTA label on `--primary` fill (4.2:1) is only safe at bold ≥18.66px; otherwise fill with `--primary-strong` (5.4:1).
- Console: `--console-text` on `--console-bg` 10.6:1; `--console-salmon-dim` 4.9:1. (Ratios are computed estimates — re-verify with a checker in CI.)

**Type:** `Aldrich` (Google) — display, headings, labels, stat numbers (caps + letter-spacing for labels). `Space Mono` (Google) — body, UI, terminal, meta. Never paragraphs in Aldrich; never headings in Space Mono.
Scale: H1 clamp(40–62)/lh1.03 · H2 clamp(28–38)/lh1.08 · H3 22–24/lh1.15 · eyebrow Space Mono 700 13px/.16em/UPPER · stat clamp(40–56)/lh1 · body Space Mono 17/1.65 · small 14/1.6 · UI 14/700/.04em.

**Spacing:** 4px base → 4,8,12,16,24,32,48,64,96,128. Section padding 96 desktop / 56 mobile. Container max 1180, prose 720, grid gutter 24–32.
**Radii:** chip 6 · button/input 8 · console 12 · card 16.
**Motion:** transitions 160ms `--ease`. One signature animation: red cursor blink `1.06s steps(2,start)`. `@media (prefers-reduced-motion:reduce)` → cursor solid, transitions 0ms.

## Primitives (`.vn-*`)
- **K · `.vn-terminal`** — reusable dark `.exe` window: `.vn-terminal__bar` (3 dots + monospace title, `--console-head`) + `.vn-terminal__body` (`--console-bg`/`--console-text`, lh 1.9, radius 12, `--sh-console`). **Stays dark in light mode.** Used by the truth-gap module and contact form. Decorative dots get `aria-hidden`.
- **F · buttons** — `.vn-btn-filled` (`--primary` → hover/active `--primary-strong`, radius 8, min-height 44px, `→` icon trails) and `.vn-btn-outline` (transparent, `--border-accent` border → hover fills `--primary-strong`). Focus = 2px `--text` outline, 2px offset (never remove). Disabled = neutral `#EDE9E6` fill, not faded red.
- **E · `.vn-card` / `.vn-stat-number`** — white card, hairline + 2px `--border-accent` top rule, radius 16; grid `repeat(auto-fit,minmax(220px,1fr))`, gap 16. Stat number in Aldrich; green only for genuinely positive deltas.
- **L · `.vn-prose`** — max-width 720, body 16–17/1.7, h2/h3 Aldrich w/ 1.4em top margin, links `--primary-strong` underline w/ 3px offset, list markers `▸` in `--primary`, blockquote 3px red left rule, inline code salmon-on-`--bg-alt`.

## Components (anatomy · states · responsive · where it lives)
- **A · Header / nav** (snippet #7) — terminal logo left, links, Tools **dropdown** (`aria-expanded`/`aria-controls`, Esc-to-close), CTA right. Active = red underline; hover `--primary-strong`. **≤860px:** hamburger → full-height drawer with focus trap + scroll-lock. Sticky; border strengthens on scroll.
- **B · Footer** (snippet #7/#8) — brand block + nav + contact columns + `Suya AB · 559024-5717` org line; 4→1 column on mobile.
- **C · Cookie banner** (snippet #11, HubSpot re-skin) — bottom-fixed console bar, Accept / Decline / Settings, console palette (AA 10.6:1).
- **D · Truth-gap module** (home, **signature**) — 3-col grid: Platform-reported panel (`~26%`, muted) · gap pillar (`+283%`, red) · Verified server-side panel (`100%`, green), with a dark console verdict readout below. Real client data only. Stacks 1-col ≤760px (pillar becomes a divider row).
- **E · Stat grid** — see primitives.
- **G · Author bio box** (snippet #18, single posts) — round headshot (real image via #19 avatar override) + name (Aldrich) + first-person bio + "connect on LinkedIn →". Stacks ≤520px.
- **H · Testimonial card + filters** (CPT #16 + shortcode `[vn_testimonials]` #17) — result headline (Aldrich) · stars (`--primary`) · quote · "read full story" via native `<details>` · author/role/niche. Filter chips: active = solid dark chip. Empty state: terminal line `// no results for {niche}`. **NDA:** niche labels, never SaaS client names.
- **I · Contact form** (page 15 → HubSpot Submissions API) — Name/Email/Company/Message + honeypot, in `.vn-terminal` chrome. States: default / focus (salmon border) / error (inline `! message`, `aria-invalid` + `aria-describedby`) / loading (`SENDING…` blinking) / success (`✓ message received — reply within 1 business day`, `aria-live=polite`).
- **J · Client logo strip** (home) — grayscale at rest → color on hover; optical sizing (cap-height aligned); wraps 2-up on mobile.

## Screens / views (section order · grid · mobile)
1. **Home** `/` (id 10) — Hero → logo strip (J) → truth-gap (D) → console case → "What we do" (3 service cards, E) → CTA band. 96px rhythm; single-col mobile, console scrolls-x.
2. **Blog archive** `/blog/` (id 12) — branded post cards (title/byline/date/category chip/excerpt), grid `auto-fit minmax(320px,1fr)`, terminal pagination `‹ prev · next ›`.
3. **Single post** `/blog/<post>/` — prose (L) 720 · `//` eyebrow meta header · author bio (G) · prev/next · share.
4. **About** `/about/` (id 13) — founder story (prose) → credibility stat row (E) → values.
5. **Services** `/services/` (id 14) — service blocks (Paid Search & Social · B2B Outreach · SEO/AEO & content · Automation) as feature cards w/ `▸` lists + CTA; 2-col ≥760.
6. **Results** `/testimonials/` (id 54) — filter chips → testimonial grid (H) → empty state.
7. **Contact** `/contact/` (id 15) — 2-col: form `.exe` (I) + info column (locations, email, response-time card); form-first on mobile.
8. **Tools hub** `/tools/` (id 47) — **create**: intro + tool cards linking out (Compliance Check…), each `title · one-liner · run →`.
9. **Compliance Check** `/compliance-check/` (id 32) — **biggest lift**: wrap `[compliance_audit]` plugin form in `.exe` chrome, restyle inputs/result to tokens, brand the report as a console readout + email capture.
10. **Privacy / Terms** `/privacy/` (29) · `/terms/` (41) — prose (L) only.
11. **Author archive** `/author/yannskaalen/` — branded "about the author" header (headshot + bio) + post list (reuses archive cards).
12. **404 / search / empty** — **create**: 404 as console `$ command not found — try /services` + links; search reuses archive cards; empty = terminal one-liner.

## Interactions & behavior
- Nav dropdown + mobile drawer (open/close, Esc, focus trap, scroll-lock).
- Testimonial `<details>` disclosure; filter chips toggle visible cards.
- Contact form: client validation → HubSpot Submissions API POST → loading → success/error, all in terminal voice.
- Cursor blink is the only decorative animation; disabled under reduced-motion. Motion never conveys state.

## Accessibility
Visible `:focus-visible` everywhere (2px `--text`, 2px offset) + skip-to-content link. Contrast gating per the token table. ARIA on nav (`aria-expanded`/`aria-controls`), forms (`aria-invalid`/`aria-describedby`/`aria-live`), disclosure via native `<details>`. Decorative dots/cursor `aria-hidden`. Honor `prefers-reduced-motion`.

## Build order (ship in independent passes)
- **P0 · Foundation** → snippet #7: `:root` tokens · terminal chrome (K) · buttons (F) · prose (L) · section/grid rhythm. Unblocks everything.
- **P1 · Global chrome** → #7/#8/#11: header + nav + mobile drawer (A) · footer (B) · cookie banner (C). *Mobile nav is the top fire.*
- **P2 · Home signature** → page 10: truth-gap (D) · stat grid (E) · logo strip (J).
- **P3 · Content system** → posts/#18/#19/#16/#17: blog archive + single + prose · author bio (G) · author archive · testimonials (H).
- **P4 · Conversion** → pages 15/47/32: contact form (I) · Tools hub · Compliance Check (largest lift).
- **P5 · Edge states** → new templates / 29 / 41: 404 / search / empty · legal prose.
- **Cross-cutting (every pass):** AA contrast check on touched text · reduced-motion guard · schema as **Rank Math enhancement only** (filter the graph; never duplicate JSON-LD).

## Assets
- Brand logo (wordmark + `>_` icon, light/dark, SVG + PNG) lives in the site's `/brand` directory — use those, inline the SVG (upload blocked).
- Author headshot via the #19 avatar override.
- Client logos (AI Finans, Odontia, Finepart, EM24, Thunderhoney) — supply real files; render grayscale→color.
- This bundle uses placeholder boxes for logos/headshot; swap in real assets.

## Files
- `Velocity North — Design System.dc.html` — the rendered styleguide + spec (open in a browser; it streams live). Source of truth for visual detail and paste-ready CSS.

## How to use with Claude Code
1. Place this `design_handoff_velocitynorth/` folder inside the repo you keep the site's snippets/templates in (or open the folder itself in Claude Code).
2. Start with: *"Read design_handoff_velocitynorth/README.md and the HTML doc. Implement P0 (Foundation) as CSS for Code Snippet #7, following the tokens and primitive specs exactly. Output the snippet CSS."* Then proceed pass by pass (P1, P2, …).
3. Keep Claude Code honest on the constraints: CSS-in-Code-Snippets + inline SVG + Rank Math schema filters (no duplicate JSON-LD) + HubSpot Submissions API for the form.
