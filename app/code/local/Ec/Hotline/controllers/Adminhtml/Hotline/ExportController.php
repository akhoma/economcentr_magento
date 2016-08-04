<?php
/**
 * Admin export controller
 *
 * @category   Ec
 * @package    Ec_Hotline
 */
class Ec_Hotline_Adminhtml_Hotline_ExportController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Products action
     *
     * @return $this
     */
    public function productsAction()
    {
        $exportModel = Mage::getModel('ec_hotline/product_export');
        $fileName = 'hotlineExport.csv';
        $content = $exportModel->getCsvData();;
        $this->_sendResponse($fileName, $content);
        return $this;
    }

    /**
     * Send response
     *
     * @param string $fileName
     * @param string $content
     * @param string $contentType
     * @return $this
     */
    protected function _sendResponse($fileName, $content, $contentType = 'application/octet-stream')
    {
        $response = $this->getResponse();
        $response->setHeader('HTTP/1.1 200 OK', '');
        $response->setHeader('Pragma', 'public', true);
        $response->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true);
        $response->setHeader('Content-Disposition', 'attachment; filename=' . $fileName);
        $response->setHeader('Last-Modified', $this->_getDateModel()->date('r'));
        $response->setHeader('Accept-Ranges', 'bytes');
        $response->setHeader('Content-Length', strlen($content));
        $response->setHeader('Content-type', $contentType);
        $response->setBody($content);
        return $this;
    }

    /**
     * Get core date model
     *
     * @return Mage_Core_Model_Date
     */
    protected function _getDateModel()
    {
        return Mage::getSingleton('core/date');
    }
}
