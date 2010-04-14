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

// allows you to change the template that will be used to render
function template($name) {
   sys()->_TEMPLATE = "_$name.php";
}