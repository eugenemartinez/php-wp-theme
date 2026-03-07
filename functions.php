<?php

// Load theme styles and scripts
function theme_scripts() {
  wp_enqueue_style('theme-style', get_template_directory_uri() . '/build/index.css', [], filemtime(get_template_directory() . '/build/index.css'));
  wp_enqueue_script('theme-script', get_template_directory_uri() . '/build/index.js', [], filemtime(get_template_directory() . '/build/index.js'), true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');

// Load ACF field groups
foreach (glob(get_template_directory() . '/acf-fields/*.php') as $file) {
  require_once $file;
}

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

// // ACF field groups in admin notice (for debugging)
// add_action('admin_notices', function() {
//   $files = glob(get_template_directory() . '/acf-fields/*.php');
//   echo '<div class="notice"><p>ACF files found: ' . count($files) . '</p></div>';
// });


add_action('add_meta_boxes', function() {
  global $post;
  error_log('add_meta_boxes fired on: ' . get_post_type());
});