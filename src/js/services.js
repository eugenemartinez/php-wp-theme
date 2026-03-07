import { gsap } from "gsap";

export function initServices() {
  if (!document.getElementById('services')) return;

  // ── Initial states ────────────────────────────────────────────
  gsap.set('#sv-header', { opacity: 0, y: 30 });
  gsap.set('.sv-card', { opacity: 0, y: 40 });

  // ── Header entrance ───────────────────────────────────────────
  gsap.to('#sv-header', {
    opacity: 1, y: 0, duration: 0.7, ease: 'power2.out',
    scrollTrigger: { trigger: '#sv-header', start: 'top 80%', once: true }
  });

  // ── Cards entrance ────────────────────────────────────────────
  document.querySelectorAll('.sv-card').forEach((card, index) => {
    const glow = card.querySelector('.sv-card-glow');
    const icon = card.querySelector('.sv-icon');

    gsap.to(card, {
      opacity: 1, y: 0, duration: 0.6, ease: 'back.out(1.5)',
      delay: index * 0.1,
      scrollTrigger: { trigger: card, start: 'top 85%', once: true }
    });

    // ── Card hover ──────────────────────────────────────────────
    card.addEventListener('mouseenter', () => {
      gsap.to(card, { y: -8, scale: 1.02, duration: 0.3, ease: 'power2.out' });
      gsap.to(glow, { opacity: 1, duration: 0.3 });
      gsap.to(icon, { scale: 1.1, rotation: 5, duration: 0.3 });
    });

    card.addEventListener('mouseleave', () => {
      gsap.to(card, { y: 0, scale: 1, duration: 0.3 });
      gsap.to(glow, { opacity: 0, duration: 0.3 });
      gsap.to(icon, { scale: 1, rotation: 0, duration: 0.3 });
    });
  });
}