# WordPress Theme Boilerplate

A flexible, production-ready WordPress theme boilerplate combining PHP template parts with Gutenberg blocks. Built with Tailwind CSS v4, Motion animations, Vite, and wp-scripts. Designed for fast project setup with a clean hybrid architecture.

## Stack

- **PHP** — WordPress theme templates and block rendering
- **Tailwind CSS v4** — utility-first styling with CSS variable theming
- **Motion + motion-presets.js** — declarative scroll-triggered animations via `data-motion` attributes
- **Vite** — global JS and CSS bundling
- **wp-scripts** — Gutenberg block compilation
- **concurrently** — runs both build tools in parallel

## Architecture

This boilerplate uses a **hybrid approach**:

- **Template parts** — navigation and footer, always present via `header.php` / `footer.php`
- **Blocks** — page content (hero, about, services, contact, work) managed via the block editor
- **PHP render** — all blocks render on the frontend via `render.php`, no React on the frontend
- **motion-presets.js** — global declarative animation system, no per-block JS needed

### Build Output
```
dist/           ← Vite output — global JS + Tailwind CSS
build/
└── blocks/     ← wp-scripts output — compiled block JS
```

## Project Structure
```
.
├── scripts/
│   ├── package-theme.js
│   └── symlink.js
├── src/
│   ├── index.css           # Tailwind entry (root of src/)
│   ├── index.js            # Vite entry (root of src/)
│   ├── css/                # Contains fonts.css, tailwind.css, theme.css
│   ├── js/                 # Contains motion-presets.js, navigation.js, etc.
│   ├── blocks/             # Source Gutenberg blocks (about, contact, hero, etc.)
│   └── theme/              # The active theme directory
│       ├── 404.php
│       ├── archive.php
│       ├── footer.php
│       ├── front-page.php
│       ├── functions.php
│       ├── header.php
│       ├── home.php
│       ├── index.php
│       ├── page.php
│       ├── screenshot.png
│       ├── search.php
│       ├── single.php
│       ├── style.css
│       ├── assets/         # (Build/Copy target)
│       ├── blocks/         # (Compile target)
│       └── template-parts/
├── .gitignore
├── README.md
├── agents.md
├── package.json
├── package-lock.json
└── vite.config.js
```

## Getting Started

### 1. Install dependencies
```bash
npm install
```

### 2. Create symlink to Local WP
```bash
npm run link
```
Before running, update `wpSiteName` in `symlink.js` to match your Local WP site name:
```javascript
const wpSiteName = 'wp-theme'; // Change this to your Local WP site name
```
*used by variable wpThemesDir*
```javascript
const wpThemesDir = path.join(os.homedir(), 'Local Sites', wpSiteName, 'app', 'public', 'wp-content', 'themes');
```
*outputs into*
```
~/Local Sites/${wpSiteName}/app/public/wp-content/themes
```
Then activate the theme in WP Admin → Appearance → Themes.

### 3. Start development
```bash
npm run dev
```
Runs both Vite and wp-scripts in watch mode via `concurrently`. Vite outputs to `dist/`, wp-scripts outputs to `build/blocks/`.

### 4. Force a full rebuild
```bash
npm run build
```

### 5. Package for local testing
```bash
npm run package
```
Outputs a clean theme folder to `release/theme-name/` — no dev files included. Copy to your Local WP themes folder to test before deployment.

### 6. Package as zip for deployment
```bash
npm run package:zip
```
Outputs `release/theme-name.zip` — ready to upload to WordPress.

### 7. Remove symlink when done
```bash
npm run unlink
```

## Templates

Templates are inside the template-parts area. These templates are not reusable compared to blocks, but are necessary for global sections like navigation and footer. If you want to add custom animations not covered in `motion-presets.js` for the templates, create a `.js` file inside `src/js` and import it in `src/index.js`. It is enqueued in `functions.php` so it will work immediately.

## Blocks

Blocks are registered automatically via glob in `functions.php`:
```php
foreach (glob(get_template_directory() . '/build/blocks/*/block.json') as $block) {
  register_block_type($block);
}
```

Each block follows this structure:
```
src/blocks/blockname/
├── block.json    ← block registration, attributes, render path
├── index.js      ← React edit() for the block editor
└── render.php    ← PHP frontend render
```

No `view.js` needed — animations are handled globally by `motion-presets.js`. If you need custom JS logic for a specific block, create a `view.js` for it.

### Adding a New Block
1. Create `src/blocks/newblock/` with `block.json`, `index.js`, `render.php`
2. Register block type and edit component in `index.js`:
```javascript
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';

registerBlockType('theme/newblock', {
  edit: function Edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps();
    return (
      <div {...blockProps}>
        {/* editor UI */}
      </div>
    );
  },
  save: () => null, // PHP render handles frontend
});
```
3. Define attributes and render path in `block.json`:
```json
{
  "apiVersion": 3,
  "name": "theme/newblock",
  "title": "New Block",
  "category": "theme",
  "attributes": {
    "title": { "type": "string", "default": "Default Title" }
  },
  "editorScript": "file:./index.js",
  "render": "file:./render.php"
}
```
4. Add `data-motion` attributes to elements in `render.php`
5. Run `npm run dev` — wp-scripts auto-discovers and compiles it
6. Add the block to a page via the block editor

## WordPress Setup

### Front Page
1. Create a page with slug `home`
2. WP Admin → Settings → Reading → set as Homepage
3. Add blocks via the block editor — hero, about, services, contact etc.

### Inner Pages
1. Create a page (e.g. `/about`, `/services`, `/work`)
2. Add the relevant block via the block editor
3. `page.php` handles all inner pages — no separate page templates needed

### Blog
1. Create a page titled "Blog" with slug `blog`
2. WP Admin → Settings → Reading → set "Posts page" to "Blog"
3. Visit `/blog` — `home.php` loads automatically

## motion-presets.js

Global declarative animation system. Add `data-motion` to any element — no custom JS required.

```html
<!-- Entrance animations -->
<div data-motion="fade-up" data-scroll="true" data-delay="0.2">...</div>
<div data-motion="fade-down" data-scroll="true">...</div>
<div data-motion="fade-left" data-scroll="true">...</div>
<div data-motion="fade-right" data-scroll="true">...</div>
<div data-motion="zoom-in" data-scroll="true">...</div>
<div data-motion="zoom-out" data-scroll="true">...</div>

<!-- Hover animations -->
<a data-motion="hover-lift">...</a>
<div data-motion="hover-dim">...</div>
<div data-motion="hover-scale">...</div>
<div data-motion="hover-glow">...</div>
<div data-motion="hover-rise">...</div>
<div data-motion="hover-card">...</div>
<a data-motion="hover-arrow">Link <span data-arrow style="display:inline-block">→</span></a>

<!-- Continuous animations -->
<div data-motion="spin" data-duration="8">...</div>
<div data-motion="float" data-y="-20" data-duration="4">...</div>
<div data-motion="blob" data-scale="1.3" data-x="50" data-y="30">...</div>
<div data-motion="ping" data-duration="1.5">...</div>
<div data-motion="heartbeat" data-duration="0.4">...</div>
<div data-motion="bounce">...</div>
<div data-motion="wiggle">...</div>
<div data-motion="pulse">...</div>

<!-- Parallax (parent must have overflow:hidden) -->
<div class="overflow-hidden" style="height:400px;">
  <img data-motion="parallax" style="height:130%;" src="..." />
</div>

<!-- Stagger children -->
<div data-motion="stagger-fade-up" data-scroll="true" data-stagger="0.15">
  <div>Child 1</div>
  <div>Child 2</div>
  <div>Child 3</div>
</div>

<!-- Combine animations -->
<div data-motion="fade-up hover-lift" data-scroll="true">...</div>
```

### Available Data Attributes

| Attribute | Default | Notes |
|---|---|---|
| `data-duration` | `0.6` | Animation duration in seconds |
| `data-delay` | `0` | Delay before animation starts |
| `data-scroll` | `false` | Trigger on scroll into view |
| `data-scroll-start` | `0.2` | IntersectionObserver threshold (0–1). Use `0.1` for elements near the bottom of a section |
| `data-ease` | `easeOut` | Motion easing string — accepts `easeOut`, `easeIn`, `easeInOut`, `linear`, or a cubic-bezier array |
| `data-stagger` | `0.1` | Delay between stagger children in seconds |
| `data-x` | `0` | X offset for `blob` |
| `data-y` | `-20` | Y offset for `blob` / `float` |
| `data-scale` | `1.2` | Scale target for `blob` / `pulse` |
| `data-opacity-to` | `0.6` | Opacity target for `blob` |

### Combining Animations

Multiple animations can be chained with a space. Keep in mind that two animations owning the same CSS property will conflict if they run simultaneously — safe pairings touch different property groups:

| Property group | Animations |
|---|---|
| `y` | fade-up, fade-down, float, bounce, hover-lift, hover-rise |
| `x` | fade-left, fade-right, hover-arrow |
| `scale` | zoom-in, zoom-out, pulse, heartbeat, blob, hover-scale |
| `opacity` | fade-*, blob, hover-dim, hover-bright, ping |
| `rotate` | spin, wiggle |

```html
<!-- Safe — different property groups -->
<div data-motion="fade-up hover-scale" data-scroll="true">✓</div>
<div data-motion="fade-in hover-lift" data-scroll="true">✓</div>
<div data-motion="fade-left hover-card" data-scroll="true">✓</div>

<!-- Avoid — same property group running simultaneously -->
<div data-motion="float hover-lift">⚠️ both own y</div>
<div data-motion="fade-up fade-left">⚠️ redundant entrances</div>
```

### .motion-glowing

`hover-glow`, `hover-card`, and `focus-glow` toggle a `.motion-glowing` CSS class. Add this to your global stylesheet:

```css
.motion-glowing {
  box-shadow: 0 0 0 3px color-mix(in srgb, var(--color-primary) 40%, transparent);
  transition: box-shadow 0.2s ease;
}
```

## Dark Mode

Dark mode is built in via CSS variables. Toggled by adding `.dark` to `<html>` — no Tailwind `dark:` classes needed since everything uses CSS variables.

The navigation includes a sun/moon icon button that persists the user's preference to `localStorage`. A small inline script in `header.php` applies the saved preference before CSS loads to prevent flash:
```php
<script>
  if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark');
  }
</script>
```

To customize colors for each mode, edit `src/css/theme.css`:
```css
:root {
  --background: #ffffff;
  --foreground: oklch(0.145 0 0);
  --primary: #030213;
  /* all light mode variables */
}

.dark {
  --background: oklch(0.145 0 0);
  --foreground: oklch(0.985 0 0);
  --primary: oklch(0.985 0 0);
  /* all dark mode variables */
}
```

## Theme Customization

### Colors
Edit CSS variables in `src/css/theme.css` under `:root` for light mode and `.dark` for dark mode. All Tailwind utility classes like `bg-background`, `text-foreground`, `bg-primary` etc. automatically reflect these variables everywhere.

### Fonts
Edit `src/css/fonts.css` to swap Google Fonts imports. Update font variables in `theme.css`:
```css
--font-headline: 'Poppins', sans-serif;
--font-body: 'Inter', sans-serif;
```

### Navigation Links
Update URLs and labels in `template-parts/navigation.php`:
```php
$url_about    = home_url('/about');
$url_services = home_url('/services');
$url_work     = home_url('/work');
$url_contact  = home_url('/contact');
```

### Logo
Replace `assets/logo.png` with your own logo. The navigation and footer both reference this file automatically.

## Deployment

1. Update theme name and details in `style.css`:
```css
/*
Theme Name: Your Theme Name
Author: Your Name
Version: 1.0.0
*/
```
2. Replace `screenshot.png` with your theme thumbnail (recommended: 1200×900px)
3. Run `npm run package:zip` to generate `release/themename.zip`
4. Upload via WP Admin → Appearance → Themes → Add New → Upload

## Requirements

- WordPress 6.0+
- Node.js 18+
- Local WP (for symlink feature)

---

### <p align="center">Happy Theme Building!</p>
```php
<?php
// Silence is golden.
```
