<?php
/**
 * Class Ec_HomePageProducts_Block_HomePageProducts
 */
class Ec_HomePageProducts_Block_HomePageProducts extends Mage_Catalog_Block_Product_Abstract
{
    /**
     * Products
     *
     * @var array
     */
    protected $_products;

    protected function _construct()
    {
        $storeCode = Mage::app()->getStore()->getCode();
        $cacheKey = 'homepageproducts_' . $storeCode;
        $this->addData(array(
            'cache_lifetime' => 3600,
            'cache_tags'     => array(Mage_Catalog_Model_Product::CACHE_TAG),
            'cache_key'      => $cacheKey,
        ));
    }

    /**
     * Get products from home page products category
     *
     * @return array
     */
    public function getProducts()
    {
        if (null === $this->_products) {
            $category = Mage::getModel ('catalog/category')
                ->getCollection ()
                ->addAttributeToFilter ('url_key', 'home-page-products')
                ->getFirstItem();

            $products = $category
                ->getProductCollection()
                ->addAttributeToSelect ('*')
                ->getItems();

            $this->_products = $products;
        }

        return $this->_products;
    }

    /**
     * Check if add to cart button disabled
     *
     * @return array
     */
    public function isAddToCartDisabled()
    {
        return Mage::helper('ec_disablecheckout')->isCheckoutDisabled();
    }
}
