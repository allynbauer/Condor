<?php

function o($str) { echo "$str"; }
function t($str) { return htmlspecialchars($str); }
function h($str) { o(t($str)); }

function has_error() {
   return sys()->error_count != 0;
}

function add_error($txt) {
  sys()->flash->error = $txt;
  sys()->_error_count += 1;
}

function image_path($image) {
   return WEB_ROOT . "/resources/images/$image";
}

function include_stylesheet($style) {
  $path = WEB_ROOT . "/resources/styles/$style.css";
  return "<link href='$path' rel='stylesheet' type='text/css' />\n";
}

function include_script($script) {
  $path = WEB_ROOT . "/resources/scripts/$script.js";
  return "<script src='$path' type='text/javascript'></script>\n";
}

// allows you to change the template that will be used to render
function template($name) {
   sys()->_TEMPLATE = "_$name.php";
}

// return a string that is custom js or css includes for this |view|, if they exist.
function custom_includes($view) {
    $root = SYSTEM_ROOT;
    $js_file = "$root/javascript/custom/$view.js";
    $css_file = "$root/css/custom/$view.css";
    $returns = '';
    if (file_exists($js_file))  $returns .= "<script src='javascript/custom/$view.js' type='text/javascript'></script>";
    if (file_exists($css_file)) $returns .= "<link href='css/custom/$view.css' rel='stylesheet' type='text/css' />";
    return $returns;
}