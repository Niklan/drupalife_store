<?php
/**
 * @file
 * drupalife_store_contact.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function drupalife_store_contact_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: main-menu_:eform/submit/contact
  $menu_links['main-menu_:eform/submit/contact'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'eform/submit/contact',
    'router_path' => 'eform/submit/%',
    'link_title' => 'Контакты',
    'options' => array(
      'identifier' => 'main-menu_:eform/submit/contact',
    ),
    'module' => 'entityform',
    'hidden' => 0,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 50,
    'customized' => 0,
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('Контакты');


  return $menu_links;
}
