<?php
/**
 * Set locales (languages) for stores
 *
 */

/** @var $this Mage_Core_Model_Resource_Setup */

$installer = $this;
$config = new Mage_Core_Model_Config();
$stores = Mage::getModel('core/store')->getCollection();
foreach ($stores as $store) {
    $code = $store->getCode();
    switch ($code) {
        case 'uk_ua':
            $config->saveConfig('general/locale/code', 'uk_UA', 'stores', $store->getId());
            break;
        case 'default':
            $config->saveConfig('general/locale/code', 'ru_RU', 'stores', $store->getId());
            $store->setName('Russian | Руccкий')
                ->save();
            break;
    }
}
