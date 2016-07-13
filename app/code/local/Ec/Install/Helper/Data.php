<?php
/**
 * Helper class
 *
 * @category   Ec
 * @package    Ec_Install
 */
class Ec_Install_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Get Header Phones
     *
     * @return string
     */
    public function getHeaderShopPhones()
    {
        return Mage::getModel('core/variable')
            ->setStoreId(Mage::app()->getStore()->getStoreId())
            ->loadByCode('shop-phone')
            ->getValue('html');
    }

    /**
     * Get Header Phones
     *
     * @return string
     */
    public function getHeaderShopAddress()
    {
        return Mage::getModel('core/variable')
            ->setStoreId(Mage::app()->getStore()->getStoreId())
            ->loadByCode('shop-address')
            ->getValue('html');
    }
}
