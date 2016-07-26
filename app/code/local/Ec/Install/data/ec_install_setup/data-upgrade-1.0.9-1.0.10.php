<?php
/**
 * SetUp store information
 */

Mage::getConfig()->saveConfig('general/country/default', 'UA', 'default', 0);
Mage::getConfig()->saveConfig('general/country/allow', 'UA', 'default', 0);
Mage::getConfig()->saveConfig('general/locale/firstday', '1', 'default', 0);
Mage::getConfig()->saveConfig('general/locale/timezone', 'Europe/Minsk', 'default', 0);

Mage::getConfig()->saveConfig('general/store_information/name', 'Econom Centr', 'default', 0);
Mage::getConfig()->saveConfig('general/store_information/phone', '+38 (099) 325 29 33, +38 (050) 372 71 88', 'default', 0);
Mage::getConfig()->saveConfig('general/store_information/merchant_country', 'UA', 'default', 0);

$storeIdRu = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'default')->getFirstItem()->getStoreId();
$storeIdUa = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'uk_ua')->getFirstItem()->getStoreId();

Mage::getConfig()->saveConfig('general/store_information/address', 'Ukraine, Uzhgorod, Trudova st. 2', 'default', 0);
Mage::getConfig()->saveConfig('general/store_information/address', 'ул. Трудова, 2, Ужгород, Украина', 'stores', $storeIdRu);
Mage::getConfig()->saveConfig('general/store_information/address', 'вул. Трудова, 2, Ужгород, Україна', 'stores', $storeIdUa);
