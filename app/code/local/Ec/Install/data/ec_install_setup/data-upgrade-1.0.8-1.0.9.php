<?php
/**
 * Shipping Settings
 */

Mage::getConfig()->saveConfig('shipping/option/checkout_multiple', 0, 'default', 0);
Mage::getConfig()->saveConfig('shipping/origin/country_id', 'UA', 'default', 0);
Mage::getConfig()->saveConfig('shipping/origin/region_id', 'Transcarpathian', 'default', 0);
Mage::getConfig()->saveConfig('shipping/origin/city', 'Uzhgorod', 'default', 0);
Mage::getConfig()->saveConfig('shipping/origin/street_line1', 'Trudova street, 2', 'default', 0);
Mage::getConfig()->saveConfig('shipping/origin/postcode', 'postcode', 'default', 0);
