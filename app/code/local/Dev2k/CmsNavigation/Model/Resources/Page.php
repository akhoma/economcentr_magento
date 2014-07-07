<?php

class Dev2k_CmsNavigation_Model_Resources_Page extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    public function getAllOptions()
    {
        if (!$this->_options) {
            $collection = Mage::getModel('cms/page')->getCollection();
            $options = array();
            $options[] = array(
                'value' => '',
                'label' => '',
            );
            foreach ($collection as $page) {
                $options[] = array(
                    'value' => $page->getId(),
                    'label' => $page->getTitle(),
                );
            }

            $this->_options = $options;
        }
        return $this->_options;
    }
}
