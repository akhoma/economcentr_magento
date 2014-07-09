<?php
/**
 * Default setup model
 *
 * @category    Ec
 * @package     Ec_Install
 */
class Ec_Install_Model_Resource_Setup extends Mage_Core_Model_Resource_Setup
{
    /**
     * Add or update existing static CMS block
     *
     * @param string $identifier Identifier
     * @param string $title      Title in admin panel
     * @param string $content    HTML content
     * @param bool   $isActive   Active status
     * @param array  $stores     Stores list
     * @return int $blockId
     */
    public function setCmsBlock($identifier, $title, $content, $isActive = null, array $stores = array())
    {
        if (!in_array(Mage_Core_Model_App::ADMIN_STORE_ID, $stores)) {
            $stores[] = Mage_Core_Model_App::ADMIN_STORE_ID;
        }
        /** @var Mage_Cms_Model_Block $cmsBlock */
        $cmsBlock = Mage::getModel('cms/block')->load($identifier, 'identifier');
        $this->_setActiveStatusToCms($cmsBlock, $isActive);
        $blockId = $cmsBlock->setIdentifier($identifier)
            ->setContent($content)
            ->setTitle($title)
            ->setStores($stores)
            ->save()
            ->getId();
        return $blockId;
    }

    /**
     * Add or update existing static CMS Page
     *
     * @param string $identifier   Identifier
     * @param string $title        Title in admin panel
     * @param string $content      HTML content
     * @param string $templateType Template type
     * @param bool   $isActive     Active status
     * @param array  $stores       Stores list
     * @return $this
     */
    public function setCmsPage($identifier, $title, $content, $templateType = 'one_column',
                               $isActive = null, array $stores = array())
    {
        if (!in_array(Mage_Core_Model_App::ADMIN_STORE_ID, $stores)) {
            $stores[] = Mage_Core_Model_App::ADMIN_STORE_ID;
        }
        /** @var Mage_Cms_Model_Block $cmsBlock */
        $cmsPage = Mage::getModel('cms/page')->load($identifier, 'identifier');
        $this->_setActiveStatusToCms($cmsPage, $isActive);
        $cmsPage->setIdentifier($identifier)
            ->setRootTemplate($templateType)
            ->setContent($content)
            ->setContentHeading($title)
            ->setTitle($title)
            ->setStores($stores)
            ->save();
    }

    /**
     * Set active status
     *
     * It based upon $isActive param and exist entry in DB
     * If $isActive is NULL and the model hasn't entry in DB it will set TRUE
     *
     * @param bool $isActive                                 Active status param
     * @param Mage_Cms_Model_Block|Mage_Cms_Model_Page $cms  CMS model (block or page)
     * @return $this
     */
    protected function _setActiveStatusToCms($cms, $isActive)
    {
        if (null !== $isActive) {
            $cms->setIsActive((bool)$isActive);
        } elseif (!$cms->getId()) {
            $cms->setIsActive(true);
        }
        return $this;
    }
}
