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
//testvaade
echo '<pre>';
print_r($testTabel);
echo '</pre>';