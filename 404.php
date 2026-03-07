<?php get_header(); ?>

<section class="min-h-screen bg-background relative overflow-hidden flex items-center justify-center">

  <!-- Background blobs -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div id="err-blob-1" class="absolute top-20 left-10 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
    <div id="err-blob-2" class="absolute bottom-20 right-10 w-96 h-96 bg-secondary/30 rounded-full blur-3xl"></div>
  </div>

  <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto">

    <div id="err-number" class="text-[180px] sm:text-[220px] font-bold leading-none bg-clip-text text-transparent bg-primary mb-0"
      style="background: var(--color-primary);">
      404
    </div>

    <div id="err-content">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-foreground mb-4 leading-tight">
        This page took a detour.
      </h1>
      <p class="text-lg sm:text-xl text-muted-foreground mb-10 leading-relaxed max-w-xl mx-auto">
        The page you're looking for doesn't exist or may have moved. Let's get you back on track.
      </p>

      <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <a id="err-home-btn" href="<?php echo home_url('/'); ?>"
          class="inline-flex items-center gap-2 bg-primary text-primary-foreground px-8 py-4 rounded-full font-semibold text-lg shadow-lg">
          <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          <span>Back to Home</span>
        </a>
        <a id="err-second-btn" href="<?php echo home_url('/blog'); ?>"
          class="inline-flex items-center gap-2 bg-card text-foreground px-8 py-4 rounded-full font-semibold text-lg shadow-lg border-2 border-border">
          <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          <span>Read Blog</span>
        </a>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>