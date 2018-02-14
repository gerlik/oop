<?php
/**
 * Created by PhpStorm.
 * User: Gerli
 * Date: 12/02/2018
 * Time: 09:51
 */

//vormi poolt tulnud andmed
$username = $http->get('username');
$password = $http->get('password');

echo $username.'<br />';
echo $password.'<br />';
//päring kasutaja kontrollimiseks
$sql = 'SELECT * FROM user '.
    'WHERE username='.fixDb($username).
    ' AND password='.fixDb(md5($password));
$result = $db->getData($sql);
//kontrollime, kes andmed on olemas
if($result != false){

    //kasutajale tuleb avade töösessioon
    echo 'Oled peaaegu sisse logitud <br />';
}else {
    //peab tagasi suunama sisse logima
    $link = $http->getLink(array('control' => 'login'));
    $http->redirect($link);
}
