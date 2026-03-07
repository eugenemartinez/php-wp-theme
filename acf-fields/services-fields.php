<?php
add_action('add_meta_boxes', function() {
  add_meta_box(
    'services_section',
    'Services Section',
    'render_services_meta_box',
    'page',
    'normal',
    'high'
  );
});

function render_services_meta_box($post) {
  wp_nonce_field('services_meta_box', 'services_meta_box_nonce');

  $sv_title = get_post_meta($post->ID, 'sv_title', true);
  $sv_sub   = get_post_meta($post->ID, 'sv_sub', true);
  $sv_desc  = get_post_meta($post->ID, 'sv_desc', true);
  ?>

  <table class="form-table">
    <tr>
      <th><label for="sv_title">Services Title</label></th>
      <td><input type="text" id="sv_title" name="sv_title"
        value="<?php echo esc_attr($sv_title); ?>"
        placeholder="Our Services"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="sv_sub">Services Subtitle</label></th>
      <td><input type="text" id="sv_sub" name="sv_sub"
        value="<?php echo esc_attr($sv_sub); ?>"
        placeholder="What We Offer"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="sv_desc">Services Description</label></th>
      <td><textarea id="sv_desc" name="sv_desc"
        rows="3" class="large-text"
        placeholder="Brief description of the services we offer."><?php echo esc_textarea($sv_desc); ?></textarea></td>
    </tr>
  </table>

  <?php
}

add_action('save_post', function($post_id) {
  if (
    !isset($_POST['services_meta_box_nonce']) ||
    !wp_verify_nonce($_POST['services_meta_box_nonce'], 'services_meta_box') ||
    defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ||
    !current_user_can('edit_post', $post_id)
  ) return;

  $fields = [
    'sv_title' => 'sanitize_text_field',
    'sv_sub'   => 'sanitize_text_field',
    'sv_desc'  => 'sanitize_textarea_field',
  ];

  foreach ($fields as $field => $sanitizer) {
    if (isset($_POST[$field])) {
      update_post_meta($post_id, $field, $sanitizer($_POST[$field]));
    }
  }
});