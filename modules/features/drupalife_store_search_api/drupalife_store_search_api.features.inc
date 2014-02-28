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

/**
 * Implements hook_default_search_api_server().
 */
function drupalife_store_search_api_default_search_api_server() {
  $items = array();
  $items['frontend'] = entity_import('search_api_server', '{
    "name" : "Db server",
    "machine_name" : "frontend",
    "description" : "",
    "class" : "search_api_db_service",
    "options" : {
      "database" : "default:default",
      "min_chars" : 3,
      "indexes" : { "product_display" : {
          "nid" : {
            "table" : "search_api_db_product_display",
            "column" : "nid",
            "type" : "integer",
            "boost" : "1.0"
          },
          "type" : {
            "table" : "search_api_db_product_display",
            "column" : "type",
            "type" : "string",
            "boost" : "1.0"
          },
          "title" : {
            "table" : "search_api_db_product_display",
            "column" : "title",
            "type" : "string",
            "boost" : "1.0"
          },
          "status" : {
            "table" : "search_api_db_product_display",
            "column" : "status",
            "type" : "integer",
            "boost" : "1.0"
          },
          "created" : {
            "table" : "search_api_db_product_display",
            "column" : "created",
            "type" : "date",
            "boost" : "1.0"
          },
          "changed" : {
            "table" : "search_api_db_product_display",
            "column" : "changed",
            "type" : "date",
            "boost" : "1.0"
          },
          "field_product_display_products" : {
            "table" : "search_api_db_product_display_field_product_display_products",
            "column" : "value",
            "type" : "list\\u003Cinteger\\u003E",
            "boost" : "1.0"
          },
          "field_product_display_category" : {
            "table" : "search_api_db_product_display_field_product_display_category",
            "column" : "field_product_display_category",
            "type" : "list\\u003Cinteger\\u003E",
            "boost" : "1.0"
          },
          "search_api_language" : {
            "table" : "search_api_db_product_display",
            "column" : "search_api_language",
            "type" : "string",
            "boost" : "1.0"
          },
          "search_api_aggregation_1" : {
            "table" : "search_api_db_product_display_search_api_aggregation_1",
            "type" : "text",
            "boost" : "1.0"
          },
          "field_product_display_category:name" : {
            "table" : "search_api_db_product_display_field_product_display_category_n",
            "column" : "field_product_display_category_name",
            "type" : "list\\u003Cstring\\u003E",
            "boost" : "1.0"
          },
          "field_product_display_products:commerce_price:amount_decimal" : {
            "table" : "search_api_db_product_display_field_product_display_products_c",
            "column" : "value",
            "type" : "list\\u003Cdecimal\\u003E",
            "boost" : "1.0"
          },
          "search_api_aggregation_2" : {
            "table" : "search_api_db_product_display_search_api_aggregation_2",
            "type" : "text",
            "boost" : "1.0"
          },
          "field_product_display_products_commerce_price_amount_decimal_asc" : {
            "table" : "search_api_db_product_display",
            "column" : "field_product_display_products_commerce_price_amount_decimal_a",
            "type" : "decimal",
            "boost" : "1.0"
          },
          "field_product_display_products_commerce_price_amount_decimal_desc" : {
            "table" : "search_api_db_product_display",
            "column" : "field_product_display_products_commerce_price_amount_decimal_d",
            "type" : "decimal",
            "boost" : "1.0"
          }
        }
      }
    },
    "enabled" : "1",
    "rdf_mapping" : []
  }');
  return $items;
}
