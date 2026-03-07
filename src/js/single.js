import { gsap } from "gsap";

export function initSingle() {
  if (!document.getElementById('single-article')) return;

  // ── Initial states ────────────────────────────────────────────
  gsap.set('#single-article .max-w-4xl', { opacity: 0, y: 30 });

  gsap.to('#single-article .max-w-4xl', {
    opacity: 1, y: 0, duration: 0.8, ease: 'power2.out'
  });

  // ── Related cards hover ───────────────────────────────────────
  document.querySelectorAll('.related-card').forEach(card => {
    card.addEventListener('mouseenter', () => gsap.to(card, { y: -4, duration: 0.2 }));
    card.addEventListener('mouseleave', () => gsap.to(card, { y: 0, duration: 0.2 }));
  });

  // ── Back link hover ───────────────────────────────────────────
  const backLink = document.getElementById('single-back');
  if (backLink) {
    backLink.addEventListener('mouseenter', () => gsap.to(backLink, { x: -3, duration: 0.2 }));
    backLink.addEventListener('mouseleave', () => gsap.to(backLink, { x: 0, duration: 0.2 }));
  }

  // ── Share button ──────────────────────────────────────────────
  const shareBtn = document.getElementById('sa-share');
  const shareText = document.getElementById('sa-share-text');

  if (shareBtn) {
    shareBtn.addEventListener('click', () => {
      const textarea = document.createElement('textarea');
      textarea.value = window.location.href;
      document.body.appendChild(textarea);
      textarea.select();
      document.execCommand('copy');
      document.body.removeChild(textarea);

      shareText.textContent = 'Link Copied!';
      gsap.fromTo(shareBtn, { scale: 0.95 }, { scale: 1, duration: 0.2 });
      setTimeout(() => { shareText.textContent = 'Share'; }, 2000);
    });
  }
}