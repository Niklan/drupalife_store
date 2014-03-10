<?php
// Content.
$body_values = field_get_items('node', $node, 'body');
$body = $body_values[0]['safe_value'];

// Promo-image.
$promo_img_values = field_get_items('node', $node, 'field_promo_image');
if ($promo_img_values) {
  $promo_img = image_style_url('news_teaser', $promo_img_values[0]['uri']);
}
?>
<article class="news teaser"<?php print $attributes; ?>>
  <header>
    <h2 property="dc:title" class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>

    <ul class="submitted">
      <li>
        <span class="icon-user"></span><?php print $node->name; ?>
      </li>
      <li>
        <span class="icon-calendar"></span><?php print $pubdate; ?>
      </li>
      <li>
        <span class="icon-comment-alt"></span>
        <a href="<?php print $node_url; ?>#comments">
          <?php print get_comments_label($node->comment_count); ?>
        </a>
      </li>
    </ul>
  </header>

  <div class="content" property="content:encoded">
    <?php if ($promo_img_values): ?>
      <a href="<?php print $node_url; ?>" class="promo-image">
        <img src="<?php print $promo_img; ?>" alt="<?php print $node->title; ?>" property="dc:image">
      </a>
    <?php endif; ?>

    <?php print $ds_content; ?>
  </div>
</article>
