<?php get_header(); ?>

<section id="search-results" class="py-24 md:py-32 bg-background">
  <div class="px-4 mx-auto max-w-4xl sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="mb-16">
      <a
        href="<?php echo home_url("/blog"); ?>"
        class="block inline-flex gap-2 items-center mb-8 transition-colors text-muted-foreground hover:text-foreground"
        data-motion="fade-right"
        data-delay="0.1">
        <i data-lucide="arrow-left" class="w-4 h-4"></i>
        <span>Back to Blog</span>
      </a>

      <p
        class="mb-3 text-xs font-semibold tracking-wider uppercase text-muted-foreground"
        data-motion="fade-up"
        data-delay="0.2">
        Search Results
      </p>

      <h1
        class="mb-4 text-4xl font-bold leading-tight md:text-5xl lg:text-6xl text-foreground"
        data-motion="fade-up"
        data-delay="0.3">
        <?php echo get_search_query()
            ? '"' . esc_html(get_search_query()) . '"'
            : "All Results"; ?>
      </h1>

      <p
        class="mb-8 text-sm text-muted-foreground"
        data-motion="fade-up"
        data-delay="0.4">
        <?php
        $count = $wp_query->found_posts;
echo $count . " " . _n("result", "results", $count) . " found";
?>
      </p>

      <!-- Search form -->
      <div
        class="flex gap-3 max-w-xl"
        data-motion="fade-up"
        data-delay="0.5">
        <form action="<?php echo home_url(
            "/",
        ); ?>" method="get" class="flex gap-3 w-full">
          <input
            type="text"
            name="s"
            value="<?php echo esc_attr(get_search_query()); ?>"
            placeholder="Search articles..."
            class="flex-1 py-3 px-4 rounded-xl border transition-colors focus:outline-none bg-input-background border-border text-foreground placeholder-muted-foreground focus:border-primary"
          />
          <button
            type="submit"
            class="inline-flex gap-2 items-center py-3 px-6 font-semibold rounded-xl bg-primary text-primary-foreground"
            data-motion="hover-lift">
            <i data-lucide="search" class="w-4 h-4"></i>
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
    <?php if (have_posts()): ?>
      <div class="space-y-12">
        <?php while (have_posts()):

            the_post();
            $cats = get_the_category();
            $tags = get_the_tags() ?: [];
            $read_time = get_post_meta(get_the_ID(), "read_time", true);
            $views = get_post_meta(get_the_ID(), "post_views_count", true);
            ?>
          <article
            class="pb-12 border-b cursor-pointer last:border-b-0 group border-border"
            data-motion="fade-up hover-dim"
            data-scroll="true">
            <a href="<?php the_permalink(); ?>" class="block">

              <div class="mb-6 w-16 h-1 bg-foreground"></div>

              <div class="flex gap-3 items-center mb-4">
                <?php if ($cats): ?>
                  <span class="text-xs font-medium tracking-wider uppercase text-muted-foreground">
                    <?php echo esc_html($cats[0]->name); ?>
                  </span>
                  <span class="text-xs text-muted-foreground">•</span>
                <?php endif; ?>
                <span class="text-xs text-muted-foreground"><?php echo get_the_date(
                    "M j, Y",
                ); ?></span>
                <?php if ($views): ?>
                  <span class="text-xs text-muted-foreground">•</span>
                  <span class="text-xs text-muted-foreground"><?php echo esc_html(
                      $views,
                  ); ?> reads</span>
                <?php endif; ?>
              </div>

              <h2 class="mb-4 text-2xl font-bold leading-tight md:text-3xl text-foreground">
                <?php the_title(); ?>
              </h2>

              <p class="mb-6 text-lg leading-relaxed text-muted-foreground">
                <?php the_excerpt(); ?>
              </p>

              <?php if ($tags): ?>
                <div class="flex flex-wrap gap-2 mb-4">
                  <?php foreach ($tags as $tag): ?>
                    <span class="py-1 px-3 text-xs rounded-full bg-muted text-muted-foreground">
                      <?php echo esc_html($tag->name); ?>
                    </span>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

              <?php if ($read_time): ?>
                <div class="flex gap-2 items-center text-sm text-muted-foreground">
                <i data-lucide="clock" class="w-4 h-4"></i>
                  <span><?php echo esc_html($read_time); ?></span>
                </div>
              <?php endif; ?>

            </a>
          </article>
        <?php
        endwhile; ?>
      </div>

      <!-- Pagination -->
      <?php if (get_next_posts_link() || get_previous_posts_link()): ?>
        <div
          class="flex justify-between items-center pt-8 mt-16 border-t border-border"
          data-motion="fade-up"
          data-scroll="true">
          <div>
            <?php if (get_previous_posts_link()): ?>
              <a
                href="<?php echo esc_url(get_previous_posts_page_link()); ?>"
                class="inline-flex gap-2 items-center font-medium transition-colors text-muted-foreground hover:text-foreground"
                data-motion="hover-lift">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                <span>Newer</span>
              </a>
            <?php endif; ?>
          </div>
          <div>
            <?php if (get_next_posts_link()): ?>
              <a
                href="<?php echo esc_url(get_next_posts_page_link()); ?>"
                class="inline-flex gap-2 items-center font-medium transition-colors text-muted-foreground hover:text-foreground"
                data-motion="hover-lift">
                <span>Older</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
              </a>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>

    <?php else: ?>
      <div
        class="py-20 text-center"
        data-motion="fade-up"
        data-delay="0.3">
        <p class="mb-4 text-2xl font-bold text-foreground">No results found.</p>
        <p class="mb-8 text-muted-foreground">Try a different search term or browse all articles.</p>
        <a
          href="<?php echo home_url("/blog"); ?>"
          class="inline-flex gap-2 items-center py-4 px-8 font-semibold rounded-full bg-primary text-primary-foreground"
          data-motion="hover-lift">
          Browse All Articles
        </a>
      </div>
    <?php endif; ?>

  </div>
</section>

<?php get_footer(); ?>

