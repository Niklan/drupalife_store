<?php
// Содержимое.
$body_values = field_get_items('node', $node, 'body');
$body = $body_values[0]['safe_value'];

// Промо-изображение.
$promo_img_values = field_get_items('node', $node, 'field_promo_image');
if ($promo_img_values) {
  $promo_img = image_style_url('news_full', $promo_img_values[0]['uri']);
}
?>
<article class="news full"<?php print $attributes; ?>>
  <header>
    <ul class="submitted">
      <li>
        <span class="icon-user"></span><?php print $node->name; ?>
      </li>
      <li>
        <span class="icon-calendar"></span><?php print $pubdate; ?>
      </li>
    </ul>
  </header>

  <div class="content" property="content:encoded">
    <?php if ($promo_img_values): ?>
      <img src="<?php print $promo_img; ?>" alt="<?php print $node->title; ?>" class="promo-image" property="dc:image">
    <?php endif; ?>

    <?php print $body; ?>
  </div>

  <?php print render($content['comments']); ?>
</article>
