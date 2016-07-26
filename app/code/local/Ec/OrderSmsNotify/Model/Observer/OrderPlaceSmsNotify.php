<?php
/**
 * OrderPlaceSmsNotify Observer class
 *
 * @category   Ec
 * @package    Ec_OrderSmsNotify
 */
class Ec_OrderSmsNotify_Model_Observer_OrderPlaceSmsNotify extends Mage_Core_Model_Abstract
{
    /**
     * Send sms notification after order placing
     *
     * @param Varien_Event_Observer $observer
     * @return $this
     */
    public function execute(Varien_Event_Observer $observer)
    {
        $configHelper = Mage::helper('ec_ordersmsnotify/config');
        if ($configHelper->isOrderSmsNotifyEnabled()) {
            /** @var $order Mage_Sales_Model_Order */
            $order = $observer->getOrder();
            $orderId = $order->getRealOrderId();
            $message = $configHelper->__("New Order #%s", $orderId);
            $sms = Mage::getModel('ec_ordersmsnotify/sms');
            $sms->setMessage($message);
            $sms->send();
        }
    }
}
