<?php get_header(); ?>

<main class="min-h-screen bg-background">
  <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>