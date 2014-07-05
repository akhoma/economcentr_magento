<?php
/**
 * @category    Tukish
 * @package     Tukish_CmsHierarchy
 * @version     1.2.4
 * @copyright   Copyright (c) 2014 Tukish inc
 */
class Tukish_CmsHierarchy_Block_Adminhtml_System_Config_Fieldset_Hint
    extends Mage_Adminhtml_Block_Abstract
    implements Varien_Data_Form_Element_Renderer_Interface
{
    protected $_template = 'tukish/cmshierarchy/system/config/fieldset/hint.phtml';

    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        return $this->toHtml();
    }
}