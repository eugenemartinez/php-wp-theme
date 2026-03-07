import { gsap } from "gsap";

export function initAbout() {
  if (!document.getElementById('about')) return;

  // ── Initial states ────────────────────────────────────────────
  gsap.set('#about-image', { opacity: 0, x: -40 });
  gsap.set('#about-content', { opacity: 0, x: 40 });

  // ── Entrance animations ───────────────────────────────────────
  gsap.to('#about-image', {
    opacity: 1, x: 0, duration: 0.8, ease: 'power2.out',
    scrollTrigger: { trigger: '#about', start: 'top 75%', once: true }
  });

  gsap.to('#about-content', {
    opacity: 1, x: 0, duration: 0.8, ease: 'power2.out', delay: 0.2,
    scrollTrigger: { trigger: '#about', start: 'top 75%', once: true }
  });

  // ── CTA hover ─────────────────────────────────────────────────
  const cta = document.getElementById('about-cta');
  if (cta) {
    cta.addEventListener('mouseenter', () => gsap.to(cta, { scale: 1.05, duration: 0.2 }));
    cta.addEventListener('mouseleave', () => gsap.to(cta, { scale: 1, duration: 0.2 }));
  }
}