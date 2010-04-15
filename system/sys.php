<?php
/* 
Sys is a generic wrapper for global variables. It lets us access global variables in
daughter scopes without having to use $_GLOBALS or 'global'.

t is used like this:
 sys()->|global|->|action|
 Where |global| is the global identifier.
*/

class Sys {
    function __get($name) {
        global $$name;
        return $$name;
    }
}

function sys() {
    global $sys;
    return $sys;
}

$sys = new Sys();
