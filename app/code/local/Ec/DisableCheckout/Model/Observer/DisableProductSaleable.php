<?php
/**
 * DisableProductSaleable Observer class
 *
 * @category   Ec
 * @package    Ec_DisableCheckout
 */
class Ec_DisableCheckout_Model_Observer_DisableProductSaleable extends Mage_Core_Model_Abstract
{
    /**
     * Disable Product Saleable. set it to false if checkout disabled
     *
     * @param Varien_Event_Observer $observer
     * @return $this
     */
    public function execute(Varien_Event_Observer $observer)
    {
        if (Mage::helper('ec_disablecheckout')->isCheckoutDisabled()) {
            $object = $observer->getSalable();
            $object->setIsSalable(false);
        }
    }
}
