<?php
/**
 * OpenStruct allows you to create PHP Array's in an object-notation form.
 * It's name is borrowed from Ruby's OpenStruct class.
 *
 * @package Condor
 * @subpackage System
 * @author Allyn Bauer <allyn.bauer@gmail.com>
 *
 */
class OpenStruct {
    
   private $_data = array();
    
   /**
    * Return an array of all the key => value pairs in this OpenStruct.
    *
    * @return array
    */
   function as_ary() {
      return $this->_data;
   }
   
   /**
    * @return void
    */
   function __set($name, $value) {
      $this->_data[$name] = $value;
   }
   
   /**
    * @return mixed
    */
   function __get($name) {
      $obj = $this->_data[$name];
      if (!$obj) $obj = FALSE;
      return $obj;
   }
}

?>