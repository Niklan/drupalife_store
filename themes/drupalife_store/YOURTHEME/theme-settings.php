<?php
/**
 * Implements hook_form_system_theme_settings_alter() function.
 *
 * Replace TOURTHEME by yours.
 * If you wants to remove some elements from theme settings, use unset() function.
 */

// We add theme-settings from base theme, cuz it's have function to save files.
$form_state['build_info']['files'][] = 'profiles/drupalife_store/themes/drupalife_store/theme-settings.php';

function YOURTHEME_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL) {
  // Bug workaround (#943212).
  if (isset($form_id)) {
    return;
  }
}
