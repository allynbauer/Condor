<?php
/* THIS FILE IS FOR FUNCTIONS THAT THE SYSTEM USES AT A CORE LEVEL.
 */

// return the contents of a view associated with |name|
function get_view($name) {
   $path = CONSTANT('SYSTEM_ROOT') . "/views/$name.php";
   if (!file_exists($path)) return FALSE;
   return file_get_contents($path);
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
    require_once(CONSTANT('SYSTEM_ROOT') . '/views/' . sys()->_TEMPLATE);
}