<?php
global $post;
$sv_title = get_post_meta($post->ID, 'sv_title', true) ?: 'Our Services';
$sv_sub   = get_post_meta($post->ID, 'sv_sub', true) ?: 'What We Offer';
$sv_desc  = get_post_meta($post->ID, 'sv_desc', true) ?: 'Here is a brief description of the services we offer.';

// Hardcoded service cards — replace with ACF repeater (Pro) or custom fields per project
$services = [
  [
    'title'   => 'Service One',
    'desc'    => 'Brief description of this service and what it offers to clients.',
    'icon'    => 'star',
  ],
  [
    'title'   => 'Service Two',
    'desc'    => 'Brief description of this service and what it offers to clients.',
    'icon'    => 'zap',
  ],
  [
    'title'   => 'Service Three',
    'desc'    => 'Brief description of this service and what it offers to clients.',
    'icon'    => 'heart',
  ],
  [
    'title'   => 'Service Four',
    'desc'    => 'Brief description of this service and what it offers to clients.',
    'icon'    => 'shield',
  ],
  [
    'title'   => 'Service Five',
    'desc'    => 'Brief description of this service and what it offers to clients.',
    'icon'    => 'globe',
  ],
  [
    'title'   => 'Service Six',
    'desc'    => 'Brief description of this service and what it offers to clients.',
    'icon'    => 'layers',
  ],
];

$icons = [
  'star'   => '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
  'zap'    => '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
  'heart'  => '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>',
  'shield' => '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
  'globe'  => '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
  'layers' => '<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>',
];
?>

<section id="services" class="py-24 md:py-32 bg-muted/30">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Header -->
    <div id="sv-header" class="text-center mb-16">
      <p class="text-sm uppercase tracking-wider font-semibold text-muted-foreground mb-4">
        <?php echo esc_html($sv_sub); ?>
      </p>
      <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-6 leading-tight">
        <?php echo esc_html($sv_title); ?>
      </h2>
      <p class="text-muted-foreground text-lg max-w-2xl mx-auto leading-relaxed">
        <?php echo esc_html($sv_desc); ?>
      </p>
    </div>

    <!-- Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($services as $index => $service) : ?>
        <div class="sv-card group bg-card rounded-3xl p-8 border border-border shadow-sm relative overflow-hidden cursor-pointer"
          data-index="<?php echo $index; ?>">

          <!-- Hover glow -->
          <div class="sv-card-glow absolute -inset-1 bg-primary/10 rounded-3xl blur-xl opacity-0 -z-10"></div>

          <!-- Icon -->
          <div class="sv-icon w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center mb-6">
            <?php echo $icons[$service['icon']] ?? $icons['star']; ?>
          </div>

          <!-- Title -->
          <h3 class="sv-card-title text-xl font-bold text-foreground mb-3">
            <?php echo esc_html($service['title']); ?>
          </h3>

          <!-- Description -->
          <p class="text-muted-foreground leading-relaxed">
            <?php echo esc_html($service['desc']); ?>
          </p>

        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>