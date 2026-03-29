import { animate } from "motion";

export function initNavigation() {
	const nav = document.getElementById("main-nav");
	const btn = document.getElementById("mobile-menu-btn");
	const menu = document.getElementById("mobile-menu");
	const openIcon = document.getElementById("mobile-menu-icon-open");
	const closeIcon = document.getElementById("mobile-menu-icon-close");

	if (!nav) return;

	// ── Scroll effect ─────────────────────────────────────────
	// Motion has no ScrollTrigger equivalent, so we use a plain IntersectionObserver
	// watching a sentinel element 80px from the top.
	const sentinel = document.createElement("div");
	sentinel.style.cssText =
		"position:absolute;top:80px;left:0;height:1px;width:1px;pointer-events:none;";
	document.body.prepend(sentinel);

	const scrollObserver = new IntersectionObserver(
		([entry]) => {
			if (!entry.isIntersecting) {
				// Scrolled past 80px — add background + shadow
				animate(
					nav,
					{ backgroundColor: "var(--color-background)" },
					{ duration: 0.3 },
				);
				nav.style.boxShadow = "0 4px 24px rgba(0,0,0,0.08)";
			} else {
				// Back at top — clear background
				animate(nav, { backgroundColor: "transparent" }, { duration: 0.3 });
				nav.style.boxShadow = "none";
			}
		},
		{ threshold: 0 },
	);

	scrollObserver.observe(sentinel);

	// ── Mobile menu toggle ────────────────────────────────────
	if (btn && menu) {
		btn.addEventListener("click", () => {
			const isOpen = !menu.classList.contains("hidden");

			if (isOpen) {
				animate(menu, { opacity: 0, y: -10 }, { duration: 0.2 }).finished.then(
					() => menu.classList.add("hidden"),
				);
				openIcon?.classList.remove("hidden");
				closeIcon?.classList.add("hidden");
			} else {
				menu.classList.remove("hidden");
				animate(menu, { opacity: [0, 1], y: [-10, 0] }, { duration: 0.2 });
				openIcon?.classList.add("hidden");
				closeIcon?.classList.remove("hidden");
			}
		});
	}

	// ── Dark mode toggle ──────────────────────────────────────
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

	// Apply saved preference on load
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

			// Spin the toggle icon
			animate(btn, { rotate: [0, 360] }, { duration: 0.4, easing: "easeOut" });
		});
	});
}
