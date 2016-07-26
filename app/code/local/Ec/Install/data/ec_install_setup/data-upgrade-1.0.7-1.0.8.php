<?php
/**
 * Set payment and shipping methods
 */

$storeIdRu = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'default')->getFirstItem()->getStoreId();
$storeIdUa = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'uk_ua')->getFirstItem()->getStoreId();
// Payment
Mage::getConfig()->saveConfig('payment/cashondelivery/title', 'Оплата при получении', 'stores', $storeIdRu);
Mage::getConfig()->saveConfig('payment/cashondelivery/title', 'Оплата при доставці', 'stores', $storeIdUa);
Mage::getConfig()->saveConfig('payment/cashondelivery/active', 1, 'default', 0);
Mage::getConfig()->saveConfig('payment/free/active', 0, 'default', 0);
Mage::getConfig()->saveConfig('payment/checkmo/active', 0, 'default', 0);
Mage::getConfig()->saveConfig('payment/ccsave/active', 0, 'default', 0);

// Shipping
Mage::getConfig()->saveConfig('carriers/flatrate/title', 'Фиксированная ставка', 'stores', $storeIdRu);
Mage::getConfig()->saveConfig('carriers/flatrate/title', 'Фіксована оплата', 'stores', $storeIdUa);
Mage::getConfig()->saveConfig('carriers/flatrate/name', 'Фиксироровано', 'stores', $storeIdRu);
Mage::getConfig()->saveConfig('carriers/flatrate/name', 'Фіксовано', 'stores', $storeIdUa);
Mage::getConfig()->saveConfig('carriers/flatrate/active', 1, 'default', 0);
Mage::getConfig()->saveConfig('carriers/flatrate/price', 35, 'default', 0);
Mage::getConfig()->saveConfig('carriers/flatrate/type', 'O', 'default', 0);