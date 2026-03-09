<?php
$title        = $attributes['title']        ?? 'About Us';
$subtitle     = $attributes['subtitle']     ?? 'Who We Are';
$description  = $attributes['description']  ?? 'Tell your story here.';
$description2 = $attributes['description2'] ?? 'Add a second paragraph here.';
$cta_text     = $attributes['ctaText']      ?? 'Work With Us';
$cta_url      = $attributes['ctaUrl']       ?? '/contact';
$image_id     = $attributes['image']        ?? 0;
$image_url    = $image_id
  ? wp_get_attachment_image_url($image_id, 'large')
  : '';
?>

<section id="about" class="py-24 bg-background overflow-hidden">
  <div class="max-w-6xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

      <!-- Image -->
      <div
        class="relative"
        data-gsap="fade-right"
        data-scroll="true">
        <?php if ($image_url) : ?>
          <img
            src="<?php echo esc_url($image_url); ?>"
            alt="<?php echo esc_attr($title); ?>"
            class="w-full h-auto rounded-3xl object-cover shadow-2xl" />
        <?php else : ?>
          <div class="w-full aspect-square rounded-3xl bg-muted flex items-center justify-center">
            <span class="text-muted-foreground text-sm">No image selected</span>
          </div>
        <?php endif; ?>
      </div>

      <!-- Content -->
      <div data-gsap="fade-left" data-scroll="true">
        <p
          class="text-sm uppercase tracking-wider font-semibold text-muted-foreground mb-4"
          data-gsap="fade-up"
          data-scroll="true"
          data-delay="0.1">
          <?php echo esc_html($subtitle); ?>
        </p>
        <h2
          class="text-4xl md:text-5xl font-bold text-foreground mb-6 leading-tight"
          data-gsap="fade-up"
          data-scroll="true"
          data-delay="0.2">
          <?php echo esc_html($title); ?>
        </h2>
        <p
          class="text-muted-foreground text-lg mb-4 leading-relaxed"
          data-gsap="fade-up"
          data-scroll="true"
          data-delay="0.3">
          <?php echo esc_html($description); ?>
        </p>
        <p
          class="text-muted-foreground text-lg mb-8 leading-relaxed"
          data-gsap="fade-up"
          data-scroll="true"
          data-delay="0.4">
          <?php echo esc_html($description2); ?>
        </p>
        <a
          href="<?php echo esc_url($cta_url); ?>"
          class="inline-flex items-center gap-2 bg-primary text-primary-foreground px-8 py-4 rounded-full font-semibold"
          data-gsap="fade-up hover-lift"
          data-scroll="true"
          data-delay="0.5">
          <?php echo esc_html($cta_text); ?>
        </a>
      </div>

    </div>
  </div>
</section>