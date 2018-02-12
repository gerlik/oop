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
        $this->initConst();
    }

    //loeme vajalikud väärtused sisse
    function init(){
        $this->vars = array_merge($_GET, $_POST);
        $this->server = $_SERVER;
    }
    function initConst(){
        $constName = array('HTTP_HOST', 'SCRIPT_NAME', 'REMOTE_ADDR');
            foreach ($constName as $consts) {
                if (isset($this->server[$consts])) {
                    define($consts, $this->server[$consts]);
            }
        }
    }
    function get($name){
        if (isset($this->vars[$name])){
            return $this->vars[$name];
        }else{
            return false;
        }
    }
    // loome funktisooni, mis paneb veebi paarid paika
    // kujul nimi=väärtus
    function set($name, $value){
        $this->vars[$name] = $value;
    }

}