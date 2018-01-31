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

//nõuame vajalike failide kasutamist
require_once MODEL_DIR.'template.php';
require_once MODEL_DIR.'http.php';
require_once MODEL_DIR.'linkobject.php';

//loome cache, objektid mida on kogu aeg vaja kasutada
$http = new linkobject();

