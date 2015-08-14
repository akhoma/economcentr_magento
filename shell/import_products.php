<?php
require_once 'abstract.php';
/**
 * @category    Mage
 * @package     Mage_Shell
 */
//@startSkipCommitHooks

class Mage_Shell_Import_Products extends Mage_Shell_Abstract
{

    const FILE_NAME = 'xml_products.xml';
    /**
     * Import products
     */
    private function _importProducts()
    {
        $fileName = dirname(__FILE__) . DS . self::FILE_NAME;
        $doc = new DOMDocument();
        $doc->load($fileName);

        $nodes = $doc->getElementsByTagName( "node_export" );
        foreach( $nodes as $node )
        {
            $vid = $node->getElementsByTagName( "vid" );
            echo "$vid\n";
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
