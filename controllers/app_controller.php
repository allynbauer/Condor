<?php

class AppController {
   public $routes = array(
   #  'method' => 'route/to/:match'
      'sweet'  => 'this/is/a/test/:arg/:arg2'
   );
   
   function index() {
       sys()->test = 'hi';
       sys()->data->test = sys()->test;
   }
   
   function sweet($params) {
      sys()->content = "URL Parameters for AppController#sweet ['{$params['arg']}', '{$params['arg2']}']";
   }
   
   function error2() {
       fatal('Fake error!', 501);
   }
}