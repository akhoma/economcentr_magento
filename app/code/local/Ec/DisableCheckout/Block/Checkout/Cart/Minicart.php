<?php
/**
 * Ec_DisableCheckout_Block_Checkout_Cart_Minicart block
 *
 * @category   Ec
 * @package    Ec_DisableCheckout
 */
class Ec_DisableCheckout_Block_Checkout_Cart_Minicart extends Mage_Checkout_Block_Cart_Minicart
{
    /**
     * Render block HTML
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (Mage::helper('ec_disablecheckout')->isCheckoutDisabled()) {
            return '';
        }

       return parent::_toHtml();
    }
}
