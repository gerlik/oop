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
$testTabel = new template('test');
//määrame reaalväärtsed
$testTabel->set('esimene','1');
$testTabel->set('teine','2');
//testvaade
echo '<pre>';
print_r($testTabel);
echo '</pre>';

echo $testTabel->parse();
