<?php
/**
 * Helper class
 *
 * @category   Ec
 * @package    Ec_OrderSmsNotify
 */
class Ec_OrderSmsNotify_Helper_Config extends Mage_Core_Helper_Abstract
{

    /**
     * Path to enable order sms notify
     */
    const XML_PATH_TO_ORDER_SMS_NOTIFY_ENABLE = 'ec_order_sms_notify/settings/enable';

    /**
     * Path to order sms notify login
     */
    const XML_PATH_TO_ORDER_SMS_NOTIFY_LOGIN = 'ec_order_sms_notify/settings/login';

    /**
     * Path to order sms notify password
     */
    const XML_PATH_TO_ORDER_SMS_NOTIFY_PASSWORD = 'ec_order_sms_notify/settings/password';

    /**
     * Path to order sms notify sender
     */
    const XML_PATH_TO_ORDER_SMS_NOTIFY_SENDER = 'ec_order_sms_notify/settings/sender';

    /**
     * Path to order sms notify phones
     */
    const XML_PATH_TO_ORDER_SMS_NOTIFY_PHONES = 'ec_order_sms_notify/settings/phones';

    /**
     * Is Order Sms Notify Enabled
     *
     * @param null|bool|int|Mage_Core_Model_Store $store $store
     * @return bool
     */
    public function isOrderSmsNotifyEnabled($store = null)
    {
        return (bool)Mage::getStoreConfig(self::XML_PATH_TO_ORDER_SMS_NOTIFY_ENABLE, $store);
    }

    /**
     * Get login
     *
     * @param null|bool|int|Mage_Core_Model_Store $store $store
     * @return string
     */
    public function getLogin($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_TO_ORDER_SMS_NOTIFY_LOGIN, $store);
    }

    /**
     * Get password
     *
     * @param null|bool|int|Mage_Core_Model_Store $store $store
     * @return string
     */
    public function getPassword($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_TO_ORDER_SMS_NOTIFY_PASSWORD, $store);
    }

    /**
     * Get sender
     *
     * @param null|bool|int|Mage_Core_Model_Store $store $store
     * @return string
     */
    public function getSender($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_TO_ORDER_SMS_NOTIFY_SENDER, $store);
    }

    /**
     * Get phones
     *
     * @param null|bool|int|Mage_Core_Model_Store $store $store
     * @return string
     */
    public function getPhones($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_TO_ORDER_SMS_NOTIFY_PHONES, $store);
    }
}
