import { gsap } from 'gsap';
import { initPageTransition } from './js/page-transition.js';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { initNavigation } from './js/navigation.js';
import { initGsapMotion } from './js/gsap-motion.js';
import './js/single.js';

gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {
  initPageTransition();
  initGsapMotion();
  initNavigation();
});