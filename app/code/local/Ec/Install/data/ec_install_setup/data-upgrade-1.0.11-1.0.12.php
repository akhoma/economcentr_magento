<?php
/**
 * Create cms page not found
 */
/* @var $this Ec_Install_Model_Resource_Setup */

$storeIdRu = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'default')->getFirstItem()->getStoreId();
$storeIdUa = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'uk_ua')->getFirstItem()->getStoreId();

$contentRu = <<< HTML
<div class="page-404-wrapper">
<h1 class="err404-content-title-top">404</h1>
<div class="err404-content-title-text">Страница не найдена</div>
<p class="err404-content-caption">Возможно, эта страница была удалена либо допущена ошибка в адресе</p>
<br />
<h1><a class="err404-content-link novisited arrow-link" href=" {{store url=''}}"><span class="arrow-link-inner">Перейти на главную страницу</span>&nbsp;&rarr;</a></h1>
</div>
HTML;
$identifierRu = '404_ru';
$titleRu = 'Страница не найдена';
$pageIdRu = $this->setCmsPage($identifierRu, $titleRu, $contentRu, 'one_column', true, array($storeIdRu));


Mage::getConfig()->saveConfig('web/default/cms_no_route', $identifierRu, 'stores', $storeIdRu);


$contentUa =  <<< HTML
<div class="page-404-wrapper">
<h1 class="err404-content-title-top">404</h1>
<div class="err404-content-title-text">Сторінку не знайдено</div>
<p class="err404-content-caption">Можливо ця сторінка була видалена або зроблена помилка в адресі</p>
<br />
<h1><a class="err404-content-link novisited arrow-link" href=" {{store url=''}}"><span class="arrow-link-inner">Перейти на головну сторінку</span>&nbsp;&rarr;</a></h1>
</div>
HTML;
$identifierUa = '404_ua';
$titleUa = 'Сторінку не знайдено';
$pageIdUa = $this->setCmsPage($identifierUa, $titleUa, $contentUa, 'one_column', true, array($storeIdUa));

Mage::getConfig()->saveConfig('web/default/cms_no_route', $identifierUa, 'stores', $storeIdUa);

