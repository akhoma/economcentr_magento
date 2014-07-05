<?php
/**
 * @category    Tukish
 * @package     Tukish_CmsHierarchy
 * @version     1.2.4
 * @copyright   Copyright (c) 2014 Tukish inc
 */
class Tukish_CmsHierarchy_Helper_Cms_Page extends Mage_Cms_Helper_Page
{
    public function renderPage(Mage_Core_Controller_Front_Action $action, $pageId = null)
    {
        $storeId = Mage::app()->getStore()->getId();
        $customerGroupId = Mage::getSingleton('customer/session')->getCustomerGroupId();
        if (!$this->isAllowed($storeId, $customerGroupId, $pageId)) {
            $redirectPageId = Mage::getStoreConfig('tukish_cmshierarchy/general/cms_not_allowed_page');
            if ($redirectPageId && $redirectPageId != $pageId && !Mage::registry('cms_page_not_allowed_redirect')) {
                Mage::register('cms_page_not_allowed_redirect', true); // avoid infinite loop

                return $this->renderPage($action, $redirectPageId);
            }

            return false;
        }

        return parent::renderPage($action, $pageId);
    }

    public function isAllowed($storeId, $customerGroupId, $pageId)
    {
        $page = Mage::getModel('cms/page')->load($pageId);
        if ($page->getStoreId() == 0 && !in_array($storeId, $page->getStores())) {
            return false;
        }

        if (!$this->isPermissionsEnabled($storeId)) {
            return true;
        }

        return Mage::getResourceModel('cms/page_permission')->exists($storeId, $customerGroupId, $pageId);
    }

    public function isPermissionsEnabled($store = null)
    {
        return Mage::getStoreConfigFlag('tukish_cmshierarchy/general/permissions_enabled', Mage::app()->getStore($store));
    }

    public function isCreatePermanentRedirects($store = null)
    {
        return Mage::getStoreConfigFlag('tukish_cmshierarchy/general/save_rewrites_history', Mage::app()->getStore($store));
    }
}