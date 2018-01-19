<?php
/**
 * Created by PhpStorm.
 * User: Gerli
 * Date: 19/01/2018
 * Time: 10:22
 */

class template
{
    //klassi muutujad
    var $file = ''; //HTML faili malli nimi
    var $content = false; //ei saa olle ''   //HTML mallist loetud sisu
    var $vars = array(); //HTML malli elementide nimetused ja väärtused

    //HTML malli failist sisu lugemine
    function readFile($file){
        $fp = fopen($file, 'r');
        $this->content = fread($fp, filesize($file));
        flose($fp);

    }
}