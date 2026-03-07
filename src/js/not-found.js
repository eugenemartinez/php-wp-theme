import { gsap } from "gsap";

export function initNotFound() {
  if (!document.getElementById('err-number')) return;

  gsap.set('#err-number', { opacity: 0, scale: 0.8 });
  gsap.set('#err-content', { opacity: 0, y: 30 });

  gsap.to('#err-blob-1', { scale: 1.2, rotation: 90, opacity: 0.2, duration: 20, repeat: -1, yoyo: true, ease: 'sine.inOut' });
  gsap.to('#err-blob-2', { scale: 1.3, rotation: -90, opacity: 0.2, duration: 25, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 2 });

  gsap.fromTo('#err-number',
    { opacity: 0, scale: 0.8 },
    { opacity: 1, scale: 1, duration: 0.8, ease: 'back.out(1.5)' }
  );
  gsap.fromTo('#err-content',
    { opacity: 0, y: 30 },
    { opacity: 1, y: 0, duration: 0.7, delay: 0.3 }
  );

  const homeBtn = document.getElementById('err-home-btn');
  const secondBtn = document.getElementById('err-second-btn');

  if (homeBtn) {
    homeBtn.addEventListener('mouseenter', () => gsap.to(homeBtn, { scale: 1.05, duration: 0.2 }));
    homeBtn.addEventListener('mouseleave', () => gsap.to(homeBtn, { scale: 1, duration: 0.2 }));
  }
  if (secondBtn) {
    secondBtn.addEventListener('mouseenter', () => gsap.to(secondBtn, { scale: 1.05, duration: 0.2 }));
    secondBtn.addEventListener('mouseleave', () => gsap.to(secondBtn, { scale: 1, duration: 0.2 }));
  }
}