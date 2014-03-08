<?php
/**
 * @file
 * drupalife_store_news.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function drupalife_store_news_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "ds" && $api == "ds") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function drupalife_store_news_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_image_default_styles().
 */
function drupalife_store_news_image_default_styles() {
  $styles = array();

  // Exported image style: news_full.
  $styles['news_full'] = array(
    'name' => 'news_full',
    'label' => 'News (full)',
    'effects' => array(
      2 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 720,
          'height' => 410,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: news_teaser.
  $styles['news_teaser'] = array(
    'name' => 'news_teaser',
    'label' => 'News (teaser)',
    'effects' => array(
      1 => array(
        'label' => 'Scale and crop',
        'help' => 'Scale and crop will maintain the aspect-ratio of the original image, then crop the larger dimension. This is most useful for creating perfectly square thumbnails without stretching the image.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 300,
          'height' => 169,
        ),
        'weight' => 1,
      ),
    ),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function drupalife_store_news_node_info() {
  $t = get_t();
  $items = array(
    'news' => array(
      'name' => $t('News'),
      'base' => 'node_content',
      'description' => $t('Adding news to the site.'),
      'has_title' => '1',
      'title_label' => $t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
