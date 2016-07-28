<?php
/**
 * Set payment and shipping methods
 */

$storeIdRu = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'default')->getFirstItem()->getStoreId();
$storeIdUa = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'uk_ua')->getFirstItem()->getStoreId();
// Payment
Mage::getConfig()->saveConfig('payment/cashondelivery/title', '', 'stores', $storeIdRu);
Mage::getConfig()->saveConfig('payment/cashondelivery/title', '', 'stores', $storeIdUa);
Mage::getConfig()->saveConfig('payment/cashondelivery/instructions', '<ul><li>Предоплата на карту</li><li>Наложный платеж</li></ul>', 'stores', $storeIdRu);
Mage::getConfig()->saveConfig('payment/cashondelivery/instructions', '<ul><li>Передплата на картку</li><li>Оплата при доставці</li></ul>', 'stores', $storeIdUa);
Mage::getConfig()->saveConfig('payment/cashondelivery/active', 1, 'default', 0);
Mage::getConfig()->saveConfig('payment/free/active', 0, 'default', 0);
Mage::getConfig()->saveConfig('payment/checkmo/active', 0, 'default', 0);
Mage::getConfig()->saveConfig('payment/ccsave/active', 0, 'default', 0);

// Shipping
Mage::getConfig()->saveConfig('carriers/flatrate/title', 'Новая почта,  Укр. почта или другая служба.', 'stores', $storeIdRu);
Mage::getConfig()->saveConfig('carriers/flatrate/title', 'Нова пошта,  Укр. пошта або інша служба', 'stores', $storeIdUa);
Mage::getConfig()->saveConfig('carriers/flatrate/name', 'Примерно', 'stores', $storeIdRu);
Mage::getConfig()->saveConfig('carriers/flatrate/name', 'Приблизно', 'stores', $storeIdUa);
Mage::getConfig()->saveConfig('carriers/flatrate/active', 1, 'default', 0);
Mage::getConfig()->saveConfig('carriers/flatrate/price', 35, 'default', 0);
Mage::getConfig()->saveConfig('carriers/flatrate/type', 'O', 'default', 0);
