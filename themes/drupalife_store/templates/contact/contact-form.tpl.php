<?php
$text = render($form['intro']);
$name = render($form['field_contact_name']);
$email = render($form['field_contact_email']);
$message = render($form['field_contact_message']);
$actions = render($form['actions']);
$radio_example = render($form['field_radio_example']);
$checkbox_example = render($form['field_checkbox_example'])
?>

<div id="contact-form">
  <?php print $name; ?>
  <?php print $email; ?>
  <?php print $message; ?>
  <?php print $radio_example; ?>
  <?php print $checkbox_example; ?>
  <?php print $actions; ?>
</div>

<?php print $text; ?>
<?php print  drupal_render_children($form) ?>