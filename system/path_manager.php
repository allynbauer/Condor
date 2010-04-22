<?php
/**
 * PathManager is, perhaps surprisingly, the class that manages paths.
 * 
 * @package Condor
 * @subpackage System
 * @author Allyn Bauer <allyn.bauer@gmail.com>
 *
 */
class PathManager {
   function __construct($url) {
      $this->url = $this->remove_base_url($url);
   }
   
   /**
    * Build a route - whether that means a custom supplied route, or a generic match route.
    * Returns an OpenStruct that has three pairs: controller, action, param.
    *
    * @return OpenStruct
    */
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
   
   /**
    * Remove the WEB_ROOT path for a given $url.
    *
    * @param string $url
    * @return string Return the $url minus the WEB_ROOT
    */
   function remove_base_url($url) {
      $url  = explode('/', $url);
      $base = explode('/', WEB_ROOT);
      foreach($base as $bit) {
         if ($url[0] == $bit) {
            array_shift($url);
         } else {
            /* error */
         }
      }
      return $url;
   }

   /**
    * Return whether the $route matches the URL.
    *
    * @param string $route The route to test (will be from a controller's $routes)
    * @return boolean
    */
   function match($route) {
      $base  = explode('/', WEB_ROOT);
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
   
   /**
    * Build a generic route; this will get called if match returns FALSE for
    * every route in the controller's $routes. This method constructs routes on
    * the assumption that the URL is in the following pattern:
    * WEB_ROOT/:controller/:action[/:param1][/:param2]
    * If action is not provided, DEFAULT_ACTION is assumed.
    * If controller is not provided, DEFAULT_CONTROLLER is assumed.
    *
    * @see match()
    * @see DEFAULT_ACTION
    * @see DEFAULT_CONTROLLER
    * @return OpenStruct
    */
   function build_generic_route() {
      $parts = $this->url;
      $route = new OpenStruct();
      
      $controller = array_shift($parts);
      if ($controller == '') $controller = DEFAULT_CONTROLLER;
      
      $action = array_shift($parts);
      if ($action == '') $action = DEFAULT_ACTION;
      
      $route->controller = $controller;
      $route->action = $action;
      $route->params = $parts;
      
      return $route;
   }

   /**
    * Return an instance of the controller named $name.
    * Return FALSE if the controller file does not exist.
    *
    * @param string $name
    * @return Controller|boolean
    */
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
   
   /**
    * Return the path to a controller.
    *
    * @param string $name
    * @return string
    */
   function controller_path($name) {
      return SYSTEM_ROOT . "/controllers/$name" . "_controller.php";
   }
   
}