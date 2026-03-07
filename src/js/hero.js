import { gsap } from "gsap";

export function initHero() {
  if (!document.getElementById('hero')) return;

  // ── Initial states ────────────────────────────────────────────
  gsap.set('#hero-sub', { opacity: 0, y: 20 });
  gsap.set('#hero-title', { opacity: 0, y: 30 });
  gsap.set('#hero-desc', { opacity: 0, y: 20 });
  gsap.set('#hero-cta', { opacity: 0, y: 20 });

  // ── Blob animations ───────────────────────────────────────────
  gsap.to('#hero-blob-1', {
    scale: 1.2, rotation: 90, opacity: 0.6,
    duration: 20, repeat: -1, yoyo: true, ease: 'sine.inOut'
  });
  gsap.to('#hero-blob-2', {
    scale: 1.3, rotation: -90, opacity: 0.6,
    duration: 25, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 2
  });

  // ── Entrance animations ───────────────────────────────────────
  const tl = gsap.timeline({ defaults: { ease: 'power2.out' } });

  tl.to('#hero-sub',   { opacity: 1, y: 0, duration: 0.6 })
    .to('#hero-title', { opacity: 1, y: 0, duration: 0.7 }, '-=0.3')
    .to('#hero-desc',  { opacity: 1, y: 0, duration: 0.6 }, '-=0.3')
    .to('#hero-cta',   { opacity: 1, y: 0, duration: 0.6 }, '-=0.3');

  // ── CTA hover ─────────────────────────────────────────────────
  const cta = document.querySelector('#hero-cta a');
  if (cta) {
    cta.addEventListener('mouseenter', () => gsap.to(cta, { scale: 1.05, duration: 0.2 }));
    cta.addEventListener('mouseleave', () => gsap.to(cta, { scale: 1, duration: 0.2 }));
  }
}