<?php
/**
 * @file
 * drupalife_store_core_shop.features.inc
 */

/**
 * Implements hook_commerce_product_default_types().
 */
function drupalife_store_core_shop_commerce_product_default_types() {
  $items = array(
    'product' => array(
      'type' => 'product',
      'name' => 'Продукт',
      'description' => 'Базовый тип продукта.',
      'help' => '',
      'revision' => 1,
    ),
  );
  return $items;
}

/**
 * Implements hook_ctools_plugin_api().
 */
function drupalife_store_core_shop_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "ds" && $api == "ds") {
    return array("version" => "1");
  }
  if ($module == "taxonomy_display" && $api == "taxonomy_display") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function drupalife_store_core_shop_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_image_default_styles().
 */
function drupalife_store_core_shop_image_default_styles() {
  $styles = array();

  // Exported image style: category_teaser.
  $styles['category_teaser'] = array(
    'name' => 'category_teaser',
    'label' => 'Category Teaser',
    'effects' => array(
      7 => array(
        'label' => 'Смена соотношения сторон',
        'help' => 'Использование различных эффектов в зависимости от того, в портретном',
        'effect callback' => 'canvasactions_aspect_effect',
        'dimensions callback' => 'canvasactions_aspect_dimensions',
        'form callback' => 'canvasactions_aspect_form',
        'summary theme' => 'canvasactions_aspect_summary',
        'module' => 'imagecache_canvasactions',
        'name' => 'canvasactions_aspect',
        'data' => array(
          'portrait' => 'category_teaser_vertical',
          'landscape' => 'category_teaser_horizontal',
          'ratio_adjustment' => 1,
        ),
        'weight' => -10,
      ),
      6 => array(
        'label' => 'Определить холст',
        'help' => 'Определите размер рабочего холста и цвет фона. Это контролирует разрешение изображения на выходе.',
        'effect callback' => 'canvasactions_definecanvas_effect',
        'dimensions callback' => 'canvasactions_definecanvas_dimensions',
        'form callback' => 'canvasactions_definecanvas_form',
        'summary theme' => 'canvasactions_definecanvas_summary',
        'module' => 'imagecache_canvasactions',
        'name' => 'canvasactions_definecanvas',
        'data' => array(
          'RGB' => array(
            'HEX' => '#ffffff',
          ),
          'under' => 1,
          'exact' => array(
            'width' => 164,
            'height' => 164,
            'xpos' => 'center',
            'ypos' => 'center',
          ),
          'relative' => array(
            'leftdiff' => '',
            'rightdiff' => '',
            'topdiff' => '',
            'bottomdiff' => '',
          ),
        ),
        'weight' => -9,
      ),
    ),
  );

  // Exported image style: category_teaser_horizontal.
  $styles['category_teaser_horizontal'] = array(
    'name' => 'category_teaser_horizontal',
    'label' => 'Category Teaser (horizontal)',
    'effects' => array(
      4 => array(
        'label' => 'Масштабирование',
        'help' => 'Масштабирование позволяет изменить размеры изображения с сохранением пропорций. Если введён размер только одной стороны, то размер другой будет вычислен автоматически. Если введены два размера, то каждое будет определять максимальный размер по своему направлению и применяться в зависимости от формата изображения.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => 164,
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: category_teaser_vertical.
  $styles['category_teaser_vertical'] = array(
    'name' => 'category_teaser_vertical',
    'label' => 'Category Teaser (vertical)',
    'effects' => array(
      5 => array(
        'label' => 'Масштабирование',
        'help' => 'Масштабирование позволяет изменить размеры изображения с сохранением пропорций. Если введён размер только одной стороны, то размер другой будет вычислен автоматически. Если введены два размера, то каждое будет определять максимальный размер по своему направлению и применяться в зависимости от формата изображения.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '',
          'height' => 164,
          'upscale' => 0,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: product_medium.
  $styles['product_medium'] = array(
    'name' => 'product_medium',
    'label' => 'Product Medium',
    'effects' => array(
      14 => array(
        'label' => 'Смена соотношения сторон',
        'help' => 'Использование различных эффектов в зависимости от того, в портретном',
        'effect callback' => 'canvasactions_aspect_effect',
        'dimensions callback' => 'canvasactions_aspect_dimensions',
        'form callback' => 'canvasactions_aspect_form',
        'summary theme' => 'canvasactions_aspect_summary',
        'module' => 'imagecache_canvasactions',
        'name' => 'canvasactions_aspect',
        'data' => array(
          'portrait' => 'product_medium_book',
          'landscape' => 'product_medium_portrait',
          'ratio_adjustment' => 1,
        ),
        'weight' => 1,
      ),
      15 => array(
        'label' => 'Определить холст',
        'help' => 'Определите размер рабочего холста и цвет фона. Это контролирует разрешение изображения на выходе.',
        'effect callback' => 'canvasactions_definecanvas_effect',
        'dimensions callback' => 'canvasactions_definecanvas_dimensions',
        'form callback' => 'canvasactions_definecanvas_form',
        'summary theme' => 'canvasactions_definecanvas_summary',
        'module' => 'imagecache_canvasactions',
        'name' => 'canvasactions_definecanvas',
        'data' => array(
          'RGB' => array(
            'HEX' => '#ffffff',
          ),
          'under' => 1,
          'exact' => array(
            'width' => 482,
            'height' => 482,
            'xpos' => 'center',
            'ypos' => 'center',
          ),
          'relative' => array(
            'leftdiff' => '',
            'rightdiff' => '',
            'topdiff' => '',
            'bottomdiff' => '',
          ),
        ),
        'weight' => 2,
      ),
    ),
  );

  // Exported image style: product_medium_book.
  $styles['product_medium_book'] = array(
    'name' => 'product_medium_book',
    'label' => 'Product Medium (book)',
    'effects' => array(
      13 => array(
        'label' => 'Масштабирование',
        'help' => 'Масштабирование позволяет изменить размеры изображения с сохранением пропорций. Если введён размер только одной стороны, то размер другой будет вычислен автоматически. Если введены два размера, то каждое будет определять максимальный размер по своему направлению и применяться в зависимости от формата изображения.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '',
          'height' => 482,
          'upscale' => 0,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: product_medium_portrait.
  $styles['product_medium_portrait'] = array(
    'name' => 'product_medium_portrait',
    'label' => 'Product Medium (portrait)',
    'effects' => array(
      12 => array(
        'label' => 'Масштабирование',
        'help' => 'Масштабирование позволяет изменить размеры изображения с сохранением пропорций. Если введён размер только одной стороны, то размер другой будет вычислен автоматически. Если введены два размера, то каждое будет определять максимальный размер по своему направлению и применяться в зависимости от формата изображения.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => 482,
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: product_thumb.
  $styles['product_thumb'] = array(
    'name' => 'product_thumb',
    'label' => 'Product Thumb',
    'effects' => array(
      10 => array(
        'label' => 'Смена соотношения сторон',
        'help' => 'Использование различных эффектов в зависимости от того, в портретном',
        'effect callback' => 'canvasactions_aspect_effect',
        'dimensions callback' => 'canvasactions_aspect_dimensions',
        'form callback' => 'canvasactions_aspect_form',
        'summary theme' => 'canvasactions_aspect_summary',
        'module' => 'imagecache_canvasactions',
        'name' => 'canvasactions_aspect',
        'data' => array(
          'portrait' => 'product_thumb_book',
          'landscape' => 'product_thumb_portrait',
          'ratio_adjustment' => 1,
        ),
        'weight' => 1,
      ),
      11 => array(
        'label' => 'Определить холст',
        'help' => 'Определите размер рабочего холста и цвет фона. Это контролирует разрешение изображения на выходе.',
        'effect callback' => 'canvasactions_definecanvas_effect',
        'dimensions callback' => 'canvasactions_definecanvas_dimensions',
        'form callback' => 'canvasactions_definecanvas_form',
        'summary theme' => 'canvasactions_definecanvas_summary',
        'module' => 'imagecache_canvasactions',
        'name' => 'canvasactions_definecanvas',
        'data' => array(
          'RGB' => array(
            'HEX' => '#ffffff',
          ),
          'under' => 1,
          'exact' => array(
            'width' => 164,
            'height' => 164,
            'xpos' => 'center',
            'ypos' => 'center',
          ),
          'relative' => array(
            'leftdiff' => '',
            'rightdiff' => '',
            'topdiff' => '',
            'bottomdiff' => '',
          ),
        ),
        'weight' => 2,
      ),
    ),
  );

  // Exported image style: product_thumb_book.
  $styles['product_thumb_book'] = array(
    'name' => 'product_thumb_book',
    'label' => 'Product Thumb (book)',
    'effects' => array(
      9 => array(
        'label' => 'Масштабирование',
        'help' => 'Масштабирование позволяет изменить размеры изображения с сохранением пропорций. Если введён размер только одной стороны, то размер другой будет вычислен автоматически. Если введены два размера, то каждое будет определять максимальный размер по своему направлению и применяться в зависимости от формата изображения.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => '',
          'height' => 164,
          'upscale' => 0,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: product_thumb_portrait.
  $styles['product_thumb_portrait'] = array(
    'name' => 'product_thumb_portrait',
    'label' => 'Product Thumb (portrait)',
    'effects' => array(
      8 => array(
        'label' => 'Масштабирование',
        'help' => 'Масштабирование позволяет изменить размеры изображения с сохранением пропорций. Если введён размер только одной стороны, то размер другой будет вычислен автоматически. Если введены два размера, то каждое будет определять максимальный размер по своему направлению и применяться в зависимости от формата изображения.',
        'effect callback' => 'image_scale_effect',
        'dimensions callback' => 'image_scale_dimensions',
        'form callback' => 'image_scale_form',
        'summary theme' => 'image_scale_summary',
        'module' => 'image',
        'name' => 'image_scale',
        'data' => array(
          'width' => 164,
          'height' => '',
          'upscale' => 0,
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
function drupalife_store_core_shop_node_info() {
  $items = array(
    'product_display' => array(
      'name' => t('Отображение товара'),
      'base' => 'node_content',
      'description' => t('Добавление товаров со склада на сайт.'),
      'has_title' => '1',
      'title_label' => t('Заголовок'),
      'help' => '',
    ),
  );
  return $items;
}
