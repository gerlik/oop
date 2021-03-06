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
    var $content = false; //ei saa olle ''   //HTML malli failist loetud sisu
    var $vars = array();//HTML malli elementide nimetused ja väärtused

    /**
     * template constructor.
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;//määrame kasutatava malli faili nime
        $this->loadFile(); //laadime sisu
    }

    //HTML malli faili nime ja õiguste kontroll
    //sisu kugemine, kui tingimused täidetud
    function loadFile(){
        if (!is_dir(VIEWS_DIR)){
            echo 'Ei ole leitud '.VIEWS_DIR.' kataloogi.<br />';
            exit;
        }
        //kui faili nimi on määratud, siis views/failimini.txt
        $file = $this->file; //abiaesendus
        if (file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }
        //kui faili nimi on määratud, siis views/failimini.txt
        $file = VIEWS_DIR.$this->file; //abiaesendus
        if (file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }
        //kui faili nimi on määratud kujul
        //failinimi
        $file = VIEWS_DIR.$this->file.'.html'; //abiaesendus
        if (file_exists($file) and is_file($file) and is_readable($file)) {
            $this->readFile($file);
        }
        //kui faili nimi on määratud, siis views/alamkaust/failimini.txt
        //kui faili nimi on määratud kujul
        //alamkaust.failinimi   .->/
        $file = VIEWS_DIR.str_replace('.', '/', $this->file).'.html'; //abiaesendus
        if (file_exists($file) and is_file($file) and is_readable($file)) {
            $this->readFile($file);
        }
        //kui lehel on sisu puudu
        if ($this->content === false){
            echo 'Ei suutnud lugeda '.$this->file.' sisu.<br />';
            exit;
        }
    }

    //HTML malli failist sisu lugemine
    function readFile($file){
        /*$fp = fopen($file, 'r');
        $this->content = fread($fp, filesize($file));
        flose($fp);  OR */
        $this->content = file_get_contents($file);

    }
    //funktsioon paari lisamiseks
    function set($name, $value){
        $this->vars[$name] = $value;
    }

    //malli paaride täiendamine
    //$this->vars massiivis
    function add($name, $value){
        if (!isset($this->vars[$name])){
            $this->set($name, $value);
        }else{
            $this->vars[$name] = $this->vars[$name].$value;
        }
    }
    //funktsioon täidab mallist loetud sisu reaalsete väärtustega
    //anname muudetud sisu tagasi põhiprogrammile
    function parse(){
        $str = $this->content;//malli sisu algväärtus
        foreach ($this->vars as $name=>$value) {
            $str = str_replace('{'.$name.'}', $value, $str);
        }
        return $str;
    }
}