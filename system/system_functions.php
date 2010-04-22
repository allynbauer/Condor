<?php
/**
 * System-level Functions.
 * 
 * @package Condor
 * @subpackage System
 * @author Allyn Bauer <allyn.bauer@gmail.com>
 *
 */

/**
 * Makes everything go.
 *
 * @return void
 */
function init($url) {
    // process the request URL
    $manager = new PathManager($url);
    $route = $manager->build_route();
    $instance = $manager->controller_instance($route->controller);

    if ($instance === FALSE) {
       fatal("Fatal Error: Cannot find a controller called '{$route->controller}'.", 404);
    } elseif (method_exists($instance, $route->action) === FALSE) {
       fatal("Fatal Error: Controller '{$route->controller}' does not respond to action '{$route->action}'.", 404);
    }

    $action = $route->action;
    $instance->$action($route->params);
    render($route);
}

/**
 * Generate a fatal error, printing the $error and sending the header
 * associated with the $code. By default, this function renders the
 * error message with the error template. If you provide an ErrorController
 * that responds to an action called _$code, it will use that instead.
 * This lets you use the default error handling while developing an app
 * and switch to a more polished solution later.
 * This method can also be handy for testing - call it without args to see
 * all the data associated with a request.
 *
 * @see send_header()
 * @param string $error
 * @param integer $code
 * @return void
 *
 */
function fatal($error = 'Fatal error.', $code = 500) {
    send_header($code);
    error_log($error);
    
    // do a mock request to see if we can handle this error with a controller
    $manager = new PathManager(WEB_ROOT . "/error/_$code");
    $route = $manager->build_route();
    $instance = $manager->controller_instance($route->controller);
    if ($instance !== FALSE && method_exists($instance, $route->action) !== FALSE) {
        $route->params = array('error' => $error, 'code' => $code);
        $action = $route->action;
        $instance->$action($route->params);
    } else {
        template('error');
        sys()->data->error = $error;
        sys()->data->code = $code;
    }

    render($route);
    exit;
}

/**
 * Send the header associated with $code.
 *
 * @see http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
 * @param integer $code
 * @return void
 *
 */
function send_header($code) {
    $msgs = array(
        '400' => '400 Bad Request',
        '401' => '401 Unauthorized',
        '402' => '402 Payment Required',
        '403' => '403 Forbidden',
        '404' => '404 404 Not Found',
        '405' => '405 Method Not Allowed',
        '406' => '406 Not Acceptable',
        '407' => '407 Proxy Authentication Required',
        '408' => '408 Request Time-out',
        '409' => '409 Conflict',
        '410' => '410 Gone',
        '411' => '411 Length Required',
        '412' => '412 Precondition Failed',
        '413' => '413 Request Entity Too Large',
        '414' => '414 Request-URI Too Large',
        '415' => '415 Unsupported Media Type',
        '416' => '416 Requested Range Not Satisfiable',
        '417' => '417 Expectation Failed',
        '500' => '500 Internal Server Error',
        '501' => '501 Not Implemented',
        '502' => '502 Bad Gateway',
        '503' => '503 Service Unavailable',
        '504' => '504 Gateway Time-out');
    $message = $msgs["$code"];
    header("HTTP/1.1 $message");
}

/**
 * Return an array of strings where each string is a file in $path that
 * is not in $exclude. If $recursive, get all at $path, even child folders.
 *
 * @param string $path
 * @param string $exclude
 * @param boolean $recursive
 * @return array
 */ 
function file_list($path, $exclude = ".|..", $recursive = true) {
    $path = rtrim($path, "/") . "/";
    $handle = opendir($path);
    $exclude_ary = explode("|", $exclude);
    $result = array();
    while(false !== ($filename = readdir($handle))) {
        if (in_array(strtolower($filename), $exclude_ary)) {
            continue;
        }
        $file_path = $path . $filename;
        if (is_dir($path . $filename . "/") && $recursive) {
            $result = array_merge($result, file_list($file_path . "/", $exclude));
        } else {
            $result[] = $file_path;
        }
    }
    return $result;
}

/**
 * Redirect the app to $str, unless $str is 'index' which redirects to WEB_ROOT.
 *
 * @see WEB_ROOT
 * @param string $str
 * @return void
 */
function redirect_to($str) {
    if ($str === 'index') $str = '';
    header("Location: " . path($str));
}

/**
 * Return a path for $str.
 *
 * @param string $str
 * @return string
 */
function path($str) {
    if ($str === 'index') $str = '';
    return WEB_ROOT . "/$str";
}

/**
 * Return the path to the $image.
 *
 * @param string $image
 * @return string
 */ 
 function image_path($image) {
   return path("/resources/images/$image");
}

/**
 * Return a HTML Link tag for $style.
 * The extension is not required. ('style', not 'style.css')
 *
 * @param string $style
 * @return string
 */
function include_stylesheet($style) {
  $path = path("/resources/styles/$style.css");
  return "<link href='$path' rel='stylesheet' type='text/css' />\n";
}

/**
 * Return a HTML Script tag for $script.
 * The extension is not required. ('script', not 'script.js')
 *
 * @param string $script
 * @return string
 */
function include_script($script) {
  $path = path("/resources/scripts/$script.js");
  return "<script src='$path' type='text/javascript'></script>\n";
}

/**
 * Return the contents of a view associated with $name,
 * or FALSE if there is no view called $name.
 *
 * @param string $name
 * @return string|boolean
 */
function get_view($name) {
   $path = SYSTEM_ROOT . "/views/$name.php";
   if (!file_exists($path)) return FALSE;
   return file_get_contents($path);
}

/**
 * Render with a different template then the default of 'template'.
 *
 * @param string $name
 * @return void
 */
function template($name) {
   sys()->_TEMPLATE = "_$name.php";
}

/**
 * Render the template with the current view.
 *
 * @see template()
 * @see get_view()
 * @param OpenStruct $path
 * @return void
 */
function render($path) {
    $view = $path->controller . '/' . $path->action;
    sys()->_view = $view;
    $template = get_view($view);
    if ($template !== false) sys()->content = $template; // if there's a view file, save it
    sys()->data->web_root = WEB_ROOT;
    ob_start();
    
    // apply the info in $data in this scope so they can be accsesed in the views
    foreach(sys()->data->as_ary() as $key => $val) {
        $$key = $val;
    }
    
    // eval the view
    eval('?>' . sys()->content . '<?');
    sys()->content = ob_get_contents();
    ob_end_clean();
    require_once(SYSTEM_ROOT . '/views/' . sys()->_TEMPLATE);
}