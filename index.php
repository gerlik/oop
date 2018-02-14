<?php
/**
 * Created by PhpStorm.
 * User: Gerli
 * Date: 19/01/2018
 * Time: 11:09
 */

//loeme sisse seadistuse
require_once 'conf.php';

// loome peamalli objekti template klassist
$mainTmpl = new template('main');
// lubame kontrollerite haldust
require_once 'control.php';
// määrame reaalväärtused malli elementidele
$mainTmpl->set('lang', 'et');
$mainTmpl->set('page_title', 'Lehe pealkiri');
$mainTmpl->set('user', 'Kasutaja');
$mainTmpl->set('title', 'Pealkiri');
$mainTmpl->set('lang_bar', 'Keeleriba');
// katsetame menüü loomist
require_once 'menu.php';

echo $mainTmpl->parse();

$sid = md5(uniqid(time().mt_rand(1,1000), true));

