<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  STARTERKIT_preprocess_html($variables, $hook);
  STARTERKIT_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */

function drupalife_store_preprocess_page(&$variables, $hook) {
  // Отключаем сайдбар для продуктов.
  if (isset($variables['node']) && $variables['node']->type == "product_display") {
    unset($variables['page']['sidebar_first']);
  }
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // STARTERKIT_preprocess_node_page() or STARTERKIT_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

/**
 * Функция для склонений.
 */
function getNumEnding($number, $endingArray) {
  $number = $number % 100;
  if ($number>=11 && $number<=19) {
    $ending=$endingArray[2];
  }
  else {
    $i = $number % 10;
    switch ($i)
    {
      case (0): $ending = $endingArray[2]; break;
      case (1): $ending = $endingArray[0]; break;
      case (2):
      case (3):
      case (4): $ending = $endingArray[1]; break;
      default: $ending=$endingArray[2];
    }
  }
  return $ending;
}

/**
 * Получение корзины в упрощеном варианте.
 */
function get_simple_cart() {
  global $user;

  $order = commerce_cart_order_load($user->uid);
  if(!empty($order)) {
    $wrapper = entity_metadata_wrapper('commerce_order', $order);
    $line_items = $wrapper->commerce_line_items;
    $total = commerce_line_items_total($line_items);
    $currency = commerce_currency_load($total['currency_code']);
    $quantity = commerce_line_items_quantity($line_items, commerce_product_line_item_types());
    $summ = commerce_currency_format($total['amount'], $total['currency_code']);

    $quantity_label = getNumEnding($quantity, array('товар','товара','товаров'));

    $output = "<div id='cart-wrapper'><span class='icon-bag'></span>";
    $output .= "<div class='right-side'><span class='label'>Ваша корзина</span><a href='/cart'>{$quantity} {$quantity_label} - {$summ}</a></div></div>";

  }
  else {
    $output = "<div id='cart-wrapper'><span class='icon-bag'></span>";
    $output .= "<div class='right-side'><span class='label'>Ваша корзина</span>0 товаров - 0 руб.</div></div>";
  }

  return $output;
}

/**
 * Темизация формы авторизации.
 */
function drupalife_store_form_user_login_block_alter(&$form, &$form_state, $form_id) {
  $form['links']['#markup'] = ' <a class="user-register" href="/user/register">Регистрация</a>' . ' <div class="divider">&nbsp;</div> ' . ' <a class="user-password" href="/user/password">Восстановление</a>'; // Remove Request New Password from Block form
  $form['name']['#title'] = Null; // Change text on form
  $form['name']['#attributes'] = array('placeholder' => 'Логин');
  $form['name']['#size'] = 20;
  $form['pass']['#title'] = Null;
  $form['pass']['#attributes'] = array('placeholder' => 'Пароль');
  $form['pass']['#size'] = 20;
}

/**
 * Темизация контактной формы.
 */
function drupalife_store_form_entityform_edit_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'contact_entityform_edit_form') {
    $form_inner = array();
    foreach (element_children($form) as $child_key) {
      $form_inner[$child_key] = $form[$child_key];
      unset($form[$child_key]);
    }

    $form['contact_form'] = $form_inner;
    $form['contact_form']['#prefix'] = '<div class="contact-form">';
    $form['contact_form']['#suffix'] = '</div>';

    $form['#prefix'] = '<div class="contact-wrapper">';
    $form['#suffix'] = '</div>';
  }
}

/**
 * Implements template_preprocess_html();
 */
function drupalife_store_process_html(&$variables) {
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
}

/**
 * Implements hook_block_view_alter().
 */
function drupalife_store_block_view_alter(&$data, $block) {
  // Alter views block for search api to theme.
  // This is exposed filter (block) from search page view.
  if ($block->module == 'views' && $block->delta == '-exp-search-page') {
    // Add grid classes, to make form 100%;
    $data['content']['#markup'] = str_replace('views-widget-filter-search_api_views_fulltext', 'views-widget-filter-search_api_views_fulltext grid-4-6 left', $data['content']['#markup']);
    $data['content']['#markup'] = str_replace('views-submit-button', 'views-submit-button grid-1-6 left', $data['content']['#markup']);
    $data['content']['#markup'] = str_replace('views-reset-button', 'views-reset-button grid-1-6 left', $data['content']['#markup']);
  }
}
