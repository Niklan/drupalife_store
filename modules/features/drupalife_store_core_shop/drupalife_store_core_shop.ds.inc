<?php
/**
 * @file
 * drupalife_store_core_shop.ds.inc
 */

/**
 * Implements hook_ds_layout_settings_info().
 */
function drupalife_store_core_shop_ds_layout_settings_info() {
  $export = array();

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'node|product_display|default';
  $ds_layout->entity_type = 'node';
  $ds_layout->bundle = 'product_display';
  $ds_layout->view_mode = 'default';
  $ds_layout->layout = 'ds_reset';
  $ds_layout->settings = array(
    'regions' => array(
      'ds_content' => array(
        0 => 'body',
        1 => 'product:commerce_price',
        2 => 'field_product_display_products',
        3 => 'field_product_display_category',
        4 => 'product:field_product_photo',
      ),
    ),
    'fields' => array(
      'body' => 'ds_content',
      'product:commerce_price' => 'ds_content',
      'field_product_display_products' => 'ds_content',
      'field_product_display_category' => 'ds_content',
      'product:field_product_photo' => 'ds_content',
    ),
    'classes' => array(),
    'wrappers' => array(
      'ds_content' => 'div',
    ),
    'layout_wrapper' => 'div',
    'layout_attributes' => '',
    'layout_attributes_merge' => TRUE,
    'layout_link_attribute' => FALSE,
    'layout_link_custom' => '',
  );
  $export['node|product_display|default'] = $ds_layout;

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'node|product_display|search_result';
  $ds_layout->entity_type = 'node';
  $ds_layout->bundle = 'product_display';
  $ds_layout->view_mode = 'search_result';
  $ds_layout->layout = 'ds_reset';
  $ds_layout->settings = array(
    'regions' => array(
      'ds_content' => array(
        0 => 'product:commerce_price',
        1 => 'body',
        2 => 'field_product_display_products',
        3 => 'field_product_display_category',
        4 => 'product:field_product_photo',
      ),
    ),
    'fields' => array(
      'product:commerce_price' => 'ds_content',
      'body' => 'ds_content',
      'field_product_display_products' => 'ds_content',
      'field_product_display_category' => 'ds_content',
      'product:field_product_photo' => 'ds_content',
    ),
    'classes' => array(),
    'wrappers' => array(
      'ds_content' => 'div',
    ),
    'layout_wrapper' => 'div',
    'layout_attributes' => '',
    'layout_attributes_merge' => TRUE,
    'layout_link_attribute' => FALSE,
    'layout_link_custom' => '',
  );
  $export['node|product_display|search_result'] = $ds_layout;

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'node|product_display|teaser';
  $ds_layout->entity_type = 'node';
  $ds_layout->bundle = 'product_display';
  $ds_layout->view_mode = 'teaser';
  $ds_layout->layout = 'ds_reset';
  $ds_layout->settings = array(
    'regions' => array(
      'ds_content' => array(
        0 => 'body',
        1 => 'product:commerce_price',
        2 => 'product:field_product_photo',
        3 => 'field_product_display_products',
      ),
    ),
    'fields' => array(
      'body' => 'ds_content',
      'product:commerce_price' => 'ds_content',
      'product:field_product_photo' => 'ds_content',
      'field_product_display_products' => 'ds_content',
    ),
    'classes' => array(),
    'wrappers' => array(
      'ds_content' => 'div',
    ),
    'layout_wrapper' => 'div',
    'layout_attributes' => '',
    'layout_attributes_merge' => TRUE,
    'layout_link_attribute' => FALSE,
    'layout_link_custom' => '',
  );
  $export['node|product_display|teaser'] = $ds_layout;

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'taxonomy_term|shop_category|full';
  $ds_layout->entity_type = 'taxonomy_term';
  $ds_layout->bundle = 'shop_category';
  $ds_layout->view_mode = 'full';
  $ds_layout->layout = 'ds_reset';
  $ds_layout->settings = array(
    'regions' => array(
      'ds_content' => array(
        0 => 'description',
        1 => 'field_shop_category_image',
      ),
    ),
    'fields' => array(
      'description' => 'ds_content',
      'field_shop_category_image' => 'ds_content',
    ),
    'classes' => array(),
    'wrappers' => array(
      'ds_content' => 'div',
    ),
    'layout_wrapper' => 'div',
    'layout_attributes' => '',
    'layout_attributes_merge' => TRUE,
    'layout_link_attribute' => FALSE,
    'layout_link_custom' => '',
  );
  $export['taxonomy_term|shop_category|full'] = $ds_layout;

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'taxonomy_term|shop_category|term_teaser';
  $ds_layout->entity_type = 'taxonomy_term';
  $ds_layout->bundle = 'shop_category';
  $ds_layout->view_mode = 'term_teaser';
  $ds_layout->layout = 'ds_reset';
  $ds_layout->settings = array(
    'regions' => array(
      'ds_content' => array(
        0 => 'description',
        1 => 'field_shop_category_image',
      ),
    ),
    'fields' => array(
      'description' => 'ds_content',
      'field_shop_category_image' => 'ds_content',
    ),
    'classes' => array(),
    'wrappers' => array(),
    'layout_wrapper' => 'div',
    'layout_attributes' => '',
    'layout_attributes_merge' => TRUE,
    'layout_link_attribute' => FALSE,
    'layout_link_custom' => '',
  );
  $export['taxonomy_term|shop_category|term_teaser'] = $ds_layout;

  return $export;
}

/**
 * Implements hook_ds_view_modes_info().
 */
function drupalife_store_core_shop_ds_view_modes_info() {
  $export = array();

  $ds_view_mode = new stdClass();
  $ds_view_mode->api_version = 1;
  $ds_view_mode->view_mode = 'term_teaser';
  $ds_view_mode->label = 'Term Teaser';
  $ds_view_mode->entities = array(
    'taxonomy_term' => 'taxonomy_term',
  );
  $export['term_teaser'] = $ds_view_mode;

  return $export;
}
