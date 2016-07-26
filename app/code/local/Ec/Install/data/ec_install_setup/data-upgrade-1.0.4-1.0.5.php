<?php
/**
 * Create phone and address variables
 */
/* @var $this Ec_Install_Model_Resource_Setup */

$storeIdRu = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'default')->getFirstItem()->getStoreId();
$storeIdUa = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'uk_ua')->getFirstItem()->getStoreId();

// phone var
$content = <<< HTML
+38 (099) 325 29 33
+38 (050) 372 71 88
HTML;

$contentHtml = <<< HTML
+38 (099) 325 29 33 <br />
+38 (050) 372 71 88
HTML;
$identifier = 'shop-phone';
$name = 'shop-phone';

Mage::getModel('core/variable')
    ->setCode($identifier)
    ->setName($name )
    ->setPlainValue($content)
    ->setHtmlValue($contentHtml)
    ->save();


// address var
$content = <<< HTML
г. Ужгород
ул. Трудовая, 2
HTML;

$contentHtml = <<< HTML
г. Ужгород <br />
ул. Трудовая, 2
HTML;
$identifier = 'shop-address';
$name = 'shop-address';

$var = Mage::getModel('core/variable')
    ->setCode($identifier)
    ->setName($name )
    ->setPlainValue($content)
    ->setHtmlValue($contentHtml)
    ->save();

$content = <<< HTML
м. Ужгород
вул. Трудова, 2
HTML;

$contentHtml = <<< HTML
м. Ужгород <br />
вул. Трудова, 2
HTML;

$var->setStoreId($storeIdUa)
    ->setPlainValue($content)
    ->setHtmlValue($contentHtml)
    ->save();
