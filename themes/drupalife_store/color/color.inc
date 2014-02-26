<?php
$info = array();

$info['fields'] = array(
  'main_color' => 'Основной цвет',
  'text' => '',
);

$info['schemes'] = array(
  'default' => array(
    'title' => 'Серобуромалиновый',
    'colors' => array(
      'main_color' => '#8a73bb',
    ),
  ),
  'green' => array(
    'title' => 'Зеленый',
    'colors' => array(
      'main_color' => '#75bb73',
    ),
  ),
  'cardinal' => array(
    'title' => 'Кардинал',
    'colors' => array(
      'main_color' => '#ce4040',
    ),
  ),
  'violet_red' => array(
    'title' => 'Фиолетово-красный',
    'colors' => array(
      'main_color' => '#ce4090',
    ),
  ),
  'dark_purple' => array(
    'title' => 'Темно-пурпурный',
    'colors' => array(
      'main_color' => '#8a40ce',
    ),
  ),
  'blue_steel' => array(
    'title' => 'Синяя сталь',
    'colors' => array(
      'main_color' => '#4095ce',
    ),
  ),
  'alyzor' => array(
    'title' => 'Ализариновый',
    'colors' => array(
      'main_color' => '#fd4843',
    ),
  ),
);

$info['css'] = array('color/color.css');

/**
 * Настройки ниже - пустышки. Они нужны модулю color, даже если мы их не
 * используем в своей теме.
 */

// Путь указывается относительно корня темы.
$info['css'] = array('color/color.css');

// Файлы для копирования. (color.css - копируется автоматически)
$info['copy'] = array();

// Файлы которые будут использоваться в превью.
$info['preview_css'] = 'color/preview.css';
$info['preview_js'] = 'color/preview.js';
$info['preview_html'] = 'color/preview.html';

// Объявление градиентов.
$info['gradients'] = array();

// Координаты для заливки.
$info['fill'] = array();

// Координаты для нарезки изображения.
$info['slices'] = array();

// Базовая картинка.
$info['base_image'] = 'color/base.png';