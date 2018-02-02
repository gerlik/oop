<?php
/**
 * Created by PhpStorm.
 * User: Gerli
 * Date: 02/02/2018
 * Time: 10:50
 */

class mysql
{
    //klassi väljad
    var $conn = false;  //db ühendus
    var $host = false;  //serveri nimi
    var $user = false;  //kasutaja
    var $pass = false;  //kasutaja parool
    var $dbname = false;    //db nimi

    /**
     * mysql constructor.
     * @param bool $host
     * @param bool $user
     * @param bool $pass
     * @param bool $dbname
     */
    public function __construct($host, $user, $pass, $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->connect(); //tekitab ühenduse andmebaasiga
    }

    //funktsioon ühenduse loomiseks
    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn == false){
            echo 'Probleem andmebaasi ühendamisega<br />';
            exit;
        }
    }

    //päringu edastamine
    function query($sql){
        $result = mysqli_query($this->conn, $sql);
        if ($result == false){
            echo 'Probleem päringuga<br />';
            echo '<b>'.$sql.'</b>';
            return false;
        }
        return $result;
    }

    //funktsioon mis väljastab päringu
    function getData($sql){
        $result = $this->query($sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        if (count($data == 0)){
            return false;
        }else{
            return $data;

        }
    }

}