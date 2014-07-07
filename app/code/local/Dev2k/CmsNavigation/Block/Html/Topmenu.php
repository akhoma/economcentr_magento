<?php
class Dev2k_CmsNavigation_Block_Html_Topmenu extends Mage_Page_Block_Html_Topmenu {

    /**
     * Recursively generates top menu html from data that is specified in $menuTree
     *
     * @param Varien_Data_Tree_Node $menuTree
     * @param string $childrenWrapClass
     * @return string
     * @deprecated since 1.8.2.0 use child block catalog.topnav.renderer instead
     */
    protected function _getHtml(Varien_Data_Tree_Node $menuTree, $childrenWrapClass)
    {
        $html = '';

        $children = $menuTree->getChildren();
        $parentLevel = $menuTree->getLevel();
        $childLevel = is_null($parentLevel) ? 0 : $parentLevel + 1;

        $counter = 1;
        $childrenCount = $children->count();

        $parentPositionClass = $menuTree->getPositionClass();
        $itemPositionClassPrefix = $parentPositionClass ? $parentPositionClass . '-' : 'nav-';

        foreach ($children as $child) {

            $child->setLevel($childLevel);
            $child->setIsFirst($counter == 1);
            $child->setIsLast($counter == $childrenCount);
            $child->setPositionClass($itemPositionClassPrefix . $counter);

            $outermostClassCode = '';
            $outermostClass = $menuTree->getOutermostClass();

            if ($childLevel == 0 && $outermostClass) {
                $outermostClassCode = ' class="' . $outermostClass . '" ';
                $child->setClass($outermostClass);
            }


            $linkData = $this->_getCmsPagelinkData($child->getId());
            $url = $linkData['url'] ? $linkData['url'] : $child->getUrl();
            $name = $linkData['name'] ? $linkData['name'] : $child->getName();
            $cssclass = $linkData['cssclass'] ? $linkData['cssclass'] : '';

            $html .= '<li ' . $this->_getRenderedMenuItemAttributes($child, $cssclass) . '>';
            $html .= '<a href="' . $url . '" ' . $outermostClassCode . '><span>'
                . $this->escapeHtml($name) . '</span></a>';

            if ($child->hasChildren()) {
                if (!empty($childrenWrapClass)) {
                    $html .= '<div class="' . $childrenWrapClass . '">';
                }
                $html .= '<ul class="level' . $childLevel . '">';
                $html .= $this->_getHtml($child, $childrenWrapClass);
                $html .= '</ul>';

                if (!empty($childrenWrapClass)) {
                    $html .= '</div>';
                }
            }
            $html .= '</li>';

            $counter++;
        }

        return $html;
    }

    private function _getCmsPagelinkData($treeId) {
        $data = array('url' => '', 'name' => '', 'cssclass' => '');
        $id = str_replace('category-node-','', $treeId);
        $category = Mage::getModel('catalog/category')->load($id);
        $isCmsPageLink = $category->getData('is_cms_page_link');
        if ($isCmsPageLink) {
            $cmsPageId = $category->getData('cms_page_link');
            $cmsPage = Mage::getModel('cms/page')->load($cmsPageId);
            $data['url'] = Mage::getUrl($cmsPage->getIdentifier());
            $data['name'] = $cmsPage->getTitle();

            $currentPage = Mage::getSingleton('cms/page');
            if ($currentPage->getId() == $cmsPageId) {
                $data['cssclass'] = ' active';
            }
        }

        return $data;
    }

    protected function _getRenderedMenuItemAttributes(Varien_Data_Tree_Node $item, $cssClass)
    {
        $html = '';
        $attributes = $this->_getMenuItemAttributes($item);
        $attributes['class'] = $attributes['class'] . $cssClass;

        foreach ($attributes as $attributeName => $attributeValue) {
            $html .= ' ' . $attributeName . '="' . str_replace('"', '\"', $attributeValue) . '"';
        }

        return $html;
    }

}
