<?php
// Мы рендерим сайдбар чтобы узнать, есть ли там блоки или нет.
$sidebar  = render($page['sidebar_first']);
// В зависимости от того, есть ли сайдбар или нет, мы меняем класс у
// основного контента, чтобы растянуть его на всю ширину в случае отсутствия
// сайдбара.
if ($sidebar) {
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
        <?php if ($logged_in): ?>
          <a href="/user">Мой профиль</a> | <a href="/user/<?php print $user->uid; ?>/orders">Мои заказы</a>
        <?php else: ?>
          Добро пожаловать, вы можете <a href="/user">авторизоваться</a> или <a href="/user/register">зарегистрироваться</a> на сайте.
        <?php endif; ?>
      </div>

      <div id="socials" class="grid-1-3 right">
        <?php
        // Выводим соц. кнопки на основе настроек темы.
        if ($vk = theme_get_setting('social_vk')) {
          print "<a href='{$vk}' target='_blank' class='social vk'>&nbsp;</a>";
        }
        if ($fb = theme_get_setting('social_facebook')) {
          print "<a href='{$fb}' target='_blank' class='social fb'>&nbsp;</a>";
        }
        if ($ggl = theme_get_setting('social_google')) {
          print "<a href='{$ggl}' target='_blank' class='social ggl'>&nbsp;</a>";
        }
        if ($tw = theme_get_setting('social_twitter')) {
          print "<a href='{$tw}' target='_blank' class='social twitter'>&nbsp;</a>";
        }
        ?>
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
        <?php
        $site_search = variable_get('drupalife_store_selected_search');

        if ($site_search == 'default') {
          $block = module_invoke('search', 'block_view', 0);
          $block['content']['actions']['submit']['#value'] = "";
          $block['content']['search_block_form']['#attributes'] = array('placeholder' => 'Введите поисковый запрос');
          echo render($block['content']);
        }
        else if ($site_search == 'search_api') {
          if (arg(0) == 'search') {
            $default_query = isset($_GET['s']) ? $_GET['s'] : '';
          }
        ?>
          <form action="/search" id="search-api-header">
            <input name="s" value="<?php isset($default_query) ? print $default_query : print ''; ?>" maxlength="128" class="form-text" type="text" placeholder="Введите поисковый запрос">
            <div class="submit-wrapper"><input type="submit" value=""></div>
          </form>
        <?php } ?>
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

      <aside id="sidebar" class="grid-1-4 left" role="sidebar">
        <?php print $sidebar; ?>
      </aside>
    <?php endif; ?>
  </div>

  <footer id="footer" role="footer">
    <?php print render($page['footer']); ?>

    <div id="copyright">
      <div class="grid-1-2 left">
        &COPY; <?php print date('Y'); ?> Все права защищены.
      </div>

      <div class="grid-1-2 right">
        <a href="http://drupalife.com/" title="Создано на основе Drupalife Store" target="_blank">Создано на основе Drupalife Store</a>
      </div>
    </div>
  </footer>
</div>