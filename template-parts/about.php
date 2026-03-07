<?php
global $post;
$about_title   = get_post_meta($post->ID, 'about_title', true) ?: 'About Us';
$about_sub     = get_post_meta($post->ID, 'about_sub', true) ?: 'Who We Are';
$about_desc    = get_post_meta($post->ID, 'about_desc', true) ?: 'Tell your story here. Who you are, what you do, and why you do it.';
$about_desc2   = get_post_meta($post->ID, 'about_desc2', true) ?: 'Add a second paragraph to elaborate on your mission, values, or approach.';
$about_cta     = get_post_meta($post->ID, 'about_cta', true) ?: 'Work With Us';
$about_cta_url = get_post_meta($post->ID, 'about_cta_url', true) ?: home_url('/contact');
$about_image   = get_post_meta($post->ID, 'about_image', true) ?: get_template_directory_uri() . '/assets/placeholder.png';
?>

<section id="about" class="py-24 md:py-32 bg-background">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

      <!-- Image -->
      <div id="about-image" class="relative">
        <div class="absolute -inset-4 bg-primary/5 rounded-3xl -z-10"></div>
        <img
          src="<?php echo esc_url($about_image); ?>"
          alt="<?php echo esc_attr($about_title); ?>"
          class="w-full rounded-2xl shadow-xl object-cover aspect-square"
        />
      </div>

      <!-- Content -->
      <div id="about-content">

        <!-- Label -->
        <p class="text-sm uppercase tracking-wider font-semibold text-muted-foreground mb-4">
          <?php echo esc_html($about_sub); ?>
        </p>

        <!-- Title -->
        <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-6 leading-tight">
          <?php echo esc_html($about_title); ?>
        </h2>

        <!-- Divider -->
        <div class="w-16 h-1 bg-primary mb-8"></div>

        <!-- Description -->
        <p class="text-muted-foreground leading-relaxed mb-6 text-lg">
          <?php echo esc_html($about_desc); ?>
        </p>

        <p class="text-muted-foreground leading-relaxed mb-10 text-lg">
          <?php echo esc_html($about_desc2); ?>
        </p>

        <!-- CTA -->
        <a id="about-cta" href="<?php echo esc_url($about_cta_url); ?>"
          class="inline-flex items-center gap-2 bg-primary text-primary-foreground px-8 py-4 rounded-full font-semibold shadow-lg hover:opacity-90 transition-all">
          <?php echo esc_html($about_cta); ?>
          <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>

      </div>
    </div>
  </div>
</section>