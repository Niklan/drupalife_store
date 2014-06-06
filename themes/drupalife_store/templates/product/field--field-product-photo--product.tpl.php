<?php
/**
 * Theme photos.
 */
//  Product teaser.
if ($element['#view_mode'] == "node_teaser") {
  $items[0]['#image_style'] = 'product_thumb';
  print render($items[0]);
}

// Full display.
if ($element['#view_mode'] == "node_full") {
  $items[0]['#image_style'] = 'product_medium';
  $full_img = file_create_url($items[0]['#item']['uri']);
?>
  <div class="first-photo">
    <a href="<?php print $full_img; ?>" rel="product" class="colorbox-load">
      <?php print render($items[0]); ?>
    </a>
  </div>

<?php if (!empty($items[1])) { print "<ul class='photos'>"; } ?>

    <?php foreach ($items as $delta => $item): ?>
      <?php
      if ($delta == 0) continue;
      $item['#image_style'] = 'product_thumb';
      $full_img = file_create_url($item['#item']['uri']);
      $thumb_img = image_style_url('product_thumb', $item['#item']['uri']);
      ?>
      <li class="photo <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>>
        <a href="<?php print $full_img; ?>" rel="product" class="colorbox-load">
          <?php print render($item); ?>
        </a>
      </li>
    <?php endforeach;?>
<?php if (!empty($items[1])) { print "</ul>"; } ?>

<?php }

// Search results.
if ($element['#view_mode'] == "node_search_result") {
  $items[0]['#image_style'] = 'product_thumb';
  print render($items[0]);
}
?>
