<?php
/**
 * Created by PhpStorm.
 * User: Gerli
 * Date: 14/02/2018
 * Time: 14:53
 */

class session
{
    var $sid = false; //sessiooni id
    var $vars = array(); //sessiooni ajal tekkinud andmed
    var $http = false; //$http objekti jaoks
    var $db = false; //$db objeksti jaoks
    var $timeout = 1800; //30 minutit sessiooni pikkuseks
    var $anonymous = true; //ilma kasutajatunnuseta sessioon

    /**
     * session constructor.
     * @param bool $http
     * @param bool $db
     */
    //viide
    public function __construct(&$http, &$db)
    {
        $this->http = &$http;
        $this->db = &$db;
        $this->sid = $http->get('sid');
        $this->checkSession();
    }
    //loome sessiooni
    function sessionCrete($user = false){
        //kui kasutaja on anonüümne
        if($user == false){
            //kasutaja andmed andmebaasi jaoks
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonüümne'
                );

            //sessiooni id loomine
            $sid = md5(uniqid(time().mt_rand(1,1000), true));
            //salvestamine
            $sql = 'INSERT INTO session SET '.'sid='.fixDb($sid).', '.'user_id='.fixDb($user['user_id']).', '.
                'user_data='.fixDb(serialize($user)).', '.'login_ip='.fixDb(REMOTE_ADDR).', '.'created=NOW()';
            //saadame päringu andmebaasi
            $this->db->query($sql);
            //määrame sid $this->sid
            $this->sid = $sid;
            //lisame andmed $http objekti sisse et oleks veebis kättesaadavad
            $this->http->set('sid', $sid);
        }
    }
    //funktsioon, mis hakkab kustutama andmeid sessioonitabelist
    function clearSessions(){
        $sql = 'DELETE FROM session WHERE'.time().' - UNIX_TIMESTAMP(changed) > '.
            $this->timeout;
        $this->db->query($sql);
    }
    //sessiooni andmete kontroll
    function checkSession(){
        $this->clearSessions();
        //kui kasutaja on anonüümne ja pole sid
        if ($this->sid === false and $this->anonymous){
            $this->sessionCrete();
        }
    }
}

