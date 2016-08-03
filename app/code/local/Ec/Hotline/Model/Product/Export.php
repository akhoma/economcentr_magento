<?php
/**
 * Ec_Hotline_Model_Product_Export class
 *
 * @category   Ec
 * @package    Ec_Hotline
 */
class Ec_Hotline_Model_Product_Export extends Varien_Object
{

    /**
     * Get csv data for export
     *
     * @return string
     */
    public function getCsvData()
    {
        $catId = Mage::helper('ec_hotline')->getProductsCategoryId()
               ?: Mage::app()->getStore(1)->getRootCategoryId();;
        $category = Mage::getModel('catalog/category')
            ->setStoreId(Mage::app()->getStore()->getId())
            ->load($catId);

        $products = $category
            ->getProductCollection()
            ->addAttributeToSelect ('*')
            ->getItems();

        $output = '';
        foreach($products as $product) {
            $output .= ',' . $product->getName();
        }
        return $output;
    }
}
