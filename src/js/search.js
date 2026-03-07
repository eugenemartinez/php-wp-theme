import { gsap } from "gsap";

export function initSearch() {
  if (!document.getElementById('search-results')) return;

  // ── Initial states ────────────────────────────────────────────
  gsap.set('#search-header', { opacity: 0, y: 30 });
  gsap.set('.search-article', { opacity: 0, y: 30 });

  // ── Header ────────────────────────────────────────────────────
  gsap.to('#search-header', {
    opacity: 1, y: 0, duration: 0.8, ease: 'power2.out'
  });

  // ── Back link hover ───────────────────────────────────────────
  const backLink = document.getElementById('search-back');
  if (backLink) {
    backLink.addEventListener('mouseenter', () => gsap.to(backLink, { x: -3, duration: 0.2 }));
    backLink.addEventListener('mouseleave', () => gsap.to(backLink, { x: 0, duration: 0.2 }));
  }

  // ── Search input focus ────────────────────────────────────────
  const searchInput = document.querySelector('#search-form input');
  if (searchInput) {
    searchInput.addEventListener('focus', () => gsap.to(searchInput, { scale: 1.01, duration: 0.2 }));
    searchInput.addEventListener('blur',  () => gsap.to(searchInput, { scale: 1, duration: 0.2 }));
  }

  // ── Submit button hover ───────────────────────────────────────
  const submitBtn = document.getElementById('search-submit-btn');
  if (submitBtn) {
    submitBtn.addEventListener('mouseenter', () => gsap.to(submitBtn, { scale: 1.05, duration: 0.2 }));
    submitBtn.addEventListener('mouseleave', () => gsap.to(submitBtn, { scale: 1, duration: 0.2 }));
  }

  // ── Articles ──────────────────────────────────────────────────
  document.querySelectorAll('.search-article').forEach((article, index) => {
    const bar   = article.querySelector('.search-article-bar');
    const title = article.querySelector('.search-article-title');

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
  ['search-prev', 'search-next'].forEach(id => {
    const link = document.getElementById(id);
    if (link) {
      link.addEventListener('mouseenter', () => gsap.to(link, { x: id === 'search-next' ? 3 : -3, duration: 0.2 }));
      link.addEventListener('mouseleave', () => gsap.to(link, { x: 0, duration: 0.2 }));
    }
  });
}