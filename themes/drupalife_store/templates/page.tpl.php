<?php
// Мы рендерим сайдбар чтобы узнать, есть ли там блоки или нет.
$sidebar  = render($page['sidebar_first']);
// В зависимости от того, есть ли сайдбар или нет, мы меняем класс у
// основного контента, чтобы растянуть его на всю ширину в случае отсутствия
// сайдбара.
if (!$hide_sidebar ) {
  $main_content_class = 'grid-3-4';
}
else {
  $main_content_class = 'grid-full';
}
global $user;
?>
<div id="page-wrapper">
  <header id="header">
    <div id="header-top-line">
      <div class="grid-2-3 left">
        <?php print $header_user_links; ?>
      </div>

      <div id="socials" class="grid-1-3 right">
        <?php print $social; ?>
      </div>
    </div>

    <div id="header-site-info" class="grid-full" role="banner">
      <div class="grid-1-3 left">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a>
        <?php endif; ?>

        <?php if ($site_name || $site_slogan): ?>
          <div id="name-and-slogan">
            <?php if ($site_name): ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>

            <?php if ($site_slogan): ?>
              <div id="site-slogan"><?php print $site_slogan; ?></div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="grid-1-3 left">
        <?php print get_search_box(); ?>
      </div>

      <div class="grid-1-3 left">
        <?php print get_simple_cart(); ?>
      </div>
    </div>

    <?php print render($page['navigation']); ?>
  </header>

  <?php if ($title && !$is_front): ?>
  <div id="page-title-wrapper">
    <?php print $breadcrumb; ?>
    <h1 id="page-title" property="dc:title"><?php print $title; ?></h1>
  </div>
  <?php endif; ?>

  <div id="content-container">
    <?php if ($is_front): ?>
      <?php print render($page['highlighted']); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php print render($page['content_front']); ?>
    <?php else: ?>
      <div id="main-content" class="<?php print $main_content_class; ?> left" role="main">
        <?php print render($page['highlighted']); ?>
        <?php print $messages; ?>
        <?php print render($tabs); ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print $feed_icons; ?>
      </div>

      <?php if ($sidebar && !$hide_sidebar): ?>
      <aside id="sidebar" class="grid-1-4 left" role="sidebar">
        <?php print $sidebar; ?>
      </aside>
      <?php endif; ?>
    <?php endif; ?>
  </div>

  <footer id="footer" role="footer">
    <?php print render($page['footer']); ?>

    <div id="copyright">
      <div class="grid-1-2 left">
        &COPY; <?php print date('Y'); ?> <?php print t('All rights reserved'); ?>
      </div>

      <div class="grid-1-2 right">
        <a href="http://drupalife.com/" title="<?php print $drupalife_store; ?>" target="_blank"><?php print $drupalife_store; ?></a>
      </div>
    </div>
  </footer>
</div>