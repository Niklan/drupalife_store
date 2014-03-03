/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {
    $(document).ready(function() {
        // Generate select menu for mobile phones.
        $("<select />").appendTo("#main-menu");

        $("<option />", {
            "selected": "selected",
            "value" : "",
            "text" : "Навигация по сайту"
        }).appendTo("nav select");

        $("nav a").each(function() {
            var el = $(this);
            $("<option />", {
                "value" : el.attr("href"),
                "text" : el.text()
            }).appendTo("nav select");
        });

        $("nav select").change(function() {
            window.location = $(this).find("option:selected").val();
        });
    });

})(jQuery, Drupal, this, this.document);