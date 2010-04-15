<?php

//Turn magic quotes off!
ini_set('magic_quotes_gpc', 'off');
ini_set('magic_quotes_runtime', 'off');

define('SYSTEM_ROOT', dirname(dirname(__FILE__)));
$__system__ = constant('SYSTEM_ROOT') . '/system';
$__lib__    = constant('SYSTEM_ROOT') . '/lib';

require_once("$__system__/userdata.php");
require_once("$__lib__/userdata_app.php");
$getData  = new App_UserData('GET');
$postData = new App_UserData('POST');

// flash! longer then a blink and shorter then a moment
require_once("$__system__/flash.php");
session_start();
$flash = new FlashHelper();

// SYSTEM FILES
require_once("$__system__/openstruct.php");
require_once("$__system__/sys.php");
require_once("$__system__/path_manager.php");
require_once("$__system__/system_functions.php");

// LIB FILES
require_once("$__lib__/database.php");
require_once("$__lib__/user_functions.php");
require_once("$__lib__/helpers.php");

// SYSTEM USE VARIABLES
$content = '';                // content to render
$data = new OpenStruct();     // data mapped to rendering view
$_error_count = 0;            // count of fatal app errors
template('template');         // set the default template

?>