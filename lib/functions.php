<?php

function o($str) {
   echo $str;
}

function has_error() {
    return sys()->error_count != 0;
}

function add_error($txt) {
    sys()->flash->error = $txt;
    sys()->_error_count += 1;
}

function image_path($image) {
    return CONSTANT('WEB_ROOT') . "/resources/images/$image";
}

function include_stylesheet($style) {
    $path = CONSTANT('WEB_ROOT') . "/resources/styles/$style.css";
    return "<link href='$path' rel='stylesheet' type='text/css' />\n";
}

function include_script($script) {
    $path = CONSTANT('WEB_ROOT') . "/resources/scripts/$script.js";
    return "<script src='$path' type='text/javascript'></script>\n";
}

// return the contents of a view associated with |name|
function get_view($name) {
   $path = CONSTANT('SYSTEM_ROOT') . "/views/$name.php";
   if (!file_exists($path)) return FALSE;
   return file_get_contents($path);
}

// return a string that is custom js or css includes for this |view|, if they exist.
function custom_includes($view) {
    $root = CONSTANT('SYSTEM_ROOT');
    $js_file = "$root/javascript/custom/$view.js";
    $css_file = "$root/css/custom/$view.css";
    $returns = '';
    if (file_exists($js_file))  $returns .= "<script src='javascript/custom/$view.js' type='text/javascript'></script>";
    if (file_exists($css_file)) $returns .= "<link href='css/custom/$view.css' rel='stylesheet' type='text/css' />";
    return $returns;
}

// render the template with the current |view|
function render($path) {
    $view = $path->controller . '/' . $path->action;
    sys()->_view = $view;
    $template = get_view($view);
    if ($template !== false) sys()->content = $template; // if there's a view file, save it
    sys()->data->web_root = constant('WEB_ROOT');
    ob_start();
    
    // apply the info in $data in this scope so they can be accsesed in the views
    foreach(sys()->data->as_ary() as $key => $val) {
        $$key = $val;
    }
    
    // eval the view
    eval('?>' . sys()->content . '<?');
    sys()->content = ob_get_contents();
    ob_end_clean();
    require_once(CONSTANT('SYSTEM_ROOT') . '/views/_template.php');
}

?>