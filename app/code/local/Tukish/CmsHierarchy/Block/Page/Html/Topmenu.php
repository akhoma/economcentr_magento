<?php
/**
 * @category    Tukish
 * @package     Tukish_CmsHierarchy
 * @version     1.2.4
 * @copyright   Copyright (c) 2014 Tukish inc
 */
class Tukish_CmsHierarchy_Block_Page_Html_Topmenu extends Tukish_CmsHierarchy_Block_Catalog_Navigation
{
    public function shouldRenderPages()
    {
        return Mage::getStoreConfigFlag('tukish_cmshierarchy/general/include_in_menu');
    }
}