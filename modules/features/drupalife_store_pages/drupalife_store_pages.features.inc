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
  $items = array(
    'page' => array(
      'name' => t('Страница'),
      'base' => 'node_content',
      'description' => t('Добавление обычной страницы на сайт.'),
      'has_title' => '1',
      'title_label' => t('Заголовок страницы'),
      'help' => '',
    ),
  );
  return $items;
}
