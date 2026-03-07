<?php
add_action('add_meta_boxes', function() {
  add_meta_box(
    'contact_section',
    'Contact Section',
    'render_contact_meta_box',
    'page',
    'normal',
    'high'
  );
});

function render_contact_meta_box($post) {
  wp_nonce_field('contact_meta_box', 'contact_meta_box_nonce');

  $ct_title    = get_post_meta($post->ID, 'ct_title', true);
  $ct_sub      = get_post_meta($post->ID, 'ct_sub', true);
  $ct_desc     = get_post_meta($post->ID, 'ct_desc', true);
  $ct_email    = get_post_meta($post->ID, 'ct_email', true);
  $ct_location = get_post_meta($post->ID, 'ct_location', true);
  ?>

  <table class="form-table">
    <tr>
      <th><label for="ct_title">Contact Title</label></th>
      <td><input type="text" id="ct_title" name="ct_title"
        value="<?php echo esc_attr($ct_title); ?>"
        placeholder="Get in Touch"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="ct_sub">Contact Subtitle</label></th>
      <td><input type="text" id="ct_sub" name="ct_sub"
        value="<?php echo esc_attr($ct_sub); ?>"
        placeholder="Contact Us"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="ct_desc">Contact Description</label></th>
      <td><textarea id="ct_desc" name="ct_desc"
        rows="3" class="large-text"
        placeholder="Have a project in mind? We would love to hear from you."><?php echo esc_textarea($ct_desc); ?></textarea></td>
    </tr>
    <tr>
      <th><label for="ct_email">Contact Email</label></th>
      <td><input type="email" id="ct_email" name="ct_email"
        value="<?php echo esc_attr($ct_email); ?>"
        placeholder="hello@yourbrand.com"
        class="regular-text" /></td>
    </tr>
    <tr>
      <th><label for="ct_location">Location</label></th>
      <td><input type="text" id="ct_location" name="ct_location"
        value="<?php echo esc_attr($ct_location); ?>"
        placeholder="Your City, Country"
        class="regular-text" /></td>
    </tr>
  </table>

  <?php
}

add_action('save_post', function($post_id) {
  if (
    !isset($_POST['contact_meta_box_nonce']) ||
    !wp_verify_nonce($_POST['contact_meta_box_nonce'], 'contact_meta_box') ||
    defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ||
    !current_user_can('edit_post', $post_id)
  ) return;

  $fields = [
    'ct_title'    => 'sanitize_text_field',
    'ct_sub'      => 'sanitize_text_field',
    'ct_desc'     => 'sanitize_textarea_field',
    'ct_email'    => 'sanitize_email',
    'ct_location' => 'sanitize_text_field',
  ];

  foreach ($fields as $field => $sanitizer) {
    if (isset($_POST[$field])) {
      update_post_meta($post_id, $field, $sanitizer($_POST[$field]));
    }
  }
});