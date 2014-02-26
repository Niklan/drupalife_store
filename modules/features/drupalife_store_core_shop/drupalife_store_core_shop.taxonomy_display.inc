<?php
/**
 * @file
 * drupalife_store_core_shop.taxonomy_display.inc
 */

/**
 * Implements hook_taxonomy_display_default_displays().
 */
function drupalife_store_core_shop_taxonomy_display_default_displays() {
  $export = array();

  $taxonomy_display = new stdClass();
  $taxonomy_display->api_version = 1;
  $taxonomy_display->machine_name = 'shop_category';
  $taxonomy_display->term_display_plugin = 'TaxonomyDisplayTermDisplayHandlerCore';
  $taxonomy_display->term_display_options = '';
  $taxonomy_display->associated_display_plugin = 'TaxonomyDisplayAssociatedDisplayHandlerViews';
  $taxonomy_display->associated_display_options = array(
    'view' => 'shop',
    'display' => 'page',
  );
  $taxonomy_display->add_feed = TRUE;
  $taxonomy_display->breadcrumb_display_plugin = 'TaxonomyDisplayBreadcrumbDisplayHandlerCore';
  $taxonomy_display->breadcrumb_display_options = '';
  $export['shop_category'] = $taxonomy_display;

  return $export;
}
