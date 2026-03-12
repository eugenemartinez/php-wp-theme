<?php

// Load theme styles and scripts
function theme_scripts() {
  wp_enqueue_style(
    'theme-style',
    get_template_directory_uri() . '/assets/index.css',
    [],
    filemtime(get_template_directory() . '/assets/index.css')
  );
  wp_enqueue_script(
    'theme-script',
    get_template_directory_uri() . '/assets/index.js',
    [],
    filemtime(get_template_directory() . '/assets/index.js'),
    true
  );
}
add_action('wp_enqueue_scripts', 'theme_scripts');

// Register blocks
function theme_register_blocks() {
  $blocks_dir = get_template_directory() . '/blocks';
  foreach (glob($blocks_dir . '/*/block.json') as $block) {
    register_block_type($block);
  }
}
add_action('init', 'theme_register_blocks');

// Post view tracking
function theme_track_views($post_id) {
  $count = (int) get_post_meta($post_id, 'post_views_count', true);
  update_post_meta($post_id, 'post_views_count', $count + 1);
}

// Related posts by shared tags
function theme_get_related_posts($post_id, $count = 3) {
  $tags = wp_get_post_tags($post_id, ['fields' => 'ids']);
  if (empty($tags)) return [];

  return get_posts([
    'posts_per_page' => $count,
    'post__not_in'   => [$post_id],
    'tag__in'        => $tags,
    'orderby'        => 'relevance',
    'no_found_rows'  => true,
  ]);
}

// Restrict search to posts only
function theme_search_filter($query) {
  if ($query->is_search && !is_admin()) {
    $query->set('post_type', 'post');
  }
  return $query;
}
add_filter('pre_get_posts', 'theme_search_filter');
