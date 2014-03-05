<?php
/**
 * @file
 * drupalife_store_core_shop.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function drupalife_store_core_shop_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: main-menu_:<front>
  $menu_links['main-menu_:<front>'] = array(
    'menu_name' => 'main-menu',
    'link_path' => '<front>',
    'router_path' => '',
    'link_title' => 'Главная',
    'options' => array(
      'attributes' => array(
        'title' => '',
      ),
      'identifier' => 'main-menu_:<front>',
    ),
    'module' => 'menu',
    'hidden' => 0,
    'external' => 1,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 0,
    'customized' => 1,
  );
  // Exported menu link: main-menu_:catalog
  $menu_links['main-menu_:catalog'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'catalog',
    'router_path' => 'catalog',
    'link_title' => 'Каталог',
    'options' => array(
      'identifier' => 'main-menu_:catalog',
    ),
    'module' => 'system',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 1,
    'customized' => 0,
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Главная');
  t('Каталог');


  return $menu_links;
}
