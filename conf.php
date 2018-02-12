<?php
/**
 * Created by PhpStorm.
 * User: Gerli
 * Date: 19/01/2018
 * Time: 09:44
 */

//kaustade ja failide konstantsed nimetused
define('MODEL_DIR', 'model/');
define('VIEWS_DIR', 'views/');
define('CONTROL_DIR', 'controllers/');
define('LIB_DIR', 'lib/');

define('DEFAULT_CONTROL','default');//vaikimisi kasutatav tegevus

// nõuame abifunktisoonide faili kasutamist
require_once LIB_DIR.'utils.php';

define('ROLE_NONE', 0);
define('ROLE_USER', 1);
define('ROLE_ADMIN', 2);

//nõuame vajalike failide kasutamist
require_once MODEL_DIR.'template.php';
require_once MODEL_DIR.'http.php';
require_once MODEL_DIR.'linkobject.php';
require_once MODEL_DIR.'mysql.php';

//nõuan vajalikud abiconf failid
require_once 'db_conf.php';


//loome cache, objektid mida on kogu aeg vaja kasutada
//http ja lingi objekt
$http = new linkobject();
//andmebaasi onbjekt
$db = new mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME);

