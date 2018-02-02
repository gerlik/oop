<?php
/**
 * Created by PhpStorm.
 * User: Gerli
 * Date: 23/01/2018
 * Time: 11:03
 */

//loome menüü peamalli objekti
$menuTmpl = new template('menu.menu');
//loome elementide malli objekti
$menuItemTmpl = new template('menu.menu_item');

//avaleht
$menuItemTmpl->set('menu_item_name', 'avaleht');
$link = $http->getLink();
$menuItemTmpl->set('link', $link);
$menuTmpl->add('menu_items', $menuItemTmpl->parse());

//esimene
$menuItemTmpl->set('menu_item_name','esimene');
//link
$link = $http->getLink(array('control' => 'esimene'));
$menuItemTmpl->set('link', $link);
$menuTmpl->add('menu_items', $menuItemTmpl->parse());

//teine
$menuItemTmpl->set('menu_item_name','teine');
//link
$link = $http->getLink(array('control' => 'teine'));
$menuItemTmpl->set('link', $link);
$menuTmpl->add('menu_items', $menuItemTmpl->parse());

//valmis vaade
$menu = $menuTmpl->parse();
$mainTmpl->set('menu', $menu);
