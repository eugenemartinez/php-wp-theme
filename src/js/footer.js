import { gsap } from "gsap";

export function initFooter() {
  const footer = document.getElementById('main-footer');
  if (!footer) return;

  gsap.set('#footer-logo', { opacity: 0, y: 20 });

  gsap.to('#footer-logo', {
    opacity: 1, y: 0, duration: 0.6, ease: 'power2.out',
    scrollTrigger: { trigger: '#footer-logo', start: 'top 90%', once: true }
  });
}