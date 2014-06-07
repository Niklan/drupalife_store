(function ($) {
    Drupal.color = {
        callback: function(context, settings, form, farb, height, width) {
            $('.pseudo-link-1, #cart, #main-menu', form).css('background', $('#palette input[name="palette[main_color]"]', form).val())
        }
    }
})(jQuery);