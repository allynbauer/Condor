<?php
/* 
Original Author: Allyn Bauer
Faculty: John Wynstra
Date: 2010-02-26 (Fri, 26 Feb 2010)

Rod Library - University of Northern Iowa
=========================================
*/

class AppController {
   public $routes = array(
      'imagine' => 'dream/:for/win/:sf'
   );
   
   function index() {
   }
   
   function imagine($params) {
      sys()->content = "url parameter ':for' is: " . $params['for'] . "<br>url parameter ':sf' is: " . $params['sf'];
   }
}