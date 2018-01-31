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

//esimene
$menuItemTmpl->set('menu_item_name','esimene');
$menuTmpl->add('menu_items', $menuItemTmpl->parse());
//loome lingi
$link = $http->getLink(array('control' => 'esimene'));


//teine
$menuItemTmpl->set('menu_item_name','teine');
$menuTmpl->add('menu_items', $menuItemTmpl->parse());
$link = $http->getLink(array('control' => 'teine'));
//valmis vaade
$menu = $menuTmpl->parse();
$mainTmpl->set('menu', $menu);
