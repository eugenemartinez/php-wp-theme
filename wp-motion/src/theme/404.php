<?php get_header(); ?>

<section class="flex overflow-hidden relative justify-center items-center min-h-screen bg-background">

  <!-- Background blobs -->
  <div class="overflow-hidden absolute inset-0 pointer-events-none">
    <div
      class="absolute left-10 top-20 w-96 h-96 rounded-full bg-primary/10 blur-3xl"
      data-motion="blob"
      data-duration="20"
      data-scale="1.2"
      data-x="50"
      data-y="30">
    </div>
    <div
      class="absolute right-10 bottom-20 w-96 h-96 rounded-full bg-secondary/30 blur-3xl"
      data-motion="blob"
      data-duration="25"
      data-scale="1.3"
      data-x="-40"
      data-y="-30"
      data-delay="2">
    </div>
  </div>

  <div class="relative z-10 px-4 mx-auto max-w-3xl text-center sm:px-6 lg:px-8">

    <div
      class="mb-0 font-bold leading-none text-[180px] text-primary sm:text-[220px]"
      data-motion="fade-up"
      data-delay="0.1">
      404
    </div>

    <h1
      class="mb-4 text-3xl font-bold leading-tight sm:text-4xl md:text-5xl text-red"
      data-motion="fade-up"
      data-delay="0.3">
      This page took a detour.
    </h1>

    <p
      class="mx-auto mb-10 max-w-xl text-lg leading-relaxed sm:text-xl text-muted-foreground"
      data-motion="fade-up"
      data-delay="0.5">
      The page you're looking for doesn't exist or may have moved. Let's get you back on track.
    </p>

    <div
      class="flex flex-col gap-4 justify-center items-center sm:flex-row"
      data-motion="fade-up"
      data-delay="0.7">
      <a
        href="<?php echo home_url("/"); ?>"
        class="inline-flex gap-2 items-center py-4 px-8 text-lg font-semibold rounded-full shadow-lg bg-primary text-primary-foreground"
        data-motion="hover-lift">
        <i data-lucide="home" class="w-5 h-5"></i>
        <span>Back to Home</span>
      </a>
      <a
        href="<?php echo home_url("/blog"); ?>"
        class="inline-flex gap-2 items-center py-4 px-8 text-lg font-semibold rounded-full border-2 shadow-lg bg-card text-foreground border-border"
        data-motion="hover-lift">
        <i data-lucide="book-open" class="w-5 h-5"></i>
        <span>Read Blog</span>
      </a>
    </div>

  </div>
</section>

<?php get_footer(); ?>
