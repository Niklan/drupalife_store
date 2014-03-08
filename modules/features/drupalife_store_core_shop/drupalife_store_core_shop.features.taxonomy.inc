<?php
/**
 * @file
 * drupalife_store_core_shop.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function drupalife_store_core_shop_taxonomy_default_vocabularies() {
  $t = get_t();
  return array(
    'shop_category' => array(
      'name' => $t('Catalog categories'),
      'machine_name' => 'shop_category',
      'description' => '',
      'hierarchy' => 1,
      'module' => 'taxonomy',
      'weight' => 0,
      'rdf_mapping' => array(
        'rdftype' => array(
          0 => 'skos:ConceptScheme',
        ),
        'name' => array(
          'predicates' => array(
            0 => 'dc:title',
          ),
        ),
        'description' => array(
          'predicates' => array(
            0 => 'rdfs:comment',
          ),
        ),
      ),
    ),
  );
}
