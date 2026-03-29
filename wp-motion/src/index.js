import { initMotion } from "./js/motion-presets.js";
import { initPageTransition } from "./js/page-transition.js";
import { initNavigation } from "./js/navigation.js";
import { initDarkMode } from "./js/dark-mode.js";
import "./js/single.js";

document.addEventListener("DOMContentLoaded", () => {
	initMotion();
	initPageTransition();
	initNavigation();
	initDarkMode();
});
