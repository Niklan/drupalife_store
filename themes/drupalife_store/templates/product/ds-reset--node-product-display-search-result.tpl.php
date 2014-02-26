<?php
$url = 'http://' . $_SERVER['HTTP_HOST'] . $node_url;
?>
<article class="product search">
  <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $node->title; ?></a></h2>
  <a href="<?php print $node_url; ?>" class="url"><?php print $url; ?></a>
  <div class="grid-full">
    <div class="grid-1-6 left">
      <?php print render($content['product:field_product_photo']); ?>
    </div>

    <div class="grid-5-6 left">
      <strong class="left">Стоимость:&nbsp;</strong> <?php print render($content['product:commerce_price']); ?>
      <?php print render($content['body']); ?>
      <?php print render($content['field_product_display_products']); ?>
    </div>
  </div>
</article>