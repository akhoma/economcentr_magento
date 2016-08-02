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

    /**
     * Get Is Home Page
     *
     * @return string
     */
    public function getIsHomePage()
    {
        $isHomePage = Mage::getBlockSingleton('page/html_header')->getIsHomePage();
        if (!$isHomePage) {
            // workaround for store switcher case
            // in this case native function doesn't work correctly
            $action = Mage::app()->getFrontController()->getAction()->getFullActionName();
            $isHomePage = ($action == 'cms_index_index') ? true : false;
        }

        return $isHomePage;
    }
}
