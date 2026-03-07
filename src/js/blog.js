// this file is used for blog listing page (home.php with posts loop)

import { gsap } from "gsap";

export function initBlog() {
  if (!document.getElementById('blog')) return;

  // ── Initial states ────────────────────────────────────────────
  gsap.set('#blog-header', { opacity: 0, y: 30 });
  gsap.set('.blog-article', { opacity: 0, y: 30 });

  // ── Header ────────────────────────────────────────────────────
  gsap.to('#blog-header', {
    opacity: 1, y: 0, duration: 0.8, ease: 'power2.out'
  });

  // ── Articles ──────────────────────────────────────────────────
  document.querySelectorAll('.blog-article').forEach((article, index) => {
    const bar   = article.querySelector('.blog-article-bar');
    const title = article.querySelector('.blog-article-title');

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
  ['blog-prev', 'blog-next'].forEach(id => {
    const link = document.getElementById(id);
    if (link) {
      link.addEventListener('mouseenter', () => gsap.to(link, { x: id === 'blog-next' ? 3 : -3, duration: 0.2 }));
      link.addEventListener('mouseleave', () => gsap.to(link, { x: 0, duration: 0.2 }));
    }
  });
}