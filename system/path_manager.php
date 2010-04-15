<?php

class PathManager {
   function __construct($url) {
      $this->url = $this->remove_base_url($url);
   }
   
   function build_route() {
      $url = $this->url; // this method is non-destructive of object state
      $controller = array_shift($url);
      $klass = $this->controller_instance($controller);
      $route = NULL;
      
      // attempt to build a path
      if (isset($klass->routes)) {
         $routes = $klass->routes;
         foreach($routes as $method => $sequence) {
            $params = $this->match($sequence);
            if ($params) {
               $route = new OpenStruct();
               $route->controller = $controller;
               $route->action     = $method;
               $route->params     = $params;
            }
         }
      }
      
      if (empty($route)) {
         $route = $this->build_generic_route();
      }
      
      return $route;
   }
   
   function remove_base_url($url) {
      $url  = explode('/', $url);
      $base = explode('/', constant('WEB_ROOT'));
      foreach($base as $bit) {
         if ($url[0] == $bit) {
            array_shift($url);
         } else {
            /* error */
         }
      }
      return $url;
   }
   
   // |route| is the route we're testing matches for
   function match($route) {
      $base  = explode('/', CONSTANT('WEB_ROOT'));
      $parts = $this->remove_base_url($route);
      $url   = $this->url;
   
      // this method is supposed to route a controller, so we already know what it is
      array_shift($url);
   
      $params = array();
   
      if (count($url) === 1 && $url[0] === '') { // route matches '$controller/' (index action)
         return $params;
      }
   
      // handle this match
      foreach($parts as $piece) {
      $url_part = array_shift($url);
         if (strpos($piece, ':') === 0) { // style is ':token'
            $params[preg_replace('/:/', '', $piece)] = $url_part;
         } elseif($url_part != $piece) {
            return FALSE;
         }
   	}
   	if (!empty($params)) return $params;
   	return FALSE;
   }
   
   // build and return the path parameters
   function build_generic_route() {
      $parts = $this->url;
      $route = new OpenStruct();
      
      $controller = array_shift($parts);
      if ($controller == '') $controller = 'app';
      
      $action = array_shift($parts);
      if ($action == '') $action = 'index';
      
      $route->controller = $controller;
      $route->action = $action;
      $route->params = $parts;
      
      return $route;
   }
   
   // return an instance of the |name| controller, or FALSE if there wasn't one
   function controller_instance($name) {
       $controller_path = $this->controller_path($name);
       $klass = null;
       if (file_exists($controller_path)) {
           require_once($controller_path);
           $klass = ucfirst($name) . 'Controller';
           $klass = new $klass();
       } else {
           return FALSE;
       }
       return $klass;
   }
   
   function controller_path($name) {
      return CONSTANT('SYSTEM_ROOT') . "/controllers/$name" . "_controller.php";
   }
   
}