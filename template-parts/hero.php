<?php
$hero_title   = get_post_meta($post->ID, 'hero_title', true) ?: get_bloginfo('name');
$hero_sub     = get_post_meta($post->ID, 'hero_sub', true) ?: 'Welcome to ' . get_bloginfo('name');
$hero_desc    = get_post_meta($post->ID, 'hero_desc', true) ?: get_bloginfo('description');
$hero_cta     = get_post_meta($post->ID, 'hero_cta', true) ?: 'Get in Touch';
$hero_cta_url = get_post_meta($post->ID, 'hero_cta_url', true) ?: home_url('/contact');
?>

<section id="hero" class="min-h-screen flex items-center justify-center relative overflow-hidden bg-background">

  <!-- Background blobs -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div id="hero-blob-1" class="absolute top-20 left-10 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
    <div id="hero-blob-2" class="absolute bottom-20 right-10 w-96 h-96 bg-secondary/30 rounded-full blur-3xl"></div>
  </div>

  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 text-center">

    <!-- Subheading -->
    <div id="hero-sub" class="mb-6">
      <span class="text-sm uppercase tracking-wider font-semibold text-muted-foreground">
        <?php echo esc_html($hero_sub); ?>
      </span>
    </div>

    <!-- Heading -->
    <h1 id="hero-title" class="text-5xl md:text-6xl lg:text-7xl font-bold text-foreground mb-6 leading-tight">
      <?php echo esc_html($hero_title); ?>
    </h1>

    <!-- Description -->
    <p id="hero-desc" class="text-lg md:text-xl text-muted-foreground mb-10 max-w-2xl mx-auto leading-relaxed">
      <?php echo esc_html($hero_desc); ?>
    </p>

    <!-- CTA -->
    <div id="hero-cta">
      <a href="<?php echo esc_url($hero_cta_url); ?>"
        class="inline-flex items-center gap-2 bg-primary text-primary-foreground px-8 py-4 rounded-full font-semibold text-lg shadow-lg hover:opacity-90 transition-all">
        <?php echo esc_html($hero_cta); ?>
        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
    </div>

  </div>

</section>