<?php
/**
 * Ec_DisableCheckout_Block_Catalog_Product_Price block
 *
 * @category   Ec
 * @package    Ec_DisableCheckout
 */
class Ec_DisableCheckout_Block_Catalog_Product_Price extends Mage_Catalog_Block_Product_Price
{
    /**
     * Render block HTML
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (Mage::helper('ec_disablecheckout')->isZeroPriceHidden()
            && (floatval($this->getProduct()->getPrice()) == 0)
        ) {
            return '';
        }

        return parent::_toHtml();
    }
}
