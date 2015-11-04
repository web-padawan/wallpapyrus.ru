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

}

/**
 * Implements THEME_preprocess_node().
 */
function wallpapyrus_preprocess_node(&$variables) {
  $node = $variables['node'];
  $variables['date'] = format_date($node->created, 'custom', 'd.m.Y');
  $variables['submitted'] = t('!datetime', array('!datetime' => $variables['date']));
}
