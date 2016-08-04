<?php
$this->startSetup();
$setup = Mage::getModel('eav/entity_setup', 'core_setup');
$setup->addAttribute('catalog_product', 'hotline_brand', array(
    'group'             => 'General',
    'input'             => 'text',
    'type'              => Varien_Db_Ddl_Table::TYPE_TEXT,
    'label'             => 'Hotline Brand',
    'required'          => '0',
    'is_configurable'   => '0',
    'global'            => '0',
    'visible'           => '1',
    'sort_order'        => 100000
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
    'hotline_brand',
    '4'
);

$this->endSetup();
