<?php
$title       = $attributes['title']       ?? 'Get in Touch';
$subtitle    = $attributes['subtitle']    ?? 'Contact Us';
$description = $attributes['description'] ?? 'Have a project in mind? We would love to hear from you.';
$email       = $attributes['email']       ?? 'hello@yourbrand.com';
$location    = $attributes['location']    ?? 'Your City, Country';
?>

<section id="contact" class="py-24 bg-background overflow-hidden">
  <div class="max-w-4xl mx-auto px-4 text-center">

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
      class="text-muted-foreground text-lg mb-12 max-w-2xl mx-auto"
      data-motion="fade-up"
      data-scroll="true"
      data-delay="0.3">
      <?php echo esc_html($description); ?>
    </p>

    <!-- Contact Details -->
    <div
      class="flex flex-col md:flex-row items-center justify-center gap-8 mb-12"
      data-motion="fade-up"
      data-scroll="true"
      data-delay="0.4">
      <a
        href="mailto:<?php echo esc_attr($email); ?>"
        class="flex items-center gap-3 text-foreground hover:text-primary transition-colors"
        data-motion="hover-lift">
        <span class="text-lg font-medium"><?php echo esc_html($email); ?></span>
      </a>
      <span class="text-muted-foreground hidden md:block">·</span>
      <span class="flex items-center gap-3 text-muted-foreground">
        <span class="text-lg"><?php echo esc_html($location); ?></span>
      </span>
    </div>

    <!-- CTA -->
    <div
      data-motion="fade-up"
      data-scroll="true"
      data-scroll-start="top 95%"
      data-delay="0.5">
      <a
        href="mailto:<?php echo esc_attr($email); ?>"
        class="inline-flex items-center gap-2 bg-primary text-white px-10 py-4 rounded-full font-semibold text-lg"
        data-motion="hover-lift">
        Send a Message
      </a>
    </div>

  </div>
</section>
