<?php
/**
 * Template for /custom — Motion Presets Test Page
 * Automatically maps to dev-site.test/custom via page slug.
 */

get_header(); ?>

<main class="pt-24 pb-32 min-h-screen bg-background text-foreground">
  <div class="px-6 mx-auto space-y-24 max-w-4xl">

    <!-- Header -->
    <div class="space-y-2 text-center">
      <h1 class="text-4xl font-bold">Motion Presets Test</h1>
      <p class="text-muted-foreground">Scroll down to trigger animations. Hover over items where noted.</p>
    </div>

    <!-- ─────────────────────────────────────────────── -->
    <!-- ENTRANCE ANIMATIONS                            -->
    <!-- ─────────────────────────────────────────────── -->
    <section class="space-y-6">
      <h2 class="font-mono text-xs tracking-widest uppercase text-muted-foreground">Entrance — scroll to trigger</h2>

      <!-- fade-up -->
      <div class="space-y-2">
        <p class="text-xs text-muted-foreground">fade-up → rises from below while fading in</p>
        <div class="p-6 rounded-xl border bg-card border-border"
          data-motion="fade-up" data-scroll="true">
          fade-up
        </div>
      </div>

      <!-- fade-down -->
      <div class="space-y-2">
        <p class="text-xs text-muted-foreground">fade-down → drops from above while fading in</p>
        <div class="p-6 rounded-xl border bg-card border-border"
          data-motion="fade-down" data-scroll="true">
          fade-down
        </div>
      </div>

      <!-- fade-left -->
      <div class="space-y-2">
        <p class="text-xs text-muted-foreground">fade-left → slides in from the left</p>
        <div class="p-6 rounded-xl border bg-card border-border"
          data-motion="fade-left" data-scroll="true">
          fade-left
        </div>
      </div>

      <!-- fade-right -->
      <div class="space-y-2">
        <p class="text-xs text-muted-foreground">fade-right → slides in from the right</p>
        <div class="p-6 rounded-xl border bg-card border-border"
          data-motion="fade-right" data-scroll="true">
          fade-right
        </div>
      </div>

      <!-- fade-in -->
      <div class="space-y-2">
        <p class="text-xs text-muted-foreground">fade-in → pure opacity, no movement</p>
        <div class="p-6 rounded-xl border bg-card border-border"
          data-motion="fade-in" data-scroll="true">
          fade-in
        </div>
      </div>

      <!-- zoom-in -->
      <div class="space-y-2">
        <p class="text-xs text-muted-foreground">zoom-in → scales up from 0.8 with a slight bounce</p>
        <div class="p-6 rounded-xl border bg-card border-border"
          data-motion="zoom-in" data-scroll="true">
          zoom-in
        </div>
      </div>

      <!-- zoom-out -->
      <div class="space-y-2">
        <p class="text-xs text-muted-foreground">zoom-out → scales down from 1.2 to 1</p>
        <div class="p-6 rounded-xl border bg-card border-border"
          data-motion="zoom-out" data-scroll="true">
          zoom-out
        </div>
      </div>

    </section>

    <!-- ─────────────────────────────────────────────── -->
    <!-- HOVER ANIMATIONS                               -->
    <!-- ─────────────────────────────────────────────── -->
    <section class="space-y-6">
      <h2 class="font-mono text-xs tracking-widest uppercase text-muted-foreground">Hover — mouse over each card</h2>

      <div class="grid grid-cols-2 gap-4 md:grid-cols-4">

        <div class="p-6 space-y-1 text-center rounded-xl border cursor-pointer bg-card border-border"
          data-motion="hover-lift">
          <p class="text-sm font-medium">hover-lift</p>
          <p class="text-xs text-muted-foreground">lifts + scales</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border cursor-pointer bg-card border-border"
          data-motion="hover-scale">
          <p class="text-sm font-medium">hover-scale</p>
          <p class="text-xs text-muted-foreground">scales up only</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border cursor-pointer bg-card border-border"
          data-motion="hover-glow">
          <p class="text-sm font-medium">hover-glow</p>
          <p class="text-xs text-muted-foreground">ring + scale (needs .motion-glowing CSS)</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border cursor-pointer bg-card border-border"
          data-motion="hover-dim">
          <p class="text-sm font-medium">hover-dim</p>
          <p class="text-xs text-muted-foreground">dims to 70%</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border cursor-pointer bg-card border-border"
          data-motion="hover-rise">
          <p class="text-sm font-medium">hover-rise</p>
          <p class="text-xs text-muted-foreground">lift + scale, no color</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border opacity-60 cursor-pointer bg-card border-border"
          data-motion="hover-bright">
          <p class="text-sm font-medium">hover-bright</p>
          <p class="text-xs text-muted-foreground">restores opacity to 1</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border cursor-pointer bg-card border-border"
          data-motion="hover-card">
          <p class="text-sm font-medium">hover-card</p>
          <p class="text-xs text-muted-foreground">lift + glow combo</p>
        </div>

      	<div
        	class="inline-flex gap-2 items-center py-3 px-12 text-white rounded-full cursor-pointer bg-primary"
        	data-motion="hover-arrow">
        	Read more
        	<span data-arrow style="display:inline-block">→</span>
      	</div>

      </div>
    </section>

    <!-- ─────────────────────────────────────────────── -->
    <!-- CONTINUOUS ANIMATIONS                          -->
    <!-- ─────────────────────────────────────────────── -->
    <section class="space-y-6">
      <h2 class="font-mono text-xs tracking-widest uppercase text-muted-foreground">Continuous — always running</h2>

      <div class="grid grid-cols-2 gap-4 md:grid-cols-4">

        <div class="p-6 space-y-1 text-center rounded-xl border bg-card border-border"
          data-motion="pulse" data-scale="1.05" data-duration="1.2">
          <p class="text-sm font-medium">pulse</p>
          <p class="text-xs text-muted-foreground">gentle scale throb</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border bg-card border-border"
          data-motion="float" data-duration="2.5">
          <p class="text-sm font-medium">float</p>
          <p class="text-xs text-muted-foreground">bobs up and down</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border bg-card border-border">
          <div class="mx-auto w-fit" data-motion="spin" data-duration="3">
            <i 
              data-lucide="triangle" 
              class="w-8 h-8 fill-current text-primary"
            ></i>
          </div>
          <p class="text-sm font-medium">spin</p>
          <p class="text-xs text-muted-foreground">continuous 360°</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border bg-card border-border">
          <div class="inline-flex relative">
            <div class="w-3 h-3 rounded-full bg-primary"></div>
            <div class="absolute inset-0 w-3 h-3 rounded-full bg-primary" data-motion="ping"></div>
          </div>
          <p class="mt-2 text-sm font-medium">ping</p>
          <p class="text-xs text-muted-foreground">expand + fade out</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border bg-card border-border"
          data-motion="bounce" data-duration="0.6">
          <p class="text-sm font-medium">bounce</p>
          <p class="text-xs text-muted-foreground">vertical bounce</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border bg-card border-border"
          data-motion="wiggle" data-duration="0.15">
          <p class="text-sm font-medium">wiggle</p>
          <p class="text-xs text-muted-foreground">left–right rotation</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border bg-card border-border"
          data-motion="heartbeat" data-duration="0.4">
          <p class="text-sm font-medium">heartbeat</p>
          <p class="text-xs text-muted-foreground">quick scale throb</p>
        </div>

        <div class="p-6 space-y-1 text-center rounded-xl border bg-card border-border"
          data-motion="blob" data-scale="1.08" data-duration="3" data-opacity-to="0.9">
          <p class="text-sm font-medium">blob</p>
          <p class="text-xs text-muted-foreground">organic scale + opacity loop</p>
        </div>

      </div>
    </section>

    <!-- ─────────────────────────────────────────────── -->
    <!-- STAGGER                                        -->
    <!-- ─────────────────────────────────────────────── -->
    <section class="space-y-6">
      <h2 class="font-mono text-xs tracking-widest uppercase text-muted-foreground">Stagger — children animate in sequence on scroll</h2>

      <!-- stagger-fade-in -->
      <div class="space-y-2">
        <p class="text-xs text-muted-foreground">stagger-fade-in</p>
        <div class="grid grid-cols-3 gap-4"
          data-motion="stagger-fade-in" data-scroll="true" data-stagger="0.15">
          <div class="p-6 text-sm text-center rounded-xl border bg-card border-border">Item 1</div>
          <div class="p-6 text-sm text-center rounded-xl border bg-card border-border">Item 2</div>
          <div class="p-6 text-sm text-center rounded-xl border bg-card border-border">Item 3</div>
        </div>
      </div>

      <!-- stagger-fade-left -->
      <div class="space-y-2">
        <p class="text-xs text-muted-foreground">stagger-fade-left</p>
        <div class="grid grid-cols-3 gap-4"
          data-motion="stagger-fade-left" data-scroll="true" data-stagger="0.15">
          <div class="p-6 text-sm text-center rounded-xl border bg-card border-border">Item 1</div>
          <div class="p-6 text-sm text-center rounded-xl border bg-card border-border">Item 2</div>
          <div class="p-6 text-sm text-center rounded-xl border bg-card border-border">Item 3</div>
        </div>
      </div>

    </section>

    <!-- ─────────────────────────────────────────────── -->
    <!-- INPUT FOCUS                                    -->
    <!-- ─────────────────────────────────────────────── -->
    <section class="space-y-6">
      <h2 class="font-mono text-xs tracking-widest uppercase text-muted-foreground">Input Focus — click into each field</h2>

      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">

        <div class="space-y-2">
          <p class="text-xs text-muted-foreground">focus-scale → input scales up slightly on focus</p>
          <input
            type="text"
            placeholder="focus-scale"
            class="py-3 px-4 w-full text-sm rounded-xl border outline-none bg-card border-border"
            data-motion="focus-scale" />
        </div>

        <div class="space-y-2">
          <p class="text-xs text-muted-foreground">focus-glow → glowing ring appears on focus (needs .motion-glowing CSS)</p>
          <input
            type="text"
            placeholder="focus-glow"
            class="py-3 px-4 w-full text-sm rounded-xl border outline-none bg-card border-border"
            data-motion="focus-glow" />
        </div>

      </div>
    </section>

    <!-- ─────────────────────────────────────────────── -->
    <!-- TYPEWRITER                                     -->
    <!-- ─────────────────────────────────────────────── -->
    <section class="space-y-6">
      <h2 class="font-mono text-xs tracking-widest uppercase text-muted-foreground">Typewriter — already confirmed working</h2>
      <p class="text-xs text-muted-foreground">types out character by character, then loops after 10s</p>
      <h3 class="text-2xl font-bold" data-motion="typewriter" data-duration="2.5">
        The quick brown fox jumps over the lazy dog.
      </h3>
    </section>

		<!-- ─────────────────────────────────────── -->
    <!-- PARALLAX                               -->
    <!-- ─────────────────────────────────────── -->
    <section class="space-y-4">
      <h2 class="font-mono text-xs tracking-widest uppercase text-muted-foreground">parallax</h2>
      <p class="text-xs text-muted-foreground">
        Scroll through the image. It should move vertically at a slower rate than the page — giving a depth effect. The container clips the overflow.
      </p>
 
      <!-- Container must be overflow:hidden for parallax to show -->
      <div class="overflow-hidden rounded-2xl" style="height: 360px;">
        <img
          src="<?php echo esc_url(
              get_template_directory_uri(),
          ); ?>/assets/placeholder.png"
          alt="Parallax test"
          data-motion="parallax"
          style="width:100%; height:130%; object-fit:cover; object-position:center; will-change:transform;" />
      </div>
    </section>


  </div>
</main>

<!-- .motion-glowing helper — add to your global CSS instead -->
<style>
  .motion-glowing {
    box-shadow: 0 0 0 3px color-mix(in srgb, var(--color-primary) 40%, transparent);
    transition: box-shadow 0.2s ease;
  }
</style>

<?php get_footer(); ?>
