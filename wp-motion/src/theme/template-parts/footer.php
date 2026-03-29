<?php
$logo = get_template_directory_uri() . "/assets/logo.png";
$tagline = get_option("footer_tagline") ?: get_bloginfo("description");
$copyright =
    get_option("footer_copyright") ?:
    "© " . date("Y") . " " . get_bloginfo("name") . ". All rights reserved.";
$email = get_option("footer_email") ?: get_option("admin_email");
?>

<footer id="main-footer" class="py-12 bg-foreground text-background">
  <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

    <!-- Bottom Row -->
    <div class="flex flex-col gap-6 justify-between items-center md:flex-row">

      <!-- Logo -->
      <div id="footer-logo" class="text-center md:text-left" data-motion="hover-dim">
        <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo(
            "name",
        ); ?>" class="mx-auto mb-2 w-auto h-10 md:mx-0" />
        <p class="text-sm text-background/60"><?php bloginfo("name"); ?></p>
      </div>

      <!-- Email -->
      <div class="text-center">
        <a
          href="mailto:<?php echo esc_attr($email); ?>"
          class="text-sm transition-colors text-background/60 hover:text-background"
          data-motion="hover-dim">
          <?php echo esc_html($email); ?>
        </a>
      </div>

      <!-- Copyright -->
      <div class="text-center md:text-right">
        <p class="text-sm text-background/40"><?php echo esc_html(
            $copyright,
        ); ?></p>
      </div>

    </div>

    <!-- Tagline -->
    <div class="pt-8 mt-8 text-center border-t border-background/10">
      <p class="text-sm italic text-background/40">
        <?php echo esc_html($tagline); ?>
      </p>
    </div>

  </div>
</footer>
