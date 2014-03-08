<?php
/**
 * @file
 * drupalife_store_pages.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function drupalife_store_pages_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "ds" && $api == "ds") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_node_info().
 */
function drupalife_store_pages_node_info() {
  $t = get_t();
  $items = array(
    'page' => array(
      'name' => $t('Page'),
      'base' => 'node_content',
      'description' => $t('Adding a page to the site.'),
      'has_title' => '1',
      'title_label' => $t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
