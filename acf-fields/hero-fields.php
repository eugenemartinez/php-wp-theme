<?php
add_action('add_meta_boxes', function() {
  add_meta_box(
    'hero_section',
    'Hero Section',
    'render_hero_meta_box',
    'page',
    'normal',
    'high'
  );
});

function render_hero_meta_box($post) {
  wp_nonce_field('hero_meta_box', 'hero_meta_box_nonce');

  $hero_title   = get_post_meta($post->ID, 'hero_title', true);
  $hero_sub     = get_post_meta($post->ID, 'hero_sub', true);
  $hero_desc    = get_post_meta($post->ID, 'hero_desc', true);
  $hero_cta     = get_post_meta($post->ID, 'hero_cta', true);
  $hero_cta_url = get_post_meta($post->ID, 'hero_cta_url', true);
  ?>

  <table class="form-table">
    <tr>
      <th><label for="hero_title">Hero Title</label></th>
      <td><input type="text" id="hero_title" name="hero_title"
        value="<?php echo esc_attr($hero_title); ?>"
        placeholder="Your Brand Name"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="hero_sub">Hero Subtitle</label></th>
      <td><input type="text" id="hero_sub" name="hero_sub"
        value="<?php echo esc_attr($hero_sub); ?>"
        placeholder="Welcome to Your Brand"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="hero_desc">Hero Description</label></th>
      <td><textarea id="hero_desc" name="hero_desc"
        rows="3" class="large-text"
        placeholder="Brief description of what you do."><?php echo esc_textarea($hero_desc); ?></textarea></td>
    </tr>
    <tr>
      <th><label for="hero_cta">CTA Button Text</label></th>
      <td><input type="text" id="hero_cta" name="hero_cta"
        value="<?php echo esc_attr($hero_cta); ?>"
        placeholder="Get in Touch"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="hero_cta_url">CTA Button URL</label></th>
      <td><input type="url" id="hero_cta_url" name="hero_cta_url"
        value="<?php echo esc_attr($hero_cta_url); ?>"
        placeholder="https://yoursite.com/contact"
        class="regular-text" /></td>
    </tr>
  </table>

  <?php
}

add_action('save_post', function($post_id) {
  if (
    !isset($_POST['hero_meta_box_nonce']) ||
    !wp_verify_nonce($_POST['hero_meta_box_nonce'], 'hero_meta_box') ||
    defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ||
    !current_user_can('edit_post', $post_id)
  ) return;

  $fields = [
    'hero_title'   => 'sanitize_text_field',
    'hero_sub'     => 'sanitize_text_field',
    'hero_desc'    => 'sanitize_textarea_field',
    'hero_cta'     => 'sanitize_text_field',
    'hero_cta_url' => 'esc_url_raw',
  ];

  foreach ($fields as $field => $sanitizer) {
    if (isset($_POST[$field])) {
      update_post_meta($post_id, $field, $sanitizer($_POST[$field]));
    }
  }
});
