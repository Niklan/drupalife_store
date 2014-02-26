<?php
/**
 * @file
 * drupalife_store_contact.features.inc
 */

/**
 * Implements hook_default_entityform_type().
 */
function drupalife_store_contact_default_entityform_type() {
  $items = array();
  $items['contact'] = entity_import('entityform_type', '{
    "type" : "contact",
    "label" : "\\u041a\\u043e\\u043d\\u0442\\u0430\\u043a\\u0442\\u044b",
    "data" : {
      "draftable" : 0,
      "draft_button_text" : "",
      "draft_save_text" : { "value" : "", "format" : "full_html" },
      "submit_button_text" : "\\u041e\\u0442\\u043f\\u0440\\u0430\\u0432\\u0438\\u0442\\u044c",
      "submit_confirm_msg" : "",
      "your_submissions" : "",
      "disallow_resubmit_msg" : "",
      "delete_confirm_msg" : "",
      "page_title_view" : "",
      "preview_page" : 0,
      "submission_page_title" : "\\u0421\\u043e\\u043e\\u0431\\u0449\\u0435\\u043d\\u0438\\u0435 \\u0443\\u0441\\u043f\\u0435\\u0448\\u043d\\u043e \\u043e\\u0442\\u043f\\u0440\\u0430\\u0432\\u043b\\u0435\\u043d\\u043e",
      "submission_text" : {
        "value" : "\\u0412\\u0430\\u0448\\u0435 \\u043f\\u0438\\u0441\\u044c\\u043c\\u043e \\u0431\\u044b\\u043b\\u043e \\u0443\\u0441\\u043f\\u0435\\u0448\\u043d\\u043e \\u043e\\u0442\\u043f\\u0440\\u0430\\u0432\\u043b\\u0435\\u043d\\u043d\\u043e, \\u043c\\u044b \\u043e\\u0442\\u0432\\u0435\\u0442\\u0438\\u043c \\u043a\\u0430\\u043a \\u043c\\u043e\\u0436\\u043d\\u043e \\u0441\\u043a\\u043e\\u0440\\u0435\\u0435.",
        "format" : "full_html"
      },
      "submission_show_submitted" : 1,
      "submissions_view" : "default",
      "user_submissions_view" : "default",
      "form_status" : "ENTITYFORM_OPEN",
      "roles" : { "1" : "1", "2" : "2", "3" : "3" },
      "resubmit_action" : "new",
      "redirect_path" : "",
      "instruction_pre" : {
        "value" : "[mappy:google address:\\u0027\\u0433. \\u041f\\u0435\\u0440\\u043c\\u044c\\u0027 width:395 height:303 zoom:15]\\r\\n\\u003Cstrong\\u003E\\u0410\\u0434\\u0440\\u0435\\u0441:\\u003C\\/strong\\u003E \\u0433. \\u041f\\u0435\\u0440\\u043c\\u044c\\r\\n\\u003Cstrong\\u003E\\u0422\\u0435\\u043b\\u0435\\u0444\\u043e\\u043d:\\u003C\\/strong\\u003E +7 (999) 000-00-00",
        "format" : "full_html"
      }
    },
    "weight" : "0",
    "rdf_mapping" : [],
    "paths" : { "submit" : {
        "source" : "eform\\/submit\\/contact",
        "alias" : "contact",
        "language" : "und"
      }
    }
  }');
  return $items;
}
