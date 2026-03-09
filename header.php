<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Prevent dark mode flash -->
  <script>
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark');
    }
  </script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="min-h-screen bg-background text-foreground">

<?php get_template_part('template-parts/navigation'); ?>