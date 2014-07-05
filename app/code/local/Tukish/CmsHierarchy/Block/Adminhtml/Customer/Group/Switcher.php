<?php
/**
 * @category    Tukish
 * @package     Tukish_CmsHierarchy
 * @version     1.2.4
 * @copyright   Copyright (c) 2014 Tukish inc
 */
class Tukish_CmsHierarchy_Block_Adminhtml_Customer_Group_Switcher extends Mage_Adminhtml_Block_Template
{
    public function getCustomerGroupId()
    {
        return $this->getRequest()->getParam('group');
    }

    public function getCustomerGroups()
    {
        return Mage::getModel('customer/group')->getCollection();
    }

    public function getSwitchUrl()
    {
        if ($url = $this->getData('switch_url')) {
            return $url;
        }

        return $this->getUrl('*/*/*', array('_current' => true, 'group' => null));
    }
}