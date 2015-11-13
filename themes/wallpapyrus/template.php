<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * wallpapyrus theme.
 */

/**
 * Implements THEME_omega_layout_alter().
 */
function wallpapyrus_omega_layout_alter(&$layout) {
  if (arg(0) == 'node' && is_numeric(arg(1))) {
    $nid = arg(1);
    $node = node_load($nid);
    if (isset($node) && $node->type == 'wallpaper') {
      drupal_add_js(drupal_get_path('theme', 'wallpapyrus') . '/js/wallpapyrus.js');
    }
  }
}

/**
 * Implements THEME_preprocess_node().
 */
function wallpapyrus_preprocess_node(&$variables) {
  $node = $variables['node'];
  $variables['date'] = format_date($node->created, 'custom', 'j.m.Y');
  $variables['submitted'] = t('!datetime', array('!datetime' => $variables['date']));
}

/*
 * Implements THEME_preprocess_search_result().
 */
function wallpapyrus_preprocess_search_result(&$vars) {
  $node = $vars['result']['node'];
  if ($node->nid) {
    $vars['teaser'] = node_view($node, 'teaser');
  }
}

/**
 * Implements THEME_preprocess_comment().
 */
function wallpapyrus_preprocess_comment(&$variables) {
  $comment = $variables['elements']['#comment'];
  $variables['created'] = format_date($comment->created, 'custom', 'j.m.Y H:i');
  $variables['changed'] = format_date($comment->changed, 'custom', 'j.m.Y H:i');

  $variables['submitted'] = t('!username, !datetime ', array('!username' => $variables['author'], '!datetime' => $variables['created']));
}
