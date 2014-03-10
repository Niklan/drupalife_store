<?php
/**
 * Implements hook_form_system_theme_settings_alter().
 */
function drupalife_store_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL)  {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  $form['bg'] = array(
    '#type' => 'fieldset',
    '#title' => t('Background'),
    '#weight' => 3,
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  // Фоновое изображение.
  $form['bg']['background_image'] = array(
    '#title' => t('Background image'),
    '#type' => 'managed_file',
    '#required' => FALSE,
    '#default_value' => theme_get_setting('background_image'),
    '#upload_location' => 'public://theme_settings',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
    ),
  );

  $form['bg']['background_image_x'] = array(
    '#type' => 'radios',
    '#title' => t('Horizontal position'),
    '#default_value' => theme_get_setting('background_image_x') ? theme_get_setting('background_image_x') : 'center',
    '#options' => array(
      'left' => t('Left'),
      'center' => t('Center'),
      'right' => t('Right')
    ),
  );

  $form['bg']['background_image_y'] = array(
    '#type' => 'radios',
    '#title' => t('Vertical position'),
    '#default_value' => theme_get_setting('background_image_y') ? theme_get_setting('background_image_y') : 'center',
    '#options' => array(
      'top' => t('Top'),
      'center' => t('Center'),
      'bottom' => t('Bottom')
    ),
  );

  $form['bg']['background_image_size'] = array(
    '#type' => 'radios',
    '#title' => t('Image sizing'),
    '#default_value' => theme_get_setting('background_image_size') ? theme_get_setting('background_image_size') : 'auto',
    '#options' => array(
      'auto' => t('Auto'),
      'cover' => t('Cover'),
      'contain' => t('Contain')
    ),
  );

  $form['bg']['background_image_repeat'] = array(
    '#type' => 'radios',
    '#title' => t('Image repeat'),
    '#default_value' => theme_get_setting('background_image_repeat') ? theme_get_setting('background_image_repeat') : 'no-repeat',
    '#options' => array(
      'no-repeat' => t('No repeat'),
      'repeat' => t('Repeat')
    ),
  );

  // Соц. сети.
  $form['theme_social_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social settings'),
    '#weight' => 4,
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['theme_social_settings']['social_vk'] = array(
    '#type' => 'textfield',
    '#title' => t('VK'),
    '#default_value' => theme_get_setting('social_vk') ? theme_get_setting('social_vk') : '',
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => FALSE,
  );

  $form['theme_social_settings']['social_facebook'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook'),
    '#default_value' => theme_get_setting('social_facebook') ? theme_get_setting('social_facebook') : '',
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => FALSE,
  );

  $form['theme_social_settings']['social_google'] = array(
    '#type' => 'textfield',
    '#title' => t('Google'),
    '#default_value' => theme_get_setting('social_google') ? theme_get_setting('social_google') : '',
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => FALSE,
  );

  $form['theme_social_settings']['social_twitter'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter'),
    '#default_value' => theme_get_setting('social_twitter') ? theme_get_setting('social_twitter') : '',
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => FALSE,
  );

  $form['theme_settings_fieldset'] = array(
    '#type' => 'fieldset',
    '#title' => t('Default theme settings'),
    '#weight' => 5,
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  // Переносим дефолтные настройки в наш филдсет.
  $form['theme_settings_fieldset']['theme_settings'] = $form['theme_settings'];
  unset($form['theme_settings']);
  $form['theme_settings_fieldset']['logo'] = $form['logo'];
  unset($form['logo']);
  $form['theme_settings_fieldset']['favicon'] = $form['favicon'];
  unset($form['favicon']);

  // We hide some unnecessary settings.
  hide($form['themedev']);
  hide($form['support']);
  hide($form['breadcrumb']);

  // This is some workaround for allow submit theme form with managed_file.
  $theme = $GLOBALS['theme_key'];
  $themes = list_themes();
  $form_state['build_info']['files'][] = str_replace("/$theme.info", '', $themes[$theme]->filename) . '/theme-settings.php';
  $form['#submit'][] = 'drupalife_store_theme_settings_form_submit';
}

function drupalife_store_theme_settings_form_submit($form, &$form_state) {
  global $user;

  // Save image.
  if (is_numeric($form_state['values']['background_image']) && $form_state['values']['background_image'] > 0) {
    // Load file
    $file = file_load($form_state['values']['background_image']);
    if ($file) {
      // Change status to permanent.
      $file->status = FILE_STATUS_PERMANENT;
      // Save image.
      file_save($file);
      // Save file id to variable, it's provide to us possible to delete file.
      variable_set('drupalife_store_theme_background_image', $file->fid);
      // Set file usage to user, who upload it.
      file_usage_add($file, 'user', 'user', $user->uid);
    }
  }
  else {
    // We goes here if file is not uploaded or removed on this submit.
    $file = file_load(variable_get('drupalife_store_theme_background_image'));
    if ($file) {
      file_delete($file, TRUE);
      variable_del('drupalife_store_theme_background_image');
    }
  }
}
