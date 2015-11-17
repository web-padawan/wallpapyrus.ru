<?php
/**
 * @file
 * wallpapyrus_basic.features.inc
 */

/**
 * Implements hook_views_api().
 */
function wallpapyrus_basic_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function wallpapyrus_basic_node_info() {
  $items = array(
    'wallpaper' => array(
      'name' => t('Wallpaper'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
