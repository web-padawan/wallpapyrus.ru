<?php

/**
 * Implements hook_preprocess_page().
 */
function wallpapyrus_preprocess_page(&$variables) {
  if (drupal_is_front_page()) {
    unset($variables['page']['content']['system_main']['default_message']);
    drupal_set_title('Latest wallpapers');
  }

  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
    $term = taxonomy_term_load(arg(2));
    if ($term->vocabulary_machine_name == 'categories') {
      $new_title = 'Wallpapers in category: ' . $term->name;
      drupal_set_title($new_title);
    }
    if ($term->vocabulary_machine_name == 'tags') {
      $new_title = 'Wallpapers with tag: "' . $term->name . '"';
      drupal_set_title($new_title);
    }
  }
}
