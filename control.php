<?php
/**
 * Created by PhpStorm.
 * User: Gerli
 * Date: 31/01/2018
 * Time: 09:38
 */
//mis nimega kontrollerit on vaja
$control = $http->get('control');//kontrolleri nimi

//koostatakse faili nimi
$file = CONTROL_DIR.$control.'.php';
if (file_exists($file) and is_file($file) and is_readable($file)){
    require_once $file;
}else{
    $file = CONTROL_DIR.DEFAULT_CONTROL.'.php';
    require_once $file;
}
