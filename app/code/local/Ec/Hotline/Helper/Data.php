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
     * Path to hotline default category
     */
    const XML_PATH_TO_HOTLINE_DEFAULT_CATEGORY = 'ec_hotline/settings/hotline_default_category';

    /**
     * Path to hotline default brand
     */
    const XML_PATH_TO_HOTLINE_DEFAULT_BRAND= 'ec_hotline/settings/hotline_default_brand';

    /**
     * Get Products Category Id
     *
     * @return string
     */
    public function getProductsCategoryId()
    {
        return Mage::getStoreConfig(self::XML_PATH_TO_PRODUCTS_CATEGORY_ID);
    }

    /**
     * Get hotline default category
     *
     * @return string
     */
    public function getHotlineDefaultCategory()
    {
        return Mage::getStoreConfig(self::XML_PATH_TO_HOTLINE_DEFAULT_CATEGORY);
    }

    /**
     * Get hotline default brand
     *
     * @return string
     */
    public function getHotlineDefaultBrand()
    {
        return Mage::getStoreConfig(self::XML_PATH_TO_HOTLINE_DEFAULT_BRAND);
    }
}
