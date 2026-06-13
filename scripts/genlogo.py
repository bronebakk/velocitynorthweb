#!/usr/bin/env python3
"""Generate Velocity North logo SVGs from the Aldrich font with text outlined
to vector paths (font-independent). Requires fonttools and Aldrich-Regular.ttf.
Writes into ../brand/. PNG exports are rendered separately via headless Chrome.
"""
from fontTools.ttLib import TTFont
from fontTools.pens.svgPathPen import SVGPathPen

import os, sys
FONT = os.environ.get("ALDRICH_TTF", "/tmp/Aldrich-Regular.ttf")
OUT  = os.path.join(os.path.dirname(os.path.dirname(os.path.abspath(__file__))), "brand")
if not os.path.exists(FONT):
    sys.exit("Aldrich-Regular.ttf not found. Download from Google Fonts (ofl/aldrich) and set ALDRICH_TTF.")

font = TTFont(FONT)
upm = font["head"].unitsPerEm
cmap = font.getBestCmap()
gs = font.getGlyphSet()
hmtx = font["hmtx"]
# cap height for vertical sizing
capH = font["OS/2"].sCapHeight if hasattr(font["OS/2"], "sCapHeight") and font["OS/2"].sCapHeight else int(upm*0.7)

def glyph_path(ch):
    gname = cmap.get(ord(ch))
    if gname is None:
        return None, int(upm*0.30)
    pen = SVGPathPen(gs)
    gs[gname].draw(pen)
    return pen.getCommands(), hmtx[gname][0]

def layout(text, letterspace=0):
    """Return list of (path_d, x_units) and total advance in font units."""
    x = 0; items = []
    for ch in text:
        d, adv = glyph_path(ch)
        if d:
            items.append((d, x))
        x += adv + letterspace
    return items, x - (letterspace if text else 0)

def build_wordmark(filename, color_prompt, color_text, color_cursor, ls=40, size=64, pad=24):
    s = size / upm
    # segments: ">" then " " then "Velocity North"
    prompt_items, prompt_w = layout(">", ls)
    gap = int(upm*0.28)
    text_items, text_w = layout("Velocity North", ls)
    total_units = prompt_w + gap + text_w
    cursor_w_units = int(upm*0.12)
    cursor_gap = int(upm*0.18)
    total_units += cursor_gap + cursor_w_units

    W = pad*2 + total_units*s
    H = pad*2 + capH*s
    baseline = pad + capH*s

    def grp(items, xoff_units, color):
        out = []
        for d, x in items:
            tx = pad + (xoff_units + x)*s
            out.append(f'<path transform="translate({tx:.2f},{baseline:.2f}) scale({s:.5f},{-s:.5f})" d="{d}" fill="{color}"/>')
        return "\n".join(out)

    parts = []
    parts.append(grp(prompt_items, 0, color_prompt))
    parts.append(grp(text_items, prompt_w+gap, color_text))
    cx = pad + (prompt_w+gap+text_w+cursor_gap)*s
    cw = cursor_w_units*s
    parts.append(f'<rect x="{cx:.2f}" y="{baseline-capH*s:.2f}" width="{cw:.2f}" height="{capH*s:.2f}" fill="{color_cursor}"/>')

    svg = (f'<svg xmlns="http://www.w3.org/2000/svg" width="{W:.0f}" height="{H:.0f}" '
           f'viewBox="0 0 {W:.2f} {H:.2f}" role="img" aria-label="Velocity North">\n'
           + "\n".join(parts) + "\n</svg>\n")
    open(f"{OUT}/{filename}","w").write(svg)
    return W, H

def build_icon(filename, color_prompt, color_cursor, size=200, pad=34):
    s = size / upm
    prompt_items, prompt_w = layout(">", 0)
    cursor_gap = int(upm*0.16)
    cursor_w_units = int(upm*0.42)   # wider underscore-style cursor
    total_units = prompt_w + cursor_gap + cursor_w_units
    W = pad*2 + total_units*s
    H = pad*2 + capH*s
    baseline = pad + capH*s
    parts = []
    for d, x in prompt_items:
        tx = pad + x*s
        parts.append(f'<path transform="translate({tx:.2f},{baseline:.2f}) scale({s:.5f},{-s:.5f})" d="{d}" fill="{color_prompt}"/>')
    cx = pad + (prompt_w+cursor_gap)*s
    cw = cursor_w_units*s
    bar_h = capH*s*0.16
    parts.append(f'<rect x="{cx:.2f}" y="{baseline-bar_h:.2f}" width="{cw:.2f}" height="{bar_h:.2f}" fill="{color_cursor}"/>')
    svg = (f'<svg xmlns="http://www.w3.org/2000/svg" width="{W:.0f}" height="{H:.0f}" '
           f'viewBox="0 0 {W:.2f} {H:.2f}" role="img" aria-label="Velocity North icon">\n'
           + "\n".join(parts) + "\n</svg>\n")
    open(f"{OUT}/{filename}","w").write(svg)
    return W, H

# Light background (dark text) — primary
w1 = build_wordmark("velocitynorth-logo.svg",       "#9A8B85", "#1A1411", "#D1402F")
# Dark background (light text)
w2 = build_wordmark("velocitynorth-logo-dark.svg",  "#886660", "#F4F1EF", "#DB4434")
# Compact icon ">_" light + dark
i1 = build_icon("velocitynorth-icon.svg",      "#1A1411", "#D1402F")
i2 = build_icon("velocitynorth-icon-dark.svg", "#F4F1EF", "#DB4434")

print(f"wordmark light: {w1[0]:.0f}x{w1[1]:.0f}")
print(f"wordmark dark:  {w2[0]:.0f}x{w2[1]:.0f}")
print(f"icon:           {i1[0]:.0f}x{i1[1]:.0f}")
import os
for f in sorted(os.listdir(OUT)):
    print("  ", f, os.path.getsize(f"{OUT}/{f}"), "bytes")
