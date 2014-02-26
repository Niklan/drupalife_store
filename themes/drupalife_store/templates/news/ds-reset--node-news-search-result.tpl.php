<?php
$url = 'http://' . $_SERVER['HTTP_HOST'] . $node_url;

// Промо-изображение.
$promo_img_values = field_get_items('node', $node, 'field_promo_image');
if ($promo_img_values) {
  $promo_img = image_style_url('news_full', $promo_img_values[0]['uri']);
}
?>
<article class="news search">
  <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $node->title; ?></a></h2>
  <a href="<?php print $node_url; ?>" class="url"><?php print $url; ?></a>
  <div class="grid-full">

    <?php if ($promo_img_values): ?>
    <div class="grid-1-6 left">
        <img src="<?php print $promo_img; ?>" alt="<?php print $node->title; ?>" class="promo-image" property="dc:image">
    </div>

    <div class="grid-5-6 left">
    <?php else: ?>
    <div class="grid-full">
    <?php endif; ?>
      <?php print render($content['body']); ?>
    </div>
  </div>
</article>