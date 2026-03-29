# agents.md

## Purpose

Guidelines for AI agents to convert React/Figma designs into WordPress PHP themes using the theme boilerplate.

---

## General Instructions

* All content renders via PHP templates or Gutenberg blocks.
* **No React frontend** — React only exists in `src/blocks/*/index.js` for the editor.
* **Tailwind CSS** is preconfigured; use utility classes for all styling.
* **Motion animations** handled via `data-motion` attributes; no custom JS per block needed unless adding complex logic.
* **Framer Motion Transition**: Since React/Figma designs and Figma Make AI often utilize Framer Motion, use `motion-presets.js` prebuilt animations to match the timing and feel of those designs within the PHP environment.

---

## File Structure (Simplified)

* **src/**
    * **css/**: Tailwind + theme styles
    * **js/**: motion-presets.js, navigation.js, page-transition.js, single.js
    * **blocks/**: Gutenberg blocks (React edit + PHP render)
    * **theme/**: Compiled PHP theme output (assets, template-parts, blocks)

* Blocks output compiled by `wp-scripts` into `theme/blocks`.
* JS + CSS output compiled by Vite into `theme/assets`.

---

## Workflow

### 1. Create Templates / Sections
* Global sections: `header.php`, `footer.php` inside `src/theme/template-parts`.
* Other sections can be blocks if reusable.
* Add `data-motion` attributes for entrance, hover, or continuous animations.

### 2. Create Gutenberg Blocks
1. Create `src/blocks/<blockname>/`:
    * `block.json` — define attributes, editor script, render path.
    * `index.js` — React edit component for the block editor.
    * `render.php` — frontend PHP render.
2. Add `data-motion` to elements for animations.
3. Run `npm run dev` to compile block JS to `theme/blocks`.

### 3. Add Custom Animations
* For templates or blocks, add JS files in `src/js/` and import in `src/index.js`.
* Animations can use `motion` directly or rely on `motion-presets.js`.

### 4. Styling
* Use Tailwind classes for layout, spacing, typography.
* Custom colors and fonts via CSS variables in `src/css/theme.css`.

---

## Animation Reference

* **Entrance**: `fade-up`, `fade-down`, `fade-left`, `fade-right`, `fade-in`, `zoom-in`, `zoom-out`
* **Hover**: `hover-lift`, `hover-scale`, `hover-glow`, `hover-dim`, `hover-rise`, `hover-bright`, `hover-arrow`, `hover-card`
* **Continuous**: `blob`, `spin`, `ping`, `pulse`, `bounce`, `float`, `wiggle`, `heartbeat`
* **Stagger**: `stagger-fade-up`, `stagger-fade-in`, `stagger-fade-left`
* **Parallax**: `parallax` — parent must have `overflow:hidden`; image should be `height:130%`
* **Data Attributes**: `data-duration`, `data-delay`, `data-scroll`, `data-scroll-start`, `data-ease`, `data-stagger`, `data-x`, `data-y`, `data-scale`, `data-opacity-to`

### Combining Animations
Chain multiple animations with a space. Avoid combining animations that own the same CSS property simultaneously:

| Property | Animations that own it |
|---|---|
| `y` | fade-up, fade-down, float, bounce, hover-lift, hover-rise |
| `x` | fade-left, fade-right, hover-arrow |
| `scale` | zoom-in, zoom-out, pulse, heartbeat, blob, hover-scale |
| `opacity` | fade-*, blob, hover-dim, hover-bright, ping |
| `rotate` | spin, wiggle |

```html
<!-- Safe combinations -->
<div data-motion="fade-up hover-scale" data-scroll="true">...</div>
<div data-motion="fade-in hover-lift" data-scroll="true">...</div>

<!-- Avoid — same property group -->
<div data-motion="float hover-lift">...</div>
```

### hover-arrow
Requires a child element with `[data-arrow]` and `display:inline-block`:
```html
<a data-motion="hover-arrow" href="#">
  Read more <span data-arrow style="display:inline-block">→</span>
</a>
```

### .motion-glowing
`hover-glow`, `hover-card`, and `focus-glow` toggle a `.motion-glowing` class. Add to your global stylesheet:
```css
.motion-glowing {
  box-shadow: 0 0 0 3px color-mix(in srgb, var(--color-primary) 40%, transparent);
  transition: box-shadow 0.2s ease;
}
```

---

## Pages

* **Front Page**: Use blocks for hero, about, services, contact, work.
* **Inner Pages**: Use blocks; fallback to `page.php`.
* **Blog**: `home.php` for listing, `single.php` for posts.

---

## Output

* Fully compiled theme lives in `src/theme/`.
* `npm run package` or `npm run package:zip` generates a clean WordPress-ready theme folder.
* JS/CSS assets prebuilt in `theme/assets`.
* Blocks prebuilt in `theme/blocks`.

---

## Notes

* Always prefer **blocks** for reusable sections; templates only for global or static elements.
* `data-motion` allows animations without per-element JS.
* Tailwind + CSS variables handle styling; Motion handles motion.
* No React code should exist on the frontend; only in block editor.

---

### Example: Adding a Hero Block

1. Create `src/blocks/hero/` with `block.json`, `index.js`, and `render.php`.
2. Use Tailwind for styling and `data-motion` for animations.
3. Compiles automatically to `theme/blocks/hero/` for frontend.

---

### Example: Template Header with Motion Presets

`src/theme/template-parts/navigation.php`:

```php
<?php
/**
 * Navigation Template Part
 * Shows entrance animations on load and hover effects on interactive elements.
 */
?>

<header
  class="bg-background text-foreground py-4"
  data-motion="fade-down"
  data-duration="1"
  data-delay="0.2"
>
  <nav class="container mx-auto flex justify-between items-center">
    <a
      href="<?php echo home_url(); ?>"
      class="inline-block"
      data-motion="hover-scale"
    >
      <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Logo" class="h-12 w-auto">
    </a>

    <ul
      class="flex gap-8 list-none"
      data-motion="stagger-fade-in"
      data-delay="0.6"
      data-stagger="0.1"
    >
      <li><a href="/work" data-motion="hover-lift">Work</a></li>
      <li><a href="/services" data-motion="hover-lift">Services</a></li>
      <li><a href="/contact" data-motion="hover-lift">Contact</a></li>
    </ul>
  </nav>
</header>
```
