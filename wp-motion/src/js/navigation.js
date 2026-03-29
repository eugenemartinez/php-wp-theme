import { animate } from "motion";

export function initNavigation() {
	const nav = document.getElementById("main-nav");
	const btn = document.getElementById("mobile-menu-btn");
	const menu = document.getElementById("mobile-menu");
	const openIcon = document.getElementById("mobile-menu-icon-open");
	const closeIcon = document.getElementById("mobile-menu-icon-close");

	if (!nav) return;

	// ── Scroll effect ─────────────────────────────────────────
	const sentinel = document.createElement("div");
	sentinel.style.cssText =
		"position:absolute;top:80px;left:0;height:1px;width:1px;pointer-events:none;";
	document.body.prepend(sentinel);

	const scrollObserver = new IntersectionObserver(
		([entry]) => {
			if (!entry.isIntersecting) {
				animate(
					nav,
					{ backgroundColor: "var(--color-background)" },
					{ duration: 0.3 },
				);
				nav.style.boxShadow = "0 4px 24px rgba(0,0,0,0.08)";
			} else {
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
}
