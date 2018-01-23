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

$menuItemTmpl->set('menu_item_name','esimene');
echo '<pre>';
print_r($menuItemTmpl);
echo '</pre>';

$menuTmpl->set('menu_items', $menuItemTmpl->parse());
echo '<pre>';
print_r($menuItemTmpl);
echo '</pre>';

$menu = $menuItemTmpl->parse();
$mainTmpl->set('menu', $menu);
