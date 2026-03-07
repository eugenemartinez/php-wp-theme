import { gsap } from "gsap";

export function initArchive() {
  if (!document.getElementById('archive')) return;

  // ── Initial states ────────────────────────────────────────────
  gsap.set('#archive-header', { opacity: 0, y: 30 });
  gsap.set('.archive-article', { opacity: 0, y: 30 });

  // ── Header ────────────────────────────────────────────────────
  gsap.to('#archive-header', {
    opacity: 1, y: 0, duration: 0.8, ease: 'power2.out'
  });

  // ── Back link hover ───────────────────────────────────────────
  const backLink = document.getElementById('archive-back');
  if (backLink) {
    backLink.addEventListener('mouseenter', () => gsap.to(backLink, { x: -3, duration: 0.2 }));
    backLink.addEventListener('mouseleave', () => gsap.to(backLink, { x: 0, duration: 0.2 }));
  }

  // ── Articles ──────────────────────────────────────────────────
  document.querySelectorAll('.archive-article').forEach((article, index) => {
    const bar   = article.querySelector('.archive-article-bar');
    const title = article.querySelector('.archive-article-title');

    gsap.to(article, {
      opacity: 1, y: 0, duration: 0.6, delay: index * 0.05,
      scrollTrigger: { trigger: article, start: 'top 85%', once: true }
    });

    article.addEventListener('mouseenter', () => {
      gsap.to(bar,   { width: 96, duration: 0.3 });
      gsap.to(title, { opacity: 0.7, duration: 0.2 });
    });
    article.addEventListener('mouseleave', () => {
      gsap.to(bar,   { width: 64, duration: 0.3 });
      gsap.to(title, { opacity: 1, duration: 0.2 });
    });
  });

  // ── Pagination hover ──────────────────────────────────────────
  ['archive-prev', 'archive-next'].forEach(id => {
    const link = document.getElementById(id);
    if (link) {
      link.addEventListener('mouseenter', () => gsap.to(link, { x: id === 'archive-next' ? 3 : -3, duration: 0.2 }));
      link.addEventListener('mouseleave', () => gsap.to(link, { x: 0, duration: 0.2 }));
    }
  });
}