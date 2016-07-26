<?php
/**
 * Set welcome messages
 */

$storeIdRu = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'default')->getFirstItem()->getStoreId();
$storeIdUa = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'uk_ua')->getFirstItem()->getStoreId();

Mage::getConfig()->saveConfig('design/header/welcome', 'Приветствуем Вас на нашем сайте!', 'stores', $storeIdRu);
Mage::getConfig()->saveConfig('design/header/welcome', 'Вітаємо Вас на нашому сайті!', 'stores', $storeIdUa);
