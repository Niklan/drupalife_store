<?php
/**
 * @file
 * drupalife_store_slider.features.inc
 */

/**
 * Implements hook_image_default_styles().
 */
function drupalife_store_slider_image_default_styles() {
  $styles = array();

  // Exported image style: slider.
  $styles['slider'] = array(
    'name' => 'slider',
    'label' => 'slider',
    'effects' => array(
      17 => array(
        'label' => 'Масштабирование и обрезка',
        'help' => '«Масштабирование и обрезка» сначала масштабирует изображение, а затем обрезает большее значение. Это наиболее эффективный способ создания миниатюр без искажения пропорций исходного изображения.',
        'effect callback' => 'image_scale_and_crop_effect',
        'dimensions callback' => 'image_resize_dimensions',
        'form callback' => 'image_resize_form',
        'summary theme' => 'image_resize_summary',
        'module' => 'image',
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 984,
          'height' => 554,
        ),
        'weight' => 2,
      ),
    ),
  );

  return $styles;
}
