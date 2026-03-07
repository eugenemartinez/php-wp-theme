<?php get_header(); ?>

<main class="min-h-screen bg-background py-24">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <?php while (have_posts()) : the_post(); ?>
      <h1 class="text-4xl font-bold text-foreground mb-6"><?php the_title(); ?></h1>
      <div class="prose prose-lg max-w-none text-foreground">
        <?php the_content(); ?>
      </div>
    <?php endwhile; ?>
  </div>
</main>

<?php get_footer(); ?>