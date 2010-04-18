<?php
/* 
Sys is a generic wrapper for global variables. It lets us access global variables in
daughter scopes without having to use $_GLOBALS or 'global'.

it is used like this:
 sys()->|global|->|action|
 Where |global| is the global identifier.
 
For example:

    $thing = 'hi';
    
    function t() {
        global $thing;
        echo $thing;
    }

but now you can just do:

   function t() {
       echo sys()->thing;
   }
   
*/

class Sys {
    function __get($name) {
        global $$name;
        return $$name;
    }
    
    function __set($name, $value) {
        global $$name;
        $$name = $value;
        return $$name;
    }
}

function sys() {
    global $sys;
    return $sys;
}

$sys = new Sys();
