import { gsap } from "gsap";

export function initDarkMode() {
	const html = document.documentElement;

	const toggles = [
		{
			btn: document.getElementById("dark-mode-btn"),
			sun: document.getElementById("dark-mode-sun"),
			moon: document.getElementById("dark-mode-moon"),
		},
		{
			btn: document.getElementById("dark-mode-btn-mobile"),
			sun: document.getElementById("dark-mode-sun-mobile"),
			moon: document.getElementById("dark-mode-moon-mobile"),
		},
	];

	function applyTheme(isDark) {
		toggles.forEach(({ sun, moon }) => {
			if (!sun || !moon) return;
			if (isDark) {
				sun.classList.remove("hidden");
				moon.classList.add("hidden");
			} else {
				sun.classList.add("hidden");
				moon.classList.remove("hidden");
			}
		});
	}

	const saved = localStorage.getItem("theme");
	if (saved === "dark") {
		html.classList.add("dark");
		applyTheme(true);
	}

	toggles.forEach(({ btn }) => {
		if (!btn) return;
		btn.addEventListener("click", () => {
			const isDark = html.classList.toggle("dark");
			localStorage.setItem("theme", isDark ? "dark" : "light");
			applyTheme(isDark);

			gsap.fromTo(
				btn,
				{ rotation: 0 },
				{ rotation: 360, duration: 0.4, ease: "power2.out" },
			);
		});
	});
}
