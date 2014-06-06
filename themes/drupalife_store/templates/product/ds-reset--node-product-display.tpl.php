<?php
// We render it before drupal_render_childer to avoid double printing photos.
$photos = render($content['product:field_product_photo']);
?>
<article class="product full" <?php print $attributes; ?>>
  <div class="grid-full">
    <div class="grid-1-2 left">
      <div class="grid-row">
        <div class="grid-1-3 left">
          <div class="price">
            <label><?php print t('Price')?>:</label>
            <?php print render($content['product:commerce_price']); ?>
          </div>
        </div>

        <div class="grid-2-3 right">
          <?php print render($content['field_product_display_products']); ?>
        </div>
      </div>

      <?php print render($content['body']); ?>

      <?php print drupal_render_children($content); ?>
    </div>

    <div class="grid-1-2 left">
      <?php print $photos; ?>
    </div>
  </div>

  <?php print render($content['comments']); ?>
</article>