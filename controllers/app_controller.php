<?php

class AppController {
   public $routes = array(
      'sweet' => 'this/is/a/test/:arg/:arg2'
   );
   
   function index() {
   }
   
   function sweet($params) {
      sys()->content = "URL Parameters for AppController#sweet ['{$params['arg']}', '{$params['arg2']}']";
   }
}