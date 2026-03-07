import { gsap } from "gsap";

export function initNavigation() {
  const nav = document.getElementById('main-nav');
  const mobileBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  const iconOpen = document.getElementById('mobile-menu-icon-open');
  const iconClose = document.getElementById('mobile-menu-icon-close');

  if (!nav) return;

  // ── Scroll behavior ───────────────────────────────────────────
  let lastScroll = 0;

  window.addEventListener('scroll', () => {
    const currentScroll = window.scrollY;

    if (currentScroll > 50) {
      nav.classList.add('bg-card/95', 'backdrop-blur-lg', 'shadow-sm');
      nav.classList.remove('bg-transparent');
    } else {
      nav.classList.remove('bg-card/95', 'backdrop-blur-lg', 'shadow-sm');
      nav.classList.add('bg-transparent');
    }

    lastScroll = currentScroll;
  });

  // ── Mobile menu toggle ────────────────────────────────────────
  if (mobileBtn && mobileMenu) {
    mobileBtn.addEventListener('click', () => {
      const isHidden = mobileMenu.classList.contains('hidden');

      if (isHidden) {
        mobileMenu.classList.remove('hidden');
        gsap.fromTo(mobileMenu,
          { opacity: 0, y: -10 },
          { opacity: 1, y: 0, duration: 0.3, ease: 'power2.out' }
        );
        iconOpen.classList.add('hidden');
        iconClose.classList.remove('hidden');
      } else {
        gsap.to(mobileMenu, {
          opacity: 0, y: -10, duration: 0.2,
          onComplete: () => {
            mobileMenu.classList.add('hidden');
            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');
          }
        });
      }
    });
  }
}