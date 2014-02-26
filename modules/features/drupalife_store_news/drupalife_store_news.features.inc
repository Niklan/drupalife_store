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
        'label' => 'Масштабирование и обрезка',
        'help' => '«Масштабирование и обрезка» сначала масштабирует изображение, а затем обрезает большее значение. Это наиболее эффективный способ создания миниатюр без искажения пропорций исходного изображения.',
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
        'label' => 'Масштабирование и обрезка',
        'help' => '«Масштабирование и обрезка» сначала масштабирует изображение, а затем обрезает большее значение. Это наиболее эффективный способ создания миниатюр без искажения пропорций исходного изображения.',
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
  $items = array(
    'news' => array(
      'name' => t('Новость'),
      'base' => 'node_content',
      'description' => t('Добавление новостей на сайт.'),
      'has_title' => '1',
      'title_label' => t('Заголовок новости'),
      'help' => '',
    ),
  );
  return $items;
}
