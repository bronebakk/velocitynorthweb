# velocitynorth.ai — live architecture

**This `live/` folder is the source of record for what actually runs on the
production site.** It is an exported backup, not a deployment target — editing
these files does not change the live site.

## How the site is actually built

The live site (and the Kinsta staging clone) runs **GeneratePress** (a vendor
theme) with **all customization injected through the Code Snippets plugin**.
The custom `velocitynorth` theme in `../theme/` is the *original* approach and
is **no longer deployed** — kept only for history/reference.

| Layer | Where it lives | In this repo |
|-------|----------------|--------------|
| Base theme | GeneratePress (vendor) | no |
| Design system, header, footer, light mode, spacing | Code Snippet #7 | `snippets/site-chrome.php` |
| Footer "Privacy Policy" link | Code Snippet #8 | `snippets/footer-privacy-link.php` |
| Google Tag Manager (GTM-TK7F6GLG) | Code Snippet #9 | `snippets/google-tag-manager.php` |
| HubSpot cookie-banner styling | Code Snippet #11 | `snippets/cookie-banner-styling.php` |
| Page content (incl. custom HubSpot contact form) | WordPress DB | `pages/*.html` |

## Editing the live site

The snippets and pages live in the **WordPress database**, reached via the
REST API (`/wp-json/code-snippets/v1/snippets`, `/wp-json/wp/v2/pages`).
Credentials are in `~/.config/wp-mcp/sites.json` (key `velocitynorth` for live,
`velocitynorth-staging` for staging) — **not** in this repo.

Workflow: edit via REST API or WP Admin → Snippets / Pages, then re-export to
keep this folder in sync.

## Integrations live on the site

- **Google Tag Manager** — container `GTM-TK7F6GLG`, loaded site-wide via snippet #9.
- **HubSpot** — portal `148224378` (EU). Contact form is a custom-designed form
  (in `pages/contact.html`) posting to the HubSpot Submissions API for form
  `ce7212bc-f62d-4a20-aa33-dbfb16616651`. CAPTCHA is disabled (replaced with a
  honeypot field); the site tracking script links submissions to visit history.
- **HTTPS** — `http://` 301-redirects to `https://` (handled at Kinsta/CF edge).

## Contact form & lead notifications

The contact form (`pages/contact.html`, page id 15) is **custom HTML/JS**, not a
HubSpot-embedded form. On submit it `fetch`-POSTs to the HubSpot **Submissions API**:

```
https://api-eu1.hsforms.com/submissions/v3/integration/submit/148224378/ce7212bc-f62d-4a20-aa33-dbfb16616651
```

Field → HubSpot property mapping (sent as `{name, value}` objects):

| Form field | HubSpot property |
|------------|------------------|
| First name | `firstname` |
| Last name  | `lastname`  |
| Email (required) | `email` |
| Company    | `company`   |
| Message    | `message`   |

- **Honeypot:** hidden `website` field. If filled, the JS fakes a success message
  and skips the POST (bot trap — CAPTCHA is intentionally disabled).
- Every real submission creates/updates a Contact and appears in **Marketing →
  Forms → Velocity North contact → submissions** and on the contact timeline.
  So submissions are never lost even if a notification isn't configured.

**Notifications** are configured in HubSpot (not in this repo / not in code):

- **Reliable — Workflow:** Automations → Workflows → Contact-based → trigger
  *Form submission* = Velocity North contact (`ce7212bc-…`) → action *Send internal
  email notification* (or Slack / Create task). Fires for Submissions-API posts.
- **Quick — form option:** Marketing → Forms → the form → Options → *Send form
  submission notifications to* → add emails. Test once; notification emails for
  API submissions can be flaky, so prefer the Workflow if it doesn't arrive.

**Gotcha:** any filled CTA that is an `<a>` (e.g. `.vn-h__btn--fill`) needs
`color:#fff !important` — a content link rule (`.entry-content a`) otherwise wins
and renders red-on-red text. The hero CTA hit this (fixed 2026-06). The form's
own submit is a `<button>`, so link rules don't touch it.

## Tools

- **Compliance audit tool** — a component embedded under **Tools** on the site.
  Its source lives in a separate repo:
  <https://github.com/bronebakk/compliance-audit-tool>. (Note: that repo once
  also held a stale mirror of the Code Snippets — retired 2026-06-15; snippets
  are mirrored only in this repo now.)

## Operator

Site operated by **Suya AB** (org. no. 559024-5717), trading as Velocity North.
