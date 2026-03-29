<?php
$title       = $attributes['title'] ?? 'What We Do';
$subtitle    = $attributes['subtitle'] ?? 'Capabilities';
$description = $attributes['description'] ?? 'We craft digital experiences that move — from strategy to execution, every detail is intentional.';

$capabilities = [
  [
    'label'     => 'Brand Strategy',
    'animation' => 'float',
    'delay'     => '0',
    'duration'  => '3',
    'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>',
  ],
  [
    'label'     => 'Web Development',
    'animation' => 'pulse',
    'delay'     => '0.5',
    'duration'  => '2',
    'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>',
  ],
  [
    'label'     => 'Motion Design',
    'animation' => 'spin',
    'delay'     => '0',
    'duration'  => '8',
    'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>',
  ],
  [
    'label'     => 'UI / UX Design',
    'animation' => 'bounce',
    'delay'     => '0.3',
    'duration'  => '0.8',
    'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>',
  ],
  [
    'label'     => 'Performance',
    'animation' => 'heartbeat',
    'delay'     => '0',
    'duration'  => '0.4',
    'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>',
  ],
  [
    'label'     => 'SEO & Growth',
    'animation' => 'wiggle',
    'delay'     => '0.2',
    'duration'  => '0.15',
    'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>',
  ],
  [
    'label'     => 'Live Updates',
    'animation' => 'ping',
    'delay'     => '0',
    'duration'  => '1.2',
    'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="2"/><path d="M16.24 7.76a6 6 0 0 1 0 8.49M7.76 16.24a6 6 0 0 1 0-8.49M19.07 4.93a10 10 0 0 1 0 14.14M4.93 19.07a10 10 0 0 1 0-14.14"/></svg>',
  ],
  [
    'label'     => 'Copywriting',
    'animation' => 'float',
    'delay'     => '1',
    'duration'  => '4',
    'y'         => '-15',
    'icon'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>',
  ],
];
?>

<section class="relative bg-foreground text-background py-24 md:py-32 overflow-hidden">

  <!-- Background noise texture -->
  <div class="absolute inset-0 opacity-5 pointer-events-none"
    style="background-image: url('data:image/svg+xml,%3Csvg viewBox=%220 0 256 256%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cfilter id=%22noise%22%3E%3CfeTurbulence type=%22fractalNoise%22 baseFrequency=%220.9%22 numOctaves=%224%22 stitchTiles=%22stitch%22/%3E%3C/filter%3E%3Crect width=%22100%25%22 height=%22100%25%22 filter=%22url(%23noise)%22/%3E%3C/svg%3E');"></div>

  <!-- Decorative blobs -->
  <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary/10 rounded-full blur-[120px] pointer-events-none -translate-y-1/2 translate-x-1/2"
    data-motion="blob" data-duration="20" data-scale="1.3" data-x="40" data-y="20"></div>
  <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-primary/5 rounded-full blur-[100px] pointer-events-none translate-y-1/2 -translate-x-1/2"
    data-motion="blob" data-duration="25" data-scale="1.2" data-x="-30" data-y="-20" data-delay="3"></div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="max-w-2xl mb-20">
      <p
        class="text-xs uppercase tracking-[0.3em] font-semibold text-primary mb-4"
        data-motion="fade-up"
        data-delay="0.1">
        <?php echo esc_html($subtitle); ?>
      </p>
      <h2
        class="text-5xl md:text-6xl lg:text-7xl font-bold text-background leading-[0.9] tracking-tight mb-6"
        data-motion="fade-up"
        data-delay="0.2">
        <?php echo esc_html($title); ?>
      </h2>
      <p
        class="text-background/50 text-lg leading-relaxed"
        data-motion="fade-up"
        data-delay="0.3">
        <?php echo esc_html($description); ?>
      </p>
    </div>

    <!-- Capabilities grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
      <?php foreach ($capabilities as $i => $cap) :
        $delay    = (float)($cap['delay'] ?? 0) + 0.4;
        $anim     = $cap['animation'];
        $duration = $cap['duration'] ?? '1';
        $y        = $cap['y'] ?? '-20';
      ?>
        <div
          class="group relative bg-background/5 hover:bg-background/10 border border-background/10 hover:border-primary/40 rounded-2xl p-6 transition-colors duration-300 cursor-default overflow-hidden"
          data-motion="fade-up"
          data-scroll="true"
          data-delay="<?php echo $delay; ?>">

          <!-- Animated icon -->
          <div
            class="w-12 h-12 text-secondary mb-4"
            data-motion="<?php echo esc_attr($anim); ?>"
            data-duration="<?php echo esc_attr($duration); ?>"
            <?php if ($anim === 'float') : ?>data-y="<?php echo esc_attr($y); ?>"<?php endif; ?>
            <?php if (!empty($cap['delay'])) : ?>data-delay="<?php echo esc_attr($cap['delay']); ?>"<?php endif; ?>>
            <?php echo $cap['icon']; ?>
          </div>

          <!-- Label -->
          <p class="text-background/80 font-semibold text-sm leading-snug">
            <?php echo esc_html($cap['label']); ?>
          </p>

          <!-- Animation name badge -->
          <span class="absolute top-3 right-3 text-[10px] font-mono text-background/20 group-hover:text-primary/50 transition-colors">
            <?php echo esc_html($anim); ?>
          </span>

        </div>
      <?php endforeach; ?>
    </div>

    <!-- Bottom CTA -->
    <div
      class="mt-16 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 pt-12 border-t border-background/10"
      data-motion="fade-up"
      data-scroll="true">
      <p class="text-background/40 text-sm max-w-md">
        Every animation above is powered by a single <code class="text-primary font-mono">data-motion</code> attribute — no custom JS required.
      </p>
      <a
        href="<?php echo home_url('/contact'); ?>"
        class="inline-flex items-center gap-2 bg-primary text-white px-8 py-4 rounded-full font-semibold text-sm whitespace-nowrap"
        data-motion="hover-lift">
        Start a Project
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
    </div>

  </div>
</section>
