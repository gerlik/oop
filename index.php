<?php
/**
 * Created by PhpStorm.
 * User: Gerli
 * Date: 19/01/2018
 * Time: 11:09
 */

//loeme sisse seadistuse
require_once 'conf.php';

//uus testobjekt
//$testTabel = new template('test');
$mainTmpl = new template('main');

//lubame kontrollerite haldust
require_once 'control.php';

$mainTmpl->set('lang','et');
$mainTmpl->set('page_title','Lehe pealkiri');
$mainTmpl->set('user', 'Kasutaja');
$mainTmpl->set('title','Pealkiri');
$mainTmpl->set('lang_bar','Keeleriba');
//katsetus
require_once 'menu.php';

echo $mainTmpl->parse();
//kontrollime control sisu

echo '<pre>';
print_r($db);
echo '</pre>';