<?php
/**
 * Class Ec_Install_Block__Customer_Account_Navigation
 */
class Ec_Install_Block__Customer_Account_Navigation extends Mage_Customer_Block_Account_Navigation
{
    /**
     * Remove link by name
     *
     * @param string $name
     * @return $this
     */
    public function removeLinkByName($name) {
        unset($this->_links[$name]);
    }
}
