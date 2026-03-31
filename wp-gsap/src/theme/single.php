<?php get_header(); ?>

<?php while (have_posts()):
    the_post(); ?>
<?php theme_track_views(get_the_ID()); ?>

<?php
$post_cats = get_the_category();
    $post_tags = get_the_tags() ?: [];
    $read_time = get_post_meta(get_the_ID(), "read_time", true);
    $related = theme_get_related_posts(get_the_ID());
    ?>

<article id="single-article" class="min-h-screen bg-background">

  <!-- Header -->
  <div class="py-16 md:py-24 bg-muted/30">
    <div class="px-4 mx-auto max-w-4xl sm:px-6 lg:px-8">

      <!-- Back link -->
      <a
        href="<?php echo home_url("/blog"); ?>"
        class="block inline-flex gap-2 items-center mb-8 transition-colors text-muted-foreground hover:text-foreground"
        data-motion="fade-right"
        data-delay="0.1">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        <span>Back to Blog</span>
      </a>

      <!-- Meta -->
      <div
        class="flex flex-wrap gap-3 items-center mb-6"
        data-motion="fade-up"
        data-delay="0.2">
        <?php if ($post_cats): ?>
          <span class="text-xs font-semibold tracking-wider uppercase text-primary">
            <?php echo esc_html($post_cats[0]->name); ?>
          </span>
          <span class="text-xs text-muted-foreground">•</span>
        <?php endif; ?>
        <span class="text-xs text-muted-foreground"><?php echo get_the_date(
            "M j, Y",
        ); ?></span>
        <?php if ($read_time): ?>
          <span class="text-xs text-muted-foreground">•</span>
          <span class="text-xs text-muted-foreground"><?php echo esc_html(
              $read_time,
          ); ?></span>
        <?php endif; ?>
      </div>

      <!-- Title -->
      <h1
        class="mb-6 text-4xl font-bold leading-tight md:text-5xl text-foreground"
        data-motion="fade-up"
        data-delay="0.3">
        <?php the_title(); ?>
      </h1>

      <!-- Excerpt -->
      <?php if (has_excerpt()): ?>
        <p
          class="mb-6 text-lg leading-relaxed text-muted-foreground"
          data-motion="fade-up"
          data-delay="0.4">
          <?php the_excerpt(); ?>
        </p>
      <?php endif; ?>

      <!-- Tags -->
      <?php if ($post_tags): ?>
        <div
          class="flex flex-wrap gap-2"
          data-motion="fade-up"
          data-delay="0.5">
          <?php foreach ($post_tags as $tag): ?>
            <span class="py-1 px-3 text-xs rounded-full bg-muted text-muted-foreground">
              <?php echo esc_html($tag->name); ?>
            </span>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>
  </div>

  <!-- Content -->
  <div
    class="py-16"
    data-motion="fade-up"
    data-scroll="true">
    <div class="px-4 mx-auto max-w-4xl sm:px-6 lg:px-8">
      <div class="max-w-none prose prose-lg text-foreground">
        <?php the_content(); ?>
      </div>
    </div>
  </div>

  <!-- Related posts -->
  <?php if ($related): ?>
    <div class="py-16 bg-muted/30">
      <div class="px-4 mx-auto max-w-4xl sm:px-6 lg:px-8">
        <h2
          class="mb-8 text-2xl font-bold text-foreground"
          data-motion="fade-up"
          data-scroll="true">
          Related Articles
        </h2>
        <div
          class="grid grid-cols-1 gap-6 md:grid-cols-3"
          data-motion="stagger-fade-up"
          data-scroll="true"
          data-stagger="0.15">
          <?php foreach ($related as $rel): ?>
            <a
              href="<?php echo get_permalink($rel->ID); ?>"
              class="block p-6 rounded-2xl border transition-colors group bg-card border-border hover:border-primary"
              data-motion="hover-lift">
              <p class="mb-3 text-xs font-semibold tracking-wider uppercase text-primary">
                <?php
                $rel_cats = get_the_category($rel->ID);
              echo $rel_cats ? esc_html($rel_cats[0]->name) : "";
              ?>
              </p>
              <h3 class="font-bold leading-snug transition-colors text-foreground group-hover:text-primary">
                <?php echo esc_html($rel->post_title); ?>
              </h3>
              <p class="mt-3 text-xs text-muted-foreground">
                <?php echo get_the_date("M j, Y", $rel->ID); ?>
              </p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Share + Back -->
  <div
    class="py-12 border-t border-border"
    data-motion="fade-up"
    data-scroll="true">
    <div class="flex justify-between items-center px-4 mx-auto max-w-4xl sm:px-6 lg:px-8">
      <a
        href="<?php echo home_url("/blog"); ?>"
        class="inline-flex gap-2 items-center transition-colors text-muted-foreground hover:text-foreground"
        data-motion="hover-dim">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        <span>Back to Blog</span>
      </a>
      <button
        id="sa-share"
        class="inline-flex gap-2 items-center transition-colors text-muted-foreground hover:text-foreground"
        data-motion="hover-dim">
        <i data-lucide="share-2" class="w-4 h-4"></i>
        <span id="sa-share-text">Share</span>
      </button>
    </div>
  </div>

</article>

<?php
endwhile; ?>
<?php get_footer(); ?>

