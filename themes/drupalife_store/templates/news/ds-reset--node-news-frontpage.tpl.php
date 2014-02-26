<?php
// Промо-изображение.
$promo_img_values = field_get_items('node', $node, 'field_promo_image');
if ($promo_img_values) {
  $promo_img = image_style_url('news_full', $promo_img_values[0]['uri']);
}
?>
<article class="news frontpage">
  <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $node->title; ?></a></h2>
  <img src="<?php print $promo_img; ?>" alt="<?php print $node->title; ?>" class="promo-image" property="dc:image">
</article>