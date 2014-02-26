<article class="product teaser" <?php print $attributes; ?>>
  <?php print render($content['product:field_product_photo']); ?>
  <h2 class="title"><a href="<?php print $node_url;?>"><?php print $node->title; ?></a></h2>
  <?php print render($content['product:commerce_price']); ?>
</article>