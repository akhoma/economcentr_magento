<?php
/**
 * Class Ec_Install_Block_Catalog_Navigation
 */
class Ec_Install_Block_Page_Html_Topmenu extends Mage_Page_Block_Html_Topmenu
{
    /**
     * Get Key pieces for caching block content
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        $cacheId = parent::getCacheKeyInfo();
        $homePageFlag = $this->helper('ec_install')->getIsHomePage() ? " _home" : '';
        $cacheId['short_cache_id'] = $cacheId['short_cache_id'] . $homePageFlag;
        return $cacheId;
    }
}
