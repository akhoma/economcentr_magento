<?php
require_once '../abstract.php';
/**
 * @category    Mage
 * @package     Mage_Shell
 */
//@startSkipCommitHooks

class Mage_Shell_Install_Menu extends Mage_Shell_Abstract
{
    /**
     * Generate menu
     */
    private function generateMenu()
    {
        $storeIdRu = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'default')->getFirstItem()->getId();
        $storeIdUa = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'uk_ua')->getFirstItem()->getId();
        $rootPath = '1/2';

        $catalog = Mage::getModel('catalog/category')
            ->setStoreId(Mage_Core_Model_App::ADMIN_STORE_ID)
            ->addData(array(
                'name' => 'Products catalog',
                'is_active' => 1,
                'path' => $rootPath
            ))
            ->save();
        $catalog->setName('Каталог товаров')
            ->setStoreId($storeIdRu)
            ->save();
        $catalog->setName('Каталог товарів')
            ->setStoreId($storeIdUa)
            ->save();

        $cmsBlock = Mage::getModel('cms/block')->load('contacts_ru', 'identifier');
        $contacts = Mage::getModel('catalog/category')
            ->setStoreId(Mage_Core_Model_App::ADMIN_STORE_ID)
            ->addData(array(
                'name' => 'Contacts',
                'is_active' => 1,
                'display_mode' => Mage_Catalog_Model_Category::DM_PAGE,
                'landing_page' => $cmsBlock->getId(),
                'path' => $rootPath
            ))
            ->save();
        $contacts->setName('Контакты')
            ->setStoreId($storeIdRu)
            ->save();
        $cmsBlock = Mage::getModel('cms/block')->load('contacts_ua', 'identifier');
        $contacts->setName('Контакти')
            ->setStoreId($storeIdUa)
            ->setStoreId($storeIdUa)
            ->setLandingPage($cmsBlock->getId())
            ->save();


        $cmsBlock = Mage::getModel('cms/block')->load('my_nahodimsia', 'identifier');
        $ourLocation = Mage::getModel('catalog/category')
            ->setStoreId(Mage_Core_Model_App::ADMIN_STORE_ID)
            ->addData(array(
                'name' => 'Our location',
                'is_active' => 1,
                'display_mode' => Mage_Catalog_Model_Category::DM_PAGE,
                'landing_page' => $cmsBlock->getId(),
                'path' => $rootPath
            ))
            ->save();
        $ourLocation->setName('Мы находимся')
            ->setStoreId($storeIdRu)
            ->save();
        $cmsBlock = Mage::getModel('cms/block')->load('my_roztashovani', 'identifier');
        $ourLocation->setName('Ми розташовані')
            ->setStoreId($storeIdUa)
            ->setLandingPage($cmsBlock->getId())
            ->save();
    }

    /**
     * Run
     */
    public function run()
    {
        $start = microtime(true);

        $this->generateMenu();

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

$shell = new Mage_Shell_Install_Menu();
$shell->run();

//@finishSkipCommitHooks
