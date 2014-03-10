<article class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="left-side">
    <?php if ($picture): ?>
      <?php print $picture; ?>
    <?php else: ?>
      <img src="/profile/drupalife_store/themes/drupalife_store/noavatar.png" alt="Аватар" class="user-picture">
    <?php endif; ?>
  </div>

  <div class="right-side">
    <p class="submitted">
      <?php print $submitted; ?>
      <?php print $permalink; ?>
    </p>

    <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['links']);
    print render($content);
    ?>

    <?php print render($content['links']) ?>
  </div>
</article>
