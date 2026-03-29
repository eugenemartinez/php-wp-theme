# wp-theme-boilerplate

A monorepo containing two WordPress theme boilerplate packages — one per animation stack. Pick whichever fits your project and work from there.

## Packages

| Package | Animation | Attribute |
|---|---|---|
| `wp-gsap` | GSAP + ScrollTrigger | `data-gsap` |
| `wp-motion` | Motion (motion.dev) | `data-motion` |

Both share the same architecture: Tailwind CSS v4, Gutenberg blocks, Vite, wp-scripts, and a declarative animation preset system. The only meaningful difference is the animation library and its data attribute.

## Getting Started

Navigate into whichever package you want to use and follow its README:

```bash
cd wp-gsap
# or
cd wp-motion
```

Each package is fully self-contained with its own `package.json`, `node_modules`, and build scripts.

## Requirements

- WordPress 6.0+
- Node.js 18+
- Local WP
