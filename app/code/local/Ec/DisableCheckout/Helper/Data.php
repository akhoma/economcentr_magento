<?php
/**
 * Helper class
 *
 * @category   Ec
 * @package    Ec_DisableCheckout
 */
class Ec_DisableCheckout_Helper_Data extends Mage_Core_Helper_Abstract
{

    /**
     * Path to disable checkout
     */
    const XML_PATH_TO_DISABLE_CHECKOUT = 'ec_disable_checkout/settings/disable_checkout';

    /**
     * Is Checkout Disabled
     *
     * @param null|bool|int|Mage_Core_Model_Store $store $store
     * @return bool
     */
    public function isCheckoutDisabled($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_TO_DISABLE_CHECKOUT, $store);
    }
}
