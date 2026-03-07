<?php
$logo         = get_template_directory_uri() . '/assets/logo.png';
$url_home     = home_url('/');
$url_about    = home_url('/about');
$url_services = home_url('/services');
$url_contact  = home_url('/contact');
?>

<nav id="main-nav" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16 md:h-20">

      <!-- Logo -->
      <a href="<?php echo esc_url($url_home); ?>" class="flex items-center hover:opacity-80 transition-opacity">
        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" class="h-8 md:h-10 w-auto" />
      </a>

      <!-- Desktop Navigation -->
      <div class="hidden md:flex items-center gap-8">
        <a href="<?php echo esc_url($url_about); ?>"
          class="transition-colors <?php echo is_page('about') ? 'text-primary font-semibold' : 'text-foreground/70 hover:text-primary'; ?>">
          About
        </a>
        <a href="<?php echo esc_url($url_services); ?>"
          class="transition-colors <?php echo is_page('services') ? 'text-primary font-semibold' : 'text-foreground/70 hover:text-primary'; ?>">
          Services
        </a>
        <a href="<?php echo esc_url($url_contact); ?>"
          class="bg-primary text-primary-foreground px-6 py-2.5 rounded-full hover:opacity-90 transition-all shadow-md hover:shadow-lg">
          Contact
        </a>
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
        <a href="<?php echo esc_url($url_contact); ?>"
          class="mt-2 bg-primary text-primary-foreground px-6 py-3 rounded-full hover:opacity-90 transition-all text-center">
          Contact
        </a>
      </div>
    </div>

  </div>
</nav>