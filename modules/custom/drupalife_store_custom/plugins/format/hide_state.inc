<?php
/**
 * Hide the state on checkout page.
 */
$plugin = array(
  'title' => t('Hide state'),
  'format callback' => 'drupalife_store_custom_commerce_hide_state',
  'type' => 'address',
  'weight' => -80,
);

/**
 * Callback to hide state.
 */
function drupalife_store_custom_commerce_hide_state(&$format, $address, $context = array()) {
  $format['locality_block']['administrative_area']['#access'] = 0;
}