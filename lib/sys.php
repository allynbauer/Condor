<?php
/* 
Original Author: Allyn Bauer
Faculty: John Wynstra
Date: 2010-02-03 (Wed, 3 Feb 2010)

Rod Library - University of Northern Iowa
=========================================
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
