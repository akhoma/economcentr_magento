<?php
/**
 * Set up currencies
 */

Mage::getConfig()->saveConfig('currency/options/allow', 'USD,UAH', 'default', 0);
Mage::getConfig()->saveConfig('currency/options/default', 'UAH', 'default', 0);
Mage::getConfig()->saveConfig('currency/options/base', 'UAH', 'default', 0);
Mage::getConfig()->saveConfig('currency/options/customsymbol', 'a:1:{s:3:"UAH";s:6:"ГРН";}', 'default', 0);
