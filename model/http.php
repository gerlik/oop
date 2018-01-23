<?php
/**
 * Created by PhpStorm.
 * User: Gerli
 * Date: 23/01/2018
 * Time: 12:22
 */

class http
{
    //klassi mutujad
    var $vars = array(); //HTTP massiiv $_GET
    var $server = array();//serveri massiiv $_SERVER

    /**
     * http constructor.
     */
    public function __construct()
    {
        $this->init();
    }

    //loeme vajalikud väärtused sisse
    function init(){
        $this->vars = array_merge($_GET, $_POST);
        $this->server = $_SERVER;
    }
}