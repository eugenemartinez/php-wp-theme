<?php
$logo      = get_template_directory_uri() . '/assets/logo.png';
$tagline   = get_option('footer_tagline') ?: get_bloginfo('description');
$copyright = get_option('footer_copyright') ?: '© ' . date('Y') . ' ' . get_bloginfo('name') . '. All rights reserved.';
$email     = get_option('footer_email') ?: get_option('admin_email');
?>

<footer id="main-footer" class="bg-foreground text-background py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Bottom Row -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-6">

      <!-- Logo -->
      <div id="footer-logo" class="text-center md:text-left">
        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" class="h-10 w-auto mx-auto md:mx-0 mb-2" />
        <p class="text-background/60 text-sm"><?php bloginfo('name'); ?></p>
      </div>

      <!-- Email -->
      <div class="text-center">
        <a href="mailto:<?php echo esc_attr($email); ?>" class="text-background/60 hover:text-background transition-colors text-sm">
          <?php echo esc_html($email); ?>
        </a>
      </div>

      <!-- Copyright -->
      <div class="text-center md:text-right">
        <p class="text-background/40 text-sm"><?php echo esc_html($copyright); ?></p>
      </div>

    </div>

    <!-- Tagline -->
    <div class="mt-8 pt-8 border-t border-background/10 text-center">
      <p class="text-background/40 text-sm italic">
        <?php echo esc_html($tagline); ?>
      </p>
    </div>

  </div>
</footer>