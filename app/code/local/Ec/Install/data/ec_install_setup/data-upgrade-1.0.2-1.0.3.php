<?php
/**
 * Create cms blocks and menus
 */
/* @var $this Ec_Install_Model_Resource_Setup */

$indexingProcesses = Mage::getSingleton('index/indexer')->getProcessById(3);
$indexingProcesses->reindexEverything();


$storeIdRu = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'default')->getFirstItem()->getId();
$storeIdUa = Mage::getModel('core/store')->getCollection()->addFieldToFilter('code', 'uk_ua')->getFirstItem()->getId();

$contentRu = <<< HTML
<div style="float:left; width:640px;"><p><iframe marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com.ua/maps/ms?msa=0&amp;msid=215188586844161497174.0004d8d6e8f18aae18d2a&amp;hl=ru&amp;ie=UTF8&amp;t=h&amp;ll=48.588077,22.294693&amp;spn=0.003406,0.006856&amp;z=17&amp;iwloc=0004d8fa8d186cb631b15&amp;output=embed" frameborder="0" height="480" width="640"></iframe></p></div><div style="width: 300px; float: left; margin-left: 50px;"><strong>Наш адрес:</strong><br>ул. Трудова, 2, Ужгород, Украина<br><br><strong>Мы работаем</strong>:<br><strong>Понедельник-Пятниц</strong><strong>а</strong><strong>:</strong> 09.00-19.00;<br><strong>Суббота:</strong> 10.00-16.00;<br><strong>Воскресенье:</strong> выходной.<br><br><strong>Алёна:</strong> <span>+38 (099) 325 29 33</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +38 (050) 372 71 88 </span></div>
HTML;
$identifierRu = 'my_nahodimsia';
$titleRu = 'Мы находимся';
$blockIdRu = $this->setCmsBlock($identifierRu, $titleRu, $contentRu, true, array($storeIdRu));

$contentUa = <<< HTML
<div style="float:left; width:640px;"><p><iframe marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com.ua/maps/ms?msa=0&amp;msid=215188586844161497174.0004d8d6e8f18aae18d2a&amp;hl=ru&amp;ie=UTF8&amp;t=h&amp;ll=48.588077,22.294693&amp;spn=0.003406,0.006856&amp;z=17&amp;iwloc=0004d8fa8d186cb631b15&amp;output=embed" frameborder="0" height="480" width="640"></iframe></p></div><div style="width: 300px; float: left; margin-left: 50px;"><strong>Наша адреса:</strong><br>вул. Трудова, 2, Ужгород, Україна<br><br><strong>Ми працюємо</strong>:<br><strong>Понеділок-П'ятниц</strong><strong>а</strong><strong>:</strong> 09.00-19.00;<br><strong>Субота:</strong> 10.00-16.00;<br><strong>Неділя:</strong> вихідний.<br><br><strong>Олена:</strong> <span>+38 (099) 325 29 33</span><br><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +38 (050) 372 71 88</span></div>
HTML;
$identifierUa = 'my_roztashovani';
$titleUa = 'Ми розташовані';
$blockIdUa = $this->setCmsBlock($identifierUa, $titleUa, $contentUa, true, array($storeIdUa));


$contentRu = <<< HTML
{{block type="core/template" name="contactForm" form_action="/contacts/index/post" template="contacts/form.phtml"}}
HTML;
$identifierRu = 'contacts_ru';
$titleRu = 'Контакти';
$blockIdRu = $this->setCmsBlock($identifierRu, $titleRu, $contentRu, true, array($storeIdRu));

$contentUa = <<< HTML
{{block type="core/template" name="contactForm" form_action="/contacts/index/post" template="contacts/form.phtml"}}
HTML;
$identifierUa = 'contacts_ua';
$titleUa = 'Контакти';
$blockIdUa = $this->setCmsBlock($identifierUa, $titleUa, $contentUa, true, array($storeIdUa));
