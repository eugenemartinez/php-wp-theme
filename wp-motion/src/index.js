import { initMotion } from "./js/motion-presets.js";
import { initPageTransition } from "./js/page-transition.js";
import { initIcons } from "./js/icons.js";
import { initNavigation } from "./js/navigation.js";
import { initDarkMode } from "./js/dark-mode.js";
import "./js/single.js";

document.addEventListener("DOMContentLoaded", () => {
	initMotion();
	initPageTransition();
	initIcons();
	initNavigation();
	initDarkMode();
});
