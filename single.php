<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
<?php theme_track_views(get_the_ID()); ?>

<?php
$post_cats  = get_the_category();
$post_tags  = get_the_tags() ?: [];
$read_time  = get_post_meta(get_the_ID(), 'read_time', true);
$related    = theme_get_related_posts(get_the_ID());
?>

<article id="single-article" class="min-h-screen bg-background">

  <!-- Header -->
  <div class="bg-muted/30 py-16 md:py-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

      <!-- Back link -->
      <a id="single-back" href="<?php echo home_url('/blog'); ?>"
        class="inline-flex items-center gap-2 text-muted-foreground hover:text-foreground transition-colors mb-8 block">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        <span>Back to Blog</span>
      </a>

      <!-- Meta -->
      <div class="flex flex-wrap items-center gap-3 mb-6">
        <?php if ($post_cats) : ?>
          <span class="text-xs uppercase tracking-wider font-semibold text-primary">
            <?php echo esc_html($post_cats[0]->name); ?>
          </span>
          <span class="text-muted-foreground text-xs">•</span>
        <?php endif; ?>
        <span class="text-muted-foreground text-xs"><?php echo get_the_date('M j, Y'); ?></span>
        <?php if ($read_time) : ?>
          <span class="text-muted-foreground text-xs">•</span>
          <span class="text-muted-foreground text-xs"><?php echo esc_html($read_time); ?></span>
        <?php endif; ?>
      </div>

      <!-- Title -->
      <h1 class="text-4xl md:text-5xl font-bold text-foreground mb-6 leading-tight">
        <?php the_title(); ?>
      </h1>

      <!-- Excerpt -->
      <?php if (has_excerpt()) : ?>
        <p class="text-lg text-muted-foreground leading-relaxed mb-6">
          <?php the_excerpt(); ?>
        </p>
      <?php endif; ?>

      <!-- Tags -->
      <?php if ($post_tags) : ?>
        <div class="flex flex-wrap gap-2">
          <?php foreach ($post_tags as $tag) : ?>
            <span class="text-xs px-3 py-1 bg-muted text-muted-foreground rounded-full">
              <?php echo esc_html($tag->name); ?>
            </span>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>
  </div>

  <!-- Content -->
  <div class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div id="sa-content" class="prose prose-lg max-w-none text-foreground">
        <?php the_content(); ?>
      </div>
    </div>
  </div>

  <!-- Related posts -->
  <?php if ($related) : ?>
    <div class="py-16 bg-muted/30">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-foreground mb-8">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <?php foreach ($related as $rel) : ?>
            <a href="<?php echo get_permalink($rel->ID); ?>"
              class="related-card group block bg-card rounded-2xl p-6 border border-border hover:border-primary transition-colors">
              <p class="text-xs uppercase tracking-wider font-semibold text-primary mb-3">
                <?php
                $rel_cats = get_the_category($rel->ID);
                echo $rel_cats ? esc_html($rel_cats[0]->name) : '';
                ?>
              </p>
              <h3 class="font-bold text-foreground group-hover:text-primary transition-colors leading-snug">
                <?php echo esc_html($rel->post_title); ?>
              </h3>
              <p class="text-xs text-muted-foreground mt-3">
                <?php echo get_the_date('M j, Y', $rel->ID); ?>
              </p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Share + Back -->
  <div class="py-12 border-t border-border">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
      <a href="<?php echo home_url('/blog'); ?>"
        class="inline-flex items-center gap-2 text-muted-foreground hover:text-foreground transition-colors">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        <span>Back to Blog</span>
      </a>
      <button id="sa-share"
        class="inline-flex items-center gap-2 text-muted-foreground hover:text-foreground transition-colors">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
        <span id="sa-share-text">Share</span>
      </button>
    </div>
  </div>

</article>

<?php endwhile; ?>
<?php get_footer(); ?>