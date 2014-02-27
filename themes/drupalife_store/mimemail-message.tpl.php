<?php
/**
 * @file
 * HTML Mail template.
 *
 * Available variables:
 * - $recipient: The recipient of the message
 * - $subject: The message subject
 * - $body: The message body
 * - $css: Internal style sheets
 * - $module: The sending module
 * - $key: The message identifier
 */

  $site_name = variable_get('site_name', 'Message');
  $site_slogan = variable_get('site_slogan', FALSE);
  $theme_settings = variable_get('theme_drupalife_store_settings', FALSE);
  $color = !empty($theme_settings['palette']['main_color']) ? $theme_settings['palette']['main_color'] : '#8A73BB';
?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <body>
  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="width: 100% !important; font-family: sans-serif, serif; background-color: #ffffff; margin: 0; padding: 0;" bgcolor="white">
    <tbody>
    <tr>
      <td>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: <?php print $color;?>;" bgcolor="<?php print $color;?>">
          <tbody>
          <tr>
            <td>
              <table border="0" cellpadding="0" cellspacing="0" width="640px" align="center">
                <tbody>
                <tr>
                  <td>
                    <h1 style="line-height: 100% !important; -webkit-font-smoothing: antialiased; color: white; font-size: 23px; margin: 10px 0 5px">
                      <a href="#" target="_blank" style="color: white; text-decoration: none;"><?php print $site_name; ?></a>
                    </h1>
                    <?php if ($site_slogan) { ?>
                    <h2 style="line-height: 100% !important; -webkit-font-smoothing: antialiased; color: white; font-size: 16px; font-style: italic; margin: 5px 0 10px; font-weight: 400;"><?php print $site_slogan; ?></h2>
                    <?php } ?>
                  </td>
                </tr>
                </tbody>
              </table>
            </td>
          </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table border="0" cellpadding="0" cellspacing="0" width="640px" align="center" style="color: #545454; font-size: 14px; padding: 30px 0;">
          <tr>
            <td>
              <h2 style="border-bottom: 1px solid #E7E7E7; padding-bottom: 5px; color: #868686;"><?php print $subject; ?></h2>
              <?php print $body;?>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table border="0" cellpadding="0" cellspacing="0" width="640px" align="center" style="border-top-style: solid; border-top-color: #E9E9E9; border-top-width: 1px; font-style: italic; color: #545454; font-size: 12px; padding-top: 15px;">
          <tbody>
          <tr>
            <td>
              С уважением команда <?php print $site_name; ?>.
            </td>
          </tr>
          </tbody>
        </table>
      </td>
    </tr>
    </tbody>
  </table>
  </body>
</html>
