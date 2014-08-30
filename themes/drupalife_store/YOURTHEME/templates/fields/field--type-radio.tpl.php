<?php
/**
 * New radio styles.
 */
?>
<input
  id="<?php print render($element['#id']); ?>"
  name="<?php print render($element['#name']); ?>"
  value="<?php print render($element['#return_value']); ?>"
  class="form-radio dls-radio"
  type="radio"
  <?php $element['#return_value'] == $element['#default_value']? print " checked='checked'" : ''; ?>
  <?php isset($element['#disabled']) && $element['#disabled'] ? print " disabled" : ''; ?>>

<label class="dls-radio-wrapper" for="<?php print render($element['#id']); ?>">
  <div class="dls-radio-mark"></div>
</label>