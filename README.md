# WordPress Theme Boilerplate

A minimal, production-ready WordPress theme boilerplate built with Tailwind CSS v4 and GSAP. Designed for fast project setup with a clean separation between dev and production files. Uses LocalWP for development.

## Stack

- **PHP** — WordPress theme templates
- **Tailwind CSS v4** — utility-first styling with CSS variable theming
- **GSAP** — scroll-triggered animations and page transitions
- **Vite** — asset bundling
- **ACF (optional)** — field groups via JSON sync or native meta boxes fallback

## Project Structure
```
├── acf-fields/         ← native meta box registration (no plugin needed)
├── acf-json/           ← ACF JSON sync files (optional, requires ACF plugin)
├── assets/             ← theme assets (logo, images)
├── template-parts/     ← reusable page sections
├── src/
│   ├── css/            ← fonts, tailwind, theme variables
│   ├── index.css       ← main CSS entry
│   ├── index.js        ← main JS entry
│   └── js/             ← per-page animation modules
├── build/              ← compiled output (gitignored)
└── dist/               ← production package output (gitignored)
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
This symlinks the theme folder to your Local WP themes directory automatically. Activate the theme in WP Admin → Appearance → Themes.

> Before running `npm run link`, update the `wpThemesDir` path in `symlink.js` to match your Local WP site name — replace `wp-theme` with whatever you named your site in Local.

### 3. Start development
```bash
npm run dev
```
*uses `vite build --watch` to build CSS and JS files from `/src` to `/build`. These files are enqueued in `functions.php` for production*

```php
// Load theme styles and scripts
function theme_scripts() {
  wp_enqueue_style('theme-style', get_template_directory_uri() . '/build/index.css', [], filemtime(get_template_directory() . '/build/index.css'));
  wp_enqueue_script('theme-script', get_template_directory_uri() . '/build/index.js', [], filemtime(get_template_directory() . '/build/index.js'), true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');
```
*(you can change the `/build` to `/src` to test but setting it to `/build` is much efficient to set and just forget)*

### 4. Manually run to force build incase npm run dev dev fails to rebuild

```bash
npm run build
```

### 5. Package theme for deployment
```bash
npm run package
```
Outputs a clean production-ready theme to `/dist` — no dev files included.

*(Note that this uses a custom script inside the `package-theme.js` where it just creates a copy of the necessary files for the theme, excluding dev files like `*.config.js` files, `package.json`, etc. Look for an array variable called `exclude` and put the filename or folder in the array list if you want to exclude it for production)*

### 6. Remove symlink when done
```bash
npm run unlink
```

## Pages

| Template | Slug | Description |
|----------|------|-------------|
| `front-page.php` | `/` | Homepage with all sections |
| `page-about.php` | `/about` | About page |
| `page-services.php` | `/services` | Services page |
| `page-contact.php` | `/contact` | Contact page |
| `home.php` | `/blog` | Blog listing |
| `single.php` | `/blog/post-slug` | Single post |
| `archive.php` | `/category/slug` | Category/tag archive |
| `search.php` | `/?s=query` | Search results |
| `404.php` | — | Not found page |

## Template Parts

| File | Section ID | Description |
|------|------------|-------------|
| `navigation.php` | `#main-nav` | Fixed navigation with mobile menu |
| `hero.php` | `#hero` | Hero/landing section |
| `about.php` | `#about` | About section with image |
| `services.php` | `#services` | Services grid |
| `contact.php` | `#contact` | Contact form + details |
| `footer.php` | `#main-footer` | Footer with logo and links |

## Meta Boxes

Fields are registered via native WordPress meta boxes in `acf-fields/` — no plugin required. Each page section has its own registration file:

| File | Fields |
|------|--------|
| `hero-fields.php` | `hero_title`, `hero_sub`, `hero_desc`, `hero_cta`, `hero_cta_url` |
| `about-fields.php` | `about_title`, `about_sub`, `about_desc`, `about_desc2`, `about_cta`, `about_cta_url`, `about_image` |
| `services-fields.php` | `sv_title`, `sv_sub`, `sv_desc` |
| `contact-fields.php` | `ct_title`, `ct_sub`, `ct_desc`, `ct_email`, `ct_location` |

## ACF (Optional)

If ACF plugin is installed, replace the php variables inside the `template-parts` that are using `get_post_meta()` with the `get_field()`, and JSON field groups in `acf-json/` will auto-sync. Go to WP Admin → Custom Fields → Sync to load them.

## Theme Customization

### Colors
Edit CSS variables in `src/css/theme.css`:
```css
:root {
  --primary: #030213;
  --background: #ffffff;
  --foreground: oklch(0.145 0 0);
}
```

### Fonts
Edit `src/css/fonts.css` to swap Google Fonts imports. Update font variables in `theme.css`:
```css
--font-headline: 'Poppins', sans-serif;
--font-body: 'Inter', sans-serif;
```

### Navigation Links
Update URLs in `template-parts/navigation.php`:
```php
$url_about    = home_url('/about');
$url_services = home_url('/services');
$url_contact  = home_url('/contact');
```

### Adding a New Page
1. Create `template-parts/newpage.php`
2. Create `src/js/newpage.js` with `export function initNewPage()`
3. Create `page-newpage.php` in root
4. Add to `src/index.js`:
```javascript
import { initNewPage } from "./js/newpage.js";
if (document.getElementById('newpage')) initNewPage();
```
5. Assign template in WP Admin → Page Attributes

## Blog Setup

1. Create a page titled "Blog" with slug `blog`
2. WP Admin → Settings → Reading → set "Posts page" to "Blog"
3. Visit `/blog` — `home.php` loads automatically

## Deployment

1. Rename the theme and other theme details inside the `style.css` with your own details
2. Replace the `screenshot.png` with your selected image but preserve the filename `screenshot.png` so that wordpress will automatically use it as the theme thumbnail in the themes page
2. Run `npm run package` to generate `/dist`
3. Zip the `/dist` folder
4. Upload via WP Admin → Appearance → Themes → Add New → Upload

## Requirements

- WordPress 6.0+
- Node.js 18+
- Local WP (for symlink feature)
- ACF Free plugin (optional)

### <p align="center">Happy Theme Building!</p>

```php
<?php
// Silence is golden.
```