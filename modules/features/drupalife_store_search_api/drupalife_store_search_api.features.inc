<?php
/**
 * @file
 * drupalife_store_search_api.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function drupalife_store_search_api_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "facetapi" && $api == "facetapi_defaults") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function drupalife_store_search_api_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}
