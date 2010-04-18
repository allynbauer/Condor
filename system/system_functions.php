<?php
/* THIS FILE IS FOR FUNCTIONS THAT THE SYSTEM USES AT A CORE LEVEL.
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
  
// return the contents of a view associated with |name|
function get_view($name) {
   $path = SYSTEM_ROOT . "/views/$name.php";
   if (!file_exists($path)) return FALSE;
   return file_get_contents($path);
}

// render the template with the current |view|
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