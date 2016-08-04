<?php
$setup = Mage::getModel('eav/entity_setup', 'core_setup');
$setup->startSetup();

$setup->addAttribute('catalog_product', 'hotline_category', array(
    'group'         => 'General',
    'input'         => 'select',
    'type'          => Varien_Db_Ddl_Table::TYPE_TEXT,
    'source'        => 'ec_hotline/source_hotlineCategories',
    'label'         => 'Hotline category',
    'backend'       => '',
    'visible'       => 1,
    'required'      => 0,
    'user_defined'  => 1,
    'sort_order'    => 100000,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$entityTypeId = $setup->getEntityTypeId('catalog_product');

$attributeSetId   = Mage::getModel('eav/entity_attribute_set')
    ->getCollection()
    ->addFieldToFilter('entity_type_id', $entityTypeId)
    ->getFirstItem()
    ->getId();

$attributeGroupId = Mage::getModel('eav/entity_attribute_group')
    ->getResourceCollection()
    ->setAttributeSetFilter($attributeSetId)
    ->addFieldToFilter('attribute_group_name', 'General')
    ->getFirstItem()
    ->getId();

$setup->addAttributeToGroup(
    $entityTypeId,
    $attributeSetId,
    $attributeGroupId,
    'hotline_category',
    '4'
);

$setup->endSetup();
