<?php get_header(); ?>

<section id="search-results" class="py-24 md:py-32 bg-background">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="mb-16">
      <a
        href="<?php echo home_url('/blog'); ?>"
        class="inline-flex items-center gap-2 text-muted-foreground hover:text-foreground transition-colors mb-8 block"
        data-motion="fade-right"
        data-delay="0.1">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        <span>Back to Blog</span>
      </a>

      <p
        class="text-xs uppercase tracking-wider font-semibold text-muted-foreground mb-3"
        data-motion="fade-up"
        data-delay="0.2">
        Search Results
      </p>

      <h1
        class="text-4xl md:text-5xl lg:text-6xl font-bold text-foreground mb-4 leading-tight"
        data-motion="fade-up"
        data-delay="0.3">
        <?php echo get_search_query() ? '"' . esc_html(get_search_query()) . '"' : 'All Results'; ?>
      </h1>

      <p
        class="text-sm text-muted-foreground mb-8"
        data-motion="fade-up"
        data-delay="0.4">
        <?php
        $count = $wp_query->found_posts;
        echo $count . ' ' . _n('result', 'results', $count) . ' found';
        ?>
      </p>

      <!-- Search form -->
      <div
        class="flex gap-3 max-w-xl"
        data-motion="fade-up"
        data-delay="0.5">
        <form action="<?php echo home_url('/'); ?>" method="get" class="flex gap-3 w-full">
          <input
            type="text"
            name="s"
            value="<?php echo esc_attr(get_search_query()); ?>"
            placeholder="Search articles..."
            class="flex-1 px-4 py-3 bg-input-background border border-border rounded-xl text-foreground placeholder-muted-foreground focus:outline-none focus:border-primary transition-colors"
          />
          <button
            type="submit"
            class="inline-flex items-center gap-2 bg-primary text-primary-foreground px-6 py-3 rounded-xl font-semibold"
            data-motion="hover-lift">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <span>Search</span>
          </button>
        </form>
      </div>

      <div
        class="mt-8 border-t-2 border-foreground"
        data-motion="fade-up"
        data-delay="0.6">
      </div>

    </div>

    <!-- Results -->
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
            data-motion="fade-up hover-dim"
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
          data-motion="fade-up"
          data-scroll="true">
          <div>
            <?php if (get_previous_posts_link()) : ?>
              <a
                href="<?php echo esc_url(get_previous_posts_page_link()); ?>"
                class="inline-flex items-center gap-2 text-muted-foreground hover:text-foreground transition-colors font-medium"
                data-motion="hover-lift">
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
                data-motion="hover-lift">
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
        data-motion="fade-up"
        data-delay="0.3">
        <p class="text-2xl font-bold text-foreground mb-4">No results found.</p>
        <p class="text-muted-foreground mb-8">Try a different search term or browse all articles.</p>
        <a
          href="<?php echo home_url('/blog'); ?>"
          class="inline-flex items-center gap-2 bg-primary text-primary-foreground px-8 py-4 rounded-full font-semibold"
          data-motion="hover-lift">
          Browse All Articles
        </a>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>