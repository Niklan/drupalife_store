<?php
/**
 * New checkbox styles.
 */
?>
<input
  id="<?php print render($element['#id']); ?>"
  name="<?php print render($element['#name']); ?>"
  value="<?php print render($element['#default_value']); ?>"
  class="form-checkbox dls-checkbox"
  type="checkbox"
  <?php $element['#checked'] ? print " checked='checked'" : ''; ?>
  <?php isset($element['#disabled']) && $element['#disabled'] ? print " disabled" : ''; ?>>

<label class="dls-checkbox-wrapper" for="<?php print render($element['#id']); ?>">
  <i class="icon-ok"></i>
</label>