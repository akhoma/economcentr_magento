<?php
//exit("hgdgfdg");
$this->startSetup();

$this->addAttribute('catalog_category', 'is_cms_page_link', array(
    'group'         => 'General Information',
    'input'         => 'select',
    'type'          => 'int',
    'label'         => 'Is cms page link',
    'source'        => 'eav/entity_attribute_source_boolean',
    'default'       => Mage_Eav_Model_Entity_Attribute_Source_Boolean::VALUE_NO,
    'visible'       => true,
    'required'      => false,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'sort_order'    => 100,
));

$this->addAttribute('catalog_category', 'cms_page_link', array(
    'group'         => 'General Information',
    'input'         => 'select',
    'type'          => 'int',
    'label'         => 'Cms page link',
    'source'        => 'dev2k_cmsnavigation/resources_page',
    'default'       => Mage_Eav_Model_Entity_Attribute_Source_Boolean::VALUE_NO,
    'visible'       => true,
    'required'      => false,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'sort_order'    => 100,
));
