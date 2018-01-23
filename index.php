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
$mainTmpl->set('lang','et');
$mainTmpl->set('page_title','Lehe pealkiri');
$mainTmpl->set('user', 'Kasutaja');
$mainTmpl->set('title','Pealkiri');
$mainTmpl->set('lang_bar','Keeleriba');
//katsetus
require_once 'menu.php';
$mainTmpl->set('content','Lehe sisu');
//määrame reaalväärtsed
//$testTabel->set('esimene','1');
//$testTabel->set('teine','2');
//testvaade
echo '<pre>';
print_r($mainTmpl);
echo '</pre>';

echo $mainTmpl->parse();

