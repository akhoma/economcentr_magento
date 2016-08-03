<?php
/**
 * Helper class
 *
 * @category   Ec
 * @package    Ec_Hotline
 */
class Ec_Hotline_Helper_Data extends Mage_Core_Helper_Abstract
{

    /**
     * Path to products category id
     */
    const XML_PATH_TO_PRODUCTS_CATEGORY_ID = 'ec_hotline/settings/products_category_id';


    /**
     * Get Products Category Id
     *
     * @return string
     */
    public function getProductsCategoryId()
    {
        return Mage::getStoreConfig(self::XML_PATH_TO_PRODUCTS_CATEGORY_ID);
    }
}
