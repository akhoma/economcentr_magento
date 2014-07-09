<?php

/**
 * Create store views
 */

/* @var $this Hastens_Install_Model_Resource_Setup */

$websiteId = 1;
$website = Mage::getModel('core/website')->load($websiteId);
$rootId = $website->getDefaultStore()->getRootCategoryId();
$storeGroupDefault = Mage::getModel('core/store_group')->load(1);
$storeGroupDefault->setName('Default')
    ->save();
//Create Stores
$storesEurope = array(
    'uk_ua'    => 'Ukraine | Українська',
);

$website = Mage::getModel('core/website')->load($websiteId);
$groupsEurope = $website->getGroupCollection()->addFieldToFilter('name', 'Default');
$groupEuropeId = $groupsEurope->getFirstItem()->getId();
foreach ($storesEurope as $key => $value) {
    $store = Mage::getModel('core/store');
    $store->setCode($key)
        ->setWebsiteId($websiteId)
        ->setGroupId($groupEuropeId)
        ->setName($value)
        ->setIsActive(1)
        ->save();
}
