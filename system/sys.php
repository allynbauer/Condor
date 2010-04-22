<?php
/**
 * Sys is a generic wrapper for global variables. It lets us access global variables in
 * daughter scopes without having to use $_GLOBALS or 'global'.
 * 
 * it is used like this:
 * sys()->|global|->|action|
 * Where |global| is the global identifier.
 *
 * For example:
 *
 * <code>
 * $thing = 'hi';
 *   
 * function t() {
 *    global $thing;
 *    echo $thing;
 * }
 * </code>
 * but now you can just do:
 * <code>
 * function t() {
 *     echo sys()->thing;
 * }
 * </code>
 *
 * @package Condor
 * @subpackage System
 * @author Allyn Bauer <allyn.bauer@gmail.com>
 *
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

/**
 * Returns the global instance of Sys.
 *
 * @see Sys
 * @return Sys
 */
function sys() {
    global $sys;
    return $sys;
}

$sys = new Sys();
