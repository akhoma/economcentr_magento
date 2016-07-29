<?php
/**
 * Create cms blocks and menus
 */
/* @var $this Ec_Install_Model_Resource_Setup */

$storeIdRu = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'default')->getFirstItem()->getStoreId();
$storeIdUa = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'uk_ua')->getFirstItem()->getStoreId();

$contentRu = <<< HTML
<h1 class="title" style="text-align: center;"><span>ПРИВЕТСТВУЕМ ВАС НА САЙТЕ ECONOM-CENTER.COM.UA</span></h1>
<p style="text-align: center;">Здесь Вы можете найти любой товар, который Вас интересует. От иголки до электроинструмента. Ждем Вашых заказов</p>
HTML;
$identifierRu = 'home_ru';
$titleRu = 'Главная страница';
$pageIdRu = $this->setCmsPage($identifierRu, $titleRu, $contentRu, 'one_column', true, array($storeIdRu));


Mage::getConfig()->saveConfig('web/default/cms_home_page', $identifierRu, 'stores', $storeIdRu);


$contentUa = <<< HTML
<h1 class="title" style="text-align: center;"><span>ВІТАЄМО ВАС НА САЙТІ ECONOM-CENTER.COM.UA</span></h1>
<p style="text-align: center;">Тут Ви зможете знайти будь-який товар, який вас цікавить. Від ігли до електроінструменту. Чекаємо на Ваші замовлення</p>
HTML;
$identifierUa = 'home_ua';
$titleUa = 'Головна сторінка';
$pageIdUa = $this->setCmsPage($identifierUa, $titleUa, $contentUa, 'one_column', true, array($storeIdUa));

Mage::getConfig()->saveConfig('web/default/cms_home_page', $identifierUa, 'stores', $storeIdUa);

