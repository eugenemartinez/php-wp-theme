<?php
$logo         = get_template_directory_uri() . '/assets/logo.png';
$url_home     = home_url('/');
$url_about    = home_url('/about');
$url_services = home_url('/services');
$url_work     = home_url('/work');
$url_contact  = home_url('/contact');
?>

<nav id="main-nav" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16 md:h-20">

      <!-- Logo -->
      <a href="<?php echo esc_url($url_home); ?>" class="flex items-center" data-gsap="hover-dim">
        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" class="h-8 md:h-10 w-auto" />
      </a>

      <!-- Desktop Navigation -->
      <div class="hidden md:flex items-center gap-8">
        <a href="<?php echo esc_url($url_about); ?>"
          class="transition-colors <?php echo is_page('about') ? 'text-primary font-semibold' : 'text-foreground/70 hover:text-primary'; ?>"
          <?php echo !is_page('about') ? 'data-gsap="hover-dim"' : ''; ?>>
          About
        </a>
        <a href="<?php echo esc_url($url_services); ?>"
          class="transition-colors <?php echo is_page('services') ? 'text-primary font-semibold' : 'text-foreground/70 hover:text-primary'; ?>"
          <?php echo !is_page('services') ? 'data-gsap="hover-dim"' : ''; ?>>
          Services
        </a>
        <a href="<?php echo esc_url($url_work); ?>"
          class="transition-colors <?php echo is_page('work') ? 'text-primary font-semibold' : 'text-foreground/70 hover:text-primary'; ?>"
          <?php echo !is_page('work') ? 'data-gsap="hover-dim"' : ''; ?>>
          Work
        </a>
        <a href="<?php echo esc_url($url_contact); ?>"
          class="bg-primary text-primary-foreground px-6 py-2.5 rounded-full shadow-md"
          data-gsap="hover-lift">
          Contact
        </a>
          <!-- Dark mode toggle -->
        <button
          id="dark-mode-btn"
          class="p-2 text-foreground/70 hover:text-primary transition-colors rounded-full cursor-pointer"
          aria-label="Toggle dark mode">
          <!-- Moon — shown in light mode -->
          <svg id="dark-mode-moon" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
          </svg>
          <!-- Sun — shown in dark mode -->
          <svg id="dark-mode-sun" class="w-5 h-5 hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"/>
            <line x1="12" y1="1" x2="12" y2="3"/>
            <line x1="12" y1="21" x2="12" y2="23"/>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
            <line x1="1" y1="12" x2="3" y2="12"/>
            <line x1="21" y1="12" x2="23" y2="12"/>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
          </svg>
        </button>
      </div>

      <!-- Mobile Menu Button -->
      <button id="mobile-menu-btn" class="md:hidden p-2 text-foreground/70 hover:text-primary transition-colors">
        <svg id="mobile-menu-icon-open" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <line x1="3" y1="6" x2="21" y2="6"/>
          <line x1="3" y1="12" x2="21" y2="12"/>
          <line x1="3" y1="18" x2="21" y2="18"/>
        </svg>
        <svg id="mobile-menu-icon-close" class="w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"/>
          <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </button>

    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="md:hidden hidden py-4 bg-card backdrop-blur-lg rounded-lg shadow-lg mt-2 mb-4">
      <div class="flex flex-col gap-2 px-4">
        <a href="<?php echo esc_url($url_about); ?>"
          class="text-left py-3 transition-colors border-b border-border <?php echo is_page('about') ? 'text-primary font-semibold' : 'text-foreground/70 hover:text-primary'; ?>">
          About
        </a>
        <a href="<?php echo esc_url($url_services); ?>"
          class="text-left py-3 transition-colors border-b border-border <?php echo is_page('services') ? 'text-primary font-semibold' : 'text-foreground/70 hover:text-primary'; ?>">
          Services
        </a>
        <a href="<?php echo esc_url($url_work); ?>"
          class="text-left py-3 transition-colors border-b border-border <?php echo is_page('work') ? 'text-primary font-semibold' : 'text-foreground/70 hover:text-primary'; ?>">
          Work
        </a>
        <a href="<?php echo esc_url($url_contact); ?>"
          class="mt-2 bg-primary text-primary-foreground px-6 py-3 rounded-full hover:opacity-90 transition-all text-center">
          Contact
        </a>
                  <!-- Dark mode toggle -->
        <button
          id="dark-mode-btn-mobile"
          class="p-2 text-foreground/70 hover:text-primary transition-colors rounded-full"
          aria-label="Toggle dark mode">
          <!-- Moon — shown in light mode -->
          <svg id="dark-mode-moon" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
          </svg>
          <!-- Sun — shown in dark mode -->
          <svg id="dark-mode-sun" class="w-5 h-5 hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"/>
            <line x1="12" y1="1" x2="12" y2="3"/>
            <line x1="12" y1="21" x2="12" y2="23"/>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/>
            <line x1="1" y1="12" x2="3" y2="12"/>
            <line x1="21" y1="12" x2="23" y2="12"/>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
          </svg>
        </button>
      </div>
    </div>

  </div>
</nav>