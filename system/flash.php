<?php
/**
 * Flash is a messaging system. It allows you to specify error, notice or other messages
 * to the user on the next page load with little effort.
 *
 * @package Condor
 * @subpackage System
 * @author Allyn Bauer <allyn.bauer@gmail.com>
 *
 */
class FlashHelper {
   function __construct() {
      if (!isset($_SESSION['flash'])) {
         $_SESSION['flash'] = array();
      }
   }
   
   /**
    * Return an Array of the keys currently in flash.
    *
    * @return array
    */
   function get_list() {
      return array_keys($_SESSION['flash']);
   }
   
   /**
    * Tests to see if a given name exists in the flash instance.
    *
    * @param string $name the name of the identifier to test
    * @return boolean
    */
   function exists($name) {
      return in_array($name, $this->get_list());
   }
   
   /**
    * Render the flash instance as HTML. Each flash is represented by a div that
    * has an id of 'flash_$count' where $count is the 1-based position, and a class
    * of 'flash $name' where $name is the stored $name identifier.
    *
    * @return string
    */
   function render() {
      $contents = array();
      $count = 0;
      foreach($this->get_list() as $name) {
         $count++;
         $contents[] = "<div id='flash_$count' class='flash $name'><span>{$this->$name}<span></div>";
      }
      return implode("\n", $contents);
   }
   
   /**
    * Magic method to set the $name in the session. Overwrites old instances of $name.
    *
    * @param string $name the identifier of the message
    * @param string $value the text of the message
    * @return void
    */
   function __set($name, $value) {
      $_SESSION['flash'][$name] = $value;
   }
   
   /**
    * Return the message associated with $name or FALSE if there isn't one.
    * This method also removes the flash from the session.
    *
    * @param string $name the identifier of the message
    * @return string|boolean
    */
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