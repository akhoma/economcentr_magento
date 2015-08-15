<?php
require_once 'abstract.php';
/**
 * @category    Mage
 * @package     Mage_Shell
 */
//@startSkipCommitHooks


function xmlstr_to_array($xmlstr) {
  $doc = new DOMDocument();
  $doc->loadXML($xmlstr);
  return domnode_to_array($doc->documentElement);
}

function domnode_to_array($node) {
  $output = array();
  switch ($node->nodeType) {
   case XML_CDATA_SECTION_NODE:
   case XML_TEXT_NODE:
    $output = trim($node->textContent);
   break;
   case XML_ELEMENT_NODE:
    for ($i=0, $m=$node->childNodes->length; $i<$m; $i++) { 
     $child = $node->childNodes->item($i);
     $v = domnode_to_array($child);
     if(isset($child->tagName)) {
       $t = $child->tagName;
       if(!isset($output[$t])) {
        $output[$t] = array();
       }
       $output[$t][] = $v;
     }
     elseif($v) {
      $output = (string) $v;
     }
    }
    if(is_array($output)) {
     if($node->attributes->length) {
      $a = array();
      foreach($node->attributes as $attrName => $attrNode) {
       $a[$attrName] = (string) $attrNode->value;
      }
      $output['@attributes'] = $a;
     }
     foreach ($output as $t => $v) {
      if(is_array($v) && count($v)==1 && $t!='@attributes') {
       $output[$t] = $v[0];
      }
     }
    }
   break;
  }
  return $output;
}



class Mage_Shell_Import_Products extends Mage_Shell_Abstract
{

    const FILE_NAME = 'import/xml_products.xml';
    const IMAGES_PATH = 'import/images';

    /**
     * Get products data from file
     */
    private function _getProductsData()
    {

        $fileName = dirname(__FILE__) . DS . self::FILE_NAME;
        $data = file_get_contents($fileName);
        $dataArray = xmlstr_to_array($data);

        $products = array();
        $defaultProductSku = 50000;
        foreach ($dataArray['node'] as $node) {

            $productData['sku'] = $node['field_product_sku']['und']['n0']['value'];
            $existProduct = Mage::getModel('catalog/product')->loadByAttribute('sku', $productData['sku']);
            while (!$productData['sku'] || $existProduct) {
                $productData['sku'] = $defaultProductSku;
                $existProduct = Mage::getModel('catalog/product')->loadByAttribute('sku', $productData['sku']);
                $defaultProductSku++;
            }


            $productData['title'] = $node['title'];
            $productData['description'] = '&nbsp;';
            $price = $node['field_product_price']['und']['n0']['value'];
            $productData['price'] =  $price ? $price : 0;
            $productData['image'] = $node['field_product_image']['und']['n0']['filename'];

            $products[] = $productData;
        }

        return $products;
    }

    private function createProduct($productData)
    {
        Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);
        $product = Mage::getModel('catalog/product');
        
        try {
            $product
                ->setWebsiteIds(array(1)) //website ID the product is assigned to, as an array
                ->setAttributeSetId(4) //ID of a attribute set named 'default'
                ->setTypeId('simple') //product type
                ->setCreatedAt(strtotime('now')) //product creation time    
                ->setSku($productData['sku']) //SKU
                ->setName($productData['title']) //product name
                ->setWeight(0)
                ->setStatus(1) //product status (1 - enabled, 2 - disabled)
                ->setTaxClassId(0) //tax class (0 - none, 1 - default, 2 - taxable, 4 - shipping)
                ->setVisibility(Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH) //catalog and search visibility
                ->setPrice($productData['price']) //price in form 11.22
                ->setMetaTitle($productData['title'])
                ->setMetaKeyword($productData['title'])
                ->setMetaDescription($productData['title'])
                ->setDescription($productData['description'])
                ->setShortDescription($productData['description'])
                ->setStockData(array(
                                   'use_config_manage_stock' => 0, //'Use config settings' checkbox
                                   'manage_stock'=>1, //manage stock
                                   'is_in_stock' => 1, //Stock Availability
                                   'qty' => 999 //qty
                               )
                )
             
                ->setCategoryIds(array(2,3)); //assign product to categories


                if ($productData['image1']) {
                    $product->setMediaGallery (array('images'=>array (), 'values'=>array ())) //media gallery initialization
                        ->addImageToMediaGallery(dirname(__FILE__) . DS . self::IMAGES_PATH . DS . $productData['image'], array('image','thumbnail','small_image'), false, false);
                }

            $product->save();
            echo $productData['sku'] . ': imported' . PHP_EOL ;
        } catch (Exception $e) {
            echo $productData['sku'] . ': Error!!!!!!!!' . PHP_EOL ;
            Mage::log($productData['sku'] . ': ' . $e->getMessage(), null, 'importProducts.log');
        }

      //  exit('IMPORTED 1');
    }


    /**
     * Import products
     */
    private function _importProducts()
    {
        $products = $this->_getProductsData();
        foreach ($products as $product) {
            $this->createProduct($product);
        }
    }

    /**
     * Run
     */
    public function run()
    {
        $start = microtime(true);

        $this->_importProducts();

        $end = microtime(true);
        $time = $end - $start;
        echo PHP_EOL;
        echo 'Script Start: ' . date('H:i:s', $start) . PHP_EOL;
        echo 'Script End: ' . date('H:i:s', $end) . PHP_EOL;
        echo 'Duration: ' . number_format($time, 3) . ' sec' . PHP_EOL;
    }
}

if (php_sapi_name() != 'cli') {
    exit('Run it from cli.');
}

$shell = new Mage_Shell_Import_Products();
$shell->run();

//@finishSkipCommitHooks
