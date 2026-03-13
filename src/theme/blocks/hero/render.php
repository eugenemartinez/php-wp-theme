<?php
$title           = $attributes['title']           ?? 'Your Headline Here';
$title_span      = $attributes['titleSpan']       ?? 'Highlighted Word';
$subtitle        = $attributes['subtitle']        ?? 'Your subtitle here';
$description     = $attributes['description']     ?? 'A brief description of what you do and who you serve.';
$cta_text        = $attributes['ctaText']         ?? 'Get in Touch';
$cta_url         = $attributes['ctaUrl']          ?? '/contact';
$bg_image_id     = $attributes['backgroundImage'] ?? 0;
$overlay_opacity = $attributes['overlayOpacity']  ?? 50;
$bg_image_url    = $bg_image_id
  ? wp_get_attachment_image_url($bg_image_id, 'full')
  : '';
$overlay_style   = 'opacity: ' . ($overlay_opacity / 100) . ';';
?>

<section
  id="hero"
  class="relative min-h-screen flex items-center justify-center overflow-hidden bg-background"
  <?php if ($bg_image_url) : ?>
    style="background-image: url('<?php echo esc_url($bg_image_url); ?>'); background-size: cover; background-position: center;"
  <?php endif; ?>
>

  <?php if ($bg_image_url) : ?>
    <!-- Dark overlay -->
    <div
      class="absolute inset-0 bg-black z-10"
      style="<?php echo esc_attr($overlay_style); ?>">
    </div>
  <?php else : ?>
    <!-- Geometric shapes background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">

      <!-- Large spinning ring — top left -->
      <div
        class="absolute top-16 left-8 w-24 h-24 rounded-full border-2 border-primary/30"
        data-gsap="spin"
        data-duration="12">
      </div>

      <!-- Medium spinning ring — top right -->
      <div
        class="absolute top-24 right-16 w-16 h-16 rounded-full border-2 border-primary/20"
        data-gsap="spin"
        data-duration="8">
      </div>

      <!-- Floating filled circle — left middle -->
      <div
        class="absolute top-1/2 left-12 w-6 h-6 rounded-full bg-primary/20"
        data-gsap="float"
        data-duration="4"
        data-y="-25"
        data-delay="1">
      </div>

      <!-- Bouncing small square — right middle -->
      <div
        class="absolute top-1/3 right-24 w-5 h-5 bg-primary/20 rotate-45"
        data-gsap="bounce"
        data-duration="1.2"
        data-delay="0.5">
      </div>

      <!-- Ping dot — top center -->
      <div class="absolute top-20 left-1/2 -translate-x-1/2">
        <div
          class="w-3 h-3 rounded-full bg-primary/40"
          data-gsap="ping"
          data-duration="1.5">
        </div>
      </div>

      <!-- Floating triangle — bottom left -->
      <div
        class="absolute bottom-32 left-20"
        data-gsap="float"
        data-duration="5"
        data-y="-20"
        data-delay="2">
        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
          <polygon points="16,2 30,28 2,28" stroke="currentColor" stroke-width="1.5" class="text-primary/30" fill="none"/>
        </svg>
      </div>

      <!-- Spinning small ring — bottom right -->
      <div
        class="absolute bottom-24 right-12 w-12 h-12 rounded-full border border-primary/25"
        data-gsap="spin"
        data-duration="6">
      </div>

      <!-- Bouncing dot — bottom center -->
      <div
        class="absolute bottom-20 left-1/3 w-4 h-4 rounded-full bg-primary/15"
        data-gsap="bounce"
        data-duration="0.9"
        data-delay="0.3">
      </div>

      <!-- Floating large ring — right bottom -->
      <div
        class="absolute bottom-16 right-1/3 w-20 h-20 rounded-full border border-primary/15"
        data-gsap="float"
        data-duration="6"
        data-y="-15"
        data-delay="3">
      </div>

      <!-- Ping dot — left bottom -->
      <div class="absolute bottom-40 left-1/3">
        <div
          class="w-2 h-2 rounded-full bg-primary/30"
          data-gsap="ping"
          data-duration="2"
          data-delay="1">
        </div>
      </div>

      <!-- Wiggling small square — top right area -->
      <div
        class="absolute top-1/2 right-8 w-4 h-4 bg-primary/20 rotate-12"
        data-gsap="wiggle"
        data-duration="0.2">
      </div>

      <!-- Heartbeat dot — center left -->
      <div
        class="absolute top-2/3 left-1/4 w-5 h-5 rounded-full bg-primary/20"
        data-gsap="heartbeat"
        data-duration="0.5">
      </div>

    </div>
  <?php endif; ?>

  <!-- Content -->
  <div class="relative z-20 text-center px-4 max-w-4xl mx-auto">
    <p
      class="text-sm uppercase tracking-wider font-semibold mb-4 <?php echo $bg_image_url ? 'text-white/70' : 'text-muted-foreground'; ?>"
      data-gsap="fade-up"
      data-delay="0.1">
      <?php echo esc_html($subtitle); ?>
    </p>
    <h1
      class="text-5xl md:text-7xl font-bold mb-6 leading-tight <?php echo $bg_image_url ? 'text-white' : 'text-foreground'; ?>"
      data-gsap="fade-up"
      data-delay="0.3">
      <?php echo esc_html($title); ?>
      <span class="text-primary"> <?php echo esc_html($title_span); ?></span>
    </h1>
    <p
      class="text-lg mb-10 max-w-2xl mx-auto <?php echo $bg_image_url ? 'text-white/70' : 'text-muted-foreground'; ?>"
      data-gsap="fade-up"
      data-delay="0.5">
      <?php echo esc_html($description); ?>
    </p>
    <a
      href="<?php echo esc_url($cta_url); ?>"
      class="inline-flex items-center gap-2 bg-primary text-white px-8 py-4 rounded-full font-semibold text-lg"
      data-gsap="fade-up hover-lift"
      data-delay="0.7">
      <?php echo esc_html($cta_text); ?>
    </a>
  </div>
  

</section>
