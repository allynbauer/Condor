<?php
/**
 * Initialize the system.
 * 
 * @package Condor
 * @subpackage System
 * @author Allyn Bauer <allyn.bauer@gmail.com>
 *
 */
 
//Turn magic quotes off!
ini_set('magic_quotes_gpc', 'off');
ini_set('magic_quotes_runtime', 'off');

define('VERSION', '1.0.2');
define('SYSTEM_ROOT', dirname(dirname(__FILE__)));
define('DEFAULT_CONTROLLER', 'app');
define('DEFAULT_ACTION', 'index');

$__system__ = SYSTEM_ROOT . '/system';
$__lib__    = SYSTEM_ROOT . '/lib';

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
foreach(file_list($__lib__) as $file) {
    require_once($file);
}

// SYSTEM USE VARIABLES
$content = '';                // content to render
$data = new OpenStruct();     // data mapped to rendering view
template('template');         // set the default template

init($_SERVER['REQUEST_URI']);

?>