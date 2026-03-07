<?php
global $post;
$ct_title    = get_post_meta($post->ID, 'ct_title', true) ?: 'Get in Touch';
$ct_sub      = get_post_meta($post->ID, 'ct_sub', true) ?: 'Contact Us';
$ct_desc     = get_post_meta($post->ID, 'ct_desc', true) ?: 'Have a project in mind? We would love to hear from you.';
$ct_email    = get_post_meta($post->ID, 'ct_email', true) ?: get_option('admin_email');
$ct_location = get_post_meta($post->ID, 'ct_location', true) ?: 'Your City, Country';
?>

<section id="contact" class="py-24 md:py-32 bg-background">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

      <!-- Left — Header + Info -->
      <div id="ct-content">

        <p class="text-sm uppercase tracking-wider font-semibold text-muted-foreground mb-4">
          <?php echo esc_html($ct_sub); ?>
        </p>

        <h2 class="text-4xl md:text-5xl font-bold text-foreground mb-6 leading-tight">
          <?php echo esc_html($ct_title); ?>
        </h2>

        <div class="w-16 h-1 bg-primary mb-8"></div>

        <p class="text-muted-foreground text-lg leading-relaxed mb-10">
          <?php echo esc_html($ct_desc); ?>
        </p>

        <!-- Contact details -->
        <div class="space-y-4">

          <!-- Email -->
          <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
            <a href="mailto:<?php echo esc_attr($ct_email); ?>" class="text-foreground hover:text-primary transition-colors">
              <?php echo esc_html($ct_email); ?>
            </a>
          </div>

          <!-- Location -->
          <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center flex-shrink-0">
              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <span class="text-foreground">
              <?php echo esc_html($ct_location); ?>
            </span>
          </div>

        </div>
      </div>

      <!-- Right — Form -->
      <div id="ct-form-wrap">
        <form id="ct-form" class="bg-card rounded-3xl p-8 border border-border shadow-sm space-y-6">

          <!-- Name row -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-foreground mb-2">First Name <span class="text-destructive">*</span></label>
              <input type="text" name="firstName" placeholder="John"
                class="w-full px-4 py-3 bg-input-background border border-border rounded-xl text-foreground placeholder-muted-foreground focus:outline-none focus:border-primary transition-colors" />
              <p class="ct-error text-destructive text-xs mt-1 hidden"></p>
            </div>
            <div>
              <label class="block text-sm font-medium text-foreground mb-2">Last Name <span class="text-destructive">*</span></label>
              <input type="text" name="lastName" placeholder="Doe"
                class="w-full px-4 py-3 bg-input-background border border-border rounded-xl text-foreground placeholder-muted-foreground focus:outline-none focus:border-primary transition-colors" />
              <p class="ct-error text-destructive text-xs mt-1 hidden"></p>
            </div>
          </div>

          <!-- Email -->
          <div>
            <label class="block text-sm font-medium text-foreground mb-2">Email <span class="text-destructive">*</span></label>
            <input type="email" name="email" placeholder="john@example.com"
              class="w-full px-4 py-3 bg-input-background border border-border rounded-xl text-foreground placeholder-muted-foreground focus:outline-none focus:border-primary transition-colors" />
            <p class="ct-error text-destructive text-xs mt-1 hidden"></p>
          </div>

          <!-- Phone -->
          <div>
            <label class="block text-sm font-medium text-foreground mb-2">Phone <span class="text-muted-foreground text-xs font-normal">(optional)</span></label>
            <input type="tel" name="phone" placeholder="+1 234 567 890"
              class="w-full px-4 py-3 bg-input-background border border-border rounded-xl text-foreground placeholder-muted-foreground focus:outline-none focus:border-primary transition-colors" />
          </div>

          <!-- Message -->
          <div>
            <label class="block text-sm font-medium text-foreground mb-2">Message <span class="text-destructive">*</span></label>
            <textarea name="message" rows="5" placeholder="Tell us about your project..."
              class="w-full px-4 py-3 bg-input-background border border-border rounded-xl text-foreground placeholder-muted-foreground focus:outline-none focus:border-primary transition-colors resize-none"></textarea>
            <p class="ct-error text-destructive text-xs mt-1 hidden"></p>
          </div>

          <!-- Status -->
          <div id="ct-status" class="hidden text-sm font-medium px-4 py-3 rounded-xl"></div>

          <!-- Submit -->
          <button type="submit" id="ct-submit"
            class="w-full bg-primary text-primary-foreground py-4 rounded-full font-semibold text-lg hover:opacity-90 transition-all shadow-lg flex items-center justify-center gap-2">
            <span id="ct-submit-text">Send Message</span>
            <svg id="ct-submit-icon" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            <svg id="ct-submit-spinner" class="w-5 h-5 animate-spin hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/></svg>
          </button>

        </form>
      </div>

    </div>
  </div>
</section>