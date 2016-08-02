<?php
/**
 * AddMessagesToReviewProductListPage Observer class
 *
 * @category   Ec
 * @package    Ec_Install
 */
class Ec_Install_Model_Observer_AddMessagesToReviewProductListPage extends Mage_Core_Model_Abstract
{
    /**
     * Add Messages To Review Product List Page
     *
     * @param Varien_Event_Observer $observer
     * @return $this
     */
    public function execute(Varien_Event_Observer $observer)
    {
        $layout = Mage::getSingleton('core/layout');
        $storageName = 'catalog/session';
        $storage = Mage::getSingleton($storageName);
        if ($storage) {
            $block = $layout->getMessagesBlock();
            $block->addMessages($storage->getMessages(true));
            $block->setEscapeMessageFlag($storage->getEscapeMessages(true));
            $block->addStorageType($storageName);
        }

    }
}
