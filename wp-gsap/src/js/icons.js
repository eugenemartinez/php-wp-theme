import {
	createIcons,
	// Navigation & General
	Menu,
	X,
	ChevronDown,
	ChevronLeft,
	ChevronRight,
	Search,
	Camera,
	Triangle,
	Home,
	BookOpen,
	// Actions & Pointers
	ArrowLeft,
	ArrowRight,
	ArrowUp,
	Send,
	Loader2,
	Share2,
	// Feedback & Trust
	Check,
	CheckCircle,
	CheckCircle2,
	HelpCircle,
	AlertTriangle,
	ShieldCheck,
	Handshake,
	Star,
	Award,
	Quote,
	// Info & Contact
	MapPin,
	Phone,
	Mail,
	Clock,
	FileText,
	Zap,

	// ADD MORE ICONS BELOW
} from "lucide";

/**
 * Initializes Lucide icons for PHP-rendered templates.
 * Scans the DOM for [data-lucide] attributes.
 */
export function initIcons() {
	createIcons({
		icons: {
			Menu,
			X,
			ChevronDown,
			ChevronLeft,
			ChevronRight,
			Search,
			Camera,
			Triangle,
			Home,
			BookOpen,
			ArrowLeft,
			ArrowRight,
			ArrowUp,
			Send,
			Loader2,
			Share2,
			Check,
			CheckCircle,
			CheckCircle2,
			HelpCircle,
			AlertTriangle,
			ShieldCheck,
			Handshake,
			Star,
			Award,
			Quote,
			MapPin,
			Phone,
			Mail,
			Clock,
			FileText,
			Zap,

			// ADD MORE ICONS BELOW
		},
		attrs: {
			"stroke-width": 2,
			class: "lucide-icon",
		},
	});
}
