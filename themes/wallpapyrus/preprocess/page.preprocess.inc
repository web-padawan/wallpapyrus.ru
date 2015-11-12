<?php

/**
 * Implements hook_preprocess_page().
 */
function wallpapyrus_preprocess_page(&$variables) {
  if (drupal_is_front_page()) {
    unset($variables['page']['content']['system_main']['default_message']);
    drupal_set_title('Новое на сайте');
  }

  if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {
    $term = taxonomy_term_load(arg(2));
    if ($term->vocabulary_machine_name == 'categories') {
      $new_title = 'Обои в категории: ' . $term->name;
      drupal_set_title($new_title);
    }
    if ($term->vocabulary_machine_name == 'tags') {
      $new_title = 'Обои с тегом "' . $term->name . '"';
      drupal_set_title($new_title);
    }
    if ($term->vocabulary_machine_name == 'colors') {
      $new_title = 'Обои с цветом ' . $term->name;
      drupal_set_title($new_title);
    }
  }
}
