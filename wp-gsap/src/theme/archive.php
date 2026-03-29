<?php get_header(); ?>

<section id="archive" class="py-24 md:py-32 bg-background">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="mb-16">

      <a
        href="<?php echo home_url('/blog'); ?>"
        class="inline-flex items-center gap-2 text-muted-foreground hover:text-foreground transition-colors mb-8 block"
        data-gsap="fade-right"
        data-delay="0.1">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        <span>Back to Blog</span>
      </a>

      <p
        class="text-xs uppercase tracking-wider font-semibold text-muted-foreground mb-3"
        data-gsap="fade-up"
        data-delay="0.2">
        <?php echo is_category() ? 'Category' : 'Topic'; ?>
      </p>

      <h1
        class="text-4xl md:text-5xl lg:text-6xl font-bold text-foreground mb-4 leading-tight"
        data-gsap="fade-up"
        data-delay="0.3">
        <?php single_term_title(); ?>
      </h1>

      <?php if (term_description()) : ?>
        <p
          class="text-lg text-muted-foreground mb-6 max-w-2xl leading-relaxed"
          data-gsap="fade-up"
          data-delay="0.4">
          <?php echo wp_kses_post(term_description()); ?>
        </p>
      <?php endif; ?>

      <p
        class="text-sm text-muted-foreground"
        data-gsap="fade-up"
        data-delay="0.5">
        <?php
        $count = $wp_query->found_posts;
        echo $count . ' ' . _n('article', 'articles', $count);
        ?>
      </p>

      <div
        class="mt-8 border-t-2 border-foreground"
        data-gsap="fade-up"
        data-delay="0.6">
      </div>

    </div>

    <!-- Articles -->
    <?php if (have_posts()) : ?>
      <div class="space-y-12">
        <?php while (have_posts()) : the_post();
          $cats      = get_the_category();
          $tags      = get_the_tags() ?: [];
          $read_time = get_post_meta(get_the_ID(), 'read_time', true);
          $views     = get_post_meta(get_the_ID(), 'post_views_count', true);
        ?>
          <article
            class="group cursor-pointer border-b border-border pb-12 last:border-b-0"
            data-gsap="fade-up hover-dim"
            data-scroll="true">
            <a href="<?php the_permalink(); ?>" class="block">

              <div class="h-1 w-16 bg-foreground mb-6"></div>

              <div class="flex items-center gap-3 mb-4">
                <?php if ($cats) : ?>
                  <span class="text-xs uppercase tracking-wider font-medium text-muted-foreground">
                    <?php echo esc_html($cats[0]->name); ?>
                  </span>
                  <span class="text-xs text-muted-foreground">•</span>
                <?php endif; ?>
                <span class="text-xs text-muted-foreground"><?php echo get_the_date('M j, Y'); ?></span>
                <?php if ($views) : ?>
                  <span class="text-xs text-muted-foreground">•</span>
                  <span class="text-xs text-muted-foreground"><?php echo esc_html($views); ?> reads</span>
                <?php endif; ?>
              </div>

              <h2 class="text-2xl md:text-3xl font-bold text-foreground mb-4 leading-tight">
                <?php the_title(); ?>
              </h2>

              <p class="text-muted-foreground leading-relaxed mb-6 text-lg">
                <?php the_excerpt(); ?>
              </p>

              <?php if ($tags) : ?>
                <div class="flex flex-wrap gap-2 mb-4">
                  <?php foreach ($tags as $tag) : ?>
                    <span class="text-xs px-3 py-1 bg-muted text-muted-foreground rounded-full">
                      <?php echo esc_html($tag->name); ?>
                    </span>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

              <?php if ($read_time) : ?>
                <div class="flex items-center gap-2 text-sm text-muted-foreground">
                  <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                  <span><?php echo esc_html($read_time); ?></span>
                </div>
              <?php endif; ?>

            </a>
          </article>
        <?php endwhile; ?>
      </div>

      <!-- Pagination -->
      <?php if (get_next_posts_link() || get_previous_posts_link()) : ?>
        <div
          class="mt-16 pt-8 border-t border-border flex items-center justify-between"
          data-gsap="fade-up"
          data-scroll="true">
          <div>
            <?php if (get_previous_posts_link()) : ?>
              
                href="<?php echo esc_url(get_previous_posts_page_link()); ?>"
                class="inline-flex items-center gap-2 text-muted-foreground hover:text-foreground transition-colors font-medium"
                data-gsap="hover-lift">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                <span>Newer</span>
              </a>
            <?php endif; ?>
          </div>
          <div>
            <?php if (get_next_posts_link()) : ?>
              <a
                href="<?php echo esc_url(get_next_posts_page_link()); ?>"
                class="inline-flex items-center gap-2 text-muted-foreground hover:text-foreground transition-colors font-medium"
                data-gsap="hover-lift">
                <span>Older</span>
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
              </a>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>

    <?php else : ?>
      <div
        class="text-center py-20"
        data-gsap="fade-up"
        data-delay="0.3">
        <p class="text-2xl font-bold text-foreground mb-4">No articles found.</p>
        <p class="text-muted-foreground mb-8">There are no articles in this category yet.</p>
        <a
          href="<?php echo home_url('/blog'); ?>"
          class="inline-flex items-center gap-2 bg-primary text-primary-foreground px-8 py-4 rounded-full font-semibold"
          data-gsap="hover-lift">
          Back to Blog
        </a>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>