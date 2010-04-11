<?php
// (c) 2009 by Allyn Bauer <allyn.bauer@gmail.com>
class FlashHelper {
   function __construct() {
      // flashes need a default array to keep track of existing flashes
      // that way we don't have to know what they are called, we just pull them out of here
      if (!isset($_SESSION['flash'])) {
         $_SESSION['flash'] = array();
      }
   }
   
   // return the currently registered flashes
   function get_list() {
      return array_keys($_SESSION['flash']);
   }
   
   // true if name exists, false if not
   function exists($name) {
      return in_array($name, $this->get_list());
   }
   
   // render as HTML
   function render() {
      $contents = array();
      $count = 0;
      foreach($this->get_list() as $name) {
         $count++;
         $contents[] = "<div id='flash_$count' class='flash $name'><span>{$this->$name}<span></div>";
      }
      return implode("\n", $contents);
   }
   
   function __set($name, $value) {
      $_SESSION['flash'][$name] = $value;
   }
   
   function __get($name) {
      if ($this->exists($name)) {
         $contents = $_SESSION['flash'][$name];
         unset($_SESSION['flash'][$name]);
         
         return $contents;
      } else {
         return FALSE;
      }
   }
}

?>