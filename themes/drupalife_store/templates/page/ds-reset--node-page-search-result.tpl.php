<?php
$url = 'http://' . $_SERVER['HTTP_HOST'] . $node_url;
?>
<article class="news search">
  <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $node->title; ?></a></h2>
  <a href="<?php print $node_url; ?>" class="url"><?php print $url; ?></a>
  <div class="grid-full">
    <?php print render($content['body']); ?>
  </div>
</article>