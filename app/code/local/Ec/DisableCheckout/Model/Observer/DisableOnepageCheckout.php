<?php
/**
 * DisableOnepageCheckout Observer class
 *
 * @category   Ec
 * @package    Ec_DisableCheckout
 */
class Ec_DisableCheckout_Model_Observer_DisableOnepageCheckout extends Mage_Core_Model_Abstract
{
    /**
     * Disable Onepage Checkout. Redirect to home page
     *
     * @param Varien_Event_Observer $observer
     * @return $this
     */
    public function execute(Varien_Event_Observer $observer)
    {
        if (Mage::helper('ec_disablecheckout')->isCheckoutDisabled()) {
            Mage::app()->getResponse()->setRedirect(Mage::getBaseUrl());
        }
    }
}
