<?php
/**
 * @file
 * drupalife_store_search_api.facetapi_defaults.inc
 */

/**
 * Implements hook_facetapi_default_facet_settings().
 */
function drupalife_store_search_api_facetapi_default_facet_settings() {
  $t = get_t();
  $export = array();

  $facet = new stdClass();
  $facet->disabled = FALSE; /* Edit this to true to make a default facet disabled initially */
  $facet->api_version = 1;
  $facet->name = 'search_api@product_display::field_product_display_products:commerce_price:amount_decimal';
  $facet->searcher = 'search_api@product_display';
  $facet->realm = '';
  $facet->facet = 'field_product_display_products:commerce_price:amount_decimal';
  $facet->enabled = FALSE;
  $facet->settings = array(
    'operator' => 'and',
    'hard_limit' => '50',
    'dependencies' => array(
      'bundle' => 'none',
      'bundle_selected' => array(),
    ),
    'facet_mincount' => '1',
    'facet_missing' => '0',
    'flatten' => 0,
    'query_type' => 'term',
    'default_true' => TRUE,
    'facet_search_ids' => array(),
    'exclude' => 0,
  );
  $export['search_api@product_display::field_product_display_products:commerce_price:amount_decimal'] = $facet;

  $facet = new stdClass();
  $facet->disabled = FALSE; /* Edit this to true to make a default facet disabled initially */
  $facet->api_version = 1;
  $facet->name = 'search_api@product_display:block:field_product_display_products:commerce_price:amount_decimal';
  $facet->searcher = 'search_api@product_display';
  $facet->realm = 'block';
  $facet->facet = 'field_product_display_products:commerce_price:amount_decimal';
  $facet->enabled = TRUE;
  $facet->settings = array(
    'weight' => 0,
    'widget' => 'search_api_ranges_ui_slider',
    'filters' => array(
      'active_items' => array(
        'status' => 1,
        'weight' => -1,
      ),
    ),
    'active_sorts' => array(
      'active' => 'active',
      'count' => 'count',
      'display' => 'display',
      'indexed' => 0,
    ),
    'sort_weight' => array(
      'active' => '-50',
      'count' => '-49',
      'display' => '-48',
      'indexed' => '0',
    ),
    'sort_order' => array(
      'active' => '3',
      'count' => '3',
      'display' => '4',
      'indexed' => '4',
    ),
    'empty_behavior' => 'none',
    'soft_limit' => '20',
    'nofollow' => 1,
    'show_expanded' => 0,
    'name' => $t('Price'),
    'prefix' => '',
    'suffix' => ' руб.',
    'auto-submit-delay' => '1500',
    'range_simple' => 10,
    'range_advanced' => '',
    'display_count' => 0,
    'empty_text' => array(
      'value' => '',
      'format' => 'full_html',
    ),
    'submit_realm' => 'Save and go back to realm settings',
  );
  $export['search_api@product_display:block:field_product_display_products:commerce_price:amount_decimal'] = $facet;

  return $export;
}
