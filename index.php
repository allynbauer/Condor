<?php
/* 
Original Author: Allyn Bauer
Date: 2010-02-26 (Fri, 26 Feb 2010)

=========================================
*/

define('WEB_ROOT', str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname(__FILE__)));
require_once('system/init.php');

// process the request URL
$url = $_SERVER['REQUEST_URI'];
$manager = new PathManager($url);
$route = $manager->build_route();
$instance = $manager->controller_instance($route->controller);

if ($instance === FALSE) {
   die("Fatal Error: Cannot find a controller called '{$route->controller}'.");
} elseif (method_exists($instance, $route->action) === FALSE) {
   die("Fatal Error: Controller '{$route->controller}' does not respond to action '{$route->action}'.");
}

$action = $route->action;
$instance->$action($route->params);
render($route);

?>
