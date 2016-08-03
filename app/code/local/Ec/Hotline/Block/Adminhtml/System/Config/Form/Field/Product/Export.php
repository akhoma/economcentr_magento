<?php
/**
 * Config form field export block
 *
 * @category   Ec
 * @package    Ec_Hotline
 */
class Ec_Hotline_Block_Adminhtml_System_Config_Form_Field_Product_Export
    extends Mage_Adminhtml_Block_System_Config_Form_Field
{
    /**
     * Get element html
     *
     * @param Varien_Data_Form_Element_Abstract $element
     * @return string
     * @throws Exception
     */
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        $buttonBlock = $this->getLayout()->createBlock('adminhtml/widget_button');
        $params = array(
            'website' => $buttonBlock->getRequest()->getParam('website')
        );

        $data = array(
            'label'   => Mage::helper('ec_hotline')->__('Export Products'),
            'onclick' => 'setLocation(\'' . Mage::helper('adminhtml')->getUrl('adminhtml/hotline_export/products', $params)
                . '\')',
            'class'   => '',
        );

        $html = $buttonBlock->setData($data)->toHtml();

        return $html;
    }
}
