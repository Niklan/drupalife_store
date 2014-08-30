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

  // Background image.
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
    '#default_value' => theme_get_setting('background_image_x'),
    '#options' => array(
      'left' => t('Left'),
      'center' => t('Center'),
      'right' => t('Right')
    ),
  );

  $form['bg']['background_image_y'] = array(
    '#type' => 'radios',
    '#title' => t('Vertical position'),
    '#default_value' => theme_get_setting('background_image_y'),
    '#options' => array(
      'top' => t('Top'),
      'center' => t('Center'),
      'bottom' => t('Bottom')
    ),
  );

  $form['bg']['background_image_size'] = array(
    '#type' => 'radios',
    '#title' => t('Image sizing'),
    '#default_value' => theme_get_setting('background_image_size'),
    '#options' => array(
      'auto' => t('Auto'),
      'cover' => t('Cover'),
      'contain' => t('Contain')
    ),
  );

  $form['bg']['background_image_repeat'] = array(
    '#type' => 'radios',
    '#title' => t('Image repeat'),
    '#default_value' => theme_get_setting('background_image_repeat'),
    '#options' => array(
      'no-repeat' => t('No repeat'),
      'repeat' => t('Repeat')
    ),
  );

  // Social networks.
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
    '#default_value' => theme_get_setting('social_vk'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => FALSE,
  );

  $form['theme_social_settings']['social_facebook'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook'),
    '#default_value' => theme_get_setting('social_facebook'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => FALSE,
  );

  $form['theme_social_settings']['social_google'] = array(
    '#type' => 'textfield',
    '#title' => t('Google'),
    '#default_value' => theme_get_setting('social_google'),
    '#size' => 60,
    '#maxlength' => 128,
    '#required' => FALSE,
  );

  $form['theme_social_settings']['social_twitter'] = array(
    '#type' => 'textfield',
    '#title' => t('Twitter'),
    '#default_value' => theme_get_setting('social_twitter'),
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

  // Developers settings.
  $form['developers_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Developers settings'),
    '#weight' => 6,
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['developers_settings']['rebuild_theme_registry'] = array(
    '#type' => 'checkbox',
    '#title' => t('Rebuild the theme registry on page reload.'),
    '#default_value' => theme_get_setting('rebuild_theme_registry'),
  );

  $form['developers_settings']['restyle_checkboxes'] = array(
    '#type' => 'checkbox',
    '#title' => t('Restyle the system checkboxes.'),
    '#description' => t('If checked checkboxes will be replaced with an html/css version, otherwise they will use the system default settings.'),
    '#default_value' => theme_get_setting('restyle_checkboxes'),
  );

  $form['developers_settings']['restyle_radios'] = array(
    '#type' => 'checkbox',
    '#title' => t('Restyle the system radio buttons.'),
    '#description' => t('If checked radio buttons will be replaced with an html/css version, otherwise they will use the system default settings.'),
    '#default_value' => theme_get_setting('restyle_radios'),
  );

  // Move default settings to our new fieldset.
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
  if ($form_state['values']['background_image']) {
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
    if (variable_get('drupalife_store_theme_background_image')) {
      $file = file_load(variable_get('drupalife_store_theme_background_image'));
      if ($file) {
        file_delete($file, TRUE);
        variable_del('drupalife_store_theme_background_image');
      }
    }
  }
}
