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
     * Cols
     *
     * @var array
     */
    private $_cols = array(
        'Категория товара',
        'Производитель',
        'Наименование  товара',
        'Код товара (артикул производителя)',
        'id товара',
        'Описание товара',
        'Цена розн., грн.',
        'Гарантия',
        'Наличие',
        'Состояние',
        'Ссылка на товар',
        'Ссылка на изображение'
    );


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

        $hotlineDefaultCategory = Mage::helper('ec_hotline')->getHotlineDefaultCategory();
        $hotlineDefaultBrand = Mage::helper('ec_hotline')->getHotlineDefaultBrand();

        $data = array();
        $data[] = $this->_cols;
        foreach($products as $product) {
            $dataItem = array();
            $dataItem[0] = $product->getData('hotline_category') ?: $hotlineDefaultCategory;
            $dataItem[1] = $product->getData('hotline_brand') ?:  $hotlineDefaultBrand;
            $dataItem[2] = $product->getName();
            $dataItem[3] = $product->getSku();
            $dataItem[4] = $product->getId();
            $dataItem[5] = $product->getDescription();
            $dataItem[6] = $product->getPrice();
            $dataItem[7] = '12';
            $dataItem[8] = $product->isSaleable() ? 'в наличии' : 'под заказ';
            $dataItem[9] = '1';
            $dataItem[10] = $product->getProductUrl();
            $dataItem[11] = Mage::helper('catalog/image')->init($product, 'thumbnail');
            $data[] = $dataItem;
        }

        $output = '';
        $textDelimiter = '"';
        $dataSeparator = ',';
        foreach($data as $dataItem) {
            foreach ($dataItem as &$itemValue) {
                $itemValue = $textDelimiter . $itemValue . $textDelimiter;
            }
            $output .= implode($dataSeparator, $dataItem) . PHP_EOL;
        }

        return $output;
    }
}
