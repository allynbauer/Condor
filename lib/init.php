<?php

//Turn magic quotes off!
ini_set('magic_quotes_gpc', 'off');
ini_set('magic_quotes_runtime', 'off');

define('SYSTEM_ROOT', dirname(dirname(__FILE__)));
define('WEB_ROOT', '/sites/app_template'); // NO TRAILING SLASH

$dir = dirname(__FILE__);

require_once("$dir/userdata_app.php");
$getData  = new App_UserData('GET');
$postData = new App_UserData('POST');

// flash! longer then a blink and shorter then a moment
require_once("$dir/flash.php");
session_start();
$flash = new FlashHelper();

// include the needed files
require_once("$dir/database.php");
require_once("$dir/functions.php");
require_once("$dir/helpers.php");
require_once("$dir/openstruct.php");
require_once("$dir/sys.php");
require_once("$dir/path_manager.php");

// for rendering
$content = '';
$mappings = array();
$data = new OpenStruct();
$_error_count = 0;

?>