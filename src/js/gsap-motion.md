# gsap-motion.js

Declarative GSAP animation wrapper. Add `data-gsap` to any HTML element — no JavaScript needed per element.

## Import

### PHP Template Boilerplate
```javascript
// src/index.js
import './js/gsap-motion.js';
```

### Blocks Boilerplate
```javascript
// blocks/hero/view.js
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { initGsapMotion } from '../../js/gsap-motion.js';

gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {
  initGsapMotion();

  // ── Custom animations below ───────────────────────────────
  // Use this space for complex sequences, timelines, or
  // animations targeting specific IDs not covered by gsap-motion
  //
  // Example:
  // const tl = gsap.timeline({ delay: 1 });
  // tl.to('#hero-line', { width: '100%', duration: 0.8 })
  //   .to('#hero-reveal', { opacity: 1, duration: 0.4 });
});
```

## Basic Usage

All animations work out of the box with just `data-gsap="animation-name"` — all attributes have sensible defaults.
```html
<!-- minimal — uses all defaults -->
<div data-gsap="fade-up">Content</div>

<!-- with scroll trigger -->
<div data-gsap="fade-up" data-scroll="true">Content</div>

<!-- multiple animations -->
<div data-gsap="fade-up hover-lift" data-scroll="true">Content</div>

<!-- sequenced entrance — stagger manually with data-delay -->
<h1 data-gsap="fade-up" data-delay="0.1">Title</h1>
<p  data-gsap="fade-up" data-delay="0.3">Description</p>
<a  data-gsap="fade-up hover-lift" data-delay="0.5">Button</a>
```

## Available Animations

### Entrance
| Value | Effect | Scroll? |
|-------|--------|---------|
| `fade-up` | Fade in from below | ✅ |
| `fade-down` | Fade in from above | ✅ |
| `fade-left` | Fade in from left | ✅ |
| `fade-right` | Fade in from right | ✅ |
| `fade-in` | Fade in only | ✅ |
| `zoom-in` | Scale up from 0.8 | ✅ |
| `zoom-out` | Scale down from 1.2 | ✅ |

### Hover
| Value | Effect |
|-------|--------|
| `hover-lift` | Lifts up and scales slightly |
| `hover-scale` | Scales up |
| `hover-glow` | Purple glow shadow |
| `hover-dim` | Dims to 70% opacity |

### Continuous (Infinite)
| Value | Effect | Extra Attributes |
|-------|--------|-----------------|
| `blob` | Infinite pulse with x/y drift | `data-x`, `data-y`, `data-scale`, `data-opacity-from`, `data-opacity-to` |
| `spin` | Infinite rotation | — |
| `ping` | Scale out and fade — notification effect | — |
| `pulse` | Fade in and out repeatedly | — |
| `bounce` | Bounce up and down | — |
| `float` | Gentle up/down float | `data-y` |
| `wiggle` | Left/right wiggle | — |
| `heartbeat` | Scale pulse — like a heartbeat | — |

### Stagger Children
| Value | Effect | Scroll? |
|-------|--------|---------|
| `stagger-fade-up` | Children fade up in sequence | ✅ |
| `stagger-fade-in` | Children fade in sequence | ✅ |
| `stagger-fade-left` | Children fade left in sequence | ✅ |

## Data Attributes

| Attribute | Default | Applies To |
|-----------|---------|------------|
| `data-duration` | `0.6` | All animations |
| `data-delay` | `0` | All animations |
| `data-scroll` | `false` | Entrance animations |
| `data-scroll-start` | `top 85%` | Entrance with scroll |
| `data-ease` | `power2.out` | Entrance animations |
| `data-stagger` | `0.1` | Stagger animations |
| `data-x` | `0` | `blob`, `fade-left`, `fade-right` |
| `data-y` | `0` | `blob`, `float`, `bounce` |
| `data-scale` | `1.2` | `blob`, `pulse` |
| `data-opacity-from` | `0.4` | `blob` |
| `data-opacity-to` | `0.6` | `blob` |

## Examples

### Hero section
```html
<p  data-gsap="fade-up" data-delay="0.1">Subtitle</p>
<h1 data-gsap="fade-up" data-delay="0.3">Title</h1>
<p  data-gsap="fade-up" data-delay="0.5">Description</p>
<a  data-gsap="fade-up hover-lift" data-delay="0.7">Get in Touch</a>
```

### Blob background
```html
<div
  class="absolute top-20 left-10 w-96 h-96 bg-purple-400 rounded-full blur-3xl opacity-40"
  data-gsap="blob"
  data-duration="20"
  data-scale="1.2"
  data-x="50"
  data-y="30">
</div>
```

### Scroll triggered section
```html
<div data-gsap="fade-left" data-scroll="true" data-duration="0.8">Left content</div>
<div data-gsap="fade-right" data-scroll="true" data-duration="0.8">Right content</div>
```

### Service cards with stagger
```html
<div data-gsap="stagger-fade-up" data-scroll="true" data-stagger="0.15">
  <div class="card">Card 1</div>
  <div class="card">Card 2</div>
  <div class="card">Card 3</div>
</div>
```

### Loader spinner
```html
<div data-gsap="spin" data-duration="0.8" class="w-8 h-8 border-4 border-primary border-t-transparent rounded-full"></div>
```

### Notification dot
```html
<div data-gsap="ping" class="w-3 h-3 bg-red-500 rounded-full"></div>
```

### Floating decorative element
```html
<div data-gsap="float" data-y="-30" data-duration="4" class="absolute ..."></div>
```

### Combining continuous + entrance
```html
<!-- fades in on scroll, then floats forever -->
<div data-gsap="fade-up float" data-scroll="true" data-delay="0.3">
  Decorative element
</div>
```