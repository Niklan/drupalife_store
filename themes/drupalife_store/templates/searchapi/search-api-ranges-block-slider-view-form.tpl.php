<?php
/**
 * @file custom Search API ranges Min/Max UI slider widget
 */

global $language;
// Text fixes for Russian.
if ($language->language == 'ru') {
  // We hide default text and make what we need.
  unset($form['text-range']);
  //print drupal_render($form['text-range']);
  $price_from = number_format($form['range-from']['#default_value'], 0) . ' руб.';
  $price_to = number_format($form['range-to']['#default_value'], 0) . ' руб.';
  $text_range = 'Показаны товары в промежутке от ' . $price_from . ' до ' . $price_to;
}
else {
  $text_range = render($form['text-range']);
}
?>
<?php print $text_range; ?>
<div class="yui3-g">
  <div class="grid-full">
    <div class="yui3-u range-box grid-1-2 left">
      <?php print drupal_render($form['range-from']); ?>
    </div>
    <div class="yui3-u range-box grid-1-2 left">
      <?php print drupal_render($form['range-to']); ?>
    </div>
  </div>

  <div class="yui3-u range-slider-box">
    <?php print drupal_render($form['range-slider']); ?>
  </div>
</div>
<?php
// Hide submit button, cuz we have autosubmit.
$form['submit']['#attributes']['class'][] = 'element-invisible';
print drupal_render($form['submit']);
?>
<?php
  // Render required hidden fields.
  print drupal_render_children($form);
?>
