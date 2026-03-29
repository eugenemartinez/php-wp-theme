import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

export function initNavigation() {
	const nav = document.getElementById("main-nav");
	const btn = document.getElementById("mobile-menu-btn");
	const menu = document.getElementById("mobile-menu");
	const openIcon = document.getElementById("mobile-menu-icon-open");
	const closeIcon = document.getElementById("mobile-menu-icon-close");

	if (!nav) return;

	// ── Scroll effect ─────────────────────────────────────────
	ScrollTrigger.create({
		start: "top -80px",
		onEnter: () =>
			gsap.to(nav, {
				backgroundColor: "var(--color-background)",
				boxShadow: "0 4px 24px rgba(0,0,0,0.08)",
				duration: 0.3,
			}),
		onLeaveBack: () =>
			gsap.to(nav, {
				backgroundColor: "transparent",
				boxShadow: "none",
				duration: 0.3,
			}),
	});

	// ── Mobile menu toggle ────────────────────────────────────
	if (btn && menu) {
		btn.addEventListener("click", () => {
			const isOpen = !menu.classList.contains("hidden");
			if (isOpen) {
				gsap.to(menu, {
					opacity: 0,
					y: -10,
					duration: 0.2,
					onComplete: () => menu.classList.add("hidden"),
				});
				openIcon?.classList.remove("hidden");
				closeIcon?.classList.add("hidden");
			} else {
				menu.classList.remove("hidden");
				gsap.fromTo(
					menu,
					{ opacity: 0, y: -10 },
					{ opacity: 1, y: 0, duration: 0.2 },
				);
				openIcon?.classList.add("hidden");
				closeIcon?.classList.remove("hidden");
			}
		});
	}
}

