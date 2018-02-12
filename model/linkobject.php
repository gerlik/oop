<?php
/**
 * Created by PhpStorm.
 * User: IBM
 * Date: 23/01/2018
 * Time: 12:54
 */

class linkobject extends http
{
    var $baseLink = false;
    var $protocol = 'http://';
    var $eq = '=';
    var $delim = '&amp;';
    var $aie = array('lang_id'); // lingi kohustuslikud lisandid

    /**
     * linkobject constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->baseLink = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    }
    //pealkirjal nimi=väärtus
    //ühendame kokku
    function addToLink(&$link, $name, $value){
        if($link != ''){
            $link = $link.$this->delim;
        }
        $link = $link.fixUrl($name).$this->eq.fixUrl($value);
    }
    //loome täislingi
    function getLink($add = array()){
        $link = '';
        foreach ($add as $name => $value){
            //koostame paaride komplektid
            $this->addToLink($link, $name, $value);
        }
        foreach ($aie as $name){
            $value = $this->get($name);
            if($value != false){
                $this->addToLink($link, $name, $value);
            }
        }
        foreach ($this->aie as $name){
            $value = $this->get($name);
            if($value != false){
                $this->addToLink($link, $name, $value);
            }
        }

        //
        if($link != ''){
            $link = $this->baseLink.'?'.$link;
        }else{
            //kui paarid ei ole moodustatud
            $link = $this->baseLink;
        }
        return $link;
    }
}