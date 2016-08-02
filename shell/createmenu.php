<?php
require_once 'abstract.php';

/**
 * Create cms content and categories menu
 *
 * @category    Mage
 * @package     Mage_Shell
 */
class Mage_Shell_Createmenu extends Mage_Shell_Abstract
{
    /**
     * Process some stuff before running categories import.
     */
    protected function _beforeProcess()
    {
        $this->_createDestinationFolder($this->_getDestinationPath());
    }

    /**
     * Process some stuff after running categories import.
     */
    protected function _afterProcess()
    {
    }

    /**
     * Displays critical message and exit.
     */
    protected function _fault($msg)
    {
        exit(PHP_EOL . $msg . PHP_EOL);
    }

    /**
     * Main script method that creates menus and content
     */
    public function run()
    {

        $end = microtime(true);
        $time = $end - $start;

        $this->_createMenu();


        echo PHP_EOL;
        echo 'Script Start: ' . date('H:i:s', $start) . PHP_EOL;
        echo 'Script End: ' . date('H:i:s', $end) . PHP_EOL;
        echo 'Duration: ' . number_format($time, 3) . ' sec' . PHP_EOL;
    }

    /**
     * List of available script options.
     *
     * @return string
     */
    //@startSkipCommitHooks
    public function usageHelp()
    {
        return <<< USAGE
        Usage:  php -f content.php -- [options]
        -f            File to import
        -d            Delimiter (default is ,)
        -e            Enclosure (default is ")
        -h            Short alias for help
        help          This help
USAGE;
    }
    //@finishSkipCommitHooks
    private function _createMenu() {
        $storeIdRu = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'default')->getFirstItem()->getId();
        $storeIdUa = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'uk_ua')->getFirstItem()->getId();

        $rootPath = '1/2';

        $titleRu = 'Мы находимся';
        $identifierRu = 'my_nahodimsia';
        $blockIdRu = Mage::getModel('cms/block')->load($identifierRu)->getId();

        $titleUa = 'Ми розташовані';
        $identifierUa = 'my_roztashovani';
        $blockIdUa = Mage::getModel('cms/block')->load($identifierUa)->getId();

        $menuItem = Mage::getResourceModel('catalog/category_collection')
            ->addFieldToFilter('name', $titleRu)
            ->getFirstItem()->delete();

        $menuItem = Mage::getModel('catalog/category')
            ->setStoreId(Mage_Core_Model_App::ADMIN_STORE_ID)
            ->addData(array(
                'name' => $titleRu,
                'url_key' => $identifierRu,
                'is_active' => 1,
                'path' => $rootPath,
                'display_mode' => 'PAGE',
                'landing_page' => $blockIdRu,
                'page_layout' => 'one_column'
            ))
            ->save();
        $menuItem->setStoreId($storeIdUa)
            ->setName($titleUa)
            ->setUrlKey($identifierUa)
            ->setLandingPage($blockIdUa)
            ->save();
    }
}

$shell = new Mage_Shell_Createmenu();
$shell->run();
