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
}
