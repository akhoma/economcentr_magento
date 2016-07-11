<?php
/**
 * EEc install init
 */

$storeId  = 0;
$category = Mage::getModel('catalog/category');
$category->setStoreId($storeId);
$category->setName('Home Page Products');
$category->setUrlKey('home page products');
$category->setIsActive(1);
$category->setDisplayMode('PRODUCTS');
$parentId = Mage_Catalog_Model_Category::TREE_ROOT_ID;
$parentCategory = Mage::getModel('catalog/category')->load($parentId);
$category->setPath($parentCategory->getPath());
$category->save();
$a = 1;
