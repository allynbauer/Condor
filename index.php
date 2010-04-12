<?php
/* 
Original Author: Allyn Bauer
Date: 2010-02-26 (Fri, 26 Feb 2010)

=========================================
*/

define('WEB_ROOT', '/condor'); // NO TRAILING SLASH

require_once('lib/init.php');

// process the request URL
$url = $_SERVER['REQUEST_URI'];
$manager = new PathManager($url);
$route = $manager->build_route();
$instance = $manager->controller_instance($route->controller);
$action = $route->action;
$instance->$action($route->params);
render($route);

?>
