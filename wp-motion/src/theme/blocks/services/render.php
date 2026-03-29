<?php
$title      = $attributes['title']       ?? 'Our Services';
$subtitle   = $attributes['subtitle']    ?? 'What We Offer';
$desc       = $attributes['description'] ?? 'Here is a brief description of the services we offer.';
$services   = [
  [
    'title' => $attributes['service1Title'] ?? 'Service One',
    'desc'  => $attributes['service1Desc']  ?? 'Brief description of your first service offering.',
  ],
  [
    'title' => $attributes['service2Title'] ?? 'Service Two',
    'desc'  => $attributes['service2Desc']  ?? 'Brief description of your second service offering.',
  ],
  [
    'title' => $attributes['service3Title'] ?? 'Service Three',
    'desc'  => $attributes['service3Desc']  ?? 'Brief description of your third service offering.',
  ],
];
?>

<section id="services" class="py-24 bg-muted/30 overflow-hidden">
  <div class="max-w-6xl mx-auto px-4">

    <!-- Header -->
    <div class="text-center mb-16">
      <p
        class="text-sm uppercase tracking-wider font-semibold text-muted-foreground mb-4"
        data-motion="fade-up"
        data-scroll="true"
        data-delay="0.1">
        <?php echo esc_html($subtitle); ?>
      </p>
      <h2
        class="text-4xl md:text-5xl font-bold text-foreground mb-6"
        data-motion="fade-up"
        data-scroll="true"
        data-delay="0.2">
        <?php echo esc_html($title); ?>
      </h2>
      <p
        class="text-muted-foreground text-lg max-w-2xl mx-auto"
        data-motion="fade-up"
        data-scroll="true"
        data-delay="0.3">
        <?php echo esc_html($desc); ?>
      </p>
    </div>

    <!-- Service Cards -->
    <div
      class="grid grid-cols-1 md:grid-cols-3 gap-8"
      data-motion="stagger-fade-up"
      data-scroll="true"
      data-stagger="0.15">
      <?php foreach ($services as $service) : ?>
        <div class="bg-background border border-border rounded-2xl p-8" data-motion="hover-lift">
          <h3 class="text-xl font-bold text-foreground mb-4">
            <?php echo esc_html($service['title']); ?>
          </h3>
          <p class="text-muted-foreground leading-relaxed">
            <?php echo esc_html($service['desc']); ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
