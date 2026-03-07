import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

// ── Register GSAP plugins ─────────────────────────────────────
gsap.registerPlugin(ScrollTrigger);

// ── Import modules ────────────────────────────────────────────
import { initPageTransition } from "./js/page-transition.js";
import { initNotFound }       from "./js/not-found.js";
import { initNavigation }     from "./js/navigation.js";
import { initFooter }         from "./js/footer.js";
import { initHero }           from "./js/hero.js";
import { initAbout }          from "./js/about.js";
import { initServices }       from "./js/services.js";
import { initContact }        from "./js/contact.js";
import { initSingle }         from "./js/single.js";
import { initArchive }        from "./js/archive.js";
import { initSearch }         from "./js/search.js";
import { initBlog }           from "./js/blog.js";

// ── Global ────────────────────────────────────────────────────
initPageTransition();
initNavigation();
initFooter();

// ── Pages ─────────────────────────────────────────────────────
if (document.getElementById('hero'))           initHero();
if (document.getElementById('about'))          initAbout();
if (document.getElementById('services'))       initServices();
if (document.getElementById('contact'))        initContact();
if (document.getElementById('single-article')) initSingle();
if (document.getElementById('archive'))        initArchive();
if (document.getElementById('search-results')) initSearch();
if (document.getElementById('err-number'))     initNotFound();
if (document.getElementById('blog'))           initBlog();

