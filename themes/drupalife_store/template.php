<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */

/**
 * Auto rebuild theme registry.
 */
if (theme_get_setting('rebuild_theme_registry') && !defined('MAINTENANCE_MODE')) {
  system_rebuild_theme_data();
  drupal_theme_rebuild();
}

/**
 * Implements hook_preprocess_html().
 */
function drupalife_store_preprocess_html(&$variables, $hook) {
  // Change bg image if new is set in theme settings.
  if (variable_get('drupalife_store_theme_background_image', FALSE)) {
    $file = file_load(variable_get('drupalife_store_theme_background_image'));
    if ($file->fid) {
      $bg_url = file_create_url($file->uri);
      $bg_x = theme_get_setting('background_image_x') ? theme_get_setting('background_image_x') : 'center';
      $bg_y = theme_get_setting('background_image_y') ? theme_get_setting('background_image_y') : 'center';
      $bg_size = theme_get_setting('background_image_size') ? theme_get_setting('background_image_size') : 'auto';
      $bg_repeat = theme_get_setting('background_image_repeat') ? theme_get_setting('background_image_repeat') : 'no-repeat';

      $bg_style = "style='background: url(\"{$bg_url}\") {$bg_repeat} {$bg_x} {$bg_y}; background-size: {$bg_size};'";
      $variables['bg_style'] = $bg_style;
    }
    else {
      $variables['bg_style'] = FALSE;
    }
  }
  else {
    $variables['bg_style'] = FALSE;
  }

  // Add template suggestions for 404 and 403 errors.
  // F.e.: html--404.tpl.php
  $status = drupal_get_http_header("status");
  if ($status == "404 Not Found") {
    $variables['theme_hook_suggestions'][] = 'html__404';
    $variables['classes_array'][] = 'error-404';
  }

  if ($status == "403 Forbidden") {
    $variables['theme_hook_suggestions'][] = 'html__403';
    $variables['classes_array'][] = 'error-403';
  }
}

// */

/**
 * Implements hook_preprocess_page().
 */
function drupalife_store_preprocess_page(&$variables, $hook) {
  global $user;

  // Disable sidebar for product page.
  if (isset($variables['node']->type) && $variables['node']->type == "product_display") {
    $variables['hide_sidebar'] = TRUE;
  }
  else {
    $variables['hide_sidebar'] = FALSE;
  }

  // Top links for user.
  if ($variables['logged_in']) {
    $variables['header_user_links'] = t("<a href='@user_link'>My profile</a> | <a href='@user_orders'>My orders</a>",
      array(
        '@user_link' => '/user',
        '@user_orders' => "/user/{$user->uid}/orders",
      )
    );
  }
  else {
    $variables['header_user_links'] = t("Welcome, you can <a href='@user_login'>sign in</a> or <a href='@user_register'>sign up</a>.",
      array(
        '@user_login' => '/user',
        '@user_register' => "/user/register",
      )
    );
  }

  // Add template suggestions for 404 and 403 errors.
  // F.e.: page--404.tpl.php
  $status = drupal_get_http_header("status");
  if ($status == "404 Not Found") {
    $variables['theme_hook_suggestions'][] = 'page__404';
  }

  if ($status == "403 Forbidden") {
    $variables['theme_hook_suggestions'][] = 'page__403';
  }

  // Social buttons from theme settings.
  $social = '';
  if ($vk = theme_get_setting('social_vk')) {
    $social .= "<a href='{$vk}' target='_blank' class='social vk'>&nbsp;</a>";
  }
  if ($fb = theme_get_setting('social_facebook')) {
    $social .= "<a href='{$fb}' target='_blank' class='social fb'>&nbsp;</a>";
  }
  if ($ggl = theme_get_setting('social_google')) {
    $social .= "<a href='{$ggl}' target='_blank' class='social ggl'>&nbsp;</a>";
  }
  if ($tw = theme_get_setting('social_twitter')) {
    $social .= "<a href='{$tw}' target='_blank' class='social twitter'>&nbsp;</a>";
  }
  $variables['social'] = $social;

  $variables['drupalife_store'] = t('Powered by Drupalife Store');
}

/**
 * Theme auth form.
 */
function drupalife_store_form_user_login_block_alter(&$form, &$form_state, $form_id) {
  $register = t('Sign up');
  $forget = t('Restore');

  $form['links']['#markup'] = '<div class="links"><div class="divider">&nbsp;</div> <a class="user-register" href="/user/register">' . $register . '</a><a class="user-password" href="/user/password">' . $forget . '</a></div>';
  $form['name']['#title'] = NULL;
  $form['name']['#attributes'] = array('placeholder' => t('Login'));
  $form['name']['#size'] = 20;
  $form['pass']['#title'] = NULL;
  $form['pass']['#attributes'] = array('placeholder' => t('Password'));
  $form['pass']['#size'] = 20;
}

/**
 * Implements hook_form_FORM_ID_alter():commerce_checkout_form_checkout
 * Makes 'Order total' label on checkout page translatable without i18n module.
 */
function drupalife_store_form_commerce_checkout_form_checkout_alter(&$form, &$form_state, $form_id) {
  if (isset($form['cart_contents'])) {
    $form['cart_contents']['cart_contents_view']['#markup'] = str_replace('Order total', t('Order total'), $form['cart_contents']['cart_contents_view']['#markup']);
  }
}

/**
 * Implements template_process_html();
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

/**
 * Implements hook_theme().
 */
function drupalife_store_theme() {
  $theme = array();

  // Comment form.
  $theme['comment_form'] = array(
    'arguments' => array('form' => NULL),
    'render element' => 'form',
    'template' => 'templates/comment-form',
  );

  // Contact form.
  $theme['contact_entityform_edit_form'] = array(
    'arguments' => array('form' => NULL),
    'template' => 'templates/contact/contact-form',
    'render element' => 'form',
  );

  return $theme;
}

/**
 * Implements hook_theme_registry_alter().
 */
function drupalife_store_theme_registry_alter(&$theme_registry) {
  $theme_path = path_to_theme();
  // For subthemes.
  $dl_theme_path = drupal_get_path('theme', 'drupalife_store');

  // Checkboxes.
  if (isset($theme_registry['checkbox']) && theme_get_setting('restyle_checkboxes')) {
    $theme_registry['checkbox']['type'] = 'theme';
    $theme_registry['checkbox']['theme path'] = $dl_theme_path;
    $theme_registry['checkbox']['template'] = $theme_path . '/templates/fields/field--type-checkbox';
    unset($theme_registry['checkbox']['function']);
  }

  // Radios.
  if (isset($theme_registry['radio']) && theme_get_setting('restyle_radios')) {
    $theme_registry['radio']['type'] = 'theme';
    $theme_registry['radio']['theme path'] = $dl_theme_path;
    $theme_registry['radio']['template'] = $theme_path . '/templates/fields/field--type-radio';
    unset($theme_registry['radio']['function']);
  }
}

/**
 * Plural function for Russian words.
 */
function getNumEnding($number, $endingArray) {
  $number = $number % 100;
  if ($number >= 11 && $number <= 19) {
    $ending = $endingArray[2];
  }
  else {
    $i = $number % 10;
    switch ($i) {
      case (0):
        $ending = $endingArray[2];
        break;
      case (1):
        $ending = $endingArray[0];
        break;
      case (2):
      case (3):
      case (4):
        $ending = $endingArray[1];
        break;
      default:
        $ending = $endingArray[2];
    }
  }
  return $ending;
}

/**
 * Simple cart.
 */
function get_simple_cart() {
  global $user;
  global $language;

  $cart_label = t('Your cart');
  $order = commerce_cart_order_load($user->uid);
  if (!empty($order)) {
    $wrapper = entity_metadata_wrapper('commerce_order', $order);
    $line_items = $wrapper->commerce_line_items;
    $total = commerce_line_items_total($line_items);
    $currency = commerce_currency_load($total['currency_code']);
    $quantity = commerce_line_items_quantity($line_items, commerce_product_line_item_types());
    $summ = commerce_currency_format($total['amount'], $total['currency_code']);

    // For Russian cart we need plural function.
    if ($language->language == 'ru') {
      $quantity_label = getNumEnding($quantity, array('товар', 'товара', 'товаров'));
    }
    else {
      $quantity_label = 'item(s)';
    }

    $output = "<div id='cart-wrapper'><span class='icon-bag'></span>";
    $output .= "<div class='right-side'><span class='label'>{$cart_label}</span><a href='/cart'>{$quantity} {$quantity_label} - {$summ}</a></div></div>";

  }
  else {
    $cart_empty_label = t('Your cart is empty');
    $output = "<div id='cart-wrapper'><span class='icon-bag'></span>";
    $output .= "<div class='right-side'><span class='label'>{$cart_label}</span>{$cart_empty_label}</div></div>";
  }

  return $output;
}

/**
 * This function returns search box based on selected search during
 * installation.
 */
function get_search_box() {
  $site_search = variable_get('drupalife_store_selected_search');

  $search_input_placeholder = t('Enter your search query');
  if ($site_search == 'default' || empty($site_search)) {
    $block = module_invoke('search', 'block_view', 0);
    $block['content']['actions']['submit']['#value'] = "";
    $block['content']['search_block_form']['#attributes'] = array('placeholder' => $search_input_placeholder);
    $search = render($block['content']);
  }
  else {
    if ($site_search == 'search_api') {
      if (arg(0) == 'search') {
        $default_query = isset($_GET['s']) ? $_GET['s'] : '';
      }

      isset($default_query) ? $query = $default_query : $query = '';

      $search = "<form action=\"/search\" id=\"search-api-header\">
    <input name=\"s\" value=\"{$query}\" maxlength=\"128\" class=\"form-text\" type=\"text\" placeholder=\"{$search_input_placeholder}\">
    <div class=\"submit-wrapper\"><input type=\"submit\" value=\"\"></div>
</form>";
    }
  }

  return $search;
}

/**
 * Plural function for comment label.
 */
function get_comments_label($comment_count = 0) {
  global $language;

  $label = format_plural($comment_count, t('@count comment'), t('@count comments'), array('@count' => $comment_count));

  if ($language->language == 'ru') {
    $plural = getNumEnding($comment_count, array('комментарий', 'комментария', 'комментариев'));
    $label = $comment_count . ' ' . $plural;
  }

  return $label;
}
