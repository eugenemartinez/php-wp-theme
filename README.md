# WordPress Theme Boilerplate

A flexible, production-ready WordPress theme boilerplate combining PHP template parts with Gutenberg blocks. Built with Tailwind CSS v4, GSAP animations, Vite, and wp-scripts. Designed for fast project setup with a clean hybrid architecture.

## Stack

- **PHP** — WordPress theme templates and block rendering
- **Tailwind CSS v4** — utility-first styling with CSS variable theming
- **GSAP + gsap-motion.js** — declarative scroll-triggered animations via `data-gsap` attributes
- **Vite** — global JS and CSS bundling
- **wp-scripts** — Gutenberg block compilation
- **concurrently** — runs both build tools in parallel

## Architecture

This boilerplate uses a **hybrid approach**:

- **Template parts** — navigation and footer, always present via `header.php` / `footer.php`
- **Blocks** — page content (hero, about, services, contact, work) managed via the block editor
- **PHP render** — all blocks render on the frontend via `render.php`, no React on the frontend
- **gsap-motion.js** — global declarative animation system, no per-block JS needed

### Build Output
```
dist/           ← Vite output — global JS + Tailwind CSS
build/
└── blocks/     ← wp-scripts output — compiled block JS
```

## Project Structure
```
├── assets/               ← theme assets (logo, images)
├── template-parts/
│   ├── navigation.php    ← fixed nav, always rendered via header.php
│   └── footer.php        ← footer, always rendered via footer.php
├── src/
│   ├── css/              ← fonts.css, tailwind.css, theme.css
│   ├── index.css         ← Tailwind entry
│   ├── index.js          ← Vite entry — gsap-motion + navigation + page transitions
│   └── js/
│       ├── gsap-motion.js      ← declarative animation wrapper
│       ├── navigation.js       ← mobile menu + scroll effect + dark mode
│       ├── page-transition.js  ← page transitions
│       └── single.js           ← share button for blog posts
├── src/blocks/
│   ├── hero/             ← block.json, index.js, render.php
│   ├── about/
│   ├── services/
│   ├── contact/
│   └── work/
├── dist/                 ← Vite compiled output (gitignored)
├── build/                ← wp-scripts compiled output (gitignored)
├── release/              ← packaged theme output (gitignored)
├── front-page.php        ← the_content() only
├── page.php              ← generic fallback for all inner pages
├── home.php              ← blog listing
├── single.php            ← single post
├── archive.php           ← category/tag archive
├── search.php            ← search results
├── 404.php               ← not found
├── header.php            ← renders navigation template part
├── footer.php            ← renders footer template part
├── index.php             ← silence is golden
├── style.css             ← theme registration
├── functions.php         ← enqueues dist/, registers blocks from build/
├── vite.config.js
├── package.json
├── package-theme.js      ← packaging script
└── symlink.js            ← Local WP symlink script
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
~/Local Sites/${wpSiteName}/app/public/wp-content/themes';
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

Templates are inside the template-parts area. These templates are not reusable compared to blocks. But this is necessary for global sections like navigation and footer, which I had a problem making them into blocks. Will explore this further in the future. If you want to add custom animations not covered in the `gsap-motion.js` for the templates, just create a .js file inside the `src/js` and then import in the `src/index.js`, or put it in that folder directly. it is enqueued in the functions.php so it should work immediately.

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

No `view.js` needed — animations are handled globally by `gsap-motion.js`. If you want to add custom animations or javascript logic for the blocks, create the view.js for it. 

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
4. Add `data-gsap` attributes to elements in `render.php`
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

## gsap-motion.js

Global declarative animation system. Add `data-gsap` to any element — no custom JS required.
```html
<!-- Entrance animations -->
<div data-gsap="fade-up" data-scroll="true" data-delay="0.2">...</div>
<div data-gsap="fade-down" data-scroll="true">...</div>
<div data-gsap="fade-left" data-scroll="true">...</div>
<div data-gsap="fade-right" data-scroll="true">...</div>
<div data-gsap="zoom-in" data-scroll="true">...</div>
<div data-gsap="zoom-out" data-scroll="true">...</div>

<!-- Hover animations -->
<a data-gsap="hover-lift">...</a>
<div data-gsap="hover-dim">...</div>
<div data-gsap="hover-scale">...</div>
<div data-gsap="hover-glow">...</div>

<!-- Continuous animations -->
<div data-gsap="spin" data-duration="8">...</div>
<div data-gsap="float" data-y="-20" data-duration="4">...</div>
<div data-gsap="blob" data-scale="1.3" data-x="50" data-y="30">...</div>
<div data-gsap="ping" data-duration="1.5">...</div>
<div data-gsap="heartbeat" data-duration="0.4">...</div>
<div data-gsap="bounce">...</div>
<div data-gsap="wiggle">...</div>
<div data-gsap="pulse">...</div>

<!-- Stagger children -->
<div data-gsap="stagger-fade-up" data-scroll="true" data-stagger="0.15">
  <div>Child 1</div>
  <div>Child 2</div>
  <div>Child 3</div>
</div>

<!-- Combine animations -->
<div data-gsap="fade-up hover-lift" data-scroll="true">...</div>
```

### Available Data Attributes
| Attribute | Default | Notes |
|-----------|---------|-------|
| `data-duration` | `0.6` | Animation duration in seconds |
| `data-delay` | `0` | Delay before animation starts |
| `data-scroll` | `false` | Trigger on scroll into view |
| `data-scroll-start` | `top 85%` | ScrollTrigger start position — use `top 95%` for elements near bottom of section |
| `data-ease` | `power2.out` | GSAP ease string |
| `data-stagger` | `0.1` | Stagger delay between children |
| `data-x` | `0` | X offset for blob/float |
| `data-y` | `-20` | Y offset for blob/float |
| `data-scale` | `1.2` | Scale for blob/pulse |

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