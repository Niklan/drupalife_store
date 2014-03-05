<?php
/**
 * @file
 * drupalife_store_news.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function drupalife_store_news_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: main-menu_:news
  $menu_links['main-menu_:news'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'news',
    'router_path' => 'news',
    'link_title' => 'Новости',
    'options' => array(
      'identifier' => 'main-menu_:news',
    ),
    'module' => 'system',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 2,
    'customized' => 0,
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Новости');


  return $menu_links;
}
