<?php
/**
 * Ec_Hotline_Model_Product_Export class
 *
 * @category   Ec
 * @package    Ec_Hotline
 */
class Ec_Hotline_Model_Product_Export extends Varien_Object
{

    /**
     * Disable Cart. Redirect to home page
     *
     * @param Varien_Event_Observer $observer
     * @return $this
     */
    public function export(Varien_Event_Observer $observer)
    {
        $catId = Mage::helper('ec_hotline')->getProductsCategoryId();
        $a = 1;
    }
}
