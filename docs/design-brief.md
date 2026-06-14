# Velocity North — Design Brief (for Claude Design agent)

**Goal:** Audit and unify the design of velocitynorth.ai across every screen and
component, then hand back per-screen + per-component design specs I can implement
directly in the live stack. This document is the inventory + intent. The design
agent should return: design tokens, component specs (all states), per-screen
layouts, responsive rules, accessibility notes, and a prioritized build order.

---

## 1. What the site is

Velocity North is a performance-marketing agency. Core differentiator — the
**"truth gap"**: ad platforms under-report conversions (consent walls, Safari
ITP, iOS ATT), so platform dashboards lie. Velocity North reconciles every
conversion **server-side** (via Digtective/Digger) and optimises on real
profitability, not platform-reported numbers. Tone: direct, technical, no fluff.

Operator: **Suya AB**, org. no. 559024-5717. Locations: Gothenburg & Oslo.

---

## 2. Tech & delivery constraints (the design MUST fit these)

- **Stack:** WordPress + **GeneratePress + GP Premium** theme. **No custom theme,
  no build step.** All styling is injected as CSS via Code Snippets (`wp_head`),
  all custom HTML via snippet hooks / shortcodes / page content (`wp:html` blocks).
- **Rank Math** owns SEO + schema (JSON-LD). Enhance its graph via filters —
  never emit duplicate/competing schema.
- **SVG upload is blocked** by the host → use **inline SVG** in markup. Brand
  logo assets live in `/brand` (wordmark + `>_` icon, light/dark, SVG + PNG).
- **HubSpot** (portal 148224378) + **GTM** (GTM-TK7F6GLG) are live; the contact
  form posts to the HubSpot Submissions API (custom-built, not an iframe embed).
- Deliverables must be expressible as: CSS rules, small HTML fragments, and
  shortcode/CPT output. Assume single-author, low-CPT-volume.

---

## 3. Design system (current — to be formalized & audited)

**Type:** `Aldrich` (headings, logo, labels, stat numbers — uppercase/letterspaced),
`Space Mono` (body, terminal, UI). Both Google Fonts.

**Aesthetic:** developer-terminal motif on a warm light background — `>` prompts,
`//` comment-style eyebrows, a blinking red cursor block, `.exe` window chrome,
monospace everywhere. Selected "code/data" moments stay as **dark console insets**
even though the site is light.

**Color tokens (light mode, currently in use — please consolidate & check AA):**

| Token | Value | Use |
|---|---|---|
| `--bg` | `#FBFAF8` | page background (warm off-white) |
| `--bg-darker` | `#F4F1EF` | alt sections |
| `--card` | `#FFFFFF` | cards, form box |
| `--text` | `#1A1411` / `#2A211E` | headings / body |
| `--muted` | `#6E5B55` | secondary text |
| `--dim` | `#9A8B85` | tertiary / captions |
| `--primary` | `#D1402F` | brand red / accents / CTAs |
| `--primary-strong` | `#B5362A` | hover/active |
| `--border` | `rgba(0,0,0,.10)` | hairlines |
| `--border-accent` | `rgba(209,64,47,.28–.45)` | card top-accent |
| `--verified` | `#11854A` / fill `#2FBE71` | "truth"/server-side green |
| `--grid` | `rgba(0,0,0,.035)` @42px | faint grid overlay |
| **Dark console insets** | bg `#141210`, header `#0a0a0a`, text `#C9C2BC`, salmon `#f0ada2`/`#ba8077` | terminal/console blocks only |

**Logo:** `> Velocity North▮` — `>` in `--dim`, wordmark in Aldrich `--text`,
blinking cursor block `9px × 1em` in `--primary`. Spec + assets in `/brand`.

**Non-negotiables:** terminal/console insets stay dark in light mode; faithful
data only; **NDA — no B2B SaaS client names** (use finance / lead-gen cases as
proxies).

---

## 4. Screens (endpoints) — create / refine

Live pages (WordPress IDs) and their intended state. "Refine" = exists, needs
design pass; "Create/Expand" = missing or thin.

| # | Screen | URL (id) | Status | Design need |
|---|---|---|---|---|
| 1 | **Home** | `/` (10) | Refine | Hero, client-logo strip, **truth-gap** (concept + Thunderhoney case w/ console), "What we do", CTA. Tighten rhythm, section spacing, mobile. |
| 2 | **Blog archive** | `/blog/` (12) | Refine | Just unbroken (titles/links/container restored) but still GeneratePress-default styling. Needs branded post-list: cards, meta, byline, pagination, category chips. |
| 3 | **Single post** | `/blog/<post>/` | Refine | Article typography (headings, lists, blockquotes, code, images), reading width, **author bio box** (component #G), related/next-prev, share. |
| 4 | **About** | `/about/` (13) | Refine | Story + team/founder, credibility, consistency with system. |
| 5 | **Services** | `/services/` (14) | Refine | Service blocks (Paid Search & Social, B2B Outreach, SEO/AEO & content, Marketing automation). Cards/feature lists, CTA. |
| 6 | **Results / Testimonials** | `/testimonials/` (54, titled "Results") | Refine | Renders `[vn_testimonials]` (CPT cards + niche filters). Card design, filter chips, "read full story" disclosure, empty state. |
| 7 | **Contact** | `/contact/` (15) | Refine | Custom HubSpot form in a `.exe` terminal box (recently re-lit to light), contact info column, response-time card. Validate states. |
| 8 | **Tools (hub)** | `/tools/` (47) | **Create/Expand** | Only 564 chars. Landing that introduces the free tools (Compliance Check, etc.) — cards linking out. |
| 9 | **Compliance Check** | `/compliance-check/` (32) | Refine | `[compliance_audit]` form from the *Compliance Audit Tool* plugin. Snippet #15 only adds readability; needs full on-brand treatment (form, result/report, email-capture). |
| 10 | **Privacy Policy** | `/privacy/` (29) | Light refine | Legal long-form; ensure prose system + headings legible. |
| 11 | **Terms of Service** | `/terms/` (41) | Light refine | Same prose system as Privacy. |
| 12 | **Author archive** | `/author/yannskaalen/` | Refine | GP default + real headshot + bio now shows. Want a branded "about the author" header (à la a yannsfood "OM MEG" block) + their post list. |
| 13 | **404 / Search / no-results** | — | **Create** | Not yet designed. On-brand 404 (terminal "command not found"), search results, empty states. |

---

## 5. Components / patterns — create / refine

| Key | Component | Where it lives | Need |
|---|---|---|---|
| A | **Header / primary nav** | GP site-title styled as terminal logo (snippet #7) | Desktop + **mobile nav** (hamburger/drawer), active states, sticky behavior, Tools dropdown. |
| B | **Footer** | snippet #7 (`wp_footer`) | Brand block + nav + contact + Suya AB org line. Responsive columns. |
| C | **Cookie consent banner** | HubSpot, re-skinned (snippet #11) | Bottom bar, terminal styling, Accept/Decline + "Cookies settings". Confirm contrast/AA. |
| D | **Truth-gap module** | Home page HTML | Compare panels (Platform-reported vs Verified server-side), the "+283%" gap pillar, **dark console** readout. The signature component — needs a tight, responsive spec. |
| E | **Stat card / stat grid** | `.vn-card`, `.vn-stat-number` | Number + label cards (e.g. ~90% / 8× / ↓ spend). Grid + responsive. |
| F | **Buttons** | `.vn-btn-filled`, `.vn-btn-outline` | Filled/outline, hover/focus/disabled, icon (`→`) usage. |
| G | **Author bio box** | snippet #18 (single posts) | Headshot + name + first-person bio + "Connect on LinkedIn". Mobile stacking. |
| H | **Testimonial card + filters** | CPT `testimonial` (#16) + shortcode `[vn_testimonials]` (#17) | Result headline, stars, quote, "read full story" details, author/role/company, niche tag, filter chips. Card grid. |
| I | **Contact form** | custom HTML + JS → HubSpot Submissions API (in page 15) | Fields (Name/Email/Company/Message), honeypot, success/error states in terminal voice, focus/validation styling. |
| J | **Client logo strip** | Home | Grayscale→color logos, even optical sizing, responsive wrap. (AI Finans, Odontia, Finepart, EM24, Thunderhoney.) |
| K | **Console / `.exe` window chrome** | `.vn-terminal*` | Reusable dark window (title bar + body) used by truth-gap and contact. Define as a primitive. |
| L | **Prose / long-form** | `.vn-prose` | Legal + article body: headings, lists, links, emphasis, spacing. |
| M | **Section / container rhythm** | `.vn-section`, unwrap rules (page-scoped) | Vertical rhythm, max-widths, the faint grid overlay, light/alt section alternation. |

---

## 6. Endpoints / integrations inventory (context for the design agent)

**Active Code Snippets** (source of truth = WP DB; mirrored in `live/snippets/`):
- `#7` site chrome — header/footer/light-mode/section CSS (the bulk of styling)
- `#8` footer Privacy Policy link
- `#9` Google Tag Manager (GTM-TK7F6GLG)
- `#11` HubSpot cookie-banner terminal styling
- `#12` front-page single-H1 fix
- `#15` Tools/Compliance pages readability styling
- `#16` Testimonials CPT + `testimonial_niche` taxonomy + meta (`vn_author`, `vn_role`, `vn_company`, `vn_result`, `vn_rating`, `vn_logo`, `vn_case_url`)
- `#17` `[vn_testimonials]` display shortcode (cards + filters)
- `#18` author bio box (single posts)
- `#19` author SEO — avatar override + Rank Math Person schema (jobTitle, sameAs LinkedIn, image)

**Other:** `[compliance_audit]` shortcode (Compliance Audit Tool plugin) on
`/compliance-check/`. Plugins: GP Premium, Code Snippets, Compliance Audit Tool,
HubSpot (leadin), Rank Math. HTTPS forced at Kinsta/CF edge.

**REST surfaces used to implement:** `wp/v2/pages|posts|users|media|settings`,
`wp/v2/testimonials` (+ `testimonial-niche`), `code-snippets/v1/snippets`,
`rank_math/json_ld` filter, HubSpot Submissions API.

---

## 7. Known rough spots (please prioritize)

1. **Compliance Check + Tools pages** — least on-brand; plugin form needs a full design pass.
2. **Blog archive + single post** — functional but GeneratePress-default; needs the branded treatment.
3. **Mobile nav** — confirm header/nav behavior on small screens.
4. **Testimonial cards** — align card visual to the system (currently its own CSS in #17).
5. **Author archive** — branded "about" header.
6. **404 / search / empty states** — none designed.
7. **Token consolidation + AA contrast audit** across light bg, muted/dim text, and the dark console insets.

---

## 8. What to hand back to me (implementation brief)

For each screen and component above, please return:
- **Design tokens** — one consolidated set (colors, type scale, spacing, radii, shadows, motion), with AA contrast checked.
- **Component specs** — anatomy + all states (default/hover/focus/active/disabled/loading/empty/error), responsive behavior, and the exact terminal-motif rules.
- **Per-screen layouts** — section order, grid/max-width, spacing rhythm, mobile stacking, content slots.
- **Accessibility** — focus styles, contrast, ARIA for nav/disclosure/forms, reduced-motion for the blinking cursor.
- **Prioritized build order** — sequenced so I can ship in independent passes, mapped to the snippets/pages that change.

Keep everything expressible within the GeneratePress + Code-Snippets constraints in §2. Where a change touches schema, specify it as a Rank Math enhancement, not new JSON-LD.
