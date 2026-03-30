import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { initMotion } from "./js/gsap-motion.js";
import { initPageTransition } from "./js/page-transition.js";
import { initIcons } from "./js/icons.js";
import { initNavigation } from "./js/navigation.js";
import { initDarkMode } from "./js/dark-mode.js";
import "./js/single.js";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", () => {
	initMotion();
	initPageTransition();
	initIcons();
	initNavigation();
	initDarkMode();
});
