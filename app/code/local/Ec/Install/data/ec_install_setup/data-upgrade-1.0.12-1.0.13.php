<?php
/**
 * Disable middle name for customer
 */

Mage::getConfig()->saveConfig('customer/address/middlename_show', 0, 'default', 0);
