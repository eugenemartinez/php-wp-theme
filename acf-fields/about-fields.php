<?php
add_action('add_meta_boxes', function() {
  add_meta_box(
    'about_section',
    'About Section',
    'render_about_meta_box',
    'page',
    'normal',
    'high'
  );
});

function render_about_meta_box($post) {
  wp_nonce_field('about_meta_box', 'about_meta_box_nonce');

  $about_title   = get_post_meta($post->ID, 'about_title', true);
  $about_sub     = get_post_meta($post->ID, 'about_sub', true);
  $about_desc    = get_post_meta($post->ID, 'about_desc', true);
  $about_desc2   = get_post_meta($post->ID, 'about_desc2', true);
  $about_cta     = get_post_meta($post->ID, 'about_cta', true);
  $about_cta_url = get_post_meta($post->ID, 'about_cta_url', true);
  $about_image   = get_post_meta($post->ID, 'about_image', true);
  ?>

  <table class="form-table">
    <tr>
      <th><label for="about_title">About Title</label></th>
      <td><input type="text" id="about_title" name="about_title"
        value="<?php echo esc_attr($about_title); ?>"
        placeholder="About Us"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="about_sub">About Subtitle</label></th>
      <td><input type="text" id="about_sub" name="about_sub"
        value="<?php echo esc_attr($about_sub); ?>"
        placeholder="Who We Are"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="about_desc">About Description</label></th>
      <td><textarea id="about_desc" name="about_desc"
        rows="4" class="large-text"
        placeholder="Tell your story here."><?php echo esc_textarea($about_desc); ?></textarea></td>
    </tr>
    <tr>
      <th><label for="about_desc2">About Description (2nd paragraph)</label></th>
      <td><textarea id="about_desc2" name="about_desc2"
        rows="4" class="large-text"
        placeholder="Elaborate on your mission or values."><?php echo esc_textarea($about_desc2); ?></textarea></td>
    </tr>
    <tr>
      <th><label for="about_cta">CTA Button Text</label></th>
      <td><input type="text" id="about_cta" name="about_cta"
        value="<?php echo esc_attr($about_cta); ?>"
        placeholder="Work With Us"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="about_cta_url">CTA Button URL</label></th>
      <td><input type="url" id="about_cta_url" name="about_cta_url"
        value="<?php echo esc_attr($about_cta_url); ?>"
        placeholder="https://yoursite.com/contact"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="about_image">About Image URL</label></th>
      <td>
        <input type="text" id="about_image" name="about_image"
          value="<?php echo esc_attr($about_image); ?>"
          placeholder="https://yoursite.com/image.jpg"
          class="regular-text" />
        <p class="description">Recommended size: 800x800px.</p>
        <?php if ($about_image) : ?>
          <br />
          <img src="<?php echo esc_url($about_image); ?>"
            style="max-width: 200px; margin-top: 8px; border-radius: 8px;" />
        <?php endif; ?>
      </td>
    </tr>
  </table>

  <?php
}

add_action('save_post', function($post_id) {
  if (
    !isset($_POST['about_meta_box_nonce']) ||
    !wp_verify_nonce($_POST['about_meta_box_nonce'], 'about_meta_box') ||
    defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ||
    !current_user_can('edit_post', $post_id)
  ) return;

  $fields = [
    'about_title'   => 'sanitize_text_field',
    'about_sub'     => 'sanitize_text_field',
    'about_desc'    => 'sanitize_textarea_field',
    'about_desc2'   => 'sanitize_textarea_field',
    'about_cta'     => 'sanitize_text_field',
    'about_cta_url' => 'esc_url_raw',
    'about_image'   => 'esc_url_raw',
  ];

  foreach ($fields as $field => $sanitizer) {
    if (isset($_POST[$field])) {
      update_post_meta($post_id, $field, $sanitizer($_POST[$field]));
    }
  }
});